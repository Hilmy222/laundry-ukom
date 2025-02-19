<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('Outlet')->get();
        return view ('admin.pages.packages.index', compact('packages'));
    }
    public function create()
    {
        $outlets = Outlet::all();
        return view ('admin.pages.packages.create', compact('outlets'));
    }
    public function store(Request $request)
    {
    try {
    $request->validate([
        'jenis' => 'required|string|max:255',
        'nama_paket' => 'required|string|max:255',
        'harga' => 'required',
        'outlet_id' => 'required'
    ]);

    Package::create([
        'jenis' => $request->jenis,
        'nama_paket' => $request->nama_paket,
        'harga' => $request->harga,
        'outlet_id' => $request->outlet_id
    ]);

    return redirect()->route('admin.packages.index')->with('success', 'Packages berhasil ditambahkan!');
    }  catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
    }
    }

    public function edit ($id)
    {
        $packages = Package::findOrFail($id)->first();
        return view('admin.pages.packages.edit', compact('packages'));
    }
    public function destroy($id)
    {
        $packages = Package::findOrFail($id);
        $packages->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Packages berhasil dihapus.');
    }
}
  