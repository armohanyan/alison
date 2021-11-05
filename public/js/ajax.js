// $(document).ready(function() {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $('#signUpSubmit').click(function(){
//         $('.error-signUp').css('display', 'none')
//         $.ajax({
//                 type: 'POST',
//                 url: '/sign-up',
//                 data: {
//                     firstname :$('#firstname').val(),
//                     surname :$('#surname').val(),
//                     email :$('#email').val(),
//                     password :$('#password').val(),
//                     signUpCondition : $('#signup-tc').is(":checked"),
//                 },
//                 success: function(response){
//                     if(response.success){
//                         $('.custom-model-main').hide()
//                         Swal.fire({
//                             position: 'center',
//                             icon: 'success',
//                             title: 'You signed up successfully. Now You can sign in',
//                             showConfirmButton: false,
//                             timer: 2000
//                         })
//                         console.log(response.success)
//                     }
//                     else{
//                         $.each(response.errors, (error, msg) => {
//                             $('.error-message-'+error).html(msg[0]).show()
//                         });
//                     }
//                 },
//             })
//
//     });
//
//     $('#signInSubmit').click(function(){
//         $('.error-login').hide();
//         $.ajax({
//                 type: 'POST',
//                 url: '/sign-in',
//                 data: {
//                     email :$('#login-email').val(),
//                     password :$('#login-password').val(),
//                 },
//                 success: function(response){
//
//                     if(response.success){
//                         $('.dropdown').addClass("active-item")
//                         $('.logout-inner').addClass("active-item")
//                         $('.login-links').addClass("hide-item")
//                         $('.custom-model-main').hide()
//                         console.log(response.success)
//                         Swal.fire({
//                             position: 'center',
//                             icon: 'success',
//                             title: 'Your work has been saved',
//                             showConfirmButton: false,
//                             timer: 1500
//                         })
//                     }
//                     else{
//                         if ('invalid' in response) {
//                             $('.error-message-login-invalid').html(response.invalid).show()
//                         }
//                         else{
//                             $.each(response.errors, (error, msg) => {
//                                 $('.error-message-login-' + error).html(msg[0]).show()
//                             });
//                         }
//                     }
//                 },
//             })
//
//     });
// });
