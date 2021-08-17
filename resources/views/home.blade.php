
@extends('layouts.app')
@section('content')
          <!--main content start-->
          
          @if(auth()->user())          
          


          
      
          <!-- page start-->
        




          


<body>
    <div class="container-fluid">
        <!-- First section -->
     
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (auth()->user()->image)
                                        <img src="{{asset('storage/profile/'.auth()->user()->image)}}" width="200" height="200"class="rounded-circle"  /> 
                                    @else
                                        <img src="{{asset('/images/profile.jpeg')}}" class="profile-user-img img-fluid img-circle"  /> 
                                        
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                                <p class="text-muted text-center">
                                    @if(auth()->user() && auth()->id()== auth()->user()->id  || auth()->user()->is_admin)
                                    
                                    {{auth()->user()->email}}
                                @endif
                                </p>
                                @if(auth()->user() && auth()->id()== auth()->user()->id  || auth()->user()->is_admin)
                                    
                                <li class="list-group-item">
                                    <form action = "{{route('user.photo.update',auth()->id())}}" method = "POST" enctype="multipart/form-data">
                                       @csrf
                                        <input type="file" class="form-control" name="profile_image">
                                        <input type="submit" class="form-control" value="Upload Photo">

                                    </form>
                                </li>
                                @endif

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Topics count</b> <a class="float-right">{{count(auth()->user()->topics)}}</a>
                                    </li>
                                    {{-- <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li> --}}
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    {{auth()->user()->education}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">{{auth()->user()->country}}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    {{auth()->user()->skills}}
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Bio</strong>

                                <p class="text-muted">{{auth()->user()->bio}}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->






                    <div class="col-md-9">






                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">










                                        <!-- Post -->
                                        @if($latest_user_post)
                                        <div class="post">
                                          <div class="user-block">
                                               @if (auth()->user()->image)
                      <div class="image mr-3"> <img src="{{asset('storage/profile/'.auth()->user()->image)}}" class="rounded-circle" height="50"width="50" /> </div>
                      @else
                      <div class="image mr-3"> <img src="{{asset('/images/profile.jpeg')}}" class="rounded-circle" height="50" width="50" /> </div>
                          
                      @endif
                                
                                             
                                              <span class="username">
                                                  <a href="#">{{auth()->user()->name}}</a>
                                                  <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                              </span>
                                              <span class="description">Started discussion  {{$latest->created_at->diffForHumans}}</span>
                                          </div>
                                          <!-- /.user-block -->
                                          @if ($latest_user_post)

                                          <p>
                                              {{$latest_user_post->desc}}
                                           </p>
                                            
                                                  
                                              @else
                                                  
                                              <p>U have no started any discussion yet</p>
                                          @endif

                                          <p>
                                              <a href="#" class="link-black text-sm mr-2"><i class="fas fa-eye mr-1"></i> {{$latest_user_post->views}}</a>
                                              <a href="#" class="link-black text-sm"><i class="far fa-arrow-down mr-1"></i> {{count($latest_user_post->replies)}}</a>
                                              <span class="float-right">
                                                
                                                  @if(auth()->user() && auth()->id()== auth()->user()->id  || auth()->user()->is_admin)
                                                  <a href="{{route('topic.delete', $latest_user_post->id)}}" class="link-black text-sm"><i class="fas fa-trash text-danger"></i></a>
                                                  @endif
                                                
                                               
                                              </span>
                                          </p>
                                          <br><br>
                                      </div>
                                      @else 
                                      <h3>You have no started any topic</h3>
                                        @endif
                                        
                                        <!-- /.post -->




                                        <!-- Post -->
                                        {{-- <div class="post clearfix">
                                            <div class="user-block">
                                    <img class="profile-user-img img-fluid img-circle" height="50" width="50" src="{{asset('images/profile.jpeg')}}" alt="User profile picture">
                                                
                                                <span class="username">
                                                    <a href="#">{{$latest->user->name}}</a>
                                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Started a discussion {{$latest->created_at}}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            @if ($latest)

                                            <p>
                                                {!!$latest->desc!!}
                                             </p>
                                              
                                                    
                                                @else
                                                    
                                                <p>There no discussions yet</p>
                                            @endif

                                          
                                        </div>
                                        <!-- /.post -->
--}}

                                    </div> 










                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">


                                    </div>
                                    <!-- /.tab-pane -->
                                    @if(auth()->id() == auth()->user()->id || auth()->user()->is_admin) 
                                    <div class="tab-pane" id="settings">


                                        <form class="form-horizontal" action="{{route('user.update', auth()->user()->id)}}" method ="POST">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail" value="{{auth()->user()->name}}"placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail" value="{{auth()->user()->email}}" placeholder="Email">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label" >Phone</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{auth()->user()->phone}}" name="phone" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label" >Education</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{auth()->user()->education}}" name="education" placeholder="Phone">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label" >Skills</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{auth()->user()->skills}}" name="skills" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label" >Your bio</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{auth()->user()->bio}}" name="bio" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label" >Proffesion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{auth()->user()->proffesion}}" name="proffesion" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label" >Country</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{auth()->user()->country}}" name="country" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label" >Addres</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="{{auth()->user()->address}}" name="address" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Update Details</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->

     
      <!--main content end-->
      @endif

     
@endsection