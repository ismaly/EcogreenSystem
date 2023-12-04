 <!-- Sidebar -->
 <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar" >

    <!-- Sidebar - Brand -->
    <li>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url ('Home') }}">
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
        <a class="nav-link" href="{{ url ('Home') }}">
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
    <!-- Bagian "Penanaman" -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('pengajuanpohon') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tree-fill" viewBox="0 0 16 16">
                <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/>
            </svg>
            <span>Pengajuan Penanaman</span>
            <span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataTanamanUpdateNotification')->count() }}</span>
        </a>
    </li>
    

    <!-- Bagian "Pengolahan Sampah" -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('pengajuansampah') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
            </svg>
            <span>Pengajuan Pengolahan Sampah</span>
            <span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\DataSampahUpdateNotification')->count() }}</span>
        </a>
    </li>




    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('profile') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
            </svg>
            <span>Edit Profile</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
  

    <!-- Nav Item - Pages Collapse Menu dihapus -->

    <!-- Nav Item - Data Kegiatan -->

    <!-- Nav Item - Tables dihapus-->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message dihapus-->
    

</ul>
<!-- End of Sidebar -->