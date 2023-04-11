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
                        <!-- <div class="p-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                Tambah Data
                            </button>
                        </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th style="width:10%">No</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>Posisi Lamaran</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: top;">
                            @foreach ($user as $key => $value)
                            <tr>
                                
                                <td style="width:10%">{{$key+1}}</td>
                                <td>{{$value->biodata->nama}}</td>
                                <td>{{$value->biodata->tempat_lahir}},{{$value->biodata->tanggal_lahir}}</td>
                                <td>{{$value->biodata->posisi_lamaran}}</td>
                                <td>
                                    <a href="{{route('admin.search',$value->id)}}" class="btn btn-primary">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Masukan Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Masukan Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                            <option selected value="admin">Admin</option>
                            <option value="divisi-sdm">Divisi SDM</option>
                            <option value="pegawai">pegawai</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Modal Edit-->

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

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