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
						<h4 class="card-title text-center">Assalamu'alaikum, Login please!</h4>
						<p class="text-center">Masukkan Email dan Password</p>
		
						{{-- @if (session('success'))
							@if (session('status') == 'wrong_password')
								<div class="alert alert-danger text-center">
									Password yang Anda masukkan salah.
								</div>
							@elseif (session('status') == 'email_not_found')
								<div class="alert alert-danger text-center">
									Email belum terdaftar. Silahkan buat akun.
								</div>
							@endif
						@endif --}}

						@if (session('success'))
							<div class="alert alert-success text-center">
								{{ session('success') }}
							</div>
						@elseif (session('status') == 'wrong_password')
							<div class="alert alert-danger text-center">
								Password yang Anda masukkan salah.
							</div>
						@elseif (session('status') == 'email_not_found')
							<div class="alert alert-danger text-center">
								Email belum terdaftar. Silahkan buat akun.
							</div>
						@endif

		
						<form method="POST" class="my-login-validation" novalidate="" action="{{ route('loginproses') }}">
							@csrf
							<div class="form-group">
								<label for="email">Email</label>
								<input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" type="" placeholder="" required value="{{ old('email') }}" autofocus>
								@error('email')
									<div class="invalid-feedback text-center">
										{{ $message }}
									</div>
								@enderror
							</div>
		
							<div class="form-group">
								<label for="password">Password</label>
								<input id="password" type="password" class="form-control" name="password" required autofocus>
								<div class="invalid-feedback text-center">
									Password is required
								</div>
							</div>
		
							<div class="form-group m-0">
								<button type="submit" class="btn btn-primary btn-block">
									Login
								</button>
							</div>
							<div class="mt-4 text-center">
								<a href="/register">Buat akun</a>
							</div>
						</form>
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

<!--<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ecogreen Campus UIN Raden Fatah Palembang</title>
  <link rel="stylesheet" href="sbadmin/css/login.css">
   <!-- Font Awesome Cdn Link 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!--link icon 
    <link rel="icon" type="sbadmin/img/egclogo1.png" sizes="16x16" href="sbadmin/img/egclogo1.png">
</head>
<body class="bg-img">
  <div class="wrapper">
    <div><img class="img-logo" width="170px" src="{{ asset('sbadmin/img/logouindanegc.png') }}" alt="..."></div>
    <h1>Assalamu'alaikum, Login please!</h1>
    <p>Masukkan NIM dan password</p>
    <form>
      <input type="text" placeholder="NIM">
      <input type="password" placeholder="Password">
    <closeform>
    </closeform>
  </form>
    <button type="submit" class="btn btn-primary" href="/Home"> <a href="/Home"> Login </a></button>
  </div>
</body>
</html>-->

