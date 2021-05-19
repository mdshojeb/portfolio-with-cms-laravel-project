@extends('frontend.layout')

@section('page_title',$blog->title)

@section('page-intro')
    @parent
@show
@section('content')
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-box">
            <div class="post-thumb">
            <img src="{{asset('/storage/posts/'.$blog->image)}}" class="img-fluid" alt="">
            </div>
            <div class="post-meta">
            <h1 class="article-title">{{$blog->title}}</h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                <a href="#">{{$blog->user->name}}</a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                <a href="#">{{$blog->category->name}}</a>
                </li>
                <li>
                  <span class="ion-ios-clock-outline">
                  <a href="#">{{$blog->created_at->format('M d, Y')}}</a>
                </li>
              </ul>
            </div>
            <div class="article-content">
              {!! $blog->body !!}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget-sidebar sidebar-search">
            <h5 class="sidebar-title">Search</h5>
            <div class="sidebar-content">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for..." aria-label="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary btn-search" type="button">
                      <span class="ion-android-search"></span>
                    </button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Recent Post</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                @foreach ($recent as $item)
                <li>
                <a href="{{url('/blog/'.$item->id.'/'.$item->slug)}}">{{$item->title}}</a>
                </li>
                @endforeach
                
              </ul>
            </div>
          </div>
          
          <div class="widget-sidebar widget-tags">
            <h5 class="sidebar-title">Tags</h5>
            <div class="sidebar-content">
              <ul>
                <li>
                  <a href="#">Web.</a>
                </li>
                <li>
                  <a href="#">Design.</a>
                </li>
                <li>
                  <a href="#">Travel.</a>
                </li>
                <li>
                  <a href="#">Photoshop</a>
                </li>
                <li>
                  <a href="#">Corel Draw</a>
                </li>
                <li>
                  <a href="#">JavaScript</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection