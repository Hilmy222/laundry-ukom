<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index ()
    {
        $customers = Customer::all();
        return view ('admin.pages.customers.index', compact('customers'));
    }
    public function create ()
    {
        return view ('admin.pages.customers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tlp' => 'required|string',
        ]);
           
        Customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
        ]);
        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil ditambahkan!');

    }
    public function edit ($id)
    {
        $customers = Customer::findOrFail($id);
        return view ('admin.pages.customers.edit', compact('customers'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tlp' => 'required|string',
        ]);
           
        $customers = Customer::findOrFail($id);
        $customers->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
        ]);
        return redirect()->route('admin.customers.index')->with('success', 'Customer berhasil ditambahkan!');

    }
    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
