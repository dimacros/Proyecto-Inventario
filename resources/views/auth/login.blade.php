<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <!-- Page Title -->
  <meta charset="utf-8" />
  <!-- CSRF Token -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Page Title -->
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Logo -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ secure_asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ secure_asset('img/favicon.png') }}">
  <!-- Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
  <link href="{{ secure_asset('css/login.min.css') }}" rel="stylesheet" />
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{ secure_asset('img/bg-01.jpg') }});">
					<span class="login100-form-title-1">
						Iniciar Sesión
					</span>
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
					<div class="wrap-input100 validate-input m-b-26 {{$errors->has('email')?'alert-validate':''}}" 
					 data-validate="{{$errors->has('email')?$errors->first('email'):''}}">
						<span class="label-input100">Correo electrónico</span>
						<input class="input100" type="text" name="email" value="{{ old('email') }}">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18 {{$errors->has('password')?'alert-validate':''}}"
					 data-validate = "El campo password es obligatorio">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember')?'checked':'' }}>
							<label class="label-checkbox100" for="ckb1">
								Recuérdame
							</label>
						</div>

						<div>
							<a href="{{ route('password.request') }}" class="txt1">
								¿Perdiste tu contraseña?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Ingresar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>