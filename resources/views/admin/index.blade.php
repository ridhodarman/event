@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
  <h3 class="panel-title">
    <a href="javascript:void(0);" class="toggle-sidebar">
      <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
    </a> Dashboard
  </h3>
</div>
<div class="panel-body">
  welcome
</div><!-- panel body -->

<script>
  $("#dashboard").css("font-weight", "bolder");
</script>
@endsection