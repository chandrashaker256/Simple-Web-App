@extends('layouts.master')

@section('title')
    Hotel Packages

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Packages</h4>
            <form action="{{url('hotel-package-update/'.$hotel->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Name</label>
                            <input type="text" name="name" value="{{$hotel->name}}" class="form-control">                    
                            </div>
                        </div>  
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">Price</label>
                                <input type="text" name="price" value="{{$hotel->price}}" class="form-control">                    
                            </div>
                        </div> 
                    </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Days</label>
                                    <input type="text" name="days" value="{{$hotel->days}}" class="form-control">                    
                                </div>
                            </div>             
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Nights</label>
                                    <input type="text" name="nights" value="{{$hotel->nights}}" class="form-control">                    
                                </div>
                            </div>             
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Location</label>
                                    <input type="text" name="location" value="{{$hotel->location}}" class="form-control">                    
                                </div>
                            </div>             
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">ActivatedDate</label>
                                    <input type="text" name="activated_date" value="{{$hotel->activated_date}}" class="form-control">                    
                
                                </div>
                            </div>  
                         </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">ExpiryDate</label>
                                    <input type="text" name="expired_date" value="{{$hotel->expired_date}}" class="form-control">                    
                                </div>
                            </div>
                       </div>
                       <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="">description</label>
                            <textarea name="description"  class="form-control"> {{$hotel->description}}  </textarea>                 
                            </div>
                        </div> 
                   </div>     
                   <button type="submit" class="btn btn-info">Update Packages</button>  
                   <a href="/hotel-package" class="btn btn-danger">Back</a>       
                 
                 </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
@endsection