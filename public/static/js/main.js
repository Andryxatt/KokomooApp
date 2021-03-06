// "use strict";
// (function ($) {
//     $(document).ready(function () {
//         svg4everybody({});
//     });// Navbar
//     var barsButton = $('.bars');
//     var navbarList = $('.navigation-mobile');
//     var barsList = $('.button-list');
//     var alphabetList = $('.mobile__list-alphabet');
//
//     function navbarOpen(e) {
//         e.preventDefault();
//         navbarList.fadeToggle();
//         $(this).toggleClass('change-icon');
//         $(this).parents('body').find('.site__wrapper').toggleClass('overlay-page');
//     }
//
//     function alphabetOpen(e) {
//         e.preventDefault();
//         alphabetList.fadeToggle();
//         $(this).toggleClass('change-icon');
//         $(this).parents('body').find('.site__wrapper').toggleClass('overlay-page');
//     }
//
//     barsButton.on('click', navbarOpen);
//     barsList.on('click', alphabetOpen);
//     $('.modal-qr, .modal-subscribe').iziModal({
//         background: '#ffffff',
//         transitionIn: 'fadeIn',
//         transitionOut: 'fadeOut',
//         fullscreen: false,
//         closeOnEscape: true,
//         closeButton: true
//     });
//     var callbackModal = $('.modal-callback').iziModal({
//         background: '#ffffff',
//         transitionIn: 'fadeIn',
//         transitionOut: 'fadeOut',
//         fullscreen: false,
//         closeOnEscape: true,
//         closeButton: true
//     });
//     var errorModal = $('.modal-error').iziModal({
//         background: '#ffffff',
//         transitionIn: 'fadeIn',
//         transitionOut: 'fadeOut',
//         fullscreen: false,
//         closeOnEscape: true,
//         closeButton: true
//     });// Validation Forms
//     $.validator.addMethod('regex', function (value, element, regexp) {
//         var re = new RegExp(regexp);
//         return this.optional(element) || re.test(value);
//     });
//     $('form[name="subscribe[]"]').validate({
//         rules: {
//             email: {
//                 required: true,
//                 regex: '^(([^<>()[\\]\\\\.,;:\\s@\\“]+(\\.[^<>()[\\]\\\\.,;:\\s@\\“]+)*)|(\\“.+\\“))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))$'
//             }
//         }, messages: {email: {required: true, regex: true}}, errorPlacement: function errorPlacement(error, element) {
//         }, submitHandler: function submitHandler(form) {
//             form.submit();
//         }
//     });// Send ajax
//     var sendAjax = $('.button-form');
//     sendAjax.on('click touchstart', function (e) {
//         var curStep = $(this).parents("form"), curInputs = curStep.find("input"), isValid = true;//Loop through all inputs in this form group and validate them.
//         for (var i = 0; i < curInputs.length; i++) {
//             if (!$(curInputs[i]).valid()) {
//                 isValid = false;
//             }
//         }
//         if (isValid) {
//             e.preventDefault();
//             var data = $(this).closest('form').serialize();
//             $.ajax({
//                 url: '/mailChim', dataType: 'text', data: data, method: 'POST', headers: {
//                     'X-Csrf-Token': $('meta[name="csrf-token"]').attr('content')
//                 }, success: function success(res) {
//                     if (res == 1) {
//                         $('form').trigger('reset');
//                         callbackModal.iziModal('open');
//                     }
//                 }, error: function error(res) {
//                     if (res == 0) {
//                         errorModal.iziModal('open');
//                     }
//                 }
//             });
//         } else {
//         }
//     });
// })(jQuery);


"use strict";
(function ($) {
    $(document).ready(function () {
        svg4everybody({});
    });// Navbar
    var barsButton = $('.bars');
    var navbarList = $('.navigation-mobile');
    var barsList = $('.button-list');
    var alphabetList = $('.mobile__list-alphabet');

    function navbarOpen(e) {
        e.preventDefault();
        navbarList.fadeToggle();
        $(this).toggleClass('change-icon');
        $(this).parents('body').find('.site__wrapper').toggleClass('overlay-page');
    }

    function alphabetOpen(e) {
        e.preventDefault();
        alphabetList.fadeToggle();
        $(this).toggleClass('change-icon');
        $(this).parents('body').find('.site__wrapper').toggleClass('overlay-page');
    }

    barsButton.on('click', navbarOpen);
    barsList.on('click', alphabetOpen);
    $('.modal-qr, .modal-subscribe').iziModal({
        background: '#ffffff',
        transitionIn: 'fadeIn',
        transitionOut: 'fadeOut',
        fullscreen: false,
        closeOnEscape: true,
        closeButton: true
    });
    var callbackModal = $('.modal-callback').iziModal({
        background: '#ffffff',
        transitionIn: 'fadeIn',
        transitionOut: 'fadeOut',
        fullscreen: false,
        closeOnEscape: true,
        closeButton: true
    });// Validation Forms
    $.validator.addMethod('regex', function (value, element, regexp) {
        var re = new RegExp(regexp);
        return this.optional(element) || re.test(value);
    });
    $('form[name="subscribe[]"]').validate({
        rules: {
            email: {
                required: true,
                regex: '^(([^<>()[\\]\\\\.,;:\\s@\\“]+(\\.[^<>()[\\]\\\\.,;:\\s@\\“]+)*)|(\\“.+\\“))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))$'
            }
        }, messages: {email: {required: true, regex: true}}, errorPlacement: function errorPlacement(error, element) {
        }, submitHandler: function submitHandler(form) {
            form.submit();
        }
    });// Send ajax
    var errorModal = $('.modal-error').iziModal({
        background: '#ffffff',
        transitionIn: 'fadeIn',
        transitionOut: 'fadeOut',
        fullscreen: false,
        closeOnEscape: true,
        closeButton: true
    });
    var sendAjax = $('.button-form');
    sendAjax.on('click touchstart', function (e) {
        var curStep = $(this).parents("form"), curInputs = curStep.find("input"), isValid = true;//Loop through all inputs in this form group and validate them.
        for (var i = 0; i < curInputs.length; i++) {
            if (!$(curInputs[i]).valid()) {
                isValid = false;
            }
        }
        if (isValid) {
            e.preventDefault();
            var data = $(this).closest('form').serialize();
            $.ajax({
                url: '/mailChim', dataType: 'text', data: data, method: 'POST', headers: {
                    'X-Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }, success: function success(res) {
                    if (res == 1) {
                        $('form').trigger('reset');
                        callbackModal.iziModal('open');
                    }
                    if (res == 0) {
                        errorModal.iziModal('open');
                    }
                }
            });
        } else {
        }
    });
})(jQuery);