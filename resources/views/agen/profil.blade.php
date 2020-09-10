@extends('agen.inc.layout')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Profil
        <small> <strong></strong></small>
    </h1>
    <!-- <ol class="breadcrumb" style="padding-right: 100px;">
        
    </ol>
    <br/> -->
</section>

@if (session('status'))
<script>
    swal("success!", "{!! session('status') !!}", "success");
</script>
@endif

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title"> </h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <diV class="row">
                <div class="col-sm-6">
                    <div class="table-responsive">
                        <div class="box">
                            <table id="example" class="table table-hover display">
                                <tbody>
        
                                    <tr>
                                        <td>Nama:</td>
                                        <td>{{$agen->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. WhatsApp:</td>
                                        <td>{{$agen->no_whatsapp}}</td>
                                    </tr>
        
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                data-target="#exampleModal-e">
                <i class="fa fa-edit"></i> Edit
            </button>
            <div class="modal fade" id="exampleModal-e" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST">
                        @method('patch')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Profil</h4>
                            </div>
                            <div class="modal-body">
                                <label>Nama:</label>
                                <input type="text" class="form-control" name="name" value="{{$agen->name}}"/>
                                <br/>
                                <label>No. WhatsApp:</label>
                                <input type="text" class="form-control" name="no_whatsapp" value="{{$agen->no_whatsapp}}"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </form>
                </div>
            </div>
            <br /><br />
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection