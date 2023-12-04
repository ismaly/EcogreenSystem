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
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--link icon-->
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">

    <!--link leaflet css dan js-->
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    {{-- link css table --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('.User.template.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
                
            @include('.User.template.topbar')

            <!-- Topbar Navbar -->
           
            <!-- End of Topbar -->

           <!-- Begin Page Content -->
           <div class="container-fluid">
            
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Monitoring Penanaman Pohon</h1>
                </div>

               
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                   <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;"><b> No </b></th>
                                            <th><b> Nama </b></th>
                                            <th><b>NIM/NIP/NIDN</b></th>
                                            <th><b>No Hp</b></th>
                                            <th><b>Pekerjaan</b></th>
                                            <th><b>Fakultas</b></th>
                                            <th style="width: 300px;"><b>Jenis Bibit Tanaman</b></th>
                                            <th style="width: 300px;"><b>Tinggi Bibit Tanaman (cm)</b></th>
                                            {{-- <th><b>Latitude</b></th>
                                            <th><b>Longitude</b></th>
                                            <th><b>Bukti penanaman pohon</b></th>
                                            <th style="width: 250px;" ><b>Created</b></th>
                                            <th><b>Status</b></th> --}}
                                            <th style="width: 300px;"><b>Aksi</b></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $no = 1;   
                                        @endphp
                                    
                                        @foreach ($datapohonuser as $data)
                                        @if ($data->user_id == auth()->user()->id)
                                            <tr>
                                                <td style="width: 50px;">{{ $no++ }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->nim }}</td>
                                                <td>{{ $data->nohp }}</td>
                                                <td>{{ $data->pekerjaan }}</td>
                                                <td>{{ $data->fakultas }}</td>
                                                <td style="width: 300px;">{{ $data->jenistanaman }}</td>
                                                <td style="width: 300px;">{{ $data->tinggitanaman }} cm</td>
                                                {{-- <td>{{ $data->latitude }}</td>
                                                <td>{{ $data->longitude }}</td>
                                                <td>
                                                    @if ($data->formFile)
                                                        <img src="{{ asset('storage/images/' . $data->formFile) }}" alt="" style="width: 150px;">
                                                    @else
                                                        Tidak ada gambar
                                                    @endif
                                                </td>
                                                <td style="width: 250px;">{{ Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</td>
                                                <td>{{ $data->status }}</td> --}}
                                                <td style="width: 300px;">
                                                    <div class="mb-2">
                                                        <a href={{ route('print.report', ['id' => $data->id]) }} onclick="" target="_blank" class="btn btn-primary" title="Cetak" data-toggle="tooltip">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                              </svg>
                                                        </a>  
                                                    </div>
                                                    
                                                    <div>
                                                        <a href="#" class="btn btn-primary view" title="View" data-toggle="modal" data-target="#detailModal{{ $data->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>
                                                        </a>
                                                        <!-- Modal Detail -->
                                                        @foreach($datapohonuser as $data)
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
                                                                <p>NIM/NIP/NIDN: {{ $data->nim }}</p>
                                                                <p>No Hp: {{ $data->nohp }}</p>
                                                                <p>Pekerjaan: {{ $data->pekerjaan }}</p>
                                                                <p>Fakultas: {{ $data->fakultas }}</p>
                                                                <p>Jenis Bibit Tanaman: {{ $data->jenistanaman }}</p>
                                                                <p>Tinggi Bibit Tanaman: {{ $data->tinggitanaman }}  (cm)</p>
                                                                <p>Latitude: {{ $data->latitude }}</p>
                                                                <p>Longitude: {{ $data->longitude }}</p>
                                                                <p>Bukti Penanaman: </p>
                                                                @if ($data->formFile)
                                                                <img src="{{ asset('storage/images/' . $data->formFile) }}" alt="" style="width: 350px;">
                                                                @else
                                                                    Tidak ada gambar
                                                                @endif
                                                                <p>Created: {{ Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>
                                                                <p>Keterangan: {{ $data->keterangan }}</p>
                                                                <p>Status: {{ $data->status }}</p>
                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                </div>
    
                                                            <div>
    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>  
                                        @endif   
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
            <!-- /.container-fluid -->

            <!-- Footer -->
            @include('.User.template.footer')
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

    <!-- Page level plugins -->
    <script src="sbadmin/vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="sbadmin/js/demo/chart-area-demo.js"></script>
    <script src="sbadmin/js/demo/chart-pie-demo.js"></script>

    <!-- Map Leaflet -->
    <script>

        const mymap = L.map('map').setView([-3.0107434,104.773489], 16.5);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright"> OpenStreetMap</a>'
        }).addTo(mymap);

        //get lokasi koordinat
        var latInput = document.querySelector("[name='latitude']");
        var lngInput = document.querySelector("[name='longitude']");
        var lokasiInput = document.querySelector("[name='lokasi']");

        var curLocation = [-3.0107434,104.773489];

        mymap.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
            draggable: 'true',
        });

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position,{
                draggable: 'true',
            }).bindPopup(position).update();
            $("#latitude").val(position.lat);
            $("#longitude").val(position.lng); 
            $("#lokasi").val(position.lat + "," + position.lng);
        });
        mymap.addLayer(marker);
        mymap.on("click", function(e){
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if (!marker){
                marker = L.marker(e.latlng).addTo(mymap);
            }else{
                marker.setLatLng(e.latlng);
            }
            latInput.value = lat;
            lngInput.value = lng;
            lokasiInput.value = lat + "," + lng;
        });
        marker.bindPopup("<b>Masukkan Lokasi Penanaman Pohon!!").openPopup();


    </script>

</body>

</html>