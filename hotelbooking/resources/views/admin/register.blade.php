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
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="user-data" class="datatable dt-init display" style="width:100% !important;">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>User Type</th>
                      <th>Email</th>
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
  
        $.fn.dataTable.ext.errMode = 'none';
  
        var dataTable = $('#user-data').DataTable({
          "processing": true,
          "serverSide": true,
          "searchable": true,
          "ajax": {
            url: "/api/user-data",
            type: "GET",
            "dataType": "json",
              "token": "{{csrf_token()}}"
            },
            // success: function(response){
            //    alert('success');
            //   },
              // error: function(jqXHR, ajaxOptions, thrownError) {
              //                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
              //                  },
              "columns": [{
                "data": "name",
                "name": 'name',
                "orderable": false
              },
              {
                "data": "usertype",
                "name": 'usertype',
                "orderable": false
              },
              {
                "data": "email",
                "name": 'email',
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
