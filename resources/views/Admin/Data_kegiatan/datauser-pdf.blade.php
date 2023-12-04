<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Data Pengguna EGC System </title>
    
    <!-- Custom styles for this template-->
    <link href="sbadmin/css/style.css" rel="stylesheet">
    <link href="sbadmin/css/tabeladmin.css" rel="stylesheet">
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!--link icon-->
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">

</head>
<div class="card shadow mb-4">
    {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengguna Ecogreen System</h6>
    </div> --}}
    {{-- <div class="card-body"> --}}
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengguna Ecogreen System</h6>
                    </div>
                </div>
                    <table class="table table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th><b>No</b></th>                          
                                <th><b>Nama</b></th>
                                <th><b>Role</b></th>
                                <th><b>NIM/NIP/NIDN</b></th>
                                <th><b>Pekerjaan</b></th>
                                <th><b>Fakultas</b></th>
                                <th><b>Email</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;   
                            @endphp

                            @foreach ($datauser as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->role }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->pekerjaan }}</td>
                                <td>{{ $data->fakultas }}</td>
                                <td>{{ $data->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    {{-- </div> --}}
</div>