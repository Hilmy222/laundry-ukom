<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Outlet;
use App\Models\transaction;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index ()
    {
        $transaction = transaction::with(['outlet','customers','user'])->get();
        return view ('admin.pages.transactions.index', compact('transaction'));
    }
    public function create ()
    {
        $outlet = Outlet::all();
        $user = User::all();
        $customers = Customer::all();
        $transaction = transaction::with(['outlet','customers'])->get();
        return view ('admin.pages.transactions.create', compact('transaction','outlet','customers','user'));
    }
    public function store(Request $request) {
        $request->validate([
            'id_outlet'=>'required',
            'id_member'=>'required',
            'kode_invoice'=>'required',
            'tgl'=>'required',
            'batas_waktu'=>'required',
            'tgl_bayar'=>'required',
            'biaya_tambahan'=>'required',
            'diskon'=>'required',
            'pajak'=>'required',
            'status'=>'required',
            'dibayar'=>'required',
            'id_user'=>'required',
        ]);
        
        $user = Auth::user();
        try {
            transaction::create([
                'id_outlet'=> $request->id_outlet,
                'kode_invoice'=> $request->kode_invoice,
                'id_member'=> $request->id_member,
                'tgl'=> $request->tgl,
                'batas_waktu'=> $request->batas_waktu,
                'tgl_bayar'=> $request->tgl_bayar,
                'biaya_tambahan'=> $request->biaya_tambahan,
                'diskon'=> $request->diskon,
                'pajak'=> $request->pajak,
                'status'=> $request->status,
                'dibayar'=> $request->dibayar,
                'id_user'=> $request->id_user
            ]);

            return redirect()->back()->with('success', 'anda berhasil membuat transaksi');

        } catch (Exception $e) {
            return redirect()->back()->with('error'.'saat menyimpan transaksi' . $e->getMessage());
        }
    }
}
