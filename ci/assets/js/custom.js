$(document).ready(function () {

    "use strict";


    /* _____________________________________
     
     Preloader
     _____________________________________ */

    if ((".loader").length) {
        // show Preloader until the website ist loaded
        $(window).on('load', function () {
            $(".loader").fadeOut("slow");
        });
    }


    /* _____________________________________
     
     Smooth Scroll
     _____________________________________ */


    var topHeight = 0;

    if ($(".navbar-fixed-top").length) {
        topHeight = 80;
    }
    $('a.smooth-scroll').on('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - topHeight
        }, {
            duration: 1000,
            specialEasing: {
                width: "linear",
                height: "easeInOutCubic"
            }
        });
        event.preventDefault();
    });

    /* _____________________________________
     
     Scroll Top
     _____________________________________ */

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.btn-top').fadeIn();
        } else {
            $('.btn-top').fadeOut();
        }
    });

    /* _____________________________________
     
     Background Video
     _____________________________________ */

    // shows Video only for Desktop
    if ($('#video-background').length && result.type != noDesktop) {
        var videobackground = new $.backgroundVideo($('body'), {
            "align": "centerXY",
            "width": 720,
            "height": 432,
            "path": $('#video-background').data("path"),
            "filename": $('#video-background').data("file"),
            "types": ["mp4", "ogg", "webm"]
        });
    }


    /* _____________________________________
     
     Background Youtube
     _____________________________________ */

    // shows Video only for Desktop
    if ($('#youtube-background').length && result.type != noDesktop) {
        $('#youtube-background').YTPlayer({
            fitToBackground: true,
            videoId: $('#youtube-background').data("video-id"),
            playerVars: {
                modestbranding: 1,
                autoplay: 1,
                controls: 0,
                showinfo: 0,
                branding: 0,
                rel: 0,
                autohide: 0,
                start: 0
            }
        });
    }

    /* _____________________________________
     
     Scroll Animations
     _____________________________________ */


    if (Modernizr.csstransforms3d) {
        window.sr = ScrollReveal();

        sr.reveal('.reveal-bottom-20', {
            origin: 'bottom',
            distance: '20px',
            duration: 800,
            delay: 400,
            opacity: 1,
            scale: 0,
            easing: 'linear',
            reset: true
        });

        sr.reveal('.reveal-top-20', {
            origin: 'top',
            distance: '20px',
            duration: 800,
            delay: 400,
            opacity: 1,
            scale: 0,
            easing: 'linear',
            reset: true
        });

        sr.reveal('.reveal-left-10', {
            origin: 'left',
            distance: '10px',
            duration: 800,
            delay: 400,
            opacity: 1,
            scale: 0,
            easing: 'linear',
            reset: true
        });

        sr.reveal('.reveal-left-20', {
            origin: 'left',
            distance: '20px',
            duration: 800,
            delay: 400,
            opacity: 1,
            scale: 0,
            easing: 'linear',
            reset: true
        });

        sr.reveal('.reveal-right-10', {
            origin: 'right',
            distance: '10px',
            duration: 800,
            delay: 400,
            opacity: 1,
            scale: 0,
            easing: 'linear',
            reset: true
        });

        sr.reveal('.reveal-right-20', {
            origin: 'right',
            distance: '20px',
            duration: 800,
            delay: 400,
            opacity: 1,
            scale: 0,
            easing: 'linear',
            reset: true
        })

        sr.reveal('.reveal-bottom-opacity', {
            origin: 'bottom',
            distance: '20px',
            duration: 800,
            delay: 0,
            opacity: 0,
            scale: 0,
            easing: 'linear',
            mobile: false
        });
        ;
    }

    /* _____________________________________
     
     Navigation Transparent / White
     _____________________________________ */


    function changeColorLight() {

        if ($(window).scrollTop() > 60 || $(window).width() < 992) {
            navbar.addClass("navbar-light");
        } else {
            navbar.removeClass("navbar-light");
        }
    }

    function changeColorDark() {
        if ($(window).scrollTop() > 60 || $(window).width() < 992) {
            navbar.addClass("navbar-dark");
        } else {
            navbar.removeClass("navbar-dark");
        }
    }


    function changeColorDarkColor() {
        var scrollHeight = $(window).scrollTop();
        if ((scrollHeight > 60 || $(window).width() < 992)) {
            navbar.addClass("navbar-dark")
                    .find(".btn-circle").removeClass("btn-grey")
                    .addClass("btn-color");
            $('.logo-wg span').css("background-image", "url(assets/images/logo-silver.png)");
        } else {
            navbar.removeClass("navbar-dark")
                    .find(".btn-circle").removeClass("btn-color")
                    .addClass("btn-grey");
            $('.logo-wg span').css("background-image", "url(assets/images/logo-white.png)");
        }
    }

    // only change Color for fixed Navbar
    if ($('.navbar-fixed-top').length) {


        var navbar = $(".navbar");

        // change Colors for light Navbar Version
        if ($('.light-nav').length) {
            // Navigation color change
            $(window).on('scroll resize load', function () {
                changeColorLight();
            });
        }

        // change Colors for dark Navbar Version
        if ($('.dark-nav').length) {
            $(window).on('scroll resize load', function () {
                changeColorDark();
            });
        }

        // change Colors for dark Navbar Version
        if ($('.dark-nav-colored-hero').length) {
            $(window).on('scroll resize load', function () {
                changeColorDarkColor();
            });
        }
    }


    /* _____________________________________
     
     Navbar Icon
     _____________________________________ */

    $('.collapse').on('show.bs.collapse', function () {
        $('.navbar-icon').addClass('open');
    });
    $('.collapse').on('hide.bs.collapse', function () {
        $('.navbar-icon').removeClass('open');
    });


    /* _____________________________________
     
     Accordion
     _____________________________________ */

    var containerActive = '.panel .panel-collapse.in';
    $(containerActive).parent().addClass('active');
    $(containerActive).parent().find('i').addClass('icon-arrows-minus');
    $(containerActive).parent().find('i').removeClass('icon-arrows-plus');
    $('.panel').on('shown.bs.collapse', function () {
        $(this).addClass('active');
        $(this).find('i').addClass('icon-arrows-minus');
        $(this).find('i').removeClass('icon-arrows-plus');
    })
            .on('hidden.bs.collapse', function () {
                $(this).removeClass('active');
                $(this).find('i').addClass('icon-arrows-plus');
                $(this).find('i').removeClass('icon-arrows-minus');
            });


    /* _____________________________________
     
     Owl Carousel
     _____________________________________ */

    if ($(".gallery-slider").length) {
        $('.gallery-slider').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 2000,
            dotsEach: 2,
            slideBy: 2,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    margin: 20
                },
                320: {
                    items: 2,
                    margin: 20
                },
                640: {
                    items: 3,
                    margin: 20
                },
                992: {
                    items: 4,
                    margin: 30
                }
            }
        })
    }

    if ($(".testimonial-slider").length) {
        $('.testimonial-slider').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            items: 1,
            smartSpeed: 4000

        })
    }


    /* _____________________________________
     
     Tooltip
     _____________________________________ */

    $('[data-toggle="tooltip"]').tooltip();


    /* _____________________________________
     
     Video Thumbnail & Embedding (only Youtube / Vimeo)
     _____________________________________ */

    if ($('#video-embed').length) {
        Video('#video-embed');
    }


    /* _____________________________________
     
     Mail Chimp
     _____________________________________ */

    if ($('#mc-form').length) {
        $('#mc-form').ajaxChimp({
            callback: mailchimpCallback,
            // Replace the URL above with your mailchimp URL (put your URL inside '').
            url: ''
        });
    }

    // callback function when the form submitted, show the notification box
    function mailchimpCallback(resp) {
        var form = $('#mc-form'),
                messageContainer = $('#message-newsletter');

        form.find('.form-group').removeClass('error');
        if (resp.result === 'error') {
            form.find('.form-group').addClass('error');
        } else {
            form.find('.form-control').fadeIn().val('');
        }

        messageContainer.slideDown('slow', 'swing');

        setTimeout(function () {
            messageContainer.slideUp('slow', 'swing');
        }, 10000);
    }


    /* _____________________________________
     
     Charts / Circle Animation
     _____________________________________ */

    if ($('#charts').length) {
        var elements = $('#charts .circle');
        var o = $('#charts'),
                cc = 1;

        $(window).on('scroll', function () {
            var elemPos = o.offset().top,
                    elemPosBottom = o.offset().top + o.height(),
                    winHeight = $(window).height(),
                    scrollToElem = elemPos - winHeight,
                    winScrollTop = $(this).scrollTop();

            if (winScrollTop > scrollToElem) {
                if (elemPosBottom > winScrollTop) {
                    if (cc < 2) {
                        cc = cc + 2;
                        var circles = [];

                        for (var i = 0; i < elements.length; i++) {
                            var child = elements[i].id,
                                    percentage = $(elements[i]).data('percentage'),
                                    unit = $(elements[i]).data('unit'),
                                    value = $(elements[i]).data('value');

                            circles.push(Circles.create({
                                id: child,
                                value: percentage,
                                radius: 64,
                                width: 4,
                                duration: 1200,
                                text: '<p class="chart-value">' + value + '<span class="chart-unit">' + unit + '</span></p>'
                            }));
                        }
                    }
                }
            }
        });
    }


    /* _____________________________________
     
     Bootstrap Fix: IE10 in Win 8 & Win Phone 8
     _____________________________________ */


    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style')
        msViewportStyle.appendChild(
                document.createTextNode(
                        '@-ms-viewport{width:auto!important}'
                        )
                )
        document.querySelector('head').appendChild(msViewportStyle)
    }


    $('.badge-link').click(function (event) {
        $('.selectproductlightbox-bg').fadeIn(700, function () {
            $('.lightclose').click(function (event) {
                event.preventDefault()
                $('.selectproductlightbox-bg').fadeOut(700, function () {

                });
            });
        });
    });
