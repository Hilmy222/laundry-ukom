@extends('layouts.main')
@section('content')
    <div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">
                <div class="flex items-center justify-between">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px]">
                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">
                                List Outlet</h4>
                        </div>
                    </div>
                    <a href="{{ route('admin.outlets.create') }}" categories="button"
                        class="mb-6 text-white bg-[#3366FF] border-transparent btn hover:bg-gray-200"><i
                            class="mr-1 mdi mdi-plus"></i>Tambah Outlet</a>
                </div>
                <div class="col-span-12 xl:col-span-6">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body border-b border-gray-100 dark:border-zinc-600">
                            <h6 class="mb-1 text-gray-700 text-15 dark:text-gray-100">Data Outlet</h6>
                        </div>
                        <div class="card-body">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500 ">
                                    <thead
                                        class="text-sm text-gray-700 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-3.5">
                                                No
                                            </th>
                                            <th scope="col" class="px-6 py-3.5">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3.5">
                                                Alamat
                                            </th>
                                            <th scope="col" class="px-6 py-3.5">
                                                Telepon
                                            </th>
                                            <th scope="col" class="px-6 py-3.5">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($outlets as $outlet)
                                            <tr
                                                class="text-sm text-gray-700 transition-all duration-200 border-b dark:text-gray-100 border-gray-50 dark:border-zinc-600 hover:bg-gray-50/50">
                                                <th scope="row"
                                                    class="px-6 py-3.5 font-medium text-gray-900 whitespace-nowrap dark:text-zinc-100">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    {{ $outlet->nama_outlet }}
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    {{ $outlet->alamat_outlet }}
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100">
                                                    {{ $outlet->telp_outlet }}
                                                </td>
                                                <td class="px-6 py-3.5 dark:text-zinc-100 flex gap-2">
                                                    <a href="{{ route('admin.outlets.edit', $outlet->id) }}"
                                                        class="rounded-md px-3 py-1.5 bg-[#3366FF]"><i
                                                            class="bx bx-edit text-lg text-white"></i></a>
                                                    <form action="{{ route('admin.outlets.destroy', $outlet->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus outlet ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-toggle="modal" data-tw-toggle="modal"
                                                            data-tw-target="" class="px-3 py-2.5 rounded-md"
                                                            style="background-color: #FF4128;"><i
                                                                class="text-white fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
