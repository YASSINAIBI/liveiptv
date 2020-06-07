$(function(){
    'use strict';

    var userError = true;
    var emailError = true;
    var msgError = true;

    // function checkErrors(){
    //     if(userError === true || emailError === true || msgError === true){
    //         console.log('ther\'e error in form')
    //     }
    //     else{
    //         console.log('Form Is Valid');
    //     }
    // }

    $('.user').blur(function(){
        if($(this).val().length <= 2){
            $(this).css('border', '2px solid red');
            $(this).parent().find('.custom-alert').fadeIn('500').end().find('.asterisx').fadeIn('500');
            // $(this).parent().find('.asterisx').fadeIn('500');

            userError = true; 
        }
        else{
            $(this).css('border', '2px solid green');
            $(this).parent().find('.custom-alert').fadeOut('500').end().find('.asterisx').fadeOut('500');
            // $(this).parent().find('.asterisx').fadeOut('500');

            userError = false; 
        }
    });

    $('.email').blur(function(){
        if($(this).val() === ""){
            $(this).css('border', '2px solid red');
            $(this).parent().find('.custom-alert').fadeIn('500').end().find('.asterisx').fadeIn('500');
            // $(this).parent().find('.asterisx').fadeIn('500');

            emailError = true; 
        }
        else{
            $(this).css('border', '2px solid green');
            $(this).parent().find('.custom-alert').fadeOut('500').end().find('.asterisx').fadeOut('500');
            // $(this).parent().find('.asterisx').fadeOut('500');

            emailError = false; 
        }
    });

    $('.textArea').blur(function(){
        if($(this).val().length <= 10){
            $(this).css('border', '2px solid red');
            $(this).parent().find('.custom-alert').fadeIn('500').end().find('.asterisx').fadeIn('500');
            // $(this).parent().find('.asterisx').fadeIn('500');

            msgError = true; 
        }
        else{
            $(this).css('border', '2px solid green');
            $(this).parent().find('.custom-alert').fadeOut('500').end().find('.asterisx').fadeOut('500');
            // $(this).parent().find('.asterisx').fadeOut('500');

            msgError = false; 
        }
    });

        $('.contact-form').submit(function (e) { 
            if(userError === true || emailError === true || msgError === true){
            e.preventDefault();

            $('.user, .email, .textArea').blur();
            }
            else{
                Swal.fire(
                    'Thanks!',
                    'You Message are send',
                    'success'
                  )
            }
        });
});
