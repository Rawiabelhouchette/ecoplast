<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests; // Assuming your model is named RequestModel to avoid conflict with Illuminate\Http\Request
use Illuminate\Support\Facades\Log;
use App\Models\Product;
class RequestController extends Controller
{
    public function index(Request $request)
    {
        $query = Requests::query();
        if ($request->has('recherche') && $request->recherche) {
            $search = $request->recherche;
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('prenom', 'like', '%' . $search . '%')
                  ->orWhere('num_tel', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('methode_livraison', 'like', '%' . $search . '%')
                  ->orWhere('estimation_temps', 'like', '%' . $search . '%');
            });
        }

        $requests = $query->paginate(10);
        $products = Product::paginate(3);

        return view('dashboard.requests', compact('requests','products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('dashboard.createRequest',compact("products"));
    }

    public function store(Request $request)
    {
        Log::info("create");
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'num_tel' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'methode_livraison' => 'required|string|max:255',
            'estimation_temps' => 'nullable|string|max:255',
               'produit_id' => 'required|exists:products,id'
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',

            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 255 caractères.',

            'num_tel.required' => 'Le numéro de téléphone est obligatoire.',
            'num_tel.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'num_tel.max' => 'Le numéro de téléphone ne doit pas dépasser 15 caractères.',

            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',

            'methode_livraison.required' => 'La méthode de livraison est obligatoire.',
            'methode_livraison.string' => 'La méthode de livraison doit être une chaîne de caractères.',
            'methode_livraison.max' => 'La méthode de livraison ne doit pas dépasser 255 caractères.',

            'estimation_temps.string' => 'L\'estimation de temps doit être une chaîne de caractères.',
            'estimation_temps.max' => 'L\'estimation de temps ne doit pas dépasser 255 caractères.',

            'produit_id.required' => 'Le produit est obligatoire.',
            'produit_id.exists' => 'Le produit sélectionné n\'existe pas.',
        ]);

        Requests::create($data);

        return redirect()->route('requests.index')->with('success', 'Request updated successfully.');
    }


    public function storeRequest(Request $request)
    {
        Log::info("create");
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'num_tel' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'methode_livraison' => 'required|string|max:255',
            'estimation_temps' => 'nullable|string|max:255',
               'produit_id' => 'required|exists:products,id'
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',

            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 255 caractères.',

            'num_tel.required' => 'Le numéro de téléphone est obligatoire.',
            'num_tel.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'num_tel.max' => 'Le numéro de téléphone ne doit pas dépasser 15 caractères.',

            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',

            'methode_livraison.required' => 'La méthode de livraison est obligatoire.',
            'methode_livraison.string' => 'La méthode de livraison doit être une chaîne de caractères.',
            'methode_livraison.max' => 'La méthode de livraison ne doit pas dépasser 255 caractères.',

            'estimation_temps.string' => 'L\'estimation de temps doit être une chaîne de caractères.',
            'estimation_temps.max' => 'L\'estimation de temps ne doit pas dépasser 255 caractères.',

            'produit_id.required' => 'Le produit est obligatoire.',
            'produit_id.exists' => 'Le produit sélectionné n\'existe pas.',
        ]);

        Requests::create($data);

        $products = Product::all();
        return view('requestAvis', [
            'products' => $products,
            'success' => 'Request updated successfully.'
        ]);
    }

    public function edit(Requests $request)
    {
        $products = Product::all();
        return view('dashboard.createRequest', compact('request','products'));
    }

    public function update(Request $request, $id)
    {  // Validate the incoming data
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'num_tel' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'methode_livraison' => 'required|string|max:255',
            'estimation_temps' => 'nullable|string|max:255',
            'produit_id' => 'required|exists:products,id',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',
            'nom.max' => 'Le nom ne doit pas dépasser 255 caractères.',

            'prenom.required' => 'Le prénom est obligatoire.',
            'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
            'prenom.max' => 'Le prénom ne doit pas dépasser 255 caractères.',

            'num_tel.required' => 'Le numéro de téléphone est obligatoire.',
            'num_tel.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'num_tel.max' => 'Le numéro de téléphone ne doit pas dépasser 15 caractères.',

            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',

            'methode_livraison.required' => 'La méthode de livraison est obligatoire.',
            'methode_livraison.string' => 'La méthode de livraison doit être une chaîne de caractères.',
            'methode_livraison.max' => 'La méthode de livraison ne doit pas dépasser 255 caractères.',

            'estimation_temps.string' => 'L\'estimation de temps doit être une chaîne de caractères.',
            'estimation_temps.max' => 'L\'estimation de temps ne doit pas dépasser 255 caractères.',

            'produit_id.required' => 'Le produit est obligatoire.',
            'produit_id.exists' => 'Le produit sélectionné n\'existe pas.',
        ]);

        // Find the request by ID
        $requests = Requests::findOrFail($id);

        // Log the validated data
        Log::info("update 12");
        Log::info($data);

        // Update the request model with the validated data
        $requests->update($data);  // This will update the model using the provided data

        // Optionally log success
        Log::info("Request updated successfully");

        // Redirect to the requests index page with a success message
        return redirect()->route('requests.index')->with('success', 'Request updated successfully.');
    }

    public function destroy($id)
    {
        $requestModel = Requests::findOrFail($id);

        $requestModel->delete();

        return redirect()->route('requests.index')->with('success', 'Request deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        Requests::whereIn('id', $ids)->delete();

        return response()->json(['message' => 'Requests deleted successfully.']);
    }

    public function exportToExcel()
    {
        $products = Requests::all();

        // Define the header for the CSV
        $header = ['ID', 'Nom','Prenom','Numero telephone',"Email",'Methode de livraison'];

        // Open a file pointer for output
        $fileName = 'demande_devis_export.csv';
        $handle = fopen('php://output', 'w');

        // Add the header to the CSV
        fputcsv($handle, $header);

        // Add rows for each product
        foreach ($products as $product) {
            fputcsv($handle, [
                $product->id,
                $product->nom,
                $product->prenom,
                $product->num_tel,
                $product->email,
                $product->methode_livraison,

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
