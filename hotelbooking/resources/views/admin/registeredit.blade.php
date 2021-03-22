@extends('layouts.master')

@section('title')
    Hotel Packages

@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Edit Register Users</h1>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                 @endif

            </div>
            <div class="card-body">
                <form action="/user-registerupdate/{{$users->id}}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="name" name="name" value="{{$users->name}}" class="form-control"  placeholder="Enter name">
                                
                              </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                            <input type="email" name="email" value="{{$users->email}}" class="form-control"  placeholder="Enter email">
                                
                              </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Give Role</label>
                                <select name="usertype" class="form-control">Select User
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                
                              </div>

                        </div>
                    </div>

                    <button class="btn btn-success">Update</button>
                    <a href="/user-roles" class="btn btn-danger">Cancel</a>
                    
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection

@section('scripts')
    
@endsection