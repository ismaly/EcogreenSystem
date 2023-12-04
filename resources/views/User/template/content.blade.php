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

        <!-- Penanaman -->
        <div class="row">
            <!-- Peta Sebaran -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
                                    <a class="dropdown-item" href="{{ route('Home', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="map" style="height: 400px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Total Penanaman per Fakultas</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Home', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="total_penanaman"></div>
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
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Home', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div id="jenis_sampah" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sampah Terkumpul per Fakultas</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Home', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sampahfakultas"></div>
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
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Home', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="rasiokampusA"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rasio Kampus B</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Home', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="rasiokampusB"></div>
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
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Home', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="EnergiKampus"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grafik Energi Terbarukan dan Non Terbarukan</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Pilih Tahun</div>
                                @foreach ($years as $year)
                                    <a class="dropdown-item" href="{{ route('Home', ['year' => $year]) }}">{{ $year }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="Energi"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
