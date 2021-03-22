@extends('layouts.master')
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
@section('title')
    Hotel Packages

@endsection

@section('content')

    @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                 @endif

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-head row">
        <div class="col-md-12">
          <h2 class="card-title text-center mt-2">Hotel Packages</h2>
          @if(Auth::user()->usertype == "admin")
          <a href="/hotel-package/create-packages" class="btn btn-primary float-right mr-4"><i class="fa fa-plus" aria-hidden="true"></i> Add Packages</a>
@endif
        </div>
      
        
      </div>
      
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
           
            <div class="table-responsive">
              <table id="hotel-data" class="datatable dt-init display" style="width:100% !important;">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Days</th>
                    <th>Nights</th>
                    <th>Activated On</th>
                    <th>Expired On</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function () {
    // fill_datatable();

      // $.fn.dataTable.ext.errMode = 'none';

      var dataTable = $('#hotel-data').DataTable({
        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
          url: "/hotel_data",
          type: "GET",
          "dataType": "json",
            "token": "{{csrf_token()}}"
          },
          // success: function(response){
          //    alert('success');
          //   },
            error: function(jqXHR, ajaxOptions, thrownError) {
                               alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                             },
            "columns": [{
              "data": "name",
              "name": 'name',
              "orderable": false
            },
            {
              "data": "price",
              "name": 'price',
              "orderable": false
            },
            {
              "data": "days",
              "name": 'days',
              "orderable": false
            },
            {
              "data": "nights",
              "name": 'nights',
              "orderable": false
            },
            {
              "data": "activated_date",
              "name": 'activated_date',
              "orderable": false
            },
            {
              "data": "expired_date",
              "name": 'expired_date',
              "orderable": false
            },
            {
              "data": "description",
              "name": 'description',
              "orderable": false
            },
            {
              "data": "action",
              "name": 'action',
              "orderable": false
            },
            ],

            columDefs: [{
              "orderable": false,
              "targets": 0
            }],
            language: {
              // processing: "<img src='{{asset('images/spinner.gif')}}'/>"
            },
          });
      });

    </script>
<script>
  $(document).ready( function () {
    //replace document below with enclosing container but below will work too
    $(document).on('click', ".del", function () {
       var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
    });
});
</script>
@endsection