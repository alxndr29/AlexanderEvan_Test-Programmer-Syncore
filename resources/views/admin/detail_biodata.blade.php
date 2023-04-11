@extends('layouts.adminlte')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-2 flex-grow-1 bd-highlight m-auto">Data Kandidat</div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('biodata.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" required value="{{$user->biodata->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" name="tempat_lahir" value="{{$user->biodata->tempat_lahir}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir Lahir</label>
                            <input type="date" class="form-control" required name="tanggal_lahir" value="{{$user->biodata->tanggal_lahir}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Posisi Yang Dilamar</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="posisi_lamaran">
                                <option value="{{$user->biodata->posisi_lamaran}}" selected>{{$user->biodata->posisi_lamaran}}</option>
                                <option value="Programmer" selected>Programmer</option>
                                <option value="HRD">HRD</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-1 my-auto">
                            Data Riwayat Pendidikan

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Posisi</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Alasan Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->biodata->pekerjaan as $key => $value)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$value->nama_perusahaan}}</td>
                                <td>{{$value->posisi}}</td>
                                <td>{{$value->tanggal_masuk}}</td>
                                <td>{{$value->tanggal_keluar}}</td>
                                <td>{{$value->alasan_keluar}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-1 my-auto">
                            Data Riwayat Pelatihan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Tanggal Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->biodata->pelatihan as $key => $value)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->tanggal_mulai}}</td>
                                <td>{{$value->tanggal_akhir}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="p-1 my-auto">
                            Data Riwayat Pekerjaan

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Tanggal Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->biodata->pendidikan as $key => $value)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->jenjang}}</td>
                                <td>{{$value->tahun_masuk}}</td>
                                <td>{{$value->tahun_keluar}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('pendidikan.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                        <input type="date" class="form-control" required name="tanggal_masuk">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Keluar</label>
                        <input type="date" class="form-control" required name="tanggal_keluar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Posisi Yang Dilamar</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jenjang">
                            <option value="SD" selected>SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('pekerjaan.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perusahaan</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Posisi</label>
                        <input type="text" class="form-control" placeholder="Masukan posisi" name="posisi" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                        <input type="date" class="form-control" required name="tanggal_masuk">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Keluar</label>
                        <input type="date" class="form-control" required name="tanggal_keluar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alasan Keluar</label>
                        <input type="text" class="form-control" placeholder="Masukan alasan keluar" name="alasan_keluar" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('pelatihan.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                        <input type="date" class="form-control" required name="tanggal_mulai">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Keluar</label>
                        <input type="date" class="form-control" required name="tanggal_akhir">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
<!-- Modal Edit-->

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        // alert('Anda belum memiliki biodata. Silahkan mengisi biodata untuk melanjutkan');
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