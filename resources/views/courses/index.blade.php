@extends('layout.main')

@section('content')
    <style>
        body{
            min-width:440px;
        }

        .text{
            font-family: Roboto;
        }

        .fa{
            line-height:32px;
            font-size:50px;
            color: gray;}
        .fa.checked {color: orange;}
        .star-rating {
            line-height:32px;
            font-size:50px;
        }

        .yes-no-rating {
            line-height:32px;
            font-size:50px;
            /* white-space:nowrap; */
        }
        .fa-check{color: gray;}
        .fa-check.checked {color: green;}
        .fa-close{color: gray;}
        .fa-close.checked {color: red;}
        .yes-no-rating {
            line-height:32px;
            font-size:50px;
        }

        .didgit{
            font-family: Roboto !important;
            display: inline-block;
            background: #ccc;
            color: #000;
            text-align: center;
            border-radius: 50%;
            padding: 0.3em  0;
            width:2.3em;
            height:2.3em;
        }
        .didgit{
            font-family: Roboto;
        }
        .didgit.checked{
            background: orange;
        }
       .rounded-circle{
           width: 80px;
           height: 80px;
       }
    </style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container pb50 ">
<div class="row" >
    <div class="col-md-9 mb40" style="margin-top: 95px;">
        <article>
            <img src="https://images.unsplash.com/photo-1455734729978-db1ae4f687fc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="" class="img-fluid mb30">
            <div class="post-content mt-2">
                <h3> {{ $course->title }} </h3>
                <ul class="post-meta list-inline">
                    <li class="list-inline-item">
                        <i class="fa fa-calendar-o"></i> <a href="#">{{ $course->created_at }}</a>
                    </li>
                    <li>
                        <span class="pr-2"><i class="fa fa-university ml-2" aria-hidden="true">{{ $course->publisher }}</i></span>
                    </li>
                </ul>
                <p>
                    {{ $course->description }}
                </p>
            </div>
            <div>
                <strong class="ml-2 pr-2">Rating of this course</strong>
                @for($i = 1; $i <=$course->getArithmeticAverage(); $i++)
                    <i class="fa fa-star checked" data-rating="1"></i>
                @endfor
            </div>
        @if(Auth::user() && !Auth::user()->hasRateUser($course) )
                <div class="container rating-review-course">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-9 col-d-auto mt-5 mb-5">
                            <div class="text-center">
                                <h4 class="mt-4 mb-4">Please rate us.It's very important for us.</h4>
                                <div class="star-rating d-inline-block">
                                    <i class="fa fa-star" data-rating="1"></i>
                                    <i class="fa fa-star" data-rating="2"></i>
                                    <i class="fa fa-star" data-rating="3"></i>
                                    <i class="fa fa-star" data-rating="4"></i>
                                    <i class="fa fa-star" data-rating="5"></i>
                                </div>
                            </div>
                            <br />
                            <textarea style="margin-top:5px;" class="form-control" rows="3" id="input-review" placeholder="Write your review here."></textarea>
                            <button id="btn-review" data-id="{{ $course->id }}" type="button" style="margin-top:10px;margin-left:5px;" class="btn btn-lg btn-success">Reply</button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="container mt-4">
                <h3 class="text-center">Օpinions on this course</h3>
                <div class="row">
                    @foreach($course->ratings as $rating )
                        <div class="col-md-8 mt-3">
                            <div class="media g-mb-30 media-comment">
                                <img class="d-flex rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                    <div class="g-mb-15">
                                        <p class="h5 g-color-gray-dark-v1 mb-0">{{ $rating->user->surname  }}</p>
                                        @for($i = 1; $i<= $rating->rating; $i++)
                                            <i class="fa fa-star checked" data-rating="1"></i>
                                        @endfor
                                    </div>
                                    <p>{{ $rating->review  }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
@endsection


