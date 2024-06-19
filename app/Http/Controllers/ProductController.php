<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Models\Kategory;
use App\Models\subKategory;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Storage;
use PDF;


class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        if (auth()->user()->email !== 'admin@gmail.com') {
            return redirect()->route('home')->with('message', 'Anda bukan admin');
        }
        $pageTitle = 'Daftar Produk';
        $products = Product::all();

        return view('products.index', compact('pageTitle', 'products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        $pageTitle = 'Tambah Produk Baru';
        $categories = DB::table('kategorys')->get();
        $subcategories = DB::table('subkategorys')->get();

        return view('products.create', compact('pageTitle', 'categories', 'subcategories'));
    }

    /**
     * Menyimpan produk baru ke dalam database.
     */
    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3148',
        'name' => 'required',
        'price' => 'required|numeric',
        'kategory' => 'required',
        'subkategory' => 'required',
    ]);

    $product = new Product();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $file_name = $product->storeImage($file); // Simpan gambar ke direktori storage/app/public/images dan dapatkan nama filenya
        $product->image = $file_name;
    }

    $product->name = $request->name;
    $product->price = $request->price;
    $product->kategorys_id = $request->kategory;
    $product->subKategorys_id = $request->subkategory;

    $product->save();

    Alert::success('Changed Successfully', 'Products Data Added Successfully.');

    return redirect()->route('products.index')->with('success', 'Produk telah ditambahkan');
}


    /**
     * Menampilkan detail produk.
     */
    public function show($id)
    {
        // $product = Product::find($id);

        // return view('products.show', compact('product'));
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit($id)
{
    $product = Product::find($id);
    $product->subKategorys_id;
    $pageTitle = 'Edit Produk: ' . $product->name;

    $categories = DB::table('kategorys')->get();
    $subcategories = DB::table('subkategorys')->get();

    return view('products.edit', compact('pageTitle', 'product', 'categories', 'subcategories'));
}

    /**
     * Memperbarui produk yang ada di dalam database.
     */
    /**
 * Memperbarui produk yang ada di dalam database.
 */
public function update(Request $request, $id)
{
    $product = Product::find($id);

    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'kategory' => 'required',
        'subkategory' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:3148',
    ]);

    // Delete foto lama
    if ($request->hasFile('image') && $product->image) {
        Storage::delete($product->image); // laravel storage
    }

    // Update
    $product->name = $request->name;
    $product->price = $request->price;
    $product->kategorys_id = $request->kategory;
    $product->subKategorys_id = $request->subkategory;

    // Handle image upload
    if ($request->hasFile('image')) {
        $product->image = $product->storeImage($request->file('image'));
    }

    $product->save();

    Alert::success('Change Successfully', 'Products Update Successfully.');

    return redirect()->route('products.index')->with('success', 'Produk telah diperbarui');
}



    /**
     * Menghapus produk dari database.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
            // Hapus foto dari storage jika ada
        if (!empty($product->image)) {
            Storage::delete('public/images/' . $product->image);
        }

        // Hapus data produk dari database
        $product->delete();

        Alert::success('Deleted Successfully', 'Employee Data Deleted Successfully.');

        return redirect()->route('products.index')->with('success', 'Produk telah dihapus');
    }

    public function food()
{
    $pageTitle = 'Food';
    $products = Product::whereHas('kategory', function ($query) {
        $query->where('name', 'Food');
    })->get();

    return view('products.food', compact('pageTitle', 'products'));
}
    public function drink()
{
    $pageTitle = 'Drink';
    $products = Product::whereHas('kategory', function ($query) {
        $query->where('name', 'Drink');
    })->get();

    return view('products.drink', compact('pageTitle', 'products'));
}


public function exportExcel()
{
    return Excel::download(new ProductsExport, 'products.xlsx');
}

public function exportPdf()
{
    $products = Product::all();

    $pdf = FacadePdf::loadView('products.export_pdf', compact('products'));

    return $pdf->download('products.pdf');
}


public function getData(Request $request)
    {
    $products = Product::with('position');
    if ($request->ajax()) {
    return datatables()->of($products)
    ->addIndexColumn()
    ->addColumn('actions', function($employee) {

    return view('product.index', compact('product'));
    })
    ->toJson();
    }
}


}
