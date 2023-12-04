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
    <link href="sbadmin/css/tabel.css" rel="stylesheet">
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!--link icon-->
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">
   
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

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengajuan Pengolahan Sampah</h6>
                </div>
               <div class="card-body">
                    <div class="table-responsive">
                        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                
                        @elseif ($errors->any())
                            <div class="alert alert-danger mt-4">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                            </div>
                        @endif 
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><b> No </b></th>
                                    <th><b> Nama </b></th>
                                    <th><b>Jenis Sampah</b></th>
                                    <th><b>Total (KG)</b></th>
                                    <th><b>Bukti pengumpulan sampah</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Keterangan</b></th>
                                    <th width="14%"><b>Aksi</b></th>
                                </tr>
                            </thead>
                                <tbody>
                                    @php
                                    $no = 1;   
                                    @endphp

                                    @foreach ($datasampahuser as $data)
                                    @if ($data->user_id == auth()->user()->id)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->jenis_sampah}}</td>
                                        <td>{{ $data->total}}</td>
                                        <td>
                                            @if ($data->formFile)
                                            <img src="{{ asset('storage/images/' . $data->formFile) }}" alt="" style="width: 150px;">
                                            @else
                                                Tidak ada gambar
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $statusClass = '';
                                                $statusText = '';
                                            
                                                switch($data->status) {
                                                    case 'Diterima':
                                                        $statusClass = 'bg-success';
                                                        $statusText = 'Diterima';
                                                        break;
                                                    case 'Ditolak':
                                                        $statusClass = 'bg-danger';
                                                        $statusText = 'Ditolak';
                                                        break;
                                                    default:
                                                        $statusClass = 'bg-primary';
                                                        $statusText = 'Belum Aktif';
                                                        break;
                                                }
                                            @endphp
                                        
                                            <span class="badge text-white {{ $statusClass }}">
                                                {{ $statusText }}
                                            </span>
                                        
                                        </td>
                                        
                                        <td>{{ $data->keterangan }}</td>
                                        <td width="15%">
                                            <a href="#" class="btn btn-sm btn-primary view" onclick="functiondetailid({{$data->id}})" title="View" data-toggle="modal" data-target="#detailModal{{ $data->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                </svg>
                                            </a>

                                            <div class="modal fade" id="detailModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $data->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel{{ $data->id }}">Detail</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Nama : {{ $data->nama }}</p>
                                                        <p>Nim : {{ $data->nim }}</p>
                                                        <p>No HP : {{ $data->nohp }}</p>
                                                        <p>Pekerjaan : {{ $data->pekerjaan }}</p>
                                                        <p>Fakultas : {{ $data->getFakultasLabelAttribute() }}</p>
                                                        <p>Jenis Sampah : {{ $data->jenis_sampah }}</p>
                                                        <p>Total : {{ $data->total }} (Kg)</p>
                                                        <p>Bukti Pegumpulan Sampah : 
                                                            @if ($data->formFile)
                                                            <img src="{{ asset('storage/images/' . $data->formFile) }}" alt="" style="width: 350px;">
                                                            @else
                                                                Tidak ada gambar
                                                            @endif
                                                        </p>
                                                        {{-- <p>Created: {{ $data->created_at }}</p> --}}
                                                        <p>Dibuat : {{ Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>
                                                        <p>Diperbarui : {{ Carbon\Carbon::parse($data->updated_at)->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm:ss') }}</p>
                                                        <p>Keterangan : {{ $data->keterangan }}</p>
                                                        <p>Status : {{ $data->status }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        @if ($data->status === 'Diterima')
                                                        <a href={{ route('printsampah.report', ['id' => $data->id]) }} onclick="" target="_blank" class="btn btn-primary" title="Cetak" data-toggle="tooltip">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                              </svg>
                                                        </a>  
                                                        @endif
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @if ($data->status == 'Ditolak')
                                            <button class="btn btn-sm btn-warning" onclick="functionid({{$data->id}})" title="Edit" data-toggle="modal" data-target="#editModal{{ $data->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                            </button>

                                             <!-- Modal Edit -->
                                             <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Data Pengajuan Sampah</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form Edit Data -->
                                                            <form action="{{ route('pengajuansampahUpdate', $data->id) }}" method="POST" enctype="multipart/form-data" id="editForm">
                                                                @csrf
                                                                @method('PUT')
                                                                <!-- Tambahkan input dan field yang sesuai dengan data yang ingin diedit -->
                                                                <div class="form-group">
                                                                    <label for="nama">Nama</label>
                                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" readonly>
                                                                </div>
                                            
                                                                <div class="form-group">
                                                                    <label for="nim">NIM/NIP/NIDN</label>
                                                                    <input type="text" class="form-control" id="nim" name="nim" value="{{ $data->nim }}" readonly>
                                                                </div>
                                            
                                                                <div class="form-group">
                                                                    <label for="nohp">Nomor HP</label>
                                                                    <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $data->nohp }}" readonly>
                                                                </div>
                                            
                                                                <div class="form-group {{ $errors->has('pekerjaan') ? 'has-error' : '' }}">
                                                                    <label for="pekerjaan">Pekerjaan</label>
                                                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="" value="{{ $data -> pekerjaan }}" readonly>
                                                                    <span class="error" id="error-nim">{{ $errors->first('pekerjaan') }}</span>
                                                                </div>
                                                
                                                                <div class="form-group {{ $errors->has('fakultas') ? 'has-error' : '' }}">
                                                                    <label for="fakultas" >Fakultas</label>
                                                                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="" value="{{ $data -> fakultas }}" readonly>
                                                                    <span class="error" id="error-nim">{{ $errors->first('fakultas') }}</span>
                                                                </div>
                                            
                                                                <div class="form-group">
                                                                    <label for="jenis_sampah">Jenis Sampah</label>
                                                                    <select class="form-control" id="jenis_sampah" name="jenis_sampah">
                                                                        <option value="Sampah Organik" {{ $data->jenis_sampah == 'Sampah Organik' ? 'selected' : '' }}>Sampah Organik</option>
                                                                        <option value="Sampah Anorganik " {{ $data->jenis_sampah == 'Sampah Anorganik ' ? 'selected' : '' }}>Sampah Anorganik </option>
                                                                        <option value="Sampah Bahan Berbahaya dan Beracun (B3)" {{ $data->jenis_sampah == 'Sampah Bahan Berbahaya dan Beracun (B3)' ? 'selected' : '' }}>Sampah Bahan Berbahaya dan Beracun (B3)</option>
                                                                        <option value="Sampah Kertas" {{ $data->jenis_sampah == 'Sampah Kertas' ? 'selected' : '' }}>Sampah Kertas</option>
                                                                        <option value="Sampah Residu" {{ $data->jenis_sampah == 'Sampah Residu' ? 'selected' : '' }}>Sampah Residu</option>
                                                                        <option value="lainnya" {{ $data->jenis_sampah == 'lainnya' ? 'selected' : '' }}>Lain-lain</option>
                                                                    </select>
                                                                </div>
                                            
                                                                <div class="form-group">
                                                                    <label for="total">Total (KG)</label>
                                                                    <input type="number" class="form-control" id="total" name="total" value="{{ $data->total }}">
                                                                </div>
                                            
                                                                <div class="form-group">
                                                                    <label for="formFile" class="form-label">Bukti Pengumpulan Sampah</label>
                                                                    <p class="mb-0 small">Pengumpulan sampah dilakukan di bank sampah UIN Raden Fatah Palembang!</p>
                                                                    <input class="form-control" type="file" id="formFile" name="formFile">
                                                                </div>
                                                                    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="button" class="btn btn-primary" id="confirmEdit">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="{{ route('pengajuansampahdelete', ['id' => $data->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete" data-toggle="tooltip" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            @endif
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
   
    {{-- modal tambah data --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Form Pengajuan Sampah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form di sini -->
                    <form method="POST" action="pengajuansampahinsert" enctype="multipart/form-data" id="myForm"> <!--encytype:buat nambah data foto-->
                        @csrf
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{ old('nama', Auth::user()->nama) }}" readonly>
                            <span class="error" id="error-nama">{{ $errors->first('nama') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('nim') ? 'has-error' : '' }}">
                            <label for="nim">NIM/NIP/NIDN</label>
                            <input type="number" class="form-control" id="nim" name="nim" placeholder="" value="{{ old('nim', Auth::user()->nim) }}" readonly>
                            <span class="error" id="error-nim">{{ $errors->first('nim') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('nohp') ? 'has-error' : '' }}">
                            <label for="nohp">Nomor HP</label>
                            <input type="number" class="form-control" id="nohp" name="nohp" placeholder="" value="{{ old('nohp', Auth::user()->nohp) }}" readonly>
                            <span class="error" id="error-nohp">{{ $errors->first('nohp') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('pekerjaan') ? 'has-error' : '' }}">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="" value="{{ old('pekerjaan', Auth::user()->pekerjaan) }}" readonly>
                            <span class="error" id="error-nim">{{ $errors->first('pekerjaan') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('fakultas') ? 'has-error' : '' }}">
                            <label for="fakultas">Fakultas</label>
                            <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="" value="{{ old('fakultas', Auth::user()->fakultas) }}" readonly>
                            <span class="error" id="error-nim">{{ $errors->first('fakultas') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('jenis_sampah') ? 'has-error' : '' }}">
                            <label for="jenis_sampah">Jenis Sampah</label>
                            <div>
                                <select class="form-control" id="jenis_sampah" name="jenis_sampah">
                                    <option selected>Pilih Jenis Sampah</option>
                                    <option value="Sampah Organik {{ old('jenis_sampah') == 'Sampah Organik' ? 'selected' : '' }}">Sampah Organik</option>
                                    <option value="Sampah Anorganik  {{ old('jenis_sampah') == 'Sampah Anorganik ' ? 'selected' : '' }}">Sampah Anorganik </option>
                                    <option value="Sampah Bahan Berbahaya dan Beracun (B3) {{ old('jenis_sampah') == 'Sampah Bahan Berbahaya dan Beracun (B3)' ? 'selected' : '' }}">Sampah Bahan Berbahaya dan Beracun (B3)</option>
                                    <option value="Sampah Kertas  {{ old('jenis_sampah') == 'Sampah Kertas ' ? 'selected' : '' }}">Sampah Kertas </option>
                                    <option value="Sampah Residu {{ old('jenis_sampah') == 'Sampah Residu' ? 'selected' : '' }}">Sampah Residu</option>
                                    <option value="lainnya {{ old('jenis_sampah') == 'lainnya' ? 'selected' : '' }}">Lain-lain</option>
                                </select>
                            </div>
                            @if ($errors->has('jenis_sampah'))
                                <span class="error" id="error-jenis_sampah">{{ $errors->first('jenis_sampah') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="form-group {{ $errors->has('total') ? 'has-error' : '' }}">
                                <label for="total"> Total (KG) </label>
                                <input type="number" class="form-control" id="total" name="total" placeholder="">
                                <span class="error" id="error-total">{{ $errors->first('total') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('formFile') ? 'has-error' : '' }}">
                            <label for="formFile" class="form-label">Bukti Pengumpulan Sampah</label>
                            <p class="mb-0 small">Pengumpulan sampah dilakukan di bank sampah UIN Raden Fatah Palembang! Upload foto format jpeg,jpg,png max 2 MB</p>
                            <input class="form-control" type="file" id="formFile" name="formFile">
                            @if ($errors->has('formFile'))
                                <span class="error" id="error-formFile">{{ $errors->first('formFile') }}</span>
                            @endif
                        </div>
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
                    
                        @if(session('success'))
                        <div class="alert alert-success mt-4">
                            {{ session('success') }}
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>    

    <script>
        function submitForm() {
            // Validasi formulir di sini
    
            // Dapatkan nilai input dari formulir
            var name = $('#name').val();
            var nim = $('#nim').val();
            var nohp = $('#nohp').val();
            var pekerjaan = $('#pekerjaan').val();
            var fakultas = $('#fakultas').val();
            var jenis_sampah = $('#jenistanaman').val();
            var total = $('#latitude').val();
    
            // Reset pesan kesalahan sebelumnya
            $('.error').text('');
    
            // Validasi setiap input
            var isValid = true;
    
            if (name.trim() === '') {
                isValid = false;
                $('#error-name').text('Nama harus diisi');
            }
    
            if (nim.trim() === '') {
                isValid = false;
                $('#error-nim').text('NIM/NIP/NIDN harus diisi');
            }
    
            if (nohp.trim() === '') {
                isValid = false;
                $('#error-nohp').text('Nomor HP harus diisi');
            }
    
            if (pekerjaan === 'Pilih pekerjaan') {
                isValid = false;
                $('#error-pekerjaan').text('Pekerjaan harus dipilih');
            }
    
            if (fakultas === 'Pilih Fakultas') {
                isValid = false;
                $('#error-fakultas').text('Fakultas harus dipilih');
            }
    
            if (jenis_sampah.trim() === '') {
                isValid = false;
                $('#error-jenis_sampah').text('Jenis sampah harus diisi');
            }
    
            if (total.trim() === '') {
                isValid = false;
                $('#error-total').text('Total harus diisi');
            } else if (isNaN(total)) {
                isValid = false;
                $('#error-total').text('Total sampah harus berupa angka');
            }
    
            // Jika formulir tidak valid, hentikan pengiriman
            if (!isValid) {
                return;
            }
    
            // Kirimkan formulir
            $('#myForm').submit();
        }
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const confirmEditButton = document.getElementById('confirmEdit');
            const editForm = document.getElementById('editForm');

            confirmEditButton.addEventListener('click', function () {
                if (confirm('Apakah Anda yakin ingin menyimpan perubahan ini?')) {
                    // Submit formulir jika dikonfirmasi
                    editForm.submit();
                    confirmEditButton.setAttribute('disabled', 'true');
                }
            });
        });
    </script>

</body>
</html>