@extends('layout.main')

@section('content')
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
                        </ul>
                        <p>
                            {{ $course->description }}
                        </p>
                    </div>
                    <div class="wrapper">
                        <div class="master">
                            <h1>Review And rating</h1>
                            <h2>How was your experience about our product?</h2>

                            <div class="rating-component">
                                <div class="status-msg">
                                    <label>
                                        <input  class="rating_msg" type="hidden" name="rating_msg" value=""/>
                                    </label>
                                </div>
                                <div class="stars-box">
                                    <i class="star fa fa-star" title="1 star" data-message="Poor" data-value="1"></i>
                                    <i class="star fa fa-star" title="2 stars" data-message="Too bad" data-value="2"></i>
                                    <i class="star fa fa-star" title="3 stars" data-message="Average quality" data-value="3"></i>
                                    <i class="star fa fa-star" title="4 stars" data-message="Nice" data-value="4"></i>
                                    <i class="star fa fa-star" title="5 stars" data-message="very good qality" data-value="5"></i>
                                </div>
                                <div class="starrate">
                                    <label>
                                        <input  class="ratevalue" type="hidden" name="rate_value" value=""/>
                                    </label>
                                </div>
                            </div>

                            <div class="feedback-tags">
                                <div class="tags-container" data-tag-set="1">
                                    <div class="question-tag">
                                        Why was your experience so bad?
                                    </div>
                                </div>
                                <div class="tags-container" data-tag-set="2">
                                    <div class="question-tag">
                                        Why was your experience so bad?
                                    </div>

                                </div>

                                <div class="tags-container" data-tag-set="3">
                                    <div class="question-tag">
                                        Why was your average rating experience ?
                                    </div>
                                </div>
                                <div class="tags-container" data-tag-set="4">
                                    <div class="question-tag">
                                        Why was your experience good?
                                    </div>
                                </div>

                                <div class="tags-container" data-tag-set="5">
                                    <div class="make-compliment">
                                        <div class="compliment-container">
                                            Give a compliment
                                            <i class="far fa-smile-wink"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="tags-box">
                                    <input type="text" class="tag form-control" name="comment" id="inlineFormInputName" placeholder="please enter your review">
                                    <input type="hidden" name="product_id" value="{{ $products->id }}" />
                                </div>

                            </div>

                            <div class="button-box">
                                <input type="submit" class=" done btn btn-warning" disabled="disabled" value="Add review" />
                            </div>

                            <div class="submited-box">
                                <div class="loader"></div>
                                <div class="success-message">
                                    Thank you!
                                </div>
                            </div>
                        </div>

                    </div>
                </article>
            </div>
@endsection

