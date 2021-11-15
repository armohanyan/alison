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
<!-------------------------- Article Component is here ------------------------>
   <div id="article-courses">
       <article-index/>
   </div>
<!------------------------------------------------------------------------------>
{{--    <div class="alison-publishers">--}}
{{--        <div class="publishers-inner">--}}
{{--            <div class="publishers-image">--}}
{{--                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/mit.png" alt=""></a>--}}
{{--                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/stanford.png" alt=""></a>--}}
{{--                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/columbia.png" alt=""></a>--}}
{{--                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/cambridge.png" alt=""></a>--}}
{{--                <div class="publisher-spacer"></div>--}}
{{--                <div class="publisher-spacer"></div>--}}
{{--                <div class="publisher-spacer"></div>--}}
{{--                <div class="publisher-spacer"></div>--}}
{{--                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/google.png" alt=""></a>--}}
{{--                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/microsoft.png" alt=""></a>--}}
{{--                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/saylor.png" alt=""></a>--}}
{{--                <a href="" class=""><img src="https://cdn01.alison-static.net/public/html/site/img/home-publishers/openstax.png" alt=""></a>--}}
{{--            </div>--}}
{{--            <div class="publishers-text">--}}
{{--                <h3>So why wait? Start one of our 3,500 high quality courses from the world's leading experts today!</h3>--}}
{{--                <a href=""  class="publishers-btn">Start Learning Now</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @include('includes.footer')--}}
@endsection
