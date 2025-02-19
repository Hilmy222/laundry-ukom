@extends('layouts.main')
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 pb-6">
                    <div class="md:flex items-center justify-between px-[2px]">
                        <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Form
                            Tambah Transaksi</h4>
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('admin.transactions.index') }}"
                                        class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                        Data Transaksi
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center rtl:mr-2">
                                        <i
                                            class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Tambah
                                            Transaksi</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-header">
                            @if ($errors->any())
                                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                    <strong>Terjadi kesalahan:</strong>
                                    <ul class="mt-2 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="col-span-12 lg:col-span-6">
                                    <form action="{{ route('admin.transactions.store') }}" method="POST">
                                        @csrf
                                        <div class="grid grid-cols-12 gap-x-6">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="mb-4">
                                                    <div class="mb-3">
                                                        <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Outlet</label>
                                                        <select name="id_outlet" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                            <option>Pilih Outlet Anda</option>
                                                            @foreach ($outlet as $data)
                                                                <option value="{{ $data->id }}">{{ $data->nama_outlet }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="alamat"
                                                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Kode Invoice</label>
                                                    <input name="kode_invoice"
                                                        class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                                        type="text" placeholder="Mauskkan Kode Invoice" id="alamat" required>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="mb-3">
                                                        <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Pelanggan</label>
                                                        <select name="id_member" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                            <option>Masukkan Nama Pelanggan</option>
                                                            @foreach ($customers as $data)
                                                            <option value="{{ $data->id }}">
                                                                {{ $data->nama }}
                                                            </option>@endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Tanggal Transaksi</label>
                                                    <input name="tgl" class="w-full border-gray-100 rounded placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="date" value="2019-08-19" id="example-date-input">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Batas Waktu</label>
                                                    <input name="batas_waktu" class="w-full border-gray-100 rounded placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="date" value="2019-08-19" id="example-date-input">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Tanggal Bayar</label>
                                                    <input name="tgl_bayar" class="w-full border-gray-100 rounded placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="date" value="2019-08-19" id="example-date-input">
                                                </div>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="mb-4">
                                                    <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Biaya Tambahan</label>
                                                    <input name="biaya_tambahan" class="w-full border-gray-100 rounded placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="number" value="2019-08-19" id="example-date-input" placeholder="Masukkan Biaya Tambahan">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Diskon</label>
                                                    <input name="diskon" class="w-full border-gray-100 rounded placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="number" value="2019-08-19" id="example-date-input" placeholder="Masukkan Diskon">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="example-text-input" class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Pajak</label>
                                                    <input name="pajak" class="w-full border-gray-100 rounded placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:text-zinc-100" type="number" value="2019-08-19" id="example-date-input">
                                                </div>
                                                <div class="mb-4">
                                                    <div class="mb-3">
                                                        <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Status</label>
                                                        <select name="status" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                            <option value="baru">Baru</option>
                                                            <option value="proses">Proses</option>
                                                            <option value="selesai">Selesai</option>
                                                            <option value="diambil">Diambil</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <div class="mb-3">
                                                        <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Status Pembayaran</label>
                                                        <select name="dibayar" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                            <option value="Dibayar">Dibayar</option>
                                                            <option value="Belum Dibayar">Belum Dibayar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="alamat"
                                                        class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Penanggung Jawa</label>
                                                        <select name="id_user" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                            <option >Pilih Penanggung Jawab</option>
                                                            @foreach ($user as $data)
                                                            <option value="{{ $data->id }}"> {{ $data->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="px-4 py-2 bg-blue-600 rounded text-white font-medium">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
