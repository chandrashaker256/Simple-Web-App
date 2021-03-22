
@extends('nav')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url('/assets/img/slide1.jpg') }}" class="d-block w-100" style="height: 500px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ url('/assets/img/slide2.jpg') }}" class="d-block w-100" style="height: 500px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ url('/assets/img/slide3.jpg') }}" class="d-block w-100" style="height: 500px" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</br>
    <div class="text-center">
    <h2 class="mx-auto">Hotel Packages</h2>
</div>
    <div class="row" style="
    padding: 0px 20px 20px;
">
@foreach($hotel as $value)
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><span class="font-weight-bold">{{ $value->name }}</span></h5>
        <p class="card-text"><span class="font-weight-bold">Description:</span> {{ $value->description }}</p>
      <p class="card-text"><span class="font-weight-bold">Duration: </span>{{ $value->days }} Days , {{ $value->nights }} Nights</p>
      <p class="card-text"><span class="font-weight-bold">Validity:</span> From {{carbon\Carbon::parse($value->activated_date)->format('d-m-Y') }} - To {{ carbon\Carbon::parse($value->expired_date)->format('d-m-Y') }}</p>
      <p class="card-text"><span class="font-weight-bold">Price:</span> RM {{ $value->price }}</p>
      <p class="card-text"><span class="font-weight-bold">Location:</span> {{ $value->location }}</p>
        <a href="/contact" class="btn btn-primary">Contact Us</a>
      </div>
    </div>
  </div>
  @endforeach
  <div class="mx-auto">
				<nav class="pagination-outer" aria-label="Page navigation">
					<ul class="pagination">
						{{$hotel->links()}}
					</ul>
				</nav>
      </div>
            
  @endsection


  @extends('footer')