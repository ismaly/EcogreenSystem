 <!-- Sidebar -->
 <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar" >

    <!-- Sidebar - Brand -->
    <li>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url ('Homeadmin') }}">
            <img class="img-brand" width="100px" src="sbadmin/img/egclogo1.png" alt="..." style="margin-top:80px;">
    </a>
    </li>
        <div class="sidebar-brand d-flex align-items-center justify-content-center" style="margin-top:45px;">
            Ecogreen System</div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url ('Homeadmin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider dihapus -->

    <!-- Heading dihapus-->

    <!-- Nav Item - Pages Collapse Menu dihapus-->
    
    <!-- Nav Item - Utilities Collapse Menu dihapus -->
   
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Form Kegiatan EGC
    </div>

    <!-- Nav Item - Pages Collapse Menu dihapus -->

    <!-- Nav Item - Data Kegiatan -->
   
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('DataPohon') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tree-fill" viewBox="0 0 16 16">
                <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/>
            </svg>
            <span> Data Penanaman</span>
            {{-- @php
                $dataTanamanCount = auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataTanamanNotification')->count();
                $dataTanamanUpdateCount = auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataTanamanUpdateNotification')->count();
                $totalCount = $dataTanamanCount + $dataTanamanUpdateCount;
    
                if (request()->is('DataPohon') && $totalCount > 0) {
                    echo $totalCount;
                }
            @endphp
            <span class="badge badge-danger badge-counter">{{ $totalCount }}</span> --}}
            <span class="badge badge-danger badge-counter">
                {{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataTanamanNotification')->count() + auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataTanamanUpdateNotification')->count() }}</span>
        </a> 
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('DataEnergi') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ev-station-fill" viewBox="0 0 16 16">
                <path d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V9c0-.258-.104-.377-.357-.635l-.007-.008C13.379 8.096 13 7.71 13 7V4a.5.5 0 0 1 .146-.354l.5-.5a.5.5 0 0 1 .708 0l.5.5A.5.5 0 0 1 15 4v8.5a1.5 1.5 0 1 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm2 .5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5Zm2.631 9.96H4.14v-.893h1.403v-.505H4.14v-.855h1.49v-.54H3.485V13h2.146v-.54Zm1.316.54h.794l1.106-3.333h-.733l-.74 2.615h-.031l-.747-2.615h-.764L6.947 13Z"/>
              </svg>
            <span> Data Pemeliharaan dan Penggunaan Energi</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url ('DataSampah') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
            </svg>
            <span>Data Pengolahan Sampah</span>
            {{-- @php
                $dataSampahCount = auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataSampahNotification')->count();
                $dataSampahUpdateCount = auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataSampahUpdateNotification')->count();
                $totalCount = $dataSampahCount + $dataSampahUpdateCount;

                if (request()->is('DataSampah') && $totalCount > 0) {
                    echo $totalCount;
                }
            @endphp
            <span class="badge badge-danger badge-counter"> {{ $totalCount }}</span> --}}
            <span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataSampahNotification')->count() + auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataSampahUpdateNotification')->count() }}</span>
        </a>
    </li>
        
    {{-- @if(Auth::check())
        @if(Auth::user()->role == 'admin')  --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url ('DataUser') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
              </svg>
            <span>Data Pengguna Ecogreen System</span></a>
    </li>
        {{-- @endif
    @endif --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Tables dihapus-->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message dihapus-->
    

</ul>
<!-- End of Sidebar -->
