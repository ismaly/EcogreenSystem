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
                        <h6 class="m-0 font-weight-bold text-primary">Data Energi</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#exampleModal1">
                                <i class="fa fa-plus"></i> Data Energi
                            </button>
                            <a href="{{ route('exportDataEnergi') }}" class="btn btn-info mb-2" id="exportExcelBtn">
                                <i class="fa fa-file-excel"></i> Export ke Excel
                            </a>
                            <select id="yearFilter" class="form-control mb-2" style="width: 150px;">
                                <option value="">Semua Tahun</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}" @if ($year == $selectedYear) selected @endif>{{ $year }}</option>
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
                                    <th style="width: 50px;"><b>No</b></th>
                                    <th><b>Lokasi</b></th>
                                    <th><b>Tanggal</b></th>
                                    <th><b>Energi Non Terbarukan (kWh)</b></th>
                                    <th><b>Energi Terbarukan (kWh)</b></th>
                                    <th><b>Rasio</b></th>
                                    <th style="width: 200px;"><b>Aksi</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;   
                                @endphp

                                @foreach ($dataenergi as $data)
                                <tr data-tanggal="{{ $data->tanggal }}"> 
                                    <td style="width: 50px;">{{ $no++ }}</td>
                                    <td>{{ $data->kampus }}</td>
                                    <td>{{ $data->tanggal }}</td>
                                    <td>{{ $data->totalEnergiListrik }}</td>
                                    <td>{{ $data->totalEnergiTerbarukan }}</td>
                                    <td>{{ $data->ratio }}</td>

                                    <td style="width: 200px;">
                                        @if(Auth::check())
                                            @if(Auth::user()->role == 'admin') 
                                            <form action="{{ route('DataEnergiDelete', $data->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE') <!-- Override method to DELETE -->
                                                <button type="submit" class="btn btn-danger delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                                @endif
                                            @endif
                                            <button class="btn btn-warning edit" title="Edit" data-toggle="modal" data-target="#editModal{{ $data->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            </button>
                                        </td>
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

    @foreach($dataenergi as $data)
    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Energi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Edit Data -->
                    <form action="{{ route('DataEnergiUpdate', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Tambahkan input dan field yang sesuai dengan data yang ingin diedit -->
                        <div class="form-group">
                            <label for="kampus">Lokasi</label>
                            <div>
                                <select class="form-control" id="kampus" name="kampus">
                                    <option selected disabled>Pilih Kampus</option>
                                    <option value="Kampus A (1) 555 kVA" {{ $data->kampus == 'Kampus A (1) 555 kVA' ? 'selected' : '' }}>Kampus A (1) 555 kVA</option>
                                    <option value="Kampus A (2) 1110 kVA" {{ $data->kampus == 'Kampus A (2) 1110 kVA' ? 'selected' : '' }}>Kampus A (2) 1110 kVA</option>
                                    <option value="Kampus B 3465 kVA" {{ $data->kampus == 'Kampus B 3465 kVA' ? 'selected' : '' }}>Kampus B 3465 kVA</option>
                                </select>
                            </div>
                            <span class="error" id="error-kampus"></span>
                        </div>
                
                        <div class="mb-3">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $data->tanggal }}">
                            <span class="error" id="error-tanggal"></span>
                        </div>
                
                        <div class="form-group">
                            <label for="totalEnergiListrik">Total Energi Non Terbarukan (kWh) </label>
                            <input type="number" class="form-control" id="totalEnergiListrik" name="totalEnergiListrik" placeholder="" value="{{ $data->totalEnergiListrik }}">
                            <span class="error" id="error-totalEnergiListrik"></span>
                        </div>
                
                        <div class="form-group">
                            <label for="totalEnergiTerbarukan">Total Energi Terbarukan (kWh) </label>
                            <input type="number" class="form-control" id="totalEnergiTerbarukan" name="totalEnergiTerbarukan" placeholder="" value="{{ $data->totalEnergiTerbarukan }}">
                            <span class="error" id="error-totalEnergiTerbarukan"></span>
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
    
    {{-- modal tambah data penggunaan listrik--}}
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Form Data Energi UIN Raden Fatah Palembang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @if ($data) --}}
                <!-- Form di sini -->
                <form method="POST" action="{{ route('TambahDataEnergi') }}" enctype="multipart/form-data" id="myForm">
                    <!-- enctype:buat nambah data foto -->
                    @csrf
                    <div class="form-group">
                        <label for="kampus">Lokasi</label>
                        <div>
                            <select class="form-control" id="kampus" name="kampus">
                                <option selected disabled>Pilih Kampus</option>
                                <option value="Kampus A (1) 555 kVA">Kampus A (1) 555 kVA</option>
                                <option value="Kampus A (2) 1110 kVA">Kampus A (2) 1110 kVA</option>
                                <option value="Kampus B 3465 kVA">Kampus B 3465 kVA</option>
                            </select>
                        </div>
                        <span class="error" id="error-kampus"></span>
                    </div>
            
                    <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="">
                        <span class="error" id="error-tanggal"></span>
                    </div>
            
                    <div class="form-group">
                        <label for="totalEnergiListrik">Total Energi Non Terbarukan (kWh) </label>
                        <input type="number" class="form-control" id="totalEnergiListrik" name="totalEnergiListrik" placeholder=""
                            value="">
                        <span class="error" id="error-totalEnergiListrik"></span>
                    </div>
            
                    <div class="form-group">
                        <label for="totalEnergiTerbarukan">Total Energi Terbarukan (kWh) </label>
                        <input type="number" class="form-control" id="totalEnergiTerbarukan" name="totalEnergiTerbarukan"
                            placeholder="" value="">
                        <span class="error" id="error-totalEnergiTerbarukan"></span>
                    </div>
            
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button> --}}
            
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
            
                    {{-- @else
                    <div class="alert alert-danger">
                        Data belum ada.
                    </div>
                    @endif --}}
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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

    <script>
        $(document).ready(function() {
            // Function to filter the table based on the selected year
            function filterTable(selectedYear) {
                $('#tableDataEnergi tbody tr').each(function() {
                    const tanggal = $(this).data('tanggal');
                    const year = new Date(tanggal).getFullYear().toString();
                    if (selectedYear === '' || year === selectedYear) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Function to update the export link with the selected year
            function updateExportLink(selectedYear) {
                var exportExcelBtn = $("#exportExcelBtn");
                var exportUrl = "{{ route('exportDataEnergi') }}";
                if (selectedYear) {
                    exportUrl += '?year=' + selectedYear;
                }
                exportExcelBtn.attr("href", exportUrl);
            }

            // Handle the change event of the year filter dropdown
            $('#yearFilter').on('change', function() {
                const selectedYear = $(this).val();
                filterTable(selectedYear);
                updateExportLink(selectedYear);
            });

            // Initialize the table filtering (show all data) and export link
            filterTable('');
            updateExportLink('');
        });
    </script>


    

</body>

</html>