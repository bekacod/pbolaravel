@extends('layout.dashboard')

@section('style')
<link rel="stylesheet" href="{{asset ('dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
   $(function() {
      var table = $('#tabel').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ asset('') }}list",
         columns: [{
               data: 'id',
               name: 'id'
            },
            {
               data: 'name',
               name: 'name'
            },
            {
               data: 'email',
               name: 'email'
            },
            {
               data: null,
               className: "center",
               defaultContent: '<a href="#" class="edit btn btn-primary btn-sm"><i class="far fa-edit"></i></a>'
            }
         ]
      });

      $('#tabel tbody').on('click', 'a.edit', function() {
         var data = table.row($(this).parents('tr')).data();
         var txt = '{{asset('
         ')}}edit/' + data.id;
         location = txt;
      });

   });
</script>
@endsection


@section('content')
<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <a href="{{asset('')}}add" type="button" class="btn btn-block btn-primary col-2">Tambah</a>
            <table id="tabel" class="table table-bordered table-hover">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Username</th>
                     <th>Email</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tfoot>
                  <tr>
                     <th>No</th>
                     <th>Username</th>
                     <th>Email</th>
                     <th>Action</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection