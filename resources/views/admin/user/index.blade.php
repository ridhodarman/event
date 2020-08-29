@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left"
        data-toggle="offcanvas" title="Maximize Panel"></span></a> Dashboard</h3>
</div>
<div class="panel-body">
  <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered table-hover display" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Waktu Register</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $u)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$u->name}}</td>
          <td>{{$u->email}}</td>
          <td>{{$u->created_at}}</td>
          <td>
            @if ($u->role == 99)
            <span class="label label-danger">Admin</span>
            @endif
            @if ($u->agen)
            <span class="label label-success">Agen</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div><!-- panel body -->

<script>
  $("#tab-user").click();
  $("#user_register").css("font-weight", "bolder");
</script>
@endsection