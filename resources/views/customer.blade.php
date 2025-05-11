{{-- resources/views/dashboard/customer.blade.php --}}
@extends('master')
@section('title', 'Dashboard Customer')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Halo {{ Auth::user()->name }}!</h1>
<p>Silakan pesan galon air dengan mudah melalui menu yang tersedia.</p>
@endsection