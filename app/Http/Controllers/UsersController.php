<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // For password hashing

use App\Models\Roles; // Import the User model
class UsersController extends Controller
{
    // Display a paginated list of users
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('recherche') && $request->recherche) {
            $search = $request->recherche;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');

            });
        }

        $users = $query->paginate(10);

        return view('dashboard.users', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        $roles = Roles::all();
        return view('dashboard.createUser', compact('roles'));
    }

    // Store a newly created user
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',

            'email.required' => 'L\'adresse email est obligatoire.',
            'email.string' => 'L\'adresse email doit être une chaîne de caractères.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',

            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',

            'role_id.required' => 'Le rôle est obligatoire.',
            'role_id.exists' => 'Le rôle sélectionné n\'existe pas.',
        ]);

        $data['password'] = Hash::make($data['password']); // Hash the password

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Show the form for editing an existing user
    public function edit(User $user)
    {
        $roles = Roles::all();
        return view('dashboard.createUser', compact('user','roles'));
    }

    // Update an existing user
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',

            'email.required' => 'L\'adresse email est obligatoire.',
            'email.string' => 'L\'adresse email doit être une chaîne de caractères.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',

            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',

            'role_id.required' => 'Le rôle est obligatoire.',
            'role_id.exists' => 'Le rôle sélectionné n\'existe pas.',
        ]);

        if ($request->password) {
            $data['password'] = Hash::make($request->password); // Hash the new password
        } else {
            unset($data['password']); // Do not update the password if it's not provided
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function exportToExcel()
    {
        $products = User::all();

        // Define the header for the CSV
        $header = ['ID', 'Nom','Email'];

        // Open a file pointer for output
        $fileName = 'utulisateurs_export.csv';
        $handle = fopen('php://output', 'w');

        // Add the header to the CSV
        fputcsv($handle, $header);

        // Add rows for each product
        foreach ($products as $product) {
            fputcsv($handle, [
                $product->id,
                $product->name,
                $product->email,
            ]);
        }

        // Close the file pointer
        fclose($handle);

        // Return the file as a download
        return response()->streamDownload(function () use ($handle) {
            // Output the stream contents
        }, $fileName, ['Content-Type' => 'text/csv']);
    }
}
