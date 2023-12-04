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
            @include('User.template.content')
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

    <!-- Page level plugins -->
    <script src="sbadmin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="sbadmin/js/demo/chart-area-demo.js"></script>
    <script src="sbadmin/js/demo/chart-pie-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <!-- Include Bootstrap JavaScript library -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JavaScript library -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Include Bootstrap Tooltip library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/tooltipster.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Add custom JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        markersData.forEach(function(markerData) {
            var marker = L.marker([markerData.latitude, markerData.longitude]).addTo(map);
            marker.bindPopup('Nama: ' + markerData.nama + '<br>NIM: ' + markerData.nim  + '<br>Pekerjaan: ' + markerData.pekerjaan +  '<br>Fakultas: ' + markerData.fakultas + '<br>Jenis Tanaman: ' + markerData.jenistanaman + '<br>Latitude: ' + markerData.latitude + '<br>Longitude: ' + markerData.longitude);
        });
    </script>


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


    <script src="/js/highcharts.js"></script>
    <script src="/js/modules/stock.js"></script>
    <script src="/js/modules/map.js"></script>
    <script type="text/javascript" src="/js/themes/gray.js"></script>
        
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


</body>

</html>