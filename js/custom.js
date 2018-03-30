/*global $, alert, console*/

$(function () {
    'use strict';
    
    var userErrors  = true,
    
        emailErrors = true,
        
        msgErrors   = true;
    
    
    $('.username').blur(function () {
       if($(this).val().length < 4) {
           $(this).css('border', '1px solid #f00').parent().find('.client-warning').css('display', 'block')
                   .end().parent().find('.star').css('display', 'block');
           userErrors = true;
       } else {
           $(this).css('border', '1px solid #080').parent().find('.client-warning').css('display', 'none')
                   .end().parent().find('.star').css('display', 'none');
           userErrors = false;
       }
    });
    
    $('.email').blur(function () {
       if($(this).val().length < 1) {
           $(this).css('border', '1px solid #f00').parent().find('.client-warning').css('display', 'block')
                   .end().parent().find('.star').css('display', 'block');
           emailErrors = true;
       } else {
           
           $(this).css('border', '1px solid #080').parent().find('.client-warning').css('display', 'none')
                   .end().parent().find('.star').css('display', 'none');
           emailErrors = false;
       }
    });
    
    $('.msg').blur(function () {
       if($(this).val().length < 10) {
           $(this).css('border', '1px solid #f00');
           $(this).parent().find('.client-warning').css('display', 'block');
           $(this).parent().find('.star').css('display', 'block');
           msgErrors = true;
       } else {
           $(this).css('border', '1px solid #080').parent().find('.client-warning').css('display', 'none')
                   .end().parent().find('.star').css('display', 'none');
           msgErrors = false;
       }
    });
    
    // the form submit 
    
    
    $('.form').submit(function (x) {
        
        if(userErrors === true || emailErrors === true || msgErrors === true) {
            x.preventDefault();
            $('.username, .email, .msg').blur();
        }
        
    });
    
    
});

