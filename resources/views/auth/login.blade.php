<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

   <!-- Bootstrap CSS -->
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- CSS Login-->
  <link href="/css/style.css" rel="stylesheet">
</head>

<body class="form-login">
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="container mt-5">
        <h1 class="h3 mb-3 fw-normal text-center text-danger"><strong>Masuk</strong></h1>
        @if (session('statusLogin'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ session('statusLogin') }}</strong>
        </div> 
		@elseif(session('statusLogout'))
		<div class="alert alert-success" role="alert">
			<strong>{{ session('statusLogout') }}</strong>
		</div> 
        @elseif(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
        @endif

        <!-- Form Login -->
        <form action="{{ url('auth/login') }}" method="post" class="mt-4">
        @csrf
        <div class="form-group">
        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">E-mail</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <button type="submit" class="w-100 btn btn-lg btn-danger">Log In</button>
        </form>
        <!-- <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</small> -->
            <hr>
            <span>belum punya akun? </span><a class="font-weight-bold text-danger" href="{{ url('register') }}"><strong> Daftar Sekarang</strong></a>
    </div>  
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(".alert").delay(4000).slideUp(500, function() {
            $(this).alert('close');
        });
    </script>
</body>
</html>