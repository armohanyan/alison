$(document).ready(function(){
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
    // console.log(546556456)
    // $('.item-cat').on('hover',
    //     function() {
    //         console.log('sdfdsf')
    //         var rand = colors[Math.floor(Math.random() * colors.length)];
    //         $(this).find('i').css('color', rand  );
    //         $(this).css('border-bottom', '5px solid ' + rand  );
    //     },
    //     function() {
    //         console.log('25413')
    //         $(this).find('i').css('color', '');
    //         $(this).css('border-bottom', '')
    //     }
    // )
    // $('.ul-category-list > li ').mouseenter(function() {
    //     var rand = colors[Math.floor(Math.random() * colors.length)];
    //     $(this).find('i').css('color', rand  );
    //     $(this).css('border-bottom', '5px solid ' + rand  );
    // });
    //
    // $('.ul-course-type li ').mouseleave(function() {
    //     $(this).find('i').css('color', '');
    //     $(this).css('border-bottom', '')
    // })

    $('.course-block').mouseenter(function() {
        $(this).find('.course-block-intro').css('opacity', 1 )
    });

    $('.course-block').mouseleave(function() {
        $(this).find('.course-block-intro').css('opacity', 0 )
    });



    // SLIDE

    $('.testimonials-left-image').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5500,
        arrows: false,
        fade: true,
        asNavFor: '.testimonials-left-text' ,

    });

    $('.testimonials-left-text').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.testimonials-left-image',
        dots: true,
        autoplay: true,
        autoplaySpeed: 5500,
        focusOnSelect: true,
    });


    $('.testimonials-left-text').on('afterChange', function(event, slick, currentSlide, nextSlide) {
        $itemId = $(slick.$slides.get(currentSlide)).data('id')
        $($itemId).addClass('bubble-active');
        $($itemId).fadeIn()  ;
    })

    $('.testimonials-left-text').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        $itemId = $(slick.$slides.get(currentSlide)).data('id')
        $($itemId).removeClass('bubble-active');
        $($itemId).fadeOut()
    })

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

});


