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
				<div class="card fat">
					<div class="card-body">
						<div class="img-logo text-center">
							<img class="img-logo" width="170px" src="{{ asset('sbadmin/img/logouindanegc.png') }}" alt="...">
						</div>
						<h4 class="card-title text-center">{{ __('Verify Your Email Address') }}</h4>
						{{-- <p class="text-center">Masukkan Email dan Password</p> --}}
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Tautan verifikasi baru telah dikirimkan ke alamat email Anda.') }}
                                </div>
                            @endif
        
                            {{ __('Sebelum melanjutkan, silakan cek email Anda untuk tautan verifikasi.') }}
                            {{ __('Jika Anda tidak menerima email tersebut.') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini untuk mengirim verifikasi kembali') }}</button>.
                            </form>
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
