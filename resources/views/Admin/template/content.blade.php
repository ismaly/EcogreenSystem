<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">

            <!-- Pohon -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tanaman Tumbuh </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $totalTanaman }}
                                    </div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tree-fill" viewBox="0 0 16 16">
                                    <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EC -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Rasio Energi </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalRatio }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ev-station-fill" viewBox="0 0 16 16">
                                    <path d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V9c0-.258-.104-.377-.357-.635l-.007-.008C13.379 8.096 13 7.71 13 7V4a.5.5 0 0 1 .146-.354l.5-.5a.5.5 0 0 1 .708 0l.5.5A.5.5 0 0 1 15 4v8.5a1.5 1.5 0 1 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm2 .5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5Zm2.631 9.96H4.14v-.893h1.403v-.505H4.14v-.855h1.49v-.54H3.485V13h2.146v-.54Zm1.316.54h.794l1.106-3.333h-.733l-.74 2.615h-.031l-.747-2.615h-.764L6.947 13Z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sampah -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Sampah yang terkumpul</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalSampah }} KG
                                </div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                                    <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-2 ml-2">
                                    <a href="{{ route('exportDataKegiatan') }}" class="text-xl font-weight-bold text-gray text-uppercase mb-1" id="exportExcelBtn">
                                        Unduh seluruh data kegiatan
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                                    <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="mb-4 ml-2">
                                    <a href="{{ route('generatePdf') }}" class="text-xl font-weight-bold text-gray text-uppercase mb-1" id="exportPdfBtn">
                                        Unduh PDF
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                                    <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Penanaman -->
        <div class="row">

            <!-- Peta Sebaran -->
            {{-- <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Peta Sebaran</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                                <a class="dropdown-item" href="#" id="downloadMapImage">Unduh Gambar Peta</a>

                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="map" style="height: 400px;"></div>
                    </div>
                </div>
            </div> --}}

            <!-- Peta Sebaran -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Peta Sebaran</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="{{ route('Homeadmin') }}" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="map" style="height: 400px;"></div>
                        <?php
                        // Menghubungkan ke database
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "egc";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        // Memeriksa koneksi ke database
                        if (!$conn) {
                            die("Koneksi gagal: " . mysqli_connect_error());
                        }

                        // Menjalankan kueri SQL untuk mengambil data pohon dengan status diterima
                        $sql = "SELECT * FROM pengajuanpohon WHERE status = 'Diterima'";
                        $result = mysqli_query($conn, $sql);

                        // Menyimpan data dalam array
                        $data = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                        }

                        // Mengonversi data ke format JSON
                        $jsonData = json_encode($data);

                        // Menutup koneksi ke database
                        mysqli_close($conn);
                        ?>

                        <script>
                            var map = L.map('map').setView([-3.0108863, 104.7723977], 16);
                        
                            L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                                maxZoom: 20,
                                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                            }).addTo(map);
                        
                            var markersData = <?php echo $jsonData; ?>;
                        
                            markersData.forEach(function (markerData) {
                                var marker = L.marker([markerData.latitude, markerData.longitude]).addTo(map);
                                marker.bindPopup('Nama: ' + markerData.nama + '<br>NIM: ' + markerData.nim + '<br>Pekerjaan: ' + markerData.pekerjaan + '<br>Fakultas: ' + markerData.fakultas + '<br>Jenis Tanaman: ' + markerData.jenistanaman + '<br>Latitude: ' + markerData.latitude + '<br>Longitude: ' + markerData.longitude);
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Total Penanaman per Fakultas</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="{{ route('Homeadmin') }}" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                                {{-- <a class="dropdown-item" href="{{ route('Homeadmin') }}"> Unduh Grafik</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="total_penanaman"></div>
                        <?php
                        // Koneksi ke database
                        $host = 'localhost';
                        $dbname = 'egc';
                        $username = 'root';
                        $password = '';

                        try {
                            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            echo "Koneksi ke database gagal: " . $e->getMessage();
                        }

                        // Mengambil data penanaman per fakultas dengan status "diterima"
                        $query = "SELECT fakultas, COUNT(*) AS total_penanaman FROM pengajuanpohon WHERE status = 'diterima' GROUP BY fakultas";
                        $result = $db->query($query);
                        $data = $result->fetchAll(PDO::FETCH_ASSOC);

                        // Mengonversi data menjadi format yang sesuai untuk digunakan dalam chart
                        $chartData = array_map(function ($item) {
                            return [
                                'name' => $item['fakultas'],
                                'y' => (int) $item['total_penanaman']
                            ];
                        }, $data);
                        ?>
                    
                        <!-- Script untuk menampilkan chart -->
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const chartData = <?php echo json_encode($chartData); ?>;
                            
                            Highcharts.chart('total_penanaman', {
                                chart: {
                                    type: 'pie'
                                },
                                title: {
                                    text: ''
                                },
                                series: [{
                                    name: 'Jumlah Penanaman',
                                    data: chartData,
                                    colors: ['#C2DEDC', '#C4D7B2', '#FFD89C', '#FDF7C3', '#E3F4F4', '#FFD966', '#A86464', '#E5EBB2', '#B2A4FF', '#F7C8E0', '#CBB279',],
                                }],
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 480
                                        },
                                        chartOptions: {
                                            legend: {
                                                align: 'center',
                                                verticalAlign: 'bottom',
                                                layout: 'horizontal'
                                            }
                                        }
                                    }]
                                }
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sampah -->
        <div class="row">
            <!-- Jenis Sampah -->
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sampah Terkumpul</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="{{ route('Homeadmin') }}" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="jenis_sampah" style="width:100%; height:400px;"></div>
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const totalOrganik = {{ $totalOrganik }};
                            const totalOrganikPercentage = (totalOrganik / 10000) * 100;
                    
                            const totalAnorganik = {{ $totalAnorganik }};
                            const totalAnorganikPercentage = (totalAnorganik / 10000) * 100;
                    
                            const totalB3 = {{ $totalB3 }};
                            const totalB3Percentage = (totalB3 / 10000) * 100;
                    
                            const totalKertas = {{ $totalKertas }};
                            const totalKertasPercentage = (totalKertas / 10000) * 100;
                    
                            const totalResidu = {{ $totalResidu }};
                            const totalResiduPercentage = (totalResidu / 10000) * 100;
                    
                            const totalLainnya = {{ $totalLainnya }};
                            const totalLainnyaPercentage = (totalLainnya / 10000) * 100;
                    
                            const chart = Highcharts.chart('jenis_sampah', {
                                chart: {
                                    type: 'bar'
                                },
                                title: {
                                    text: ''
                                },
                                xAxis: {
                                    categories: ['Organik', 'Anorganik', 'B3', 'Kertas', 'Residu', 'Lainnya']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Kilogram (KG)'
                                    }
                                },
                                plotOptions: {
                                    series: {
                                        colorByPoint: true,
                                        colors: ['#C9F4AA', '#FFF6BD', '#FD8A8A', '#F7F5EB', '#C4DFDF', '#EEE9DA'],
                                        dataLabels: {
                                            enabled: true,
                                            format: '({point.percentage:.1f}%)'
                                            // format: '{point.y:.0f} KG ({point.percentage:.1f}%)'
                                        }
                                    }
                                },
                                series: [{
                                    name: 'Total Sampah',
                                    data: [
                                        { y: totalOrganik, percentage: totalOrganikPercentage },
                                        { y: totalAnorganik, percentage: totalAnorganikPercentage },
                                        { y: totalB3, percentage: totalB3Percentage },
                                        { y: totalKertas, percentage: totalKertasPercentage },
                                        { y: totalResidu, percentage: totalResiduPercentage },
                                        { y: totalLainnya, percentage: totalLainnyaPercentage }
                                    ]
                                }]
                            });
                        });
                        
                    </script>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sampah Terkumpul per Fakultas</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="{{ route('Homeadmin') }}" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sampahfakultas"></div>
                        <?php
                        // Menghubungkan ke database
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "egc";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        // Memeriksa koneksi ke database
                        if (!$conn) {
                            die("Koneksi gagal: " . mysqli_connect_error());
                        }

                        // Menjalankan kueri SQL untuk mengambil data total sampah berdasarkan fakultas dengan status diterima
                        $sql = "SELECT fakultas, jenis_sampah, SUM(total) AS total
                                FROM pengajuansampah
                                WHERE status = 'Diterima'
                                GROUP BY fakultas, jenis_sampah";

                        $result = mysqli_query($conn, $sql);

                        // Menyimpan data dalam array
                        $data = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data[$row['fakultas']][$row['jenis_sampah']] = (float) $row['total'];
                        }

                        // Menentukan urutan categories sesuai dengan kebutuhan Anda
                        $categories = ['Ilkom','Tarbiyah','Ushuluddin','Saintek', 'Febi', 'Syariah', 'Dakwah', 'Adab', 'Psikologi', 'PascaSarjana', 'Lainnya'];
                        
                        // Mengonversi data ke format yang sesuai untuk digunakan dalam skrip JavaScript
                        $organik = array();
                        $anorganik = array();
                        $b3 = array();
                        $kertas = array();
                        $residu = array();
                        $lainnya = array();

                        foreach ($categories as $fakultas) {
                            $organik[] = $data[$fakultas]['Sampah Organik'] ?? 0;
                            $anorganik[] = $data[$fakultas]['Sampah Anorganik'] ?? 0;
                            $b3[] = $data[$fakultas]['Sampah Bahan Berbahaya dan Beracun (B3)'] ?? 0;
                            $kertas[] = $data[$fakultas]['Sampah Kertas'] ?? 0;
                            $residu[] = $data[$fakultas]['Sampah Residu'] ?? 0;
                            $lainnya[] = $data[$fakultas]['lainnya'] ?? 0;
                        }

                        // Menutup koneksi ke database
                        mysqli_close($conn);
                        ?>

                        <script>
                            Highcharts.chart('sampahfakultas', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: ''
                                },
                                xAxis: {
                                    categories: <?php echo json_encode($categories); ?>,
                                    crosshair: true
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Kilogram (KG)'
                                    }
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} kg</b></td></tr>',
                                    footerFormat: '</table>',
                                    shared: true,
                                    useHTML: true
                                },
                                plotOptions: {
                                    column: {
                                        pointPadding: 0.2,
                                        borderWidth: 0
                                    }
                                },
                                series: [{
                                    name: 'Organik',
                                    data: <?php echo json_encode($organik); ?>
                                }, {
                                    name: 'Anorganik',
                                    data: <?php echo json_encode($anorganik); ?>
                                }, {
                                    name: 'B3',
                                    data:<?php echo json_encode($b3); ?>
                                }, {
                                    name: 'Kertas',
                                    data: <?php echo json_encode($kertas); ?>
                                }, {
                                    name: 'Residu',
                                    data: <?php echo json_encode($residu); ?>
                                }, {
                                    name: 'Lainnya',
                                    data: <?php echo json_encode($lainnya); ?>
                                }]
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="row">
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rasio Kampus A (1) dan A (2)</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="{{ route('Homeadmin') }}" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($yearsenergi as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="rasiokampusA"></div>
                        <?php
                        // Mengambil data dari tabel pengajuanenergi
                        $pengajuanenergi = DB::table('pengajuanenergi')->get();

                        // Inisialisasi variabel energi terbarukan dan energi non terbarukan
                        $energiTerbarukan = 0;
                        $energiNonTerbarukan = 0;
                        $rasio = '';

                        // Menentukan urutan bulan sesuai dengan kebutuhan Anda
                        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                        // Array untuk menyimpan data energi terbarukan, energi non terbarukan, dan rasio berdasarkan bulan
                        $dataEnergiTerbarukan = array_fill(0, count($bulan), 0);
                        $dataEnergiNonTerbarukan = array_fill(0, count($bulan), 0);
                        $dataRasio = array_fill(0, count($bulan), 0);

                        // Melakukan perhitungan energi terbarukan, energi non terbarukan, dan rasio berdasarkan bulan
                        foreach ($pengajuanenergi as $data) {
                            if ($data->kampus == 'Kampus A (1) 555 kVA' || $data->kampus == 'Kampus A (2) 1110 kVA') {
                                $tanggal = $data->tanggal;
                                $bulanIndex = intval(date('m', strtotime($tanggal))) - 1;

                                $dataEnergiTerbarukan[$bulanIndex] += $data->totalEnergiTerbarukan;
                                $dataEnergiNonTerbarukan[$bulanIndex] += $data->totalEnergiListrik;
                                $dataRasio[$bulanIndex] = floatval($data->ratio);
                            }
                        }

                        // Menghasilkan script dengan memasukkan data yang dihitung ke dalam script JavaScript
                        echo "<script>
                            Highcharts.chart('rasiokampusA', {
                            chart: {
                                zoomType: 'xy'
                            },
                            title: {
                                text: '',
                                align: 'left'
                            },
                            xAxis: [{
                                categories: " . json_encode($bulan) . ",
                                crosshair: true
                            }],
                            yAxis: [{ // Primary yAxis
                                labels: {
                                    format: '{value} R',
                                    style: {
                                        color: Highcharts.getOptions().colors[1]
                                    }
                                },
                                title: {
                                    text: 'Rasio',
                                    style: {
                                        color: Highcharts.getOptions().colors[1]
                                    }
                                }
                            }, { // Secondary yAxis
                                title: {
                                    text: 'kWh',
                                    style: {
                                        color: Highcharts.getOptions().colors[0]
                                    }
                                },
                                labels: {
                                    format: '{value} kWh',
                                    style: {
                                        color: Highcharts.getOptions().colors[0]
                                    }
                                },
                                opposite: true
                            }],
                            tooltip: {
                                shared: true
                            },
                            legend: {
                                align: 'left',
                                x: 80,
                                verticalAlign: 'bottom',
                                y: 15,
                                floating: true,
                                backgroundColor:
                                    Highcharts.defaultOptions.legend.backgroundColor || // theme
                                    'rgba(255,255,255,0.25)'
                            },
                            series: [{
                                name: 'Terbarukan',
                                type: 'column',
                                yAxis: 1,
                                data: " . json_encode($dataEnergiTerbarukan) . ",
                                tooltip: {
                                    valueSuffix: ' kWh'
                                }

                            },{
                                name: 'Non Terbarukan',
                                type: 'column',
                                yAxis: 1,
                                data: " . json_encode($dataEnergiNonTerbarukan) . ",
                                tooltip: {
                                    valueSuffix: ' kWh'
                                }

                            }, {
                                name: 'Rasio',
                                type: 'spline',
                                data: " . json_encode($dataRasio) . ",
                                tooltip: {
                                    valueSuffix: 'R'
                                }
                            }]
                        });
                        </script>";
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rasio Kampus B</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="{{ route('Homeadmin') }}" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($yearsenergi as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="rasiokampusB"></div>
                        <?php
                        // Mengambil data dari tabel pengajuanenergi
                        $pengajuanenergi = DB::table('pengajuanenergi')->get();

                        // Inisialisasi variabel energi terbarukan, energi non terbarukan, dan rasio
                        $energiTerbarukan = 0;
                        $energiNonTerbarukan = 0;
                        $rasio = '';

                        // Menentukan urutan bulan sesuai dengan kebutuhan Anda
                        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                        // Array untuk menyimpan data energi terbarukan, energi non terbarukan, dan rasio berdasarkan bulan
                        $dataEnergiTerbarukan = array_fill(0, count($bulan), 0);
                        $dataEnergiNonTerbarukan = array_fill(0, count($bulan), 0);
                        $dataRasio = array_fill(0, count($bulan), 0);

                        // Melakukan perhitungan energi terbarukan, energi non terbarukan, dan rasio berdasarkan bulan
                        foreach ($pengajuanenergi as $data) {
                            if ($data->kampus == 'Kampus B 3465 kVA') {
                                $tanggal = $data->tanggal;
                                $bulanIndex = intval(date('m', strtotime($tanggal))) - 1;

                                $dataEnergiTerbarukan[$bulanIndex] += $data->totalEnergiTerbarukan;
                                $dataEnergiNonTerbarukan[$bulanIndex] += $data->totalEnergiListrik;
                                $dataRasio[$bulanIndex] = floatval($data->ratio);

                            }
                        }

                        // Menghasilkan script dengan memasukkan data yang dihitung ke dalam skrip JavaScript
                        echo "<script>
                            Highcharts.chart('rasiokampusB', {
                            chart: {
                                zoomType: 'xy'
                            },
                            title: {
                                text: '',
                                align: 'left'
                            },
                            xAxis: [{
                                categories: " . json_encode($bulan) . ",
                                crosshair: true
                            }],
                            yAxis: [{ // Primary yAxis
                                labels: {
                                    format: '{value} R',
                                    style: {
                                        color: Highcharts.getOptions().colors[1]
                                    }
                                },
                                title: {
                                    text: 'Rasio',
                                    style: {
                                        color: Highcharts.getOptions().colors[1]
                                    }
                                }
                            }, { // Secondary yAxis
                                title: {
                                    text: 'kWh',
                                    style: {
                                        color: Highcharts.getOptions().colors[0]
                                    }
                                },
                                labels: {
                                    format: '{value} kWh',
                                    style: {
                                        color: Highcharts.getOptions().colors[0]
                                    }
                                },
                                opposite: true
                            }],
                            tooltip: {
                                shared: true
                            },
                            legend: {
                                align: 'left',
                                x: 80,
                                verticalAlign: 'bottom',
                                y: 15,
                                floating: true,
                                backgroundColor:
                                    Highcharts.defaultOptions.legend.backgroundColor || // theme
                                    'rgba(255,255,255,0.25)'
                            },
                            series: [{
                                name: 'Terbarukan',
                                type: 'column',
                                yAxis: 1,
                                data: " . json_encode($dataEnergiTerbarukan) . ",
                                tooltip: {
                                    valueSuffix: ' kWh'
                                }

                            },{
                                name: 'Non Terbarukan',
                                type: 'column',
                                yAxis: 1,
                                data: " . json_encode($dataEnergiNonTerbarukan) . ",
                                tooltip: {
                                    valueSuffix: ' kWh'
                                }

                            }, {
                                name: 'Rasio',
                                type: 'spline',
                                data: " . json_encode($dataRasio) . ",
                                tooltip: {
                                    valueSuffix: 'R'
                                }
                            }]
                        });
                        </script>";
                    ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Energi Kampus UIN Raden Fatah</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="{{ route('Homeadmin') }}" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($yearsenergi as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="EnergiKampus"></div>
                        <?php
                        // Mengambil data dari tabel pengajuanenergi
                        $pengajuanenergi = DB::table('pengajuanenergi')->get();

                        // Inisialisasi variabel energi terbarukan dan energi non terbarukan untuk Kampus A dan Kampus B
                        $energiTerbarukanA = 0;
                        $energiNonTerbarukanA = 0;
                        $energiTerbarukanB = 0;
                        $energiNonTerbarukanB = 0;

                        // Menentukan urutan bulan sesuai dengan kebutuhan Anda
                        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                        // Array untuk menyimpan data energi terbarukan dan energi non terbarukan untuk Kampus A dan Kampus B
                        $dataEnergiKampusA = array_fill(0, count($bulan), 0);
                        $dataEnergiKampusB = array_fill(0, count($bulan), 0);

                        // Melakukan perhitungan energi terbarukan dan energi non terbarukan untuk Kampus A dan Kampus B berdasarkan bulan
                        foreach ($pengajuanenergi as $data) {
                            $tanggal = $data->tanggal;
                            $bulanIndex = intval(date('m', strtotime($tanggal))) - 1;

                            if ($data->kampus == 'Kampus A (1) 555 kVA' || $data->kampus == 'Kampus A (2) 1110 kVA') {
                                $energiTerbarukanA += $data->totalEnergiTerbarukan;
                                $energiNonTerbarukanA += $data->totalEnergiListrik;

                                $dataEnergiKampusA[$bulanIndex] += $data->totalEnergiTerbarukan + $data->totalEnergiListrik;
                                
                            } elseif ($data->kampus == 'Kampus B 3465 kVA') {
                                $energiTerbarukanB += $data->totalEnergiTerbarukan;
                                $energiNonTerbarukanB += $data->totalEnergiListrik;

                                $dataEnergiKampusB[$bulanIndex] += $data->totalEnergiTerbarukan + $data->totalEnergiListrik;
                            }
                        }


                        // Menghasilkan script dengan memasukkan data yang dihitung ke dalam skrip JavaScript
                        echo "<script>
                            Highcharts.chart('EnergiKampus', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: '',
                                    align: 'left'
                                },
                                xAxis: {
                                    categories: " . json_encode($bulan) . ",
                                    crosshair: true,
                                    accessibility: {
                                        description: 'Countries'
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'kWh'
                                    }
                                },
                                tooltip: {
                                    valueSuffix: ' kWh'
                                },
                                plotOptions: {
                                    column: {
                                        pointPadding: 0.2,
                                        borderWidth: 0
                                    }
                                },
                                series: [
                                    {
                                        name: 'Kampus A',
                                        data: " . json_encode($dataEnergiKampusA) . "
                                    },
                                    {
                                        name: 'Kampus B',
                                        data: " . json_encode($dataEnergiKampusB) . "
                                    }
                                ]
                            });
                        </script>";
                            ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Energi Terbarukan dan Non Terbarukan</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="{{ route('Homeadmin') }}" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($yearsenergi as $year)
                                    <a class="dropdown-item" href="{{ route('Homeadmin', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="Energi"></div>
                        <?php
                            // Mengambil data dari tabel pengajuanenergi
                        $pengajuanenergi = DB::table('pengajuanenergi')->get();

                        // Inisialisasi variabel energi terbarukan dan energi non terbarukan untuk Kampus A dan Kampus B
                        $energiTerbarukanA = 0;
                        $energiTerbarukanB = 0;
                        $energiNonTerbarukanA = 0;
                        $energiNonTerbarukanB = 0;

                        // Menentukan urutan bulan sesuai dengan kebutuhan Anda
                        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                        // Array untuk menyimpan data energi terbarukan dan energi non terbarukan untuk Kampus A dan Kampus B
                        $dataTerbarukan = array_fill(0, count($bulan), 0);
                        $dataNonTerbarukan = array_fill(0, count($bulan), 0);

                        // Melakukan perhitungan energi terbarukan dan energi non terbarukan untuk Kampus A dan Kampus B berdasarkan bulan
                        foreach ($pengajuanenergi as $data) {
                            $tanggal = $data->tanggal;
                            $bulanIndex = intval(date('m', strtotime($tanggal))) - 1;

                            if ($data->kampus == 'Kampus A (1) 555 kVA' || $data->kampus == 'Kampus A (2) 1110 kVA') {
                                $energiTerbarukanA += $data->totalEnergiTerbarukan;
                                $energiNonTerbarukanA += $data->totalEnergiListrik;
                            } elseif ($data->kampus == 'Kampus B 3465 kVA') {
                                $energiTerbarukanB += $data->totalEnergiTerbarukan;
                                $energiNonTerbarukanB += $data->totalEnergiListrik;
                            }

                            $dataTerbarukan[$bulanIndex] = $energiTerbarukanA + $energiTerbarukanB;
                            $dataNonTerbarukan[$bulanIndex] = $energiNonTerbarukanA + $energiNonTerbarukanB;
                        }

                        // Menghasilkan script dengan memasukkan data yang dihitung ke dalam skrip JavaScript
                        echo "<script>
                            Highcharts.chart('Energi', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: '',
                                    align: 'left'
                                },
                                xAxis: {
                                    categories: " . json_encode($bulan) . ",
                                    crosshair: true,
                                    accessibility: {
                                        description: 'Countries'
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'kWh'
                                    }
                                },
                                tooltip: {
                                    valueSuffix: ' kWh'
                                },
                                plotOptions: {
                                    column: {
                                        pointPadding: 0.2,
                                        borderWidth: 0
                                    }
                                },
                                series: [
                                    {
                                        name: 'Energi Terbarukan',
                                        data: " . json_encode($dataTerbarukan) . "
                                    },
                                    {
                                        name: 'Energi Non Terbarukan',
                                        data: " . json_encode($dataNonTerbarukan) . "
                                    }
                                ]
                            });
                        </script>";
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</div>