//    Add User Modal
    $('.add-user-modal').click(function (event) {
        $('.addusermodal-bg input').val('');
        $('.addusermodal-bg').fadeIn(700, function () {
            $('.lightclose-adduser').click(function (event) {
                event.preventDefault()
                $('.addusermodal-bg').fadeOut(700, function () {});
            });
        });
    });

}
)
        ;

'use strict';

;
(function (document, window, index)
{
    // feature detection for drag&drop upload
    var isAdvancedUpload = function ()
    {
        var div = document.createElement('div');
        return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
    }();


    // applying the effect for every form
    var forms = document.querySelectorAll('.box');
    Array.prototype.forEach.call(forms, function (form)
    {
        var input = form.querySelector('input[type="file"]'),
                label = form.querySelector('label'),
                errorMsg = form.querySelector('.box__error span'),
                restart = form.querySelectorAll('.box__restart'),
                droppedFiles = false,
                showFiles = function (files)
                {
                    label.textContent = files.length > 1 ? (input.getAttribute('data-multiple-caption') || '').replace('{count}', files.length) : files[ 0 ].name;
                },
                triggerFormSubmit = function ()
                {
                    var event = document.createEvent('HTMLEvents');
                    event.initEvent('submit', true, false);
                    form.dispatchEvent(event);
                };

        // letting the server side to know we are going to make an Ajax request
        var ajaxFlag = document.createElement('input');
        ajaxFlag.setAttribute('type', 'hidden');
        ajaxFlag.setAttribute('name', 'ajax');
        ajaxFlag.setAttribute('value', 1);
        form.appendChild(ajaxFlag);

        // automatically submit the form on file select
        input.addEventListener('change', function (e)
        {
            showFiles(e.target.files);


        });

        // drag&drop files if the feature is available
        if (isAdvancedUpload)
        {
            form.classList.add('has-advanced-upload'); // letting the CSS part to know drag&drop is supported by the browser

            ['drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop'].forEach(function (event)
            {
                form.addEventListener(event, function (e)
                {
                    // preventing the unwanted behaviours
                    e.preventDefault();
                    e.stopPropagation();
                });
            });
            ['dragover', 'dragenter'].forEach(function (event)
            {
                form.addEventListener(event, function ()
                {
                    form.classList.add('is-dragover');
                });
            });
            ['dragleave', 'dragend', 'drop'].forEach(function (event)
            {
                form.addEventListener(event, function ()
                {
                    form.classList.remove('is-dragover');
                });
            });
            form.addEventListener('drop', function (e)
            {
                droppedFiles = e.dataTransfer.files; // the files that were dropped
                showFiles(droppedFiles);

            });
        }


        // if the form was submitted
        form.addEventListener('submit', function (e)
        {
            // preventing the duplicate submissions if the current one is in progress
            if (form.classList.contains('is-uploading'))
                return false;

            form.classList.add('is-uploading');
            form.classList.remove('is-error');

            if (isAdvancedUpload) // ajax file upload for modern browsers
            {
                e.preventDefault();

                // gathering the form data
                var ajaxData = new FormData(form);
                if (droppedFiles)
                {
                    Array.prototype.forEach.call(droppedFiles, function (file)
                    {
                        ajaxData.append(input.getAttribute('name'), file);
                    });
                }

                // ajax request
                var ajax = new XMLHttpRequest();
                ajax.open(form.getAttribute('method'), form.getAttribute('action'), true);

                ajax.onload = function ()
                {
                    form.classList.remove('is-uploading');
                    if (ajax.status >= 200 && ajax.status < 400)
                    {
                        var data = JSON.parse(ajax.responseText);
                        form.classList.add(data.success == true ? 'is-success' : 'is-error');
                        if (!data.success)
                            errorMsg.textContent = data.error;
                    } else
                        alert('Error. Please, contact the webmaster!');
                };

                ajax.onerror = function ()
                {
                    form.classList.remove('is-uploading');
                    alert('Error. Please, try again!');
                };

                ajax.send(ajaxData);
            } else // fallback Ajax solution upload for older browsers
            {
                var iframeName = 'uploadiframe' + new Date().getTime(),
                        iframe = document.createElement('iframe');

                $iframe = $('<iframe name="' + iframeName + '" style="display: none;"></iframe>');

                iframe.setAttribute('name', iframeName);
                iframe.style.display = 'none';

                document.body.appendChild(iframe);
                form.setAttribute('target', iframeName);

                iframe.addEventListener('load', function ()
                {
                    var data = JSON.parse(iframe.contentDocument.body.innerHTML);
                    form.classList.remove('is-uploading')
                    form.classList.add(data.success == true ? 'is-success' : 'is-error')
                    form.removeAttribute('target');
                    if (!data.success)
                        errorMsg.textContent = data.error;
                    iframe.parentNode.removeChild(iframe);
                });
            }
        });


        // restart the form if has a state of error/success
        Array.prototype.forEach.call(restart, function (entry)
        {
            entry.addEventListener('click', function (e)
            {
                e.preventDefault();
                form.classList.remove('is-error', 'is-success');
                input.click();
            });
        });

        // Firefox focus bug fix for file input
        input.addEventListener('focus', function () {
            input.classList.add('has-focus');
        });
        input.addEventListener('blur', function () {
            input.classList.remove('has-focus');
        });

    });
}(document, window, 0));


//  Add User call
function add_user(event) {
    event.preventDefault();
    $.ajax(
            {
                url: 'http://dfg.e4buzz.com/oc/?route=feed/web_api/customer_register',
                type: "POST",
                crossDomain: true,
                data: $('form.add_user').serialize(),
                dataType: 'html',
                success: function (data) {
                    var data_c = JSON.parse(data);
                    if(data_c.responseCode == 1){
                        $('.addusermodal-bg').fadeOut(700, function () {});
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    console.log(jqXHR);
                }
            });
}