 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) --

        <!-- Nav Item - Alerts -->
       
        <!-- Nav Item - Messages dihapus-->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-dark" href="/" data-toggle="modal" data-target="#logoutModal" title="Logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                  </svg>
            </a>
        </li>
        
        <!-- Nav Item - Alerts-->
        {{-- <li class="nav-item dropdown no-arrow mx-1" title="Notifikasi">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{ auth()->user()->unreadNotifications->count() }}</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notifikasi
                </h6>
                @if (auth()->user()->unreadNotifications->count() > 0)
                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">{{ $notification->created_at->format('F d, Y') }}</div>
                                {!! $notification->data['message'] !!} <!-- Tampilkan pesan notifikasi -->
                            </div>
                        </a>
                    @endforeach
                @else
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div>
                            <span class="font-weight-bold">Tidak ada data yang masuk</span>
                        </div>
                    </a>
                @endif
            </div>
        </li> --}}
        
        <div class="topbar-divider d-none d-sm-block"></div>

        
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nama }}</span>
                    @if(Auth::user()->avatar)
                    <img class="img-profile rounded-circle"
                        src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}" alt="Foto Profil">
                    @else
                    <img class="img-profile rounded-circle"
                        src="{{ asset('sbadmin/img/undraw_profile.svg') }}" alt="Default Foto Profil">
                    @endif
            </a>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Klik Logout untuk keluar</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="/">Logout</a>
        </div>
    </div>
</div>
</div>