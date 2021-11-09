@extends('layout.main')

@section('content')
   <section>
    <div class="general֊block">
        <div class="row-column-wrapper">
            <div class="section-left-cl">
                <div class="section-left-cl-insert">
                    <h2 class="empover-yourself">Empower Yourself</h2>
                    <h1><span>Free online courses</span> <span>from the world’s leading experts.</span></h1><p>Join 21 million learners today.</p>
                    <a href=""  class="sign-in">Sign up now</a><br><br>
                    <div class="home__video-desktop">
                        <div class="home-video-part" style="margin-top: 30px;max-width: 300px;">
                            <a title="" href="">Celebrating 14 Years of Empowerment</a>
                            <div class="video-container">
                                <div class="video-placeholder">
                                    <div class="video-placeholder-inner">
                                        <img src="	https://cdn01.alison-static.net/public/html/site/img/play-button.svg" class="play-video" alt="">
                                        <img src="https://i.ytimg.com/vi_webp/zHO1AOoCSco/mqdefault.webp" alt="">
                                    </div>
                                    <div class="btn-under-video">
                                        <a href="">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-right-column">
                <div class="row-column-category-list">
                    @foreach($categories as $category)
                        <div class="section-category-item">
                            <a href="">
                                <div class="front">
                                    <span class=""><i class="fa fa-desktop" aria-hidden="true"></i> </span>
                                    <p class="">{{ $category->name }}</p>
                                    <div class=""></div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  </section>
   <div id="article-courses">
       <article-index/>
   </div>
{{--    <div class="courses-list-body">--}}
{{--        <div class="courses-list">--}}
{{--            <ul class="courses-list-ul">--}}
{{--                <li><a href="">Treding</a></li>--}}
{{--                <li><a href="">Most Popular</a></li>--}}
{{--                <li><a href="">Most Recent</a></li>--}}
{{--                <li><a href="">Tags</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="main-cours-list">--}}


            {{--            <div class="cours-list-row">--}}
{{--                @foreach($courses as $course)--}}
{{--                    <a href="google.com" title="{{ $course->title }}">--}}
{{--                        <div class="course-block">--}}
{{--                            <div class="cl-image">--}}
{{--                                <img src="{{ asset('images/'.$course->img) }}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="course-block-content">--}}
{{--                                <span class="block-content-type">{{  $course->category->name }}</span>--}}
{{--                                <span class="block-content-category">{{  $course->courseType->name }}</span>--}}
{{--                                <h3 class="course-type-title">--}}
{{--                                    <div title="title-inner-div">--}}
{{--                                        <span>{{ $course->title }}</span>--}}
{{--                                    </div>--}}
{{--                                </h3>--}}
{{--                            </div>--}}

{{--                            <div class="course-block-intro">--}}
{{--                                <div class="social-links">--}}
{{--                                    <a href=""><img src="https://img.icons8.com/color/48/000000/linkedin.png"/></a>--}}
{{--                                    <a href=""><img src="https://img.icons8.com/color/48/000000/facebook-new.png"/></a>--}}
{{--                                    <a href=""><img src="https://img.icons8.com/color/48/000000/twitter--v2.png"/></a>--}}
{{--                                </div>--}}
{{--                                <div class="div-course-title">--}}
{{--                                    <span class="course-title" > {{ $course->title }}</span>--}}
{{--                                </div>--}}
{{--                                <div class="publisher">--}}
{{--                                    <span><i class="fa fa-university" aria-hidden="true"></i>{{ $course->publisher }}</span>--}}
{{--                                </div>--}}
{{--                                <div class="course-intro">--}}
{{--                                    <span>{{ $course->description  }}</span>--}}
{{--                                </div>--}}
{{--                                <div class="more-info">--}}
{{--                                    <a href=""class="" >More Information <i class="fa fa-question-circle" aria-hidden="true"></i> </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="parent-div-startnow">--}}
{{--                                <div class="child-div-startnow">--}}
{{--                                    <a title="" class="btn-start-now ">Start Now</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endforeach--}}
{{--            <div class="btn-more-courses">--}}
{{--                <a href="" class="more-courses-link" title="More Courses">More Courses</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="alison-statics">
        <div class="statics-inner">
            <div class="learners-number">
                <span><img src="https://cdn01.alison-static.net/public/html/site/img/home-stats/learners.svg" alt=""></span>
                <span class="numbers">21</span>
                <span class="static-title">Million Learners</span>
            </div>
            <div class="graduates-number">
                <span><img src="https://cdn01.alison-static.net/public/html/site/img/home-stats/graduates.svg" alt=""></span>
                <span class="numbers">4</span>
                <span class="static-title">Million Graduates</span>
            </div>
            <div class="courses-number">
                <span><img src="https://cdn01.alison-static.net/public/html/site/img/home-stats/courses.svg" alt=""></span>
                <span class="numbers">3500+</span>
                <span class="static-title">Courses</span>
            </div>
            <div class="countries-number">
                <span><img src="https://cdn01.alison-static.net/public/html/site/img/home-stats/countries.svg" alt=""></span>
                <span class="numbers">195</span>
                <span class="static-title">Countries</span>
            </div>
        </div>
    </div>
    @include('includes.testimonials')

    <div class="alison-publishers">
        <div class="publishers-inner">
            <div class="publishers-image">
                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/mit.png" alt=""></a>
                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/stanford.png" alt=""></a>
                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/columbia.png" alt=""></a>
                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/cambridge.png" alt=""></a>
                <div class="publisher-spacer"></div>
                <div class="publisher-spacer"></div>
                <div class="publisher-spacer"></div>
                <div class="publisher-spacer"></div>
                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/google.png" alt=""></a>
                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/microsoft.png" alt=""></a>
                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/saylor.png" alt=""></a>
                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/openstax.png" alt=""></a>
            </div>
            <div class="publishers-text">
                <h3>So why wait? Start one of our 3,500 high quality courses from the world's leading experts today!</h3>
                <a href=""  class="publishers-btn">Start Learning Now</a>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
