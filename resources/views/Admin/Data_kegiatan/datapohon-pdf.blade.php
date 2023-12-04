<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Data Penanaman EGC System </title>
    
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
                                <th ><b> No </b></th>
                                <th ><b> Nama </b></th>
                                <th ><b>NIM/NIP/NIDN</b></th>
                                <th ><b>No Hp</b></th>
                                <th ><b>Pekerjaan</b></th>
                                <th ><b>Fakultas</b></th>
                                <th ><b>Jenis Tanaman</b></th>
                                <th ><b>Tinggi Tanaman (cm)</b></th>
                                <th ><b>Latitude</b></th>
                                <th ><b>Longitude</b></th>
                                {{-- <th style="width: 5%;"><b>Bukti penanaman</b></th> --}}
                                <th ><b>Created</b></th>
                                <th ><b>Update</b></th>
                                <th ><b>Keterangan</b></th>
                                <th ><b>Status</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;   
                            @endphp

                            @foreach ($datapohonuser as $data)
                            <tr>
                                <td >{{ $no++ }}</td>
                                <td >{{ $data->nama }}</td>
                                <td >{{ $data->nim }}</td>
                                <td >{{ $data->nohp }}</td>
                                <td >{{ $data->pekerjaan }}</td>
                                {{-- <td >{{ $data->fakultas }}</td> --}}
                                <td>{{ $data->getFakultasLabelAttribute() }}</td>
                                <td >{{ $data->jenistanaman }}</td>
                                <td >{{ $data->tinggitanaman }} cm</td>
                                <td >{{ $data->latitude }}</td>
                                <td >{{ $data->longitude }}</td>
                                {{-- <td><img src="{{ asset('storage/images/' . $data->formFile) }}" alt="img" style="width: 150px; height: auto;"></td> --}}
                                {{-- <td >
                                    @if ($data->formFile)
                                    <img src="{{ asset('storage/images/' . $data->formFile) }}" alt="" style="width: 200px;">
                                    @else
                                    Tidak ada gambar
                                    @endif
                                </td> --}}
                                <td >{{ Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('d, l M Y') }}</td>
                                <td >{{ Carbon\Carbon::parse($data->updated_at)->locale('id')->translatedFormat('d, l M Y') }}</td>
                                <td >{{ $data->keterangan }}</td>
                                <td >{{ $data->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
</div>