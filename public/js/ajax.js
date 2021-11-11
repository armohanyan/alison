$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.rating > input ').click(function (e) {
        e.preventDefault() ;
        $.ajax({
            type: 'POST',
            url: '/course/rate',
            data:   {
                courseRate : $(this).data('rating'),
                courseId : $(this).data('id'),
            },
            success: function(response){
                if(response){
                    console.log(response)                    }
                else{
                    console.log('error')
                }
            },
        })

    })

});
