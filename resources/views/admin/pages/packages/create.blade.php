@extends('layouts.main')
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 pb-6">
                    <div class="md:flex items-center justify-between px-[2px]">
                        <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Form
                            Tambah Paket</h4>
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('admin.packages.index') }}"
                                        class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                        Data Paket
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center rtl:mr-2">
                                        <i
                                            class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Tambah
                                            Paket</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-headers">
                            @if (session('error'))
                                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="col-span-12 lg:col-span-6">
                                    <form action="{{ route('admin.packages.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <div class="mb-3">
                                                <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Jenis Paket</label>
                                                <select id="jenisPaket" name="jenis" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                    <option>Pilih Jenis Paket</option>
                                                    <option value="kiloan">Kiloan</option>
                                                    <option value="selimut">Selimut</option>
                                                    <option value="bed_cover">Bed Cover</option>
                                                    <option value="kaos">Kaos</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="alamat"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Nama Paket</label>
                                            <input name="nama_paket"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                                type="text" placeholder="Masukkan Nama Paket" required>
                                        </div>
                                        <div class="mb-4">
                                            <div class="mb-3">
                                                <label class="block mb-2 font-medium text-gray-700 dark:text-zinc-100">Outlet</label>
                                                <select name="outlet_id" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                    <option>Pilih Outlet Anda</option>
                                                    @foreach ($outlets as $outlet)
                                                        <option value="{{ $outlet->id }}">{{ $outlet->nama_outlet }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="telp"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Harga
                                                </label>
                                            <input id="harga" name="harga"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                                type="text" placeholder="Pilih jenis paket untuk mengetahui harga" readonly>
                                        </div>
                                        <button type="submit" class="px-4 py-2 bg-blue-600 rounded text-white font-medium">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
