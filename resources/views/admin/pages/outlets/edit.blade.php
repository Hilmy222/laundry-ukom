@extends('layouts.main')
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 pb-6">
                    <div class="md:flex items-center justify-between px-[2px]">
                        <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Form
                            Edit Outlet</h4>
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('admin.outlets.index') }}"
                                        class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                        Data Pelanggan
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center rtl:mr-2">
                                        <i
                                            class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Edit
                                            Outlet</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <div class="">
                                <div class="col-span-12 lg:col-span-6">
                                    <form action="{{ route('admin.outlets.update', $outlet->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label for="nama"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Nama</label>
                                            <input name="nama_outlet"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                                type="text" value="{{ old('name', $outlet->nama_outlet) }}" placeholder="Masukkan Nama" id="nama" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="alamat"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Alamat</label>
                                            <input name="alamat_outlet"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                                type="text" value="{{ old('alamat_outlet', $outlet->alamat_outlet) }}" placeholder="Masukkan Alamat" id="alamat" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="telp"
                                                class="block mb-2 font-medium text-gray-700 dark:text-gray-100">Nomor
                                                Telepon</label>
                                            <input name="telp_outlet"
                                                class="w-full placeholder:text-13 text-13 py-1.5 rounded border-gray-100 focus:border focus:border-violet-50 focus:ring focus:ring-violet-500/20 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 placeholder:text-gray-800 dark:text-zinc-100"
                                                type="text" value="{{ old('telp_outlet', $outlet->telp_outlet) }}" placeholder="Masukkan Nomor Telepon" id="telp" required>
                                        </div>
                                        <button type="submit" class="px-4 py-2 bg-blue-600 rounded text-white font-medium">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
