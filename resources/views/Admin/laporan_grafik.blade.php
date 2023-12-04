<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Data Grafik Ecogreen Campus </title>
    
    <!-- Custom styles for this template-->
    <link href="sbadmin/css/style.css" rel="stylesheet">
    <link href="sbadmin/css/tabeladmin.css" rel="stylesheet">
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

    <div class="container-fluid">
        <div class="row">
            <h6 class="m-0 font-weight-bold text-primary">Total Penanaman per Fakultas</h6>
            <div class="card-body">
                <div id="total_penanaman"></div>
            </div>
        </div>
    </div>
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
    
    <script type="text/javascript">
    document.getElementById('download-pdf-button').addEventListener('click', function () {
        const container = document.getElementById('screenshot-container');
        const chart = document.getElementById('total_penanaman');

        html2canvas(container, {
        allowTaint: true,
        useCORS: true,
        }).then(function (canvas) {
        const imageDataURL = canvas.toDataURL('image/png');

        // Simpan gambar ke dalam PDF
        const doc = new jsPDF();
        doc.addImage(imageDataURL, 'PNG', 10, 10, 190, 100); // Sesuaikan ukuran dan posisi gambar

        // Unduh PDF
        doc.save('laporan.pdf');
        });
    });
    </script>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-print/1.0.1/leaflet.print.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-print/1.0.1/leaflet.print.css"></script>
    <link rel="stylesheet" href="path/to/leaflet-easyPrint.css">
    <script src="path/to/leaflet-easyPrint.js"></script>
    <script src="/js/highcharts.js"></script>
    <script src="/js/modules/stock.js"></script>
    <script src="/js/modules/map.js"></script>
    <script type="text/javascript" src="/js/themes/gray.js"></script>
    <script src="/path/to/html2canvas.min.js"></script>

</body>
</html>