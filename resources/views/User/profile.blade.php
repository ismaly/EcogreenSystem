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
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!--link icon-->
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">

    <!--link leaflet css dan js-->
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('User.template.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
                
            @include('User.template.topbar')

            <!-- Topbar Navbar -->
           
            <!-- End of Topbar -->

            <!-- Main Content -->
            <!-- Begin Page Content -->
           <div class="container-fluid">
            
            <!-- Page Heading -->
                <div class="card shadow mb-4">
                    <div class="row no-gutters">
                        
                        <div class="col-md-8">
                            <h1 class="h3 mb-4 text-gray-800 mt-4 ml-3 ">EDIT PROFILE</h1>
                            @if(session('success'))
                                <div class="alert alert-success ml-3">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger ml-3 mb-0">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <div class="card-body ">
                                    
                                    <form action="{{ route('Editprofile', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->nama }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nim">NIM/NIP/NIDN</label>
                                            <input type="number" class="form-control" id="nim" name="nim" value="{{ Auth::user()->nim }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">Nomor HP</label>
                                            <input type="number" class="form-control" id="nohp" name="nohp" value="{{ Auth::user()->nohp }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pekerjaan">Pekerjaan</label>
                                                <div>
                                                    <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                                                        <option value="{{ Auth::user()->pekerjaan }}">{{ Auth::user()->pekerjaan }}</option>
                                                        <option value="Dosen" {{ old('pekerjaan') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                                        <option value="Staff" {{ old('pekerjaan') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                                        <option value="Mahasiswa" {{ old('pekerjaan') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fakultas">Fakultas</label>
                                                <div>
                                                    <select class="form-control" id="fakultas" name="fakultas" required>
                                                        <option value="{{ Auth::user()->fakultas }}">{{ Auth::user()->fakultas }}</option>
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
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <label for="avatar">Foto Profil</label>
                                            <p class="mb-0 small">Upload foto max 2 MB</p>
                                            <input type="file" class="form-control-file" id="avatar" name="avatar" accept="image/jpeg,image/jpg,image/png,image/gif">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>                      
                        </div>
                        <div class="col-md-4 text-center">
                            <!-- Avatar display -->
                            <div class="avatar-container text-center">
                                <img class="img-fluid rounded-circle mt-5"
                                    src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}"
                                    alt="Avatar"
                                    style="width: 150px; height: 120px; object-fit: cover;">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('User.template.footer')
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

    <!-- Bootstrap core JavaScript-->
    <script src="sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sbadmin/js/sb-admin-2.min.js"></script>

</body>
</html>