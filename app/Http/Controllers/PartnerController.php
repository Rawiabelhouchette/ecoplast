<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner; // Ensure you have a Partner model
use App\Models\Product; // Ensure you have a Partner model


use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $query = Partner::query();

        if ($request->filled('recherche')) {
            $search = $request->recherche;
            $query->where('name', 'like', '%' . $search . '%');
        }
        $partners = $query->paginate(10);
        $products = Product::paginate(3);
        return view('dashboard.partners', compact('partners','products'));
    }

    public function create()
    {
        return view('dashboard.createPartner');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpeg, png ou jpg.',
            'image.max' => 'L\'image ne doit pas dépasser 2048 kilo-octets.',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('partners/images', 'public'); // Save to storage/app/public/partners/images
        }

        Partner::create($data);

        return redirect()->route('parthner.index')->with('success', 'Partner created successfully.');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);

        return view('dashboard.createPartner', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpeg, png ou jpg.',
            'image.max' => 'L\'image ne doit pas dépasser 2048 kilo-octets.',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if (!is_null($partner->image)) {
                Storage::delete('public/' . $partner->image);
            }

            $data['image'] = $request->file('image')->store('partners/images', 'public');
        }

        $partner->update($data);

        return redirect()->route('parthner.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        if (!is_null($partner->image)) {
            Storage::delete('public/' . $partner->image);
        }

        $partner->delete();

        return redirect()->route('parthner.index')->with('success', 'Partner deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $partner = Partner::find($id);

            if ($partner) {
                if (!is_null($partner->image)) {
                    Storage::delete('public/' . $partner->image);
                }
                $partner->delete();
            }
        }

        return response()->json(['message' => 'Partners deleted successfully.']);
    }

    public function exportToExcel()
    {
        $products = Partner::all();

        // Define the header for the CSV
        $header = ['ID', 'Nom'];

        // Open a file pointer for output
        $fileName = 'parthnaire_export.csv';
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
