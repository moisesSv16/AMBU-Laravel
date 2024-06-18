<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <title>Alquimaq</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')
    <!-- Bootstrap CSS
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iK+eaW/mJPIlPt7bI0f7gFOE3iiFpm" crossorigin="anonymous">
     <style>
        body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background: linear-gradient(to bottom, #424949, #B3B6B7, #D0D3D4, #FDFEFE);
      font-family: Figtree, sans-serif;
      font-feature-settings: normal;
      line-height: 1.5;
      background-attachment: fixed;
    }
    nav{
      background-image: linear-gradient(to right, #424949, #424949);
      :  #FDFEFE;
    }
    .nav-link{
      color: white;
    }
    .navbar-brand{
      color: white;
    }
     </style>
    <title></title>
  </head>
  <body>

    <div class="container">
        @yield('contenido')
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    @yield('js')
  </body>
</html>