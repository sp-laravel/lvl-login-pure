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
    <form action="{{ route('login.verify') }}" method="POST" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
      @csrf
      <h2 class="text-center mb-3">Login</h2>

      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <small>
            {{ session('success') }}
          </small>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @error('invalid_credentials')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <small>
            {{ $message }}
          </small>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @enderror

      <div class="form-group mb-3">
        <label for="exampleInputEmail">Email address</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail"
          placeholder="Enter email">
        @error('email')
          <small class="text-danger mt-1">
            <strong>{{ $message }}</strong>
          </small>
        @enderror
      </div>

      <div class="form-group mb-3">
        <label for="exampleInputPassword">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
        @error('password')
          <small class="text-danger mt-1">
            <strong>{{ $message }}</strong>
          </small>
        @enderror
      </div>

      <button class="btn btn-primary btn-block w-100">Ingresar</button>

      <div class="mt-3 text-center">
        <a href="{{ route('register') }}">registrame</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>
