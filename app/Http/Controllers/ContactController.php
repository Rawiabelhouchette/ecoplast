<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ContactController extends Controller
{

    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->has('recherche') && $request->recherche) {
            $search = $request->recherche;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('company', 'like', '%' . $search . '%')
                  ->orWhere('details', 'like', '%' . $search . '%');
            });
        }

        $contacts = $query->paginate(10);
        $products = Product::paginate(3);

        return view('dashboard.contact', compact('contacts','products'));
    }
    public function store(Request $request)
    {
        Log::info("hello test",["request" => $request]);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'details' => 'nullable|string',

        ],[
            'first_name.required' => 'Le prénom est obligatoire.',
            'last_name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'company.string' => 'L\'entreprise doit être une chaîne de caractères.',
            'website.url' => 'Le site web doit être une URL valide.',
            'details.string' => 'Les détails doivent être une chaîne de caractères.',
        ]);
        Log::info("hello test");

        Contact::create($validatedData);

        return redirect()->back()->with('success', 'Merci! Votre demande a été enregistrée.');
    }

    public function exportToExcel()
    {
        $products = Contact::all();

        // Define the header for the CSV
        $header = ['ID', 'Nom','Prenom','Email','Entreprise','Details'];

        // Open a file pointer for output
        $fileName = 'contact_export.csv';
        $handle = fopen('php://output', 'w');

        // Add the header to the CSV
        fputcsv($handle, $header);

        // Add rows for each product
        foreach ($products as $product) {
            fputcsv($handle, [
                $product->id,
                $product->first_name,
                $product->last_name,
                $product->email,
                $product->company,
                $product->details

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

