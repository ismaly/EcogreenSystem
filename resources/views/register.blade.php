<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Ecogreen Campus UIN Raden Fatah Palembang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="sbadmin/css/login.css">

    <!--link icon-->
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <div class="img-logo text-center">
                                <img class="img-logo" width="170px" src="{{ asset('sbadmin/img/logouindanegc.png') }}" alt="...">
                            </div>
                            <h4 class="card-title text-center">Assalamu'alaikum</h4>
                            <p class="text-center">Silahkan isi data berikut</p>

                            @if (session('status'))
                                <div class="alert alert-success text-center">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('registeruser') }}" enctype="multipart/form-data" id="myForm" class="my-login-validation">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control rounded-top @error('nama') is-invalid @enderror" placeholder="" required value="{{ old('nama') }}" autofocus>
                                    @error('nama')
                                        <div class="invalid-feedback text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM/NIP/NIDN</label>
                                    <input type="text" id="nim" name="nim" class="form-control rounded-top @error('nim') is-invalid @enderror" placeholder="" required value="{{ old('nim') }}" autofocus>
                                    @error('nim')
                                        <div class="invalid-feedback text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nohp">Nomor HP</label>
                                    <input type="number" id="nohp" name="nohp"  class="form-control rounded-top @error('nohp') is-invalid @enderror" placeholder="" required value="{{ old('nohp') }}" autofocus>
                                    @error('nohp')
                                        <div class="invalid-feedback text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <div>
                                        <select class="form-control rounded-top @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" autofocus>
                                            <option value="">Pilih pekerjaan</option>
                                            <option value="Dosen" {{ old('pekerjaan') == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                            <option value="Staff" {{ old('pekerjaan') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                            <option value="Mahasiswa" {{ old('pekerjaan') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                        </select>
                                    </div>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fakultas">Fakultas</label>
                                    <div>
                                        <select class="form-control rounded-top @error('fakultas') is-invalid @enderror" id="fakultas" name="fakultas" autofocus>
                                            <option value="">Pilih Fakultas</option>
                                            <option value="Ilkom" {{ old('fakultas') == 'Ilkom' ? 'selected' : '' }}>Ilmu Sosial dan Ilmu Politik</option>
                                            <option value="Tarbiyah" {{ old('fakultas') == 'Tarbiyah' ? 'selected' : '' }}>Ilmu Tarbiyah dan Keguruan</option>
                                            <option value="Ushuluddin" {{ old('fakultas') == 'Ushuluddin' ? 'selected' : '' }}>Ushuluddin dan Pemikiran Islam</option>
                                            <option value="Saintek" {{ old('fakultas') == 'Saintek' ? 'selected' : '' }}>Sains dan Teknologi</option>
                                            <option value="Febi" {{ old('fakultas') == 'Febi' ? 'selected' : '' }}>Ekonomi dan Bisnis Islam</option>
                                            <option value="Syariah" {{ old('fakultas') == 'Syariah' ? 'selected' : '' }}>Syariah dan Hukum</option>
                                            <option value="Dakwah" {{ old('fakultas') == 'Dakwah' ? 'selected' : '' }}>Dakwah dan Komunikasi</option>
                                            <option value="Adab" {{ old('fakultas') == 'Adab' ? 'selected' : '' }}>Adab dan Humaniora</option>
                                            <option value="Psikologi" {{ old('fakultas') == 'Psikologi' ? 'selected' : '' }}>Psikologi</option>
                                            <option value="PascaSarjana" {{ old('fakultas') == 'PascaSarjana' ? 'selected' : '' }}>Pasca Sarjana</option>
                                            <option value="Lainnya" {{ old('lainnya') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                    @error('fakultas')
                                        <div class="invalid-feedback text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control rounded-top @error('email') is-invalid @enderror" name="email" type="" placeholder="Gunakan email UIN Raden Fatah" required value="{{ old('email') }}" autofocus>
                                    @error('email')
                                        <div class="invalid-feedback text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control rounded-top @error('password') is-invalid @enderror" name="password" placeholder="Password Min 5" required autofocus>
                                    @error('password')
                                        <div class="invalid-feedback text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="/">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer text-center">
                        Copyright &copy; 2023 &mdash; UIN Raden Fatah Palembang
                    </div>
                </div>
            </div>
        </div>
    </section>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="sbadmin/js/my-login.js"></script>
</body>
</html>

