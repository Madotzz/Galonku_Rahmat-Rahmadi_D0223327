{{-- resources/views/dashboard/admin.blade.php --}}
@extends('master')
@section('title', 'Dashboard Admin')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Selamat Datang, Admin!</h1>
<p>Kelola produk, pengguna, dan transaksi di sini.</p>
 <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topbar')

                <!-- Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
@endsection