<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @vite(["resources/css/app.css", "resources/js/app.js"])
    @yield('vite')
  <title>EKVK</title>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
          <ul class="nav navbar-nav navbar-left">
          <li class="active"><a href="{{route('welcome')}}">Home</a></li>
            <li class="active"><a href="{{route('aboutUs')}}">Rólunk</a></li>
            <li class="active"><a href="{{route('download')}}">Letöltés</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Regisztáció</a></li>
            <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Bejelentkezés</a></li>
          </ul>
        </div>
      </nav>

  <main>
    @yield('content')
  </main>

</body>
</html>

