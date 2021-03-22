@extends('layouts.master')

@section('title')
    Hotel Packages

@endsection

@section('content')

{{-- <div class="card bg-transparent text-center">
  <div class="card-header ">
    <h2 class="mt-3">Featured</h2>
  </div> --}}
  <div class="row">
    <h2 class="mt-5 mx-auto text-info">Welcome To My Hotels</h2>
  </div>
  
  <div class="card-body">
    <div class="row">
      @if(Auth::user()->usertype == "admin")
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Users</h5>
      <img src="{{url('/assets/img/user.png')}}" alt="user" class="w-100" ">
        <a href="/user-roles" class="btn btn-primary">Go User Profile</a>
      </div>
    </div>
  </div>
  @endif
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Hotel Packages</h5>
      <img src="{{url('/assets/img/hotel.jpg')}}" alt="hotel" class="w-100 " height="360px">
        <a href="/hotel-package" class="btn btn-primary">Go Hotel Packages</a>
      </div>
    </div>
  </div>
</div>
   
  </div>
  



  
    
@endsection

