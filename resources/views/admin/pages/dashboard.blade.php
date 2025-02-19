@extends('layouts.main')
@section('content')
<div class="main-content group-data-[sidebar-size=sm]:ml-[70px]">
    <div class="page-content dark:bg-zinc-700">
        @auth
            @php
                $user = Auth::user();
            @endphp
        
        <div class="container-fluid px-[0.625rem]">

            <h1 class="text-black">Welcome to Dashboard {{ $user->nama }} : {{ $user->role }}</h1>

        </div>
        </div>
        @endauth
    </div>
@endsection
