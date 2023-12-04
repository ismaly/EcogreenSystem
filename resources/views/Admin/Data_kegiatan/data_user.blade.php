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
    {{-- <link href="sbadmin/css/tabeladmin.css" rel="stylesheet"> --}}
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!--link icon-->
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


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
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengguna Ecogreen System</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="mb-2">
                                @if(Auth::check())
                                    @if(Auth::user()->role == 'admin') 
                                    <button type="button" class="btn btn-info mr-2 mb-2" data-toggle="modal" data-target="#myModal1">
                                        <i class="fa fa-plus"></i> Data User
                                    </button>
                                    @endif
                                @endif 
                                    <a href="{{ route('exportDataUser') }}" class="btn btn-info mr-2 mb-2">
                                        <i class="fa fa-file-excel"></i> Export ke Excel
                                    </a>
                                    <a href="{{ route('exportDataUser-pdf') }}" class="btn btn-info mr-2 mb-2">
                                        <i class="fa fa-file-pdf"></i> Export ke PDF
                                    </a>
                            </div>
                                    
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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;"><b>No</b></th>
                                            <th><b>Nama</b></th>
                                            <th><b>Role</b></th>
                                            <th><b>NIM/NIP/NIDN</b></th>
                                            <th><b>Pekerjaan</b></th>
                                            <th><b>Fakultas</b></th>
                                            <th><b>Email</b></th>
                                            {{-- <th><b>Password</b></th> --}}
                                            @if(Auth::check())
                                            @if(Auth::user()->role == 'admin') 
                                            <th style="width: 150px;"><b>Aksi</b></th>
                                            @endif
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;   
                                        @endphp

                                        @foreach ($datauser as $data)
                                        <tr>
                                            <td style="width: 50px;">{{ $no++ }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->role }}</td>
                                            <td>{{ $data->nim }}</td>
                                            <td>{{ $data->pekerjaan }}</td>
                                            <td>{{ $data->fakultas }}</td>
                                            <td>{{ $data->email }}</td>
                                            {{-- <td>{{ $data->password }}</td> --}}

                                            @if(Auth::check())
                                                @if(Auth::user()->role == 'admin') 
                                            <td style="width: 150px;">
                                                    <form action="{{ route('DataUserDelete', $data->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE') <!-- Override method to DELETE -->
                                                        <button type="submit" class="btn btn-danger delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <button class="btn btn-warning edit mt-2" title="Edit" data-toggle="modal" data-target="#editModal{{ $data->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                    </button>
                                            </td>
                                                @endif
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

    @foreach($datauser as $data)
    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Edit Data -->
                    <form action="{{ route('DataUserUpdate', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Tambahkan input dan field yang sesuai dengan data yang ingin diedit -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="" value="{{ $data->nama }}" autofocus>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM/NIP/NIDN</label>
                            <input type="number" id="nim" name="nim" class="form-control" placeholder="" value="{{ $data->nim }}" autofocus>
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nohp">Nomor HP</label>
                            <input type="number" id="nohp" name="nohp" class="form-control" placeholder="" value="{{ $data->nohp }}" autofocus>
                            @error('nohp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <div>
                                <select class="form-control" id="pekerjaan" name="pekerjaan" autofocus>
                                    <option value="{{ $data->pekerjaan }}">{{ $data->pekerjaan }}</option>
                                    <option value="Dosen" {{ old('pekerjaan') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                    <option value="Staff" {{ old('pekerjaan') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="Mahasiswa" {{ old('pekerjaan') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                </select>
                            </div>
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <div>
                                <select class="form-control" id="fakultas" name="fakultas" autofocus>
                                    <option value="{{ $data->fakultas }}">{{ $data->fakultas }}</option>
                                    <option value="Ilkom" {{ old('fakultas') == 'Ilkom' ? 'selected' : '' }}>Ilmu Sosial dan Ilmu Politik</option>
                                    <option value="Tarbiyah" {{ old('fakultas') == 'Tarbiyah' ? 'selected' : '' }}>Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ushuluddin" {{ old('fakultas') == 'Ushuluddin' ? 'selected' : '' }}>Ushuluddin dan Pemikiran Islam</option>
                                    <option value="Saintek" {{ old('fakultas') == 'Saintek' ? 'selected' : '' }}>Sains dan Teknologi</option>
                                    <option value="Febi" {{ old('fakultas') == 'Febi' ? 'selected' : '' }}>Ekonomi dan Bisnis Islam</option>
                                    <option value="Syariah" {{ old('fakultas') == 'Syariah' ? 'selected' : '' }}>Syariah dan Hukum</option>
                                    <option value="Dakwah" {{ old('fakultas') == 'Dakwah' ? 'selected' : '' }}>Dakwah dan Komunikasi</option>
                                    <option value="Adab" {{ old('fakultas') == 'Adab' ? 'selected' : '' }}>Adab dan Humaniora</option>
                                    <option value="Psikologi" {{ old('fakultas') == 'Psikologi' ? 'selected' : '' }}>Psikologi</option>
                                    <option value="PascaSarjana" {{ old('fakultas') == 'PascaSarjana' ? 'selected' : '' }}>Pasca Sarjana</option>
                                    <option value="Lainnya" {{ old('fakultas') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            @error('fakultas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <div>
                                <select class="form-control" id="role" name="role" autofocus>
                                    <option value="{{ $data->role }}">{{ $data->role }}</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="ketua" {{ old('role') == 'ketua' ? 'selected' : '' }}>Ketua</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Mahasiswa</option>
                                </select>
                            </div>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" name="email" type="email" placeholder="Gunakan email UIN Raden Fatah" value="{{ $data->email }}" autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" autofocus>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal tambah data user--}}
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Form Tambah Data Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- @if ($data) --}}
                    <!-- Form di sini -->
                    <form method="POST" action="{{ route('TambahDataUser') }}" enctype="multipart/form-data" id="myForm">
                        <!-- enctype:buat nambah data foto -->
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control rounded-top @error('nama') is-invalid @enderror" placeholder="" required value="{{ old('nama') }}" autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM/NIP/NIDN</label>
                            <input type="number" id="nim" name="nim" class="form-control rounded-top @error('nim') is-invalid @enderror" placeholder="" required value="{{ old('nim') }}" autofocus>
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nohp">Nomor HP</label>
                            <input type="number" id="nohp" name="nohp" class="form-control rounded-top @error('nohp') is-invalid @enderror" placeholder="" required value="{{ old('nohp') }}" autofocus>
                            @error('nohp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <div>
                                <select class="form-control rounded-top @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" autofocus>
                                    <option value="">Pilih pekerjaan</option>
                                    <option value="Dosen" {{ old('pekerjaan') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                    <option value="Staff" {{ old('pekerjaan') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="Mahasiswa" {{ old('pekerjaan') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                </select>
                            </div>
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <div>
                                <select class="form-control rounded-top @error('fakultas') is-invalid @enderror" id="fakultas" name="fakultas" autofocus>
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Ilkom" {{ old('fakultas') == 'Ilkom' ? 'selected' : '' }}>Ilmu Sosial dan Ilmu Politik</option>
                                    <option value="Tarbiyah" {{ old('fakultas') == 'Tarbiyah' ? 'selected' : '' }}>Ilmu Tarbiyah dan Keguruan</option>
                                    <option value="Ushuluddin" {{ old('fakultas') == 'Ushuluddin' ? 'selected' : '' }}>Ushuluddin dan Pemikiran Islam</option>
                                    <option value="Saintek" {{ old('fakultas') == 'Saintek' ? 'selected' : '' }}>Sains dan Teknologi</option>
                                    <option value="Febi" {{ old('fakultas') == 'Febi' ? 'selected' : '' }}>Ekonomi dan Bisnis Islam</option>
                                    <option value="Syariah" {{ old('fakultas') == 'Syariah' ? 'selected' : '' }}>Syariah dan Hukum</option>
                                    <option value="Dakwah" {{ old('fakultas') == 'Dakwah' ? 'selected' : '' }}>Dakwah dan Komunikasi</option>
                                    <option value="Adab" {{ old('fakultas') == 'Adab' ? 'selected' : '' }}>Adab dan Humaniora</option>
                                    <option value="Psikologi" {{ old('fakultas') == 'Psikologi' ? 'selected' : '' }}>Psikologi</option>
                                    <option value="PascaSarjana" {{ old('fakultas') == 'PascaSarjana' ? 'selected' : '' }}>Pasca Sarjana</option>
                                    <option value="Lainnya" {{ old('lainnya') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control rounded-top @error('email') is-invalid @enderror" name="email" type="" placeholder="Gunakan email UIN Raden Fatah" required value="{{ old('email') }}" autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password
                            </label>
                            <input id="password" type="password" class="form-control rounded-top @error('password') is-invalid @enderror" name="password" required autofocus>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
                
                    </form>
                    {{-- @else
                    <div class="alert alert-danger">
                        Data belum ada.
                    </div>
                    @endif --}}
                </div> 
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true
            });
        });
    </script>
    

</body>

</html>