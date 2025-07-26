<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PartnerController;
use App\Models\Partner; // Ensure you have a Partner model
use App\Models\Roles; // Ensure you have a Partner model
use App\Models\User; // Ensure you have a Partner model
use App\Models\Contact; // Ensure you have a Partner model
use App\Models\Requests; // Ensure you have a Partner model
use Carbon\Carbon;


use App\Http\Controllers\ContactController;



use App\Models\Product;
use Illuminate\Http\Request;  // Make sure to import the Request class




Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products/export-excel', [ProductController::class, 'exportToExcel'])->name('products.exportExcel');
    Route::get('/parthners/export-excel', [PartnerController::class, 'exportToExcel'])->name('parthner.exportToExcel');
    Route::get('/requests-avis/export-excel', [RequestController::class, 'exportToExcel'])->name('requests.exportToExcel');

    Route::get('/role-export/export-excel', [RolesController::class, 'exportToExcel'])->name('roles.exportToExcel');
    Route::get('/users-export/export-excel', [UsersController::class, 'exportToExcel'])->name('users.exportToExcel');

    Route::get('/contact-export/export-excel', [ContactController::class, 'exportToExcel'])->name('contact.exportToExcel');




    // Add other required routes here
    Route::resource('productDashboard', ProductController::class);

    Route::resource('requests', RequestController::class);

    Route::resource('roles', RolesController::class);

    Route::resource('users', UsersController::class);

    Route::resource('parthner', PartnerController::class);
    Route::resource('contact', ContactController::class);


});
Route::get('viewproduct/{product_id}', [ProductController::class, 'show'])->name('productDashboard.show');


Route::get('/', function (Request $request) {
    $productsAll = Product::all(); // Retrieves 3 products per page
    $products = Product::paginate(3);
    $partners = Partner::all();
    return view('landing', compact("products", "partners", "productsAll"));
});


Route::get('/dashboard', function (Request $request) {
    $totalUsers = User::count();
    $totalProducts = Product::count();
    $totalContacts = Contact::count();
    $totalRequests = Requests::count();

    // Month names mapping
    $monthNames = [
        '01' => 'Janvier',
        '02' => 'Février',
        '03' => 'Mars',
        '04' => 'Avril',
        '05' => 'Mai',
        '06' => 'Juin',
        '07' => 'Juillet',
        '08' => 'Août',
        '09' => 'Septembre',
        '10' => 'Octobre',
        '11' => 'Novembre',
        '12' => 'Décembre',
    ];


    // Fetch contacts data grouped by month
    $contactsData = Contact::selectRaw('strftime("%m", created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->mapWithKeys(function ($item) use ($monthNames) {
            $monthName = $monthNames[$item->month];
            return [$monthName => $item->total];
        });

    // Define current year and previous year
    // Define current year and previous year
// Define current year and previous year
    $currentYear = Carbon::now()->year;
    $previousYear = $currentYear - 1;

    // Fetch requests data grouped by month for current year
    $currentRequests = Requests::selectRaw('strftime("%m", created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->whereRaw("strftime('%Y', created_at) = '$currentYear'")  // Directly insert the value into the query
        ->get()
        ->mapWithKeys(function ($item) use ($monthNames) {
            $monthName = $monthNames[$item->month];
            return [$monthName => $item->total];
        });
    ;

    // Log the current requests data for debugging

    // Fetch requests data grouped by month for previous year
    $previousRequests = Requests::selectRaw('strftime("%m", created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')

        ->whereRaw("strftime('%Y', created_at) = '$previousYear'")  // Directly insert the value into the query
        ->get()
        ->mapWithKeys(function ($item) use ($monthNames) {
            $monthName = $monthNames[$item->month];
            return [$monthName => $item->total];
        });

    $categories = [
        "Janvier",
        "Février",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Août",
        "Septembre",
        "Octobre",
        "Novembre",
        "Décembre"
    ];


    $topProducts = DB::table('requests')
        ->select('produit_id', DB::raw('count(*) as request_count'))
        ->groupBy('produit_id')
        ->orderByDesc('request_count')
        ->limit(10);  // Keep it as a query builder

    // Now use it in the joinSub
    $topProductsWithDetails = DB::table('products')
        ->joinSub($topProducts, 'top_requests', function ($join) {
            $join->on('products.id', '=', 'top_requests.produit_id');
        })
        ->select('products.id', 'products.name', 'products.description', 'products.image', 'top_requests.request_count')
        ->get();

    return view('dashboard.dashboard', compact(
        'totalUsers',
        'totalProducts',
        'totalContacts',
        'totalRequests',
        'contactsData',
        'currentRequests',
        'previousRequests',
        'categories',
        'topProductsWithDetails'
    ));
});

// Helper function to fill missing months with zeros
function fillMonthlyData(array $data)
{
    $monthlyData = array_fill(1, 12, 0); // Create an array with keys 1-12 (months)
    foreach ($data as $month => $total) {
        $monthlyData[(int) $month] = $total; // Convert month to integer
    }

    return array_values($monthlyData); // Return only values as a sequential array
}

Route::get('/about-us', function () {
    $products = Product::paginate(3);
    $partners = Partner::all();
    return view('aboutUs', compact('products', 'partners'));
});
Route::get('/contact-us', function () {
    $products = Product::paginate(3);
    return view('contactUs', compact(('products')));
});
Route::get('/products', function (Request $request) {
    $query = Product::query();

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $products = $query->paginate(10);
    return view('product', compact('products'));
});
Route::get('/demande-avis', function (Request $request) {
    $products = Product::all();
    return view('requestAvis', compact("products"));
});


Route::get('/product-detail/{id}', function ($id, Request $request) {
    // Fetch product details by ID
    $product = Product::find($id);
    $products = Product::paginate(3);
    // If product not found, you can return a 404 or redirect to another page
    if (!$product) {
        abort(404);
    }



    // Return the product details to the view
    return view('productDetail', compact('product', 'products'));
});









Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::post('/add-request', [RequestController::class, 'storeRequest'])->name('request.storeRequest');



require __DIR__ . '/auth.php';
