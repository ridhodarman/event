@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Agen User</h3>
</div>
<div class="panel-body">
  <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered table-hover display" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>No. Whatsapp</th>
          <th>-</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($agen as $a)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$a->name}}</td>
          <td>{{$a->email}}</td>
          <td>{{$a->no_whatsapp}}</td>
          <td>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal{{$a->id}}">
  <i class="glyphicon glyphicon-remove-circle"></i> Remove
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus?</h5>
      </div>
      <div class="modal-body">
        Apakah anda yakin hapus {{$a->name}} (email: {{$a->email}}) sebagai agen ?
      </div>
      <div class="modal-footer">
        <form action="{{ route('agen') }}/{{$a->id}}" method="POST" class="d-inline" style="float: left">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-danger" id="tombol-hapus">
              yes, remove it
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <hr/>
  <form class="forms-sample" action="{{ route('agen') }}" method="post">
    @csrf
    <h5>Tambahkan Agen:</h5>
    <label>Pilih akun:</label>
    <select class="js-example-basic-single @error('user_id') is-invalid @enderror" 
        id="user_id" name="user_id">
        <option></option>
        @foreach ($user as $u)
        <option value="{{$u->id}}">{{$u->name}} ({{$u->email}})</option>
        @endforeach
    </select>
    <div style="float: right;"></div>
        <button type="submit" class="btn btn-primary mr-2">Tambah</button>
    </div>
    @error('user_id')
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ $message }} atau coba cek tong sarok di database
    </div>
    @enderror
</form>
@if (session('status'))
  <script>
      swal("success!", "{!! session('status') !!}", "success");
  </script>
@endif


</div><!-- panel body -->

<script>
  $(document).ready(function () {
      $('#example').DataTable();
  });

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });

  $( "#tab-user" ).click();
  $("#agen").css("font-weight", "bolder");
</script>
@endsection