<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Ecogreen Campus UIN Raden Fatah Palembang</title>
    <!-- Custom fonts for this template-->
    <link href="sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sbadmin/css/style.css" rel="stylesheet">
    <link href="sbadmin/css/tabeladmin.css" rel="stylesheet">
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!--link icon-->
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('Admin.template.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
                
            @include('Admin.template.topbar')

            <!-- Topbar Navbar -->
           
            <!-- End of Topbar -->

           <!-- Begin Page Content -->
           <div class="container-fluid">

                <!-- Basic Card Example -->
                <div class="card shadow mb-4"> 
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Sampah</h6>
                    </div>
                    <!--col-lg-6-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{ route('exportDataSampahUser', ['year' => $selectedYear]) }}" class="btn btn-info mb-2" id="exportExcelBtn">
                                <i class="fa fa-file-excel"></i> Export ke Excel
                            </a>

                            <a href="{{ route('exportDataSampah-pdf', ['year' => $selectedYear]) }}" class="btn btn-info mb-2" id="exportExcelBtn">
                                <i class="fa fa-file-pdf"></i> Export ke PDF
                            </a>
                            <select id="yearFilter" class="form-control mb-2" style="width: 150px;">
                                <option value="">Semua Tahun</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success mt-2" role="alert">
                                    {{ $message }}
                                </div>
                            @elseif ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                                        
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><b> No </b></th>
                                            <th><b> Nama </b></th>
                                            <th><b>NIM/NIP/NIDN</b></th>
                                            <th><b>Jenis Sampah</b></th>
                                            <th><b>Sampah Tekumpul (KG)</b></th>
                                            <th><b>Bukti Pengumpulan Sampah</b></th>
                                            {{-- <th><b>Created</b></th>
                                            <th><b>Update</b></th> --}}
                                            <th><b>Keterangan</b></th>
                                            <th><b>Status</b></th>
                                            <th><b>Tambah Validasi</b></th>
                                            <th><b>Aksi</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;   
                                        @endphp
                                        <tr>

                                            @foreach ($datasampahuser as $data)
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->nim }}</td>
                                            <td>{{ $data->jenis_sampah }}</td>
                                            <td>{{ $data->total }}</td>
                                            <td>
                                                @if ($data->formFile)
                                                <img src="{{ asset('storage/images/' . $data->formFile) }}" alt="" style="width: 150px;">
                                                @else
                                                    Tidak ada gambar
                                                @endif
                                            </td>
                                            {{-- <td style="width: 300px;">{{ Carbon\Carbon::parse($data->created_at)->locale('id')->translatedFormat('d, l M Y H:i:s') }}</td>
                                            <td style="width: 300px;">{{ Carbon\Carbon::parse($data->updated_at)->locale('id')->translatedFormat('d, l M Y H:i:s') }}</td> --}}

                                            <td>{{ $data->keterangan }}</td>
                                            <td>
                                                @php
                                                $statusClass = '';
                                                $statusText = '';
                                            
                                                switch($data->status) {
                                                    case 'Diterima':
                                                        $statusClass = 'bg-success';
                                                        $statusText = 'Diterima';
                                                        break;
                                                    case 'Ditolak':
                                                        $statusClass = 'bg-danger';
                                                        $statusText = 'Ditolak';
                                                        break;
                                                    default:
                                                        $statusClass = 'bg-primary';
                                                        $statusText = 'Belum Aktif';
                                                        break;
                                                    }
                                                @endphp
                                                
                                                <span class="badge text-white {{ $statusClass }}">
                                                    {{ $statusText }}
                                                </span>
                                            
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#myModal{{ $data->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                                    </svg>
                                                </button>
                                            </td>

                                            <td>
                                                @if(Auth::check())
                                                <a href="#" class="btn btn-primary view" title="View" data-toggle="modal" data-target="#detailModal{{ $data->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                        </svg>
                                                </a>
                                                @if(Auth::user()->role == 'admin' || Auth::user()->role == 'tim')
                                                <button class="btn btn-warning edit mt-2" title="edit" data-toggle="modal" data-target="#editModal{{ $data->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>

                                                {{-- <form action="{{ route('DataSampahDelete', $data->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete mt-2" title="delete" data-toggle="tooltip" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                    </button>
                                                </form>    --}}
                                                @endif
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Footer -->
            @include('Admin.template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    {{-- modal tambah data status--}}
    @foreach ($datasampahuser as $data)
    <div class="modal fade" id="myModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Form Validasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($data)
                        <!-- Form di sini -->
                        <form method="POST" action="{{ route('DataSampahUpdateStatus', $data->id) }}" enctype="multipart/form-data" id="myForm"><!--encytype:buat nambah data foto-->
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ $data->keterangan }}</textarea>
                                <span class="error" id="error-longitude"></span>
                            </div>

                            <div class="mb-3">
                                <label for="status">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="Diterima" value="Diterima" {{ $data->status == 'Diterima' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Diterima">
                                        Diterima
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="Ditolak" value="Ditolak" {{ $data->status == 'Ditolak' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="Ditolak">
                                        Ditolak
                                    </label>
                                </div>
                                <span class="error" id="error-status"></span>
                            </div>


                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>

                            @if(session('success'))
                                <div class="alert alert-success mt-4">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </form>
                    @else
                        <div class="alert alert-danger">
                            Data belum ada.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $data->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{ $data->id }}">Detail Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Nama: {{ $data->nama }}</p>
                <p>Nim: {{ $data->nim }}</p>
                <p>No Hp: {{ $data->nohp }}</p>
                <p>Pekerjaan: {{ $data->pekerjaan }}</p>
                <p>Fakultas: {{ $data->getFakultasLabelAttribute() }}</p>
                <p>Jenis Sampah: {{ $data->jenis_sampah }}</p>
                <p>Total: {{ $data->total }}</p>
                <p>Bukti Pengumpulan Sampah: </p>
                @if ($data->formFile)
                <img src="{{ asset('storage/images/' . $data->formFile) }}" alt="" style="width: 350px;">
                @else
                    Tidak ada gambar
                @endif
                <p>Dibuat: {{ Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>
                <p>Diperbarui: {{ Carbon\Carbon::parse($data->updated_at)->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>
                <p>Keterangan: {{ $data->keterangan }}</p>
                <p>Status: {{ $data->status }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>

    
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Pengajuan Sampah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Edit Data -->
                    <form action="{{ route('DataSampahUpdate', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Tambahkan input dan field yang sesuai dengan data yang ingin diedit -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="nim">NIM/NIP/NIDN</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="{{ $data->nim }}" readonly>
                        </div>
    
                        <div class="form-group">
                            <label for="nohp">Nomor HP</label>
                            <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $data->nohp }}" readonly>
                        </div>
    
                        <div class="form-group {{ $errors->has('pekerjaan') ? 'has-error' : '' }}">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="" value="{{ $data -> pekerjaan }}" readonly>
                            <span class="error" id="error-nim">{{ $errors->first('pekerjaan') }}</span>
                        </div>
        
                        <div class="form-group {{ $errors->has('fakultas') ? 'has-error' : '' }}">
                            <label for="fakultas" >Fakultas</label>
                            <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="" value="{{ $data -> fakultas }}" readonly>
                            <span class="error" id="error-nim">{{ $errors->first('fakultas') }}</span>
                        </div>
    
                        <div class="form-group">
                            <label for="jenis_sampah">Jenis Sampah</label>
                            <select class="form-control" id="jenis_sampah" name="jenis_sampah">
                                <option value="Sampah Organik" {{ $data->jenis_sampah == 'Sampah Organik' ? 'selected' : '' }}>Sampah Organik</option>
                                <option value="Sampah Anorganik " {{ $data->jenis_sampah == 'Sampah Anorganik ' ? 'selected' : '' }}>Sampah Anorganik </option>
                                <option value="Sampah Bahan Berbahaya dan Beracun (B3)" {{ $data->jenis_sampah == 'Sampah Bahan Berbahaya dan Beracun (B3)' ? 'selected' : '' }}>Sampah Bahan Berbahaya dan Beracun (B3)</option>
                                <option value="Sampah Kertas" {{ $data->jenis_sampah == 'Sampah Kertas' ? 'selected' : '' }}>Sampah Kertas</option>
                                <option value="Sampah Residu" {{ $data->jenis_sampah == 'Sampah Residu' ? 'selected' : '' }}>Sampah Residu</option>
                                <option value="lainnya" {{ $data->jenis_sampah == 'lainnya' ? 'selected' : '' }}>Lain-lain</option>
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="total">Total (KG)</label>
                            <input type="number" class="form-control" id="total" name="total" value="{{ $data->total }}">
                        </div>
    
                        <div class="form-group">
                            <label for="formFile" class="form-label">Bukti Pengumpulan Sampah</label>
                            <p class="mb-0 small">Pengumpulan sampah dilakukan di bank sampah UIN Raden Fatah Palembang! Upload foto format jpeg,jpg,png max 2 MB</p>
                            <input class="form-control" type="file" id="formFile" name="formFile" @if (!$data->formFile) required @endif>
                        </div>
    
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="3" name="keterangan">{{ $data->keterangan }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="Diterima" value="Diterima" {{ $data->status == 'Diterima' ? 'checked' : '' }}>
                                <label class="form-check-label" for="Diterima">
                                    Diterima
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="Ditolak" value="Ditolak" {{ $data->status == 'Ditolak' ? 'checked' : '' }}>
                                <label class="form-check-label" for="Ditolak">
                                    Ditolak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Bootstrap core JavaScript-->
    <script src="sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sbadmin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="sbadmin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="sbadmin/js/demo/chart-area-demo.js"></script>
    <script src="sbadmin/js/demo/chart-pie-demo.js"></script>

    <script>
        $(document).ready(function() {
            // Function to filter the table based on the selected year
            function filterTableByYear(selectedYear) {
                $('#tableDataPohon tbody tr').each(function() {
                    const year = $(this).data('year');
                    if (selectedYear === '' || year === selectedYear) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Handle the change event of the year filter dropdown
            $('#yearFilter').on('change', function() {
                const selectedYear = $(this).val();
                filterTableByYear(selectedYear);
                // Update the export Excel button link based on the selected year
                const exportUrl = "{{ route('exportDatapohonuser') }}";
                $('#exportExcelBtn').attr('href', exportUrl + '?year=' + selectedYear);
            });

            // Initialize the table filtering (show all data)
            filterTableByYear('');
        });
    </script>

</body>

</html>