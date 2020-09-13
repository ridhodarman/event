@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
    <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left"
                data-toggle="offcanvas" title="Maximize Panel"></span></a> FAQ</h3>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <button>Tambah FAQ</button>
        <br/><br/>
        <table id="example" class="table table-striped table-bordered table-hover display" style="width:100%">
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Dibuat Pada</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faq as $f)
                <tr>
                    <td>{{$f->urutan}}</td>
                    <td>{{$f->tanya}}</td>
                    <td>{{$f->jawab}}</td>
                    <td>{{$f->created_at}}</td>
                    <td>
                        <button>Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div><!-- panel body -->

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $("#faq").css("font-weight", "bolder");
</script>
@endsection