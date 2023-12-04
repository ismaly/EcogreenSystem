<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Data Sampah EGC System </title>
    
    <!-- Custom styles for this template-->
    <link href="sbadmin/css/style.css" rel="stylesheet">
    <link href="sbadmin/css/tabeladmin.css" rel="stylesheet">
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!--link icon-->
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">

</head>
<div class="card shadow mb-4">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary"> Data Penanaman Civitas Akademika </h6>
                    </div>
                </div>
                    <table class="table table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><b> No </b></th>
                                <th style="width: 20%;"><b> Nama </b></th>
                                <th style="width: 15%;"><b>NIM/NIP/NIDN</b></th>
                                <th style="width: 10%;"><b>No Hp</b></th>
                                <th style="width: 10%;"><b>Pekerjaan</b></th>
                                <th style="width: 15%;"><b>Fakultas</b></th>
                                <th style="width: 10%;"><b>Jenis Tanaman</b></th>
                                <th style="width: 5%;"><b>Sampah Terkumpul (kg)</b></th>
                                {{-- <th style="width: 5%;"><b>Bukti Pengumpulan Sampah</b></th> --}}
                                <th style="width: 10%;"><b>Created</b></th>
                                <th style="width: 10%;"><b>Update</b></th>
                                <th style="width: 10%;"><b>Keterangan</b></th>
                                <th style="width: 5%;"><b>Status</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;   
                            @endphp

                            @foreach ($datasampahuser as $data)
                            <tr>
                                <td >{{ $no++ }}</td>
                                <td >{{ $data->nama }}</td>
                                <td >{{ $data->nim }}</td>
                                <td >{{ $data->nohp }}</td>
                                <td >{{ $data->pekerjaan }}</td>
                                <td >{{ $data->fakultas }}</td>
                                <td >{{ $data->jenis_sampah }}</td>
                                <td >{{ $data->total }} KG</td>
                                {{-- <td><img src="{{ asset('storage/images/' . $data->formFile) }}" alt="img" style="width: 150px; height: auto;"></td> --}}
                                <td>{{ Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('d, l M Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($data->updated_at)->locale('id')->translatedFormat('d, l M Y') }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>{{ $data->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
</div>