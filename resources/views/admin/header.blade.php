<?php
$notifications = auth()->user()->notifications()->where('read_at',NULL)->get();
use App\Models\Setting;
$setting = Setting::latest()->first();
?>

<header class="header twitter-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
    </div>

    <!--logo start-->
    <a href="/dashboard/home" class="logo" style="color:  #fff;"> 
      @if ($setting->forum_name)
      <a style="text-decoration:none; color:#fff;"href="/" class="navbar-brand">{{$setting->forum_name}}</a>
          
      @else
      <a href="/" class="navbar-brand">Dev Forum</a>
          
      @endif</span></a>
    <!--logo end-->

    {{-- <div class="nav search-row" id="top_menu">
      <!--  search form start -->
      <ul class="nav top-menu">
        <li>
          <form class="navbar-form">
            <input class="form-control" placeholder="Search" type="text">
          </form>
        </li>
      </ul>
      <!--  search form end -->
    </div> --}}

    <div class="top-nav notification-row">
      <!-- notificatoin dropdown start-->
      <ul class="nav pull-right top-menu">
       
        <!-- alert notification start-->
        <li id="alert_notificatoin_bar" class="dropdown">
          <a href="{{route('notifications')}}" >

                          <i class="icon-bell-l"></i>
                          <span class="badge bg-important">{{$notifications->count()}}</span>
                      </a>
       
        </li>
        <!-- alert notification end-->
        <!-- user login dropdown start-->
        <li class="dropdown" id="alert_profile_bar">
          <a data-toggle="dropdown" class="dropdown-toggle" >
                          <span class="profile-ava">
                              <img alt="" src="img/avatar1_small.jpg">
                          </span>
                        @if (auth()->user())
                        <span style="color:white;"class="username">{{auth()->user()->name}}</span> 
                        @endif
                          
                      </a>
          <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <li class="eborder-top">
              <a href="{{route('admin.profile')}}"><i class="icon_profile"></i> My Profile</a>
            </li>
            
          </ul>
        </li>
        <!-- user login dropdown end -->
      </ul>
      <!-- notificatoin dropdown end-->
    </div>
  </header>