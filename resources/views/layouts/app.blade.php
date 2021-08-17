<?php 
use App\Models\Setting;
$setting = Setting::latest()->first();
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @toastr_css
</head>
<body>
  <style>

.container-fluid {
    padding-right:0;
    padding-left:0;
    margin-right:auto;
    margin-left:auto
 }
  </style>
<div class="container-fluid ">
      <!-- First section -->
      <nav class="navbar navbar-dark bg-dark">
        <div class="container">
          <h1>
            @if ($setting->forum_name)
            <a href="/" class="navbar-brand">{{$setting->forum_name}}</a>
                
            @else
            <a href="/" class="navbar-brand">Dev Forum</a>
                
            @endif
          </h1>
          <form action="{{route('category.search')}}" method="POST" class="form-inline mr-3 mb-2 mb-sm-0">
            @csrf
            <input type="text" class="form-control" name="keyword" placeholder="search" />
            <button type="submit" class="btn btn-success">Search Forum</button>
          </form>
          @guest
          
          @if (Route::has('login'))
              <li style="list-style:none; class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li style="list-style:none;"class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
      @if(auth()->user()->is_admin)
         <li style="list-style: none;"> <a href="/dashboard/home"><button type="button" class="btn btn-dark">Admin Panel</button></a></li>
        @endif
          <li style="list-style: none; class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
  </ul>
</div>
</div>
       

      <!-- first section end -->
    </div>
    <div class="container">
      <nav class="breadcrumb">
        <a href="#" class="breadcrumb-item active"> Dashboard</a>
      </nav>

      @yield('content')
             
       
    </div> 
 
    <div  class="container-fluid mt-2">
      <footer class="small bg-dark text-white">
        <div class="container py-4 " >
          <ul class="list-inline mb-0 text-center">
            <li class="list-inline-item">
              &copy; 2021 Nikola Markovic forum
            </li>
            <li class="list-inline-item">All rights reserved</li>
            <li class="list-inline-item">Terms and privacy policy</li>
          </ul>
        </div>
      </footer>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
    @jquery
    @toastr_js
    @toastr_render
</html>
