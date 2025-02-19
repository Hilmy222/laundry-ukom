<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index ()
    {
        $outlets = Outlet::all();
        return view('admin.pages.outlets.index', compact('outlets'));
    }
    public function create()
    { 
        return view('admin.pages.outlets.create');  
    }
    public function store(Request $request)
    {
    $request->validate([
        'nama_outlet' => 'required|string|max:255',
        'alamat_outlet' => 'required|string|max:255',
        'telp_outlet' => 'required|string|max:15',
    ]);

    Outlet::create([
        'nama_outlet' => $request->nama_outlet,
        'alamat_outlet' => $request->alamat_outlet,
        'telp_outlet' => $request->telp_outlet,
    ]);

    return redirect()->route('admin.outlets.index')->with('success', 'Outlet berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $outlet = Outlet::findOrFail($id);
        return view('admin.pages.outlets.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_outlet' => 'required|string|max:255',
            'alamat_outlet' => 'required|string|max:255',
            'telp_outlet' => 'required|string|max:15',
        ]);

        $outlet = Outlet::findOrFail($id);
        $outlet->update([
            'nama_outlet' => $request->nama_outlet,
            'alamat_outlet' => $request->alamat_outlet,
            'telp_outlet' => $request->telp_outlet,
        ]);

        return redirect()->route('admin.outlets.index')->with('success', 'Outlet berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);
        $outlet->delete();
        return redirect()->route('admin.outlets.index')->with('success', 'Outlet berhasil dihapus.');
    }

}