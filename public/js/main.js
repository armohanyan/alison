$(document).ready(function() {
    $(".open-menu-category").click(function(){
        if( $(".category-list").css('display') == 'block' ){
            $(".category-list").slideUp("slow");
            $(this).find('i').removeClass('fa fa-angle-up').addClass('fa fa-angle-down');
        }
        else{
            $(".category-list").slideDown("slow");
            $(this).find('i').removeClass('fa fa-angle-down').addClass('fa fa-angle-up');
            $(".course-type").hide();
        }
    });

    $(".open-menu-course-type").click(function(){
        if( $(".course-type").css('display') == 'block' ){
            $(".course-type").slideUp("slow");
            $(this).find('i').removeClass('fa fa-angle-up').addClass('fa fa-angle-down');
        }
        else{
            $(".course-type").slideDown("slow");
            $(this).find('i').removeClass('fa fa-angle-down').addClass('fa fa-angle-up');
            $(".category-list").hide();
        }
    });


    $('.category-list').mouseleave(function(){
        $(this).slideUp('slow');
        $('.open-menu-category').find('i').removeClass('fa fa-angle-up').addClass('fa fa-angle-down');
    });

    $('.course-type').mouseleave(function(){
        $(this).slideUp('slow');
        $('.open-menu-course-type').find('i').removeClass('fa fa-angle-up').addClass('fa fa-angle-down');
    });

    var colors = ['blue','green','red','purple' ];

    $('.front').mouseenter(function() {
        var rand = colors[Math.floor(Math.random() * colors.length)];
        $(this).css('border-top', '5px solid ' + rand  );
    });

    $('.front').mouseleave(function() {
        $(this).css('border-top', '');
    })


    $('.course-block').mouseenter(function() {
        $(this).find('.course-block-intro').css('opacity', 1 )
    });

    $('.course-block').mouseleave(function() {
        $(this).find('.course-block-intro').css('opacity', 0 )
    });



    // SLIDE
    //
    // $('.testimonials-left-image').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 5500,
    //     arrows: false,
    //     fade: true,
    //     asNavFor: '.testimonials-left-text' ,
    //
    // });
    //
    // $('.testimonials-left-text').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     asNavFor: '.testimonials-left-image',
    //     dots: true,
    //     autoplay: true,
    //     autoplaySpeed: 5500,
    //     focusOnSelect: true,
    // });
    //
    //
    // $('.testimonials-left-text').on('afterChange', function(event, slick, currentSlide, nextSlide) {
    //     $itemId = $(slick.$slides.get(currentSlide)).data('id')
    //     $($itemId).addClass('bubble-active');
    //     $($itemId).fadeIn()  ;
    // })
    //
    // $('.testimonials-left-text').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    //     $itemId = $(slick.$slides.get(currentSlide)).data('id')
    //     $($itemId).removeClass('bubble-active');
    //     $($itemId).fadeOut()
    // })

    $('.video-placeholder-inner').click(function () {
        $(this).find('img').remove()
        $(this).parent().append('<div class="resp-iframe"><iframe title="YouTube video player" src="https://www.youtube.com/embed/zHO1AOoCSco?autoplay=1&enablejsapi=1" allow="autoplay" width="560" height="315" frameborder="0" allowfullscreen=""></iframe></div>')
        $('.btn-under-video').css('display', 'block')

    })

// MODAL

    $(".sign-in").on('click', function() {
        $(".custom-model-main").addClass('model-open');
        $(".custom-model-main").show()
    });

    $(".sign-up").on('click', function() {
        $(".custom-model-main").addClass('model-open');
        $(".custom-model-main").show()
    });


    $(".close-btn, .bg-overlay").click(function(){
        $(".custom-model-main").removeClass('model-open');
    });


    $('.signIn-eye').on('click', function (e){
        $(this).parent().prev().attr('type', 'text')
        $(this).css("display", 'none')
        $('.signIn-eye-slash').css('display', 'block')
    })

    $('.signIn-eye-slash').on('click', function () {
        $(this).parent().prev().attr('type', 'password')
        $(this).css("display", 'none')
        $('.signIn-eye').css('display', 'block')
    })

    $('.signUp-eye').on('click', function (e){
        $(this).parent().prev().attr('type', 'text')
        $(this).css("display", 'none')
        $('.signUp-eye-slash').css('display', 'block')
    })

    $('.signUp-eye-slash').on('click', function () {
        $(this).parent().prev().attr('type', 'password')
        $(this).css("display", 'none')
        $('.signUp-eye').css('display', 'block')
    })

    $('.modal-sign-in').on('click', function (e){
        e.preventDefault()
        $(this).addClass('active')
        $('.pop-up-content-wrap-signin').css('display', 'none');
        $('.pop-up-content-wrap-login').css('display', 'block')

    })

    $('.modal-sign-up').on('click', function (e){
        e.preventDefault()
        $(this).toggleClass('active')

        $('.pop-up-content-wrap-signin').css('display', 'block');
        $('.pop-up-content-wrap-login').css('display', 'none')

    })

/*--------------------------------------------------------------------------*/

    var count;
    var review;

    var $star_rating = $('.star-rating .fa-star');
    $star_rating.click(function() {
        var rate = parseInt($(this).data('rating'));
        $('input.rating-value').val(rate);
        $star_rating.each(function() {
            if (rate >= parseInt($(this).data('rating'))) {
                count=parseInt($(this).data('rating'));
                return $(this).removeClass('checked').addClass('checked');
            }
            else {
                return $(this).removeClass('checked');
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btn-review').click(function() {
        $.ajax({
            url: '/course/rate',
            type: 'GET',
            data: {
                course_id : $(this).data('id'),
                course_rate : count,
                review : $('#input-review').val()
            },

            success: function(response){
                $('.rating-review-course').hide()
                window.location.reload();
            },
        })

    })
});




