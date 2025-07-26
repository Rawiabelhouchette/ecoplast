<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Requests;


use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

        public function index(Request $request)
        {
            $query = Product::query();
            if ($request->has('recherche') && $request->recherche) {
                $search = $request->recherche;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('price', 'like', '%' . $search . '%')
                      ->orWhere('quantity', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
                });
            }

            $products = $query->paginate(10);

            return view('dashboard.products', compact('products'));
        }

        public function create()
        {
            return view('dashboard.createProduct');
        }

        public function store(Request $request)
        {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'images' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'pdfs' => 'nullable|mimes:pdf|max:2048',
                'qty' => 'required|integer',
                'video' => 'nullable|file|mimes:mp4,mov,avi|max:10240',
            ], [
                'name.required' => 'Le nom est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',

                'description.string' => 'La description doit être une chaîne de caractères.',

                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être au format jpeg, png ou jpg.',
                'image.max' => 'L\'image ne doit pas dépasser 2048 kilo-octets.',

                'pdfs.mimes' => 'Le fichier PDF doit être au format PDF.',
                'pdfs.max' => 'Le fichier PDF ne doit pas dépasser 2048 kilo-octets.',

                'qty.required' => 'La quantité est obligatoire.',
                'qty.integer' => 'La quantité doit être un nombre entier.',

                'video.file' => 'La vidéo doit être un fichier.',
                'video.mimes' => 'La vidéo doit être au format mp4, mov ou avi.',
                'video.max' => 'La vidéo ne doit pas dépasser 10240 kilo-octets (10 Mo).',
            ]);


            if ($request->hasFile('video')) {
                $data['video'] = $request->file('video')->store('videos', 'public'); // Save to storage/app/public/videos
            }
            $product = Product::create($data);

            if ($request->hasFile('pdfs')) {
                foreach ($request->file('pdfs') as $pdf) {
                    $path = $pdf->store('pdfs', 'public');
                    $product->pdfs()->create(['pdf_path' => $path]);
                }
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $pdf) {
                    $path = $pdf->store('images', 'public');
                    $product->images()->create(['image_path' => $path]);
                }
            }
            return redirect()->route('productDashboard.index')->with('success', 'Product created successfully.');
        }

        public function edit($id)
        {
            // Find the product by ID or fail with a 404 error if not found
            $product = Product::findOrFail($id);

            // Log the product details for debugging
            Log::info($product);

            // Return the view with the product data
            return view('dashboard.createProduct', compact('product'));
        }

        public function update(Request $request, $id)
        {
            // Find the product by id
            $product = Product::findOrFail($id);

            // Validate the request data
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'pdf' => 'nullable|mimes:pdf|max:2048',
                'qty' => 'required|integer',
                'video' => 'nullable|file|mimes:mp4,mov,avi|max:10240',
            ], [
                'name.required' => 'Le nom est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',

                'description.string' => 'La description doit être une chaîne de caractères.',

                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être au format jpeg, png ou jpg.',
                'image.max' => 'L\'image ne doit pas dépasser 2048 kilo-octets.',

                'pdf.mimes' => 'Le fichier PDF doit être au format PDF.',
                'pdf.max' => 'Le fichier PDF ne doit pas dépasser 2048 kilo-octets.',

                'qty.required' => 'La quantité est obligatoire.',
                'qty.integer' => 'La quantité doit être un nombre entier.',

                'video.file' => 'La vidéo doit être un fichier.',
                'video.mimes' => 'La vidéo doit être au format mp4, mov ou avi.',
                'video.max' => 'La vidéo ne doit pas dépasser 10240 kilo-octets (10 Mo).',
            ]);

            // Handle file uploads if they exist

            if ($request->hasFile('video')) {
                $data['video'] = $request->file('video')->store('videos', 'public'); // Save to storage/app/public/videos
            }

            // Update the product using the validated data
            $product->update($data);


            if ($request->hasFile('pdfs')) {
                foreach ($request->file('pdfs') as $pdf) {
                    $path = $pdf->store('pdfs', 'public');
                    $product->pdfs()->create(['pdf_path' => $path]);
                }
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $pdf) {
                    $path = $pdf->store('images', 'public');
                    $product->images()->create(['image_path' => $path]);
                }
            }


            // Redirect with success message
            return redirect()->route('productDashboard.index')->with('success', 'Product created successfully.');
        }

        public function destroy($id)
        {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Delete associated image file if it exists
            if (!is_null($product->image)) {
                Storage::delete('public/' . $product->image);
            }

            // Delete associated video file if it exists
            if (!is_null($product->video)) {
                Storage::delete('public/' . $product->video);
            }

            // Delete associated PDFs
            foreach ($product->pdfs as $pdf) {
                if (!is_null($pdf->pdf_path)) {
                    Storage::delete('public/' . $pdf->pdf_path); // Delete the file
                }
                $pdf->delete(); // Delete the record from the database
            }

            // Delete the product
            $product->delete();

            return redirect()->route('product-dashboard.index')->with('success', 'Product deleted successfully.');
        }


        public function bulkDelete(Request $request)
        {
            $ids = $request->ids;

            foreach ($ids as $id) {
                $product = Product::find($id);

                if ($product) {
                    Storage::delete([$product->image, $product->pdf, $product->video]);
                    $product->delete();
                }
            }

            return response()->json(['message' => 'Products deleted successfully.']);
        }

        public function show($product_id)
    {

        // Retrieve the product using the product_id
        $product = Product::where('id', $product_id)->firstOrFail();  // Fetch product by product_id

        // Retrieve the associated requests based on the product_id
        $requests = Requests::where('produit_id', $product_id)->get();  // Fetch requests for the given product

        return view('dashboard.productDetail', compact('product', 'requests'));
    }



    public function exportToExcel()
    {
        $products = Product::all();

        // Define the header for the CSV
        $header = ['ID', 'Name', 'Description', 'Quantity'];

        // Open a file pointer for output
        $fileName = 'products_export.csv';
        $handle = fopen('php://output', 'w');

        // Add the header to the CSV
        fputcsv($handle, $header);

        // Add rows for each product
        foreach ($products as $product) {
            fputcsv($handle, [
                $product->id,
                $product->name,
                $product->description,
                $product->qty,
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


