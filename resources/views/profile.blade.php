@extends('layouts.mainlayout')

@section('title', 'profile ')

@section('content')`
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Selamat Datang di Perpustakaan Digital, {{ auth()->user()->username }}!</div>

               <div class="card-body">
                   Selamat datang di halaman utama. Anda berhasil login sebagai User {{ auth()->user()->name }}.
               </div>
           </div>
       </div>
   </div>
</div>
<style>
   .card {
       margin-top: 20px;
       border-radius: 10px;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }

   .card-header {
       background-color: #dc3450;
       color: #fff;
       font-size: 18px;
       font-weight: bold;
   }

   .card-body {
       font-size: 16px;
       line-height: 1.6;
   }

   .container {
       padding: 20px;
   }

   .row {
       margin-bottom: 20px;
   }
</style>
@endsection