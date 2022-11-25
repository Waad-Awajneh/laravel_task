


@if(session('success'))
    <h1>{{session('success')}}</h1>
@endif


{{-- <!DOCTYPE html>
<html>
<head>
<title>Custom Auth in Laravel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
<div class="container">
<a class="navbar-brand mr-auto" href="#">PositronX</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav"> --}}

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Books</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      />
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap" rel="stylesheet">
    <style>
    h2 {
        font-size: 26px;
        text-align: center;
        color: white;
        margin-bottom: 30px;
    }
    
    
    header{
        background-color:black;
        display: flex;
        justify-content: center;
        color: black;
    }
    
    
    header #header-menu{
        list-style: none;
        padding: 10%;
        display: flex;
        gap: 30%;
    }
    
    
    header #header-menu li > a{
        text-decoration: none;
        color: white;
        transition: all 1s;
    }
    
    
    
    
    footer{
        background-color:black;
        display: flex;
        justify-content: center;
    }
    
    footer #social{
        list-style: none;
        padding: 1.5%;
        display: flex;
        gap: 10%;
    
    }
    
    footer #social li > a{
        text-decoration: none;
        color: #000000;
    }
    
    
    
    p {
        margin: 0;
        padding: 0;
        font-size: 20px;
    }</style>
    </head>
    <body>
    
        <header>
            <nav
              class="navbar navbar-expand-sm navbar-light"
              style="background-color: #fff"
            >
              <div class="container">
                <a href="/add"  class="btn btn-success p-2" style="margin-left: 4%;margin-top:2%">Add New Book</a>
                <a href="/log"  class="btn btn-success p-2" style="margin-left: 4%;margin-top:2%">logout</a>

                <button
                  class="navbar-toggler d-lg-none"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapsibleNavId"
                  aria-controls="collapsibleNavId"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
            
                </div>
              </div>
            </nav>
          </header>


<ul class="navbar-nav">
@guest
<li class="nav-item">
<a class="nav-link" href="{{ route('login') }}">Login</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('register-user') }}">Register</a>
</li>
@else
<li class="nav-item">
<a class="nav-link" href="{{ route('signout') }}">Logout</a>
</li>
@endguest
</ul>
</div>
</div>
</nav>
@yield('content')
</body>
</html>