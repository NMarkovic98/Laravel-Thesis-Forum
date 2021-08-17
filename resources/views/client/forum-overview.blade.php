@extends('layouts.app')
@section('content')
</div>
<div class="container">
  <nav class="breadcrumb">
    <a href="/" class="breadcrumb-item"> Forum Categories</a>
    <a href="{{route('category.overview',$forum->category->id)}}" class="breadcrumb-item">{{$forum->category->title}}</a>
    <span class="breadcrumb-item active">{{$forum->title}}</span>
  </nav>

  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <!-- Category one -->
        <div class="col-lg-12">
          <!-- second section  -->
          <h4 class="text-white bg-info mb-0 p-4 rounded-top">
            {{$forum->title}}
          </h4>
          <table
            class="table table-striped table-responsivelg table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col">Topic</th>
                <th scope="col ">Created</th>
                <th scope="col">Statistics</th>
              </tr>
            </thead>

            <tbody >
              @if((count($forum->topics)) > 0)
              @foreach($forum->topics as $topic)
              <tr>
              {{-- Dodati ono loremipsum tekst za naziv teme u forumu!!!!!! --}}
                <td>
                  <h3 class="h6">
                  <span class="badge badge-success">{{$topic->replies->count()}} replies</span>
                  <a href="{{route('topic',$topic->id)}}">{{$topic->title}}</a>
                  </h3>
                  {{-- <div class="small">
                    Go to page: <a href="">1</a>,<a href="">2</a>,<a href="">3</a>,<a href="">4</a>
                  </div> --}}
                </td>
                <td>
                  <div><a href="#">{{$topic->user->name}}</a></div>
                  <div>{{$topic->created_at}}</div>
                </td>
                <td>
                  <div>{{$topic->replies->count()}} replies</div>
                  <div>{{$topic->views}} views</div>
                </td>
              </tr>
              @endforeach
            
              @else

              <h2>0 topics in that forum</h2>
              @endif
              
             
            </tbody>
          </table>
         
        </div>
      </div>
    </div>
  </div>
  
  <a href="{{route('topic.new',$forum->id)}}" class="btn btn-lg btn-primary mb-2">New Topic</a>
</div>
@endsection