@extends('layouts.adminlte')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-1 my-auto">
                            Data Kandidat
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('biodata.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir Lahir</label>
                            <input type="date" class="form-control" required name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Posisi Yang Dilamar</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="posisi_lamaran">
                                <option value="Programmer" selected>Programmer</option>
                                <option value="HRD">HRD</option>
                            </select>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Modal Edit-->

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        alert('Anda belum memiliki biodata. Silahkan mengisi biodata untuk melanjutkan');
    });
    // function modalEdit(id) {
    //     $.ajax({
    //         type: 'GET',
    //         url: '{{url("masteruser/edit")}}/' + id,
    //         success: function(result) {
    //             var url = "{{url('masteruser/update')}}/" + id;
    //             $("#form-modal-edit").attr('action', url);
    //             $("#nama-edit").val(result.name);
    //             $("#email-edit").val(result.email);
    //             $("#role-edit").val(result.role);
    //             $("#modal-edit").modal('show');
    //         },
    //         error: function(data) {
    //             console.log(data);
    //         }
    //     });
    // }
</script>
@endsection