@extends('layouts.master')

@section('title')
    Hotel Packages

@endsection
 @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                 @endif
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Create Packages</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="/save-package" method="POST">
                    @csrf
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required>                    
                            </div>
                        </div>  
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Price</label>
                                <input type="text" name="price" class="form-control" required>                    
                            </div>
                        </div> 
                    </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Days</label>
                                    <input type="text" name="days" class="form-control" required>                    
                                </div>
                            </div>             
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Nights</label>
                                    <input type="text" name="nights" class="form-control" required>                    
                                </div>
                            </div>             
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Location</label>
                                    <input type="text" name="location" class="form-control" required>                    
                                </div>
                            </div>             
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">ActivatedDate</label>
                                    <input type="date" name="activated_date" class="form-control" required>                    
                
                                </div>
                            </div>  
                         </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">ExpiryDate</label>
                                    <input type="date" name="expired_date" class="form-control" required>                    
                                </div>
                            </div>
                       </div>
                       <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">description</label>
                                <textarea name="description" class="form-control" rows="6" cols="5" required></textarea>                 
                            </div>
                        </div> 
                   </div>     
                   <button type="submit" class="btn btn-info">Save Packages</button>  
                   <a href="/hotel-package" class="btn btn-danger">Cancel</a>       
                 
                 </form>
            </div>
        </div>
    </div>
</div>



 @endsection

@section('scripts')
    
@endsection