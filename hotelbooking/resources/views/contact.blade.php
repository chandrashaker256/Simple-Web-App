@extends('nav')

@section('content')

<h2 class="text-center mt-2 text-info">Contact Us</h2>
@if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                 @endif

<div class="container">
    <div class="card">
        {{-- <div class="card-head">
            <h3 class="card-title text-center">Contact</h3>
        </div> --}}
        <div class="card-body mt-3">
                <div class="container">
                    <div class="row ">
                        <div class=" mx-auto col-md-4">
                             <form action="/contactus" method="POST">
                                 @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <textarea  name="description" class="form-control" placeholder="description" rows="6" cols="5" style="border:1px solid #E3E3E3;" required></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                             </form>

                        </div>
                    </div>
                </div>
           
        </div>
    
    </div>  

</div>


@endsection

@extends('footer')