<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <div class="container d-flex">
    <div class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
      <h3 class="text-uppercase text-center">Welcome Dashboard</h3>
      <form method="POST" action="{{ route('signOut') }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-block w-100">Cerrar Session</button>
      </form>
    </div>
  </div>

</body>

</html>
