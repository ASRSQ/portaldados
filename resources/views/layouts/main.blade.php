<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .sidebar {
      position: fixed;
      left: 0;
      top: 0;
      height: 100%;
      width: 250px;
      background-color: #0d6efd;
      color: #fff;
      padding: 20px;
    }

    .sidebar h5 {
      margin-top: 0;
      font-size: 1.25rem;
    }

    .sidebar a {
      color: #fff;
    }

    .sidebar a:hover {
      color: #fff;
      text-decoration: none;
    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light d-lg-none">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <div class="sidebar d-none d-lg-block">
    <h5>Menu</h5>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">Carros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/relacionamentos') }}">Relacionamentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dados') }}">Dados</a>
      </li>
    </ul>
  </div>
  <div class="main-content">
    <h1>@yield('title')</h1>
    <hr>
    @yield('content')
  </div>
  <!-- Optional JavaScript -->
  <!-- Popper.js first, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist
</body>
</html>
  