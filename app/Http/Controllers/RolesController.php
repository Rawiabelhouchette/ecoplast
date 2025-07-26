<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Roles;
use Illuminate\Support\Facades\Storage;

class RolesController extends Controller
{

        public function index(Request $request)
        {
            $query = Roles::query();
            if ($request->filled('recherche')) {
                $search = $request->recherche;
                $query->where('name', 'like', '%' . $search . '%');
            }

            $roles = $query->paginate(10);

            return view('dashboard.roles', compact('roles'));
        }

        public function create()
        {
            return view('dashboard.CreateRole');
        }

        public function store(Request $request)
        {
            $data = $request->validate([
                'name' => 'required|string|max:255',

            ], [
                'name.required' => 'Le nom est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            ]);


            Roles::create($data);

            return redirect()->route('roles.index')->with('success', 'Product created successfully.');
        }

        public function edit(Roles $role)
        {
            return view('dashboard.createRole', compact('role'));
        }

        public function update(Request $request, Roles $role)
        {
            $data = $request->validate([
                'name' => 'required|string|max:255',

            ], [
                'name.required' => 'Le nom est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            ]);


            $role->update($data);

            return redirect()->route('roles')->with('success', 'Product updated successfully.');
        }
        public function destroy($id)
        {
            // Find the product by ID
            $role = Roles::findOrFail($id);

            // Delete associated files only if they exist

            // Delete the product
            $role->delete();

            return redirect()->route('roles.index')->with('success', 'Product deleted successfully.');
        }



        public function exportToExcel()
        {
            $products = Roles::all();

            // Define the header for the CSV
            $header = ['ID', 'Nom'];

            // Open a file pointer for output
            $fileName = 'roles_export.csv';
            $handle = fopen('php://output', 'w');

            // Add the header to the CSV
            fputcsv($handle, $header);

            // Add rows for each product
            foreach ($products as $product) {
                fputcsv($handle, [
                    $product->id,
                    $product->name,

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


