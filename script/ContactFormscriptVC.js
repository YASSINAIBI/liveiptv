$(function(){
    'use strict';

    var userError       = true;
    var emailError      = true;
    var villeError      = true;
    var payError        = true;
    var CodePostalError = true;
    var AdressMacError  = true;

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
        var $regexemail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if(!$(this).val().match($regexemail)){
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

    $('.ville').blur(function(){
        var $regexvill= /^[a-zA-Z]{2,20}$/;
        if(!$(this).val().match($regexvill)){
            $(this).css('border', '2px solid red');
            $(this).parent().find('.custom-alert').fadeIn('500').end().find('.asterisx').fadeIn('500');

            villeError = true;
        }
        else{
            $(this).css('border', '2px solid green');
            $(this).parent().find('.custom-alert').fadeOut('500').end().find('.asterisx').fadeOut('500');
            // $(this).parent().find('.asterisx').fadeOut('500');

            villeError = false; 
        }
    });

    $('.VotrePay').blur(function(){
        var $regexvill= /^[a-zA-Z]{2,10}$/;
        if(!$(this).val().match($regexvill)){
            $(this).css('border', '2px solid red');
            $(this).parent().find('.custom-alert').fadeIn('500').end().find('.asterisx').fadeIn('500');

            payError = true;
        }
        else{
            $(this).css('border', '2px solid green');
            $(this).parent().find('.custom-alert').fadeOut('500').end().find('.asterisx').fadeOut('500');
            // $(this).parent().find('.asterisx').fadeOut('500');

            payError = false; 
        }
    });

    $('.CodePostal').blur(function(){
        var $regexvill= /^[0-9]{2,20}$/;
        if(!$(this).val().match($regexvill)){
            $(this).css('border', '2px solid red');
            $(this).parent().find('.custom-alert').fadeIn('500').end().find('.asterisx').fadeIn('500');

            CodePostalError = true;
        }
        else{
            $(this).css('border', '2px solid green');
            $(this).parent().find('.custom-alert').fadeOut('500').end().find('.asterisx').fadeOut('500');
            // $(this).parent().find('.asterisx').fadeOut('500');

            CodePostalError = false; 
        }
    });

    $('.AdressMac').blur(function(){
        var $regexmac = /^([0-9A-F]{2}[:-]){5}([0-9A-F]{2})$/;
        if(!$(this).val().match($regexmac)){
            $(this).css('border', '2px solid red');
            $(this).parent().find('.custom-alert').fadeIn('500').end().find('.asterisx').fadeIn('500');

            AdressMacError = true;
        }
        else{
            $(this).css('border', '2px solid green');
            $(this).parent().find('.custom-alert').fadeOut('500').end().find('.asterisx').fadeOut('500');
            // $(this).parent().find('.asterisx').fadeOut('500');

            AdressMacError = false; 
        }
    });

        $('.contact-form').submit(function (e) { 
            if(userError === true || emailError === true || villeError === true || payError === true || CodePostalError === true || AdressMacError === true){
            e.preventDefault();

            $('.user, .email, .ville, .VotrePay, .CodePostal, .AdressMac').blur();
            }
            else{
                Swal.fire(
                    'Thanks!',
                    'Votre Commande a été Confirmé',
                    'success'
                  )
            }
        });
});


// /^([0-9A-F]{2}[:-]?){5}([0-9A-F]{2})$/
// [0-9]{3}[ -][0-9]{3}[ -][0-9]{4} => Reg Exp example
// ^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$