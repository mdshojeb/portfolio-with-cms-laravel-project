@extends('frontend.layout')

@section('page_title','Portfolio Website')

@section('content')

@section('page-intro')
    
@show
    
  <!-- ======= Intro Section ======= -->
  <div id="home" class="intro route bg-image" style="background-image: url({{asset('/storage/image/'.$intro[0]->image)}})">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
        <h1 class="intro-title mb-4">{{$intro[0]->intro_title}}</h1>
          <p class="intro-subtitle"><span class="text-slider-items">{{$intro[0]->intro_subtitle}}</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div><!-- End Intro Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about-mf sect-pt4 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-5">
                      <div class="about-img">
                      <img src="{{asset('/storage/image/'.$about[0]->image)}}" class="img-fluid rounded b-shadow-a" alt="User Image">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-7">
                      <div class="about-info">
                      <p><span class="title-s">Name: </span> <span>{{$about[0]->name}}</span></p>
                        <p><span class="title-s">Profile: </span> <span>{{$about[0]->profile}}</span></p>
                        <p><span class="title-s">Email: </span> <span>{{$about[0]->email}}</span></p>
                        <p><span class="title-s">Phone: </span> <span>{{$about[0]->phone}}</span></p>
                      </div>
                    </div>
                  </div>
                  <div class="skill-mf">
                    <p class="title-s">Skill</p>
                    @foreach ($skill as $item)
                  <span>{{$item->title}}</span> <span class="pull-right">{{$item->progress.'%'}}</span>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: {{$item->progress.'%'}}" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    @endforeach
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="about-me pt-4 pt-md-0">
                    <div class="title-box-2">
                      <h5 class="title-left">
                        About me
                      </h5>
                    </div>
                    {!! $about[0]->about_detail !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services-mf route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">
                Services
              </h3>
              <p class="subtitle-a">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              </p>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
         @foreach ($service as $item)
         <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
            <span class="ico-circle"><i class="{{$item->icon}}" aria-hidden="true"></i></i></span>
            </div>
            <div class="service-content">
            <h2 class="s-title">{{$item->services_title}}</h2>
            <p class="s-description text-center">{{$item->detail}}</p>
            </div>
          </div>
        </div>
         @endforeach
      
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Counter Section ======= -->
    <div class="section-counter paralax-mf bg-image" style="background-image: url({{asset('/storage/image/'.$counter[0]->image)}})">
      <div class="overlay-mf"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
              </div>
              <div class="counter-num">
              <p class="counter">{{$counter[0]->workes_completed}}</p>
                <span class="counter-text">WORKS COMPLETED</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
              </div>
              <div class="counter-num">
                <p class="counter">{{$counter[0]->years_of_experience}}</p>
                <span class="counter-text">YEARS OF EXPERIENCE</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <span class="ico-circle"><i class="ion-ios-people"></i></span>
              </div>
              <div class="counter-num">
                <p class="counter">{{$counter[0]->total_clients}}</p>
                <span class="counter-text">TOTAL CLIENTS</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
              </div>
              <div class="counter-num">
                <p class="counter">{{$counter[0]->awered_won}}</p>
                <span class="counter-text">AWARD WON</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Counter Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="work" class="portfolio-mf sect-pt4 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">
                Portfolio
              </h3>
              <p class="subtitle-a">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              </p>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($portfolio as $item)
          <div class="col-md-4">
            <div class="work-box">
            <a href="{{asset('/storage/image/portfolio/'.$item->image)}}" data-gall="portfolioGallery" class="venobox">
                <div class="work-img">
                <img src="{{asset('/storage/image/portfolio/'.$item->image)}}" alt="" class="img-fluid">
                </div>
                <div class="work-content">
                  <div class="row">
                    <div class="col-sm-8">
                    <h2 class="w-title">{{$item->title}}</h2>
                      <div class="w-more">
                        <span class="w-ctegory">{{$item->catagory}}</span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="w-like">
                        <span class="ion-ios-plus-outline"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          @endforeach
         

        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <div class="testimonials paralax-mf bg-image" style="background-image: url({{asset('/storage/image/'.$r_bg[0]->image)}})">
      <div class="overlay-mf"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="testimonial-mf" class="owl-carousel owl-theme">
              @foreach ($review as $item)
              <div class="testimonial-box">
                <div class="author-test">
                <img src="{{asset('/storage/image/'.$item->image)}}" alt="Author Image" class="rounded-circle b-shadow-a review-author">
                <span class="author">{{$item->name}}</span>
                </div>
                <div class="content-test">
                  <p class="description lead">
                    {{$item->review}}
                  </p>
                  <span class="comit"><i class="fa fa-quote-right"></i></span>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Testimonials Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog-mf sect-pt4 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">
               Recent Blog
              </h3>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($blog as $blog)
              @if($blog->status==1)
              <div class="col-md-4">
                <div class="card card-blog">
                  <div class="card-img">
                  <a href="{{url('/blog/'.$blog->id.'/'.$blog->slug)}}"><img src="{{asset('/storage/posts/'.$blog->image)}}" alt="Post Image" class="img-fluid"></a>
                  </div>
                  <div class="card-body">
                    <div class="card-category-box">
                      <div class="card-category">
                      <h6 class="category">{{$blog->category->name}}</h6>
                      </div>
                    </div>
                  <h4 class="card-title"><a href="{{url('/blog/'.$blog->id.'/'.$blog->slug)}}">{{ $blog->title}}</a></h4>
                    <p class="card-description">
                      {!! \Illuminate\Support\Str::limit($blog->body,100,$end='...')!!}
                    </p>
                  </div>
                  <div class="card-footer">
                    <div class="post-author">
                      <a href="#">
                        <i class="ion-ios-person"style="font-size:16px"></i>
                      {{-- <img src="" alt="" class="avatar rounded-circle"> --}}
                      <span class="author">
                        {{$blog->user->name}}
                      </span>
                      </a>
                    </div>
                    <div class="post-date">
                      <span class="ion-ios-clock-outline"></span> {{$blog->created_at->format('M d, Y')}}
                    </div>
                  </div>
                </div>
              </div>
              @endif
          @endforeach
        </div>
      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Contact Section ======= -->
    <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url({{asset('/storage/image/'.$c_bg[0]->bg_image)}})">
      <div class="overlay-mf"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="contact-mf">
              <div id="contact" class="box-shadow-full">
                <div class="row">
                  <div class="col-md-6">
                    <div class="title-box-2">
                      <h5 class="title-left">
                        Send Message Us
                      </h5>
                    </div>
                    <div>
                    <form action="{{url('/send-message')}}" method="post">
                      @csrf
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="text" name="name" class="form-control" id="name" placeholder='Your Name' value="{{old('name')}}" />
                              <div style='color:red'>
                                @error('name')
                                    {{$message}}
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder='Your Email' value="{{old('email')}}" />
                              <div style='color:red'>
                                @error('email')
                                    {{$message}}
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" id="subject"placeholder='Subject' value="{{old('email')}}" />
                              <div style='color:red'>
                                @error('subject')
                                    {{$message}}
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                            <textarea class="form-control" name="message" rows="5"placeholder='Write your message...'>{{old('message')}}</textarea>
                            <div style='color:red'>
                              @error('message')
                                  {{$message}}
                              @enderror
                            </div>
                            </div>
                          </div>
                          <div class="col-md-12 text-center">
                            <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="title-box-2 pt-4 pt-md-0">
                      <h5 class="title-left">
                        Get in Touch
                      </h5>
                    </div>
                    <div class="more-info">
                      <p class="lead">
                        {{$contact[0]->description}}
                      </p>
                      <ul class="list-ico">
                      <li><span class="ion-ios-location"></span> {{$contact[0]->address}}</li>
                      <li><span class="ion-ios-telephone"></span> {{$contact[0]->phone}}</li>
                        <li><span class="ion-email"></span> {{$contact[0]->email}}</li>
                      </ul>
                    </div>
                    <div class="socials">
                      <ul>
                        <li><a href="{{$contact[0]->facebook}}"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                        <li><a href="{{$contact[0]->linkedin}}"><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                        <li><a href="{{$contact[0]->twitter}}"><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                        <li><a href="{{$contact[0]->pinterest}}"><span class="ico-circle"><i class="ion-social-pinterest"></i></span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

@endsection

