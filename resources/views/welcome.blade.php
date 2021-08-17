@extends('layouts.app')

@section('content')
<style>
  .table1 {
  table-layout: fixed ;
  width: 100% ;
}
</style>
<div class="row">
        <div class="col-lg-8">
          <div class="row">
            @if (count($categories)>0)
            {{-- Categories listing start --}}
              @foreach($categories as $category)
                <div class="col-lg-12">
                <a href="{{route('category.overview',$category->id)}}">
                <h4 class="text-white bg-info mb-0 p-4 rounded-top">
                {{$category->title}}
                </h4>   
                </a>             
                  @if(count($category->forums) > 0)
                    <table class="table table-striped table-responsive table-bordered "  >
                  {{-- Forums listing start --}}
                    @foreach ($category->forums as $forum)
                      <thead class="thead-light">
                        <tr >
                          <th scope="col">Forum</th>
                          <th scope="col">Topics</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr >
                          {{-- Forum desc and title --}}
                          <td style="width: 100%">
                           
                            <h3 class="h5">
                            <a href="{{route('forum.overview',$forum->id)}}" class="text-uppercase">{{$forum->title}}</a>
                            </h3>
                            <p class="mb-0">
                            {!!$forum->desc!!}
                            </p>
                            
                          </td>
                          {{-- Topics --}}
                          <td>
                            <div>
                              {{count($forum->topics)}}
                            </div>
                          </td>
                          {{-- Posts --}}
                         
                          {{-- <td>
                            <h4 class="h6 font-weight-bold mb-0">
                              <a href="#">Post name</a>
                            </h4>
                            <div><a href="#">Author name</a></div>
                            <div>06/07/ 2021 20:04</div>
                          </td> --}}
                        </tr>
                      </tbody>
                  @endforeach
                  {{-- Forums listing end --}}
                  @else 
                  
                    <div style="background-color:#e9ecef;border:1px solid #dee2e6; margin-bottom:10px">
                      
                      <p style="text-align: center">0 forums in that category</p>
                      
                    </div>
                    
                  @endif
              </table>
            </div>
                @endforeach
                {{-- Categories listing end --}}
                @else
                 <h1>No one categories to show</h1>
            @endif        
          </div>
        </div>
        {{-- Side bar --}}
        <div class="col-lg-4">
          <aside>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Online members</h4>
                <ul class="list-unstyled mb-0">
                  @foreach($users_online as $user)
                   
                  
                  <li><a href="{{route('client.user.profile',$user->id)}}">{{$user->name}}&nbsp<span class="badge badge-pill badge-success">online</span></a></li>
                 
                  @endforeach
                </ul>
              </div>              
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All members</h4>
                <ul class="list-unstyled mb-0">
                  @foreach($few_users as $user)
                   
                  
                  <li><a href="{{route('client.user.profile',$user->id)}}">{{$user->name}}</a></li>
                 
                  @endforeach
                  <li><a href="{{route('client.users')}}">View All Members</a></li>
                </ul>
              </div>              
            </div>
           
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Members Statistics</h4>
                <dl class="row">
                  <dt class="col-8 mb-0">Total Forums:</dt>
                  <dd class="col-4 mb-0">{{$forumsCount}}</dd>
                </dl>
                <dl class="row">
                  <dt class="col-8 mb-0">Total Topics:</dt>
                  <dd class="col-4 mb-0">{{$topicsCount}}</dd>
                </dl>
                <dl class="row">
                  <dt class="col-8 mb-0">Total Categories:</dt>
                  <dd class="col-4 mb-0">{{$totalCategories}}</dd>
                </dl>
                <dl class="row">
                  <dt class="col-8 mb-0">Total Members:</dt>
                  <dd class="col-4 mb-0">{{$totalMembers}}</dd>
                </dl>
              </div>
              <div class="card-footer">
                <div>Newest Member</div>
                <div><a href="#">
                  @if($newestUser)
                  {{$newestUser->name}}
                  @else 
                  <p>No users yet</p>
                  @endif
                </a></div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
@endsection




































    {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif  --}}