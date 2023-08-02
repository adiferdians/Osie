@extends('layout.master')
@section('content')
@section('certificate', 'active')
@section('title', 'Certificate')

<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah sertifikat yang terbit</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount}} Piece</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah sertifikat yang aktif</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$active}} Piece</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-double fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah sertifikat yang Withdraw</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$inactive}} Piece</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4" id="sapi">
        <div class="card-header py-3" style="display: flex; justify-content: space-between;">
            <div>
            </div>
            <div>
                <button class="btn btn-success" id="add" data-toggle="modal" data-target="#modal"><i class="fa fa-plus-square" title="Tambah Data"></i> Data Sertifikat</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="actionWidth">Action</th>
                            <th style="text-align: center; vertical-align: middle;">Nama</th>
                            <th style="text-align: center; vertical-align: middle;">Tipe Trining</th>
                            <th style="text-align: center; vertical-align: middle;">Title</th>
                            <th style="text-align: center; vertical-align: middle;">Nomor Sertifikat</th>
                            <th style="text-align: center; vertical-align: middle;">Training Mulai</th>
                            <th style="text-align: center; vertical-align: middle;">Training Selesai</th>
                            <th style="text-align: center; vertical-align: middle;">Tanggal Sertifikat</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">Action</th>
                            <th style="text-align: center; vertical-align: middle;">Nama</th>
                            <th style="text-align: center; vertical-align: middle;">Tipe Trining</th>
                            <th style="text-align: center; vertical-align: middle;">Title</th>
                            <th style="text-align: center; vertical-align: middle;">Nomor Sertifikat</th>
                            <th style="text-align: center; vertical-align: middle;">Training Mulai</th>
                            <th style="text-align: center; vertical-align: middle;">Training Selesai</th>
                            <th style="text-align: center; vertical-align: middle;">Tanggal Sertifikat</th>
                        </tr>
                    </tfoot>
                    @foreach($certificate as $cert)
                    <tbody>
                        <tr {{ ($cert->status == "active") ? 'class= "table-success"' : 'class="table-danger"' }}>
                            <td style="vertical-align: middle;">
                                <div style="display: flex;">
                                    <button class="btn btn-primary actBtn" title="Edit" id="update" onclick="updCertificate({{$cert->id}})">
                                        <i class="fas fa-pencil-ruler"></i>
                                    </button>
                                    <button class="btn btn-info  actBtn" title="Detil" id="detil" onclick="showQrCode('{{$cert->number}}', '{{$cert->name}}', '{{$cert->id}}')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger actBtn" title="Hapus" onclick="delCertificate({{$cert->id}})">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                            </td>
                            <td style="vertical-align: middle;">{{$cert->name}}</td>
                            <td style="vertical-align: middle;">{{$cert->type}}</td>
                            <td style="vertical-align: middle;">{{$cert->title}}</td>
                            <td style="vertical-align: middle;">{{$cert->number}}</td>
                            <td style="vertical-align: middle;">{{$cert->start}}</td>
                            <td style="vertical-align: middle;">{{$cert->end}}</td>
                            <td style="vertical-align: middle;">{{$cert->date}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-md-12">
                        {{ $certificate->appends(Request::all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#add').click(function() {
            axios.get('/certificate/create')
                .then(function(response) {
                    $('.modal-title').html("Tambah Certificate");
                    $('.modal-body').html(response.data);
                    $('#myModal').modal('show');
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    });

    function changeStatus(status, id) {
        Swal.fire({
            title: 'Yakin ingin mengubah status Sertifikat?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ya, Ubah!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (result.isConfirmed) {
                    axios.post('/certificate/changeStatus/' + id, {
                            status,
                        }).then(() => {
                            Swal.fire({
                                title: 'Sukses',
                                position: 'top-end',
                                icon: 'success',
                                text: 'Status berhasil diubah!.',
                                showConfirmButton: false,
                                width: '400px',
                                timer: 2000
                            });
                            location.reload();
                        })
                        .catch((err) => {
                            Swal.fire({
                                title: 'Error',
                                position: 'top-end',
                                icon: 'error',
                                text: err,
                                showConfirmButton: false,
                                width: '400px',
                                timer: 2000
                            });
                        });
                }
            }
        })
    };

    function showQrCode(number, name) {
        let newNumber = number.replace(new RegExp("/", "g"), "");

        axios.get(`/certificate/qrcode/${newNumber}`)
            .then(function({
                data
            }) {
                console.log(data);
                $('.modal-title').html(`QRCode untuk ${name}`);
                $('.modal-body').html(`<div class='text-center'>
                    <div>
                        <img width='300' height='auto' src='data:image/svg+xml;base64,${data.DATA}' />
                    </div><br>
                        <div>
                            <a href='data:image/svg+xml;base64,${data.DATA}' class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" download=${name}.svg>
                            <i class="fas fa-download"></i>  Download QR Code</a>
                        </div>
                    </div>`);
                $('#modalSmall').modal('show');

            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function delCertificate(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak akan bisa kembali.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post('/certificate/delete/' + id)
                    .then(() => {
                        Swal.fire({
                            title: 'Sukses',
                            position: 'top-end',
                            icon: 'success',
                            text: 'Data berhasil dihapus.',
                            showConfirmButton: false,
                            width: '400px',
                            timer: 1500
                        });
                        location.reload();
                    })
                    .catch((err) => {
                        Swal.fire({
                            title: 'Error',
                            position: 'top-end',
                            icon: 'error',
                            text: err,
                            showConfirmButton: false,
                            width: '400px',
                            timer: 1500
                        });
                    });
            }
        });
    }


    function updCertificate(id) {
        axios.get('/certificate/update/' + id)
            .then(function(response) {
                $('.modal-title').html("Update Certificate");
                $('.modal-body').html(response.data);
                $('#myModal').modal('show');
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function detCertificate(id) {
        window.location.href = "/certificate/detil/" + id;
    }
</script>

@endsection