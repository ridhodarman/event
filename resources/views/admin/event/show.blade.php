@extends('admin.inc.layout')

@section('content')
<div class="panel-heading">
  <h3 class="panel-title">
    <a href="javascript:void(0);" class="toggle-sidebar">
      <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
    </a> Event
  </h3>
</div>
<div class="panel-body">
    <div style="float: right; padding-bottom: 30px;">
        <a href="{{ route('event') }}">
            <button type="button" class="btn btn-default">
                <i class="glyphicon glyphicon-chevron-left"></i> Kembali ke daftar event
            </button>
        </a>
    </div>
    

    
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <p class="card-title text-md-center text-xl-left" style="color: black; font-weight: bolder;">
                                Informasi Event</p>
                            <table class="table table-hover">
                                <tr>
                                    <td>Nama Event</td>
                                    <td>:</td>
                                    <td>{{$event->nama_event}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Mulai Event</td>
                                    <td>:</td>
                                    <td>{{$event->tanggal_mulai}}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>{{$event->deskripsi}}</td>
                                </tr>
                                <tr>
                                    <td>Dibuat Pada</td>
                                    <td>:</td>
                                    <td>{{$event->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Terakhir diubah</td>
                                    <td>:</td>
                                    <td>{{$event->updated_at}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ URL::asset('foto/brosur/'.$event->foto_brosur) }}" target="_blank">
                                <img src="{{ URL::asset('foto/brosur/'.$event->foto_brosur) }}" width="350px">
                            </a>
                            <br/>
                            
                            <div class="row">
                        
                                <div  class="col-md-6">
                                    <a href="">
                                        <span class="label">Ganti Foto Brosur</span>
                                    </a>
                                </div>

                                <div class="col-md-6 mx-auto">
                                    <form action="{{ route('event') }}/{{$event->id}}/brosur" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="label label-danger" id="hapus-brosur">
                                            <i class="ti-trash"></i> Hapus Foto Brosur
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
            <form action="{{ route('event') }}/{{$event->id}}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="btn btn-danger" id="tombol-hapus">
                    <i class="ti-trash"></i> Hapus
                </button>
            </form>
        </div>

        <div  class="col-md-1">
            <a href="{{ route('event') }}/{{$event->id}}/edit">
                <button type="button" class="btn btn-primary">
                    <i class="ti-edit"></i> Edit
                </button>
            </a>
        </div>
    </div>
    
    <script>
        let peringatan=true;
        $('#tombol-hapus').on('click', function (e) {
            if(peringatan==true){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            peringatan = false;
                            $('#tombol-hapus').removeAttr("type").attr("type", "submit");
                            $('#tombol-hapus').trigger( "click" );
                        }
                    });
            }
        });

        let peringatan_b=true;
        $('#hapus-brosur').on('click', function (e) {
            if(peringatan_b==true){
                swal({
                    title: "Hapus foto brosur?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            peringatan_b = false;
                            $('#hapus-brosur').removeAttr("type").attr("type", "submit");
                            $('#hapus-brosur').trigger( "click" );
                        }
                    });
                }
            });
    </script>
    

</div><!-- panel body -->

<script>
$(document).ready(function () {
    $('#example').DataTable();
});

$("#event").css("font-weight", "bolder");
</script>
@endsection