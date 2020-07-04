(function ($) {
  $(document).ready(function () {
    // improve scrolling performance
    // document.addEventListener('touchstart', onTouchStart, {passive: true});
    // Reload page on orientatiion change
        window.onorientationchange = function() {
                let orientation = window.orientation;
                    switch(orientation) {
                        case 0:
                        case 90:
                        case -90: window.location.reload();
                        break; }
            };
        // Reload on resize
          // var windowWidth = $(window).width();
          let windowHeight = $(window).height();

          $(window).resize(function() {
            if(windowWidth != $(window).width() || windowHeight != $(window).height()) {
              location.reload();
              return;
            }
          });
    // Open Modal
        $('button.openBtn').on('click', function(event) {
            event.preventDefault();
            // Get id from buttons
            $id = $(this).attr('data-href');
            $('.modal.fade').attr('id', $id);
            let post_slug = $('.modal').attr('id');
            let post_title = $('.modal_title').html();
            let modal_html = $('.modal-body').html();
            // Ajax Request
            $.ajax({
              url: frontend_ajax_object.ajaxurl,
              type: "POST",

              data: { // We pass php values differently! display php content
                'action': 'load_page_modal',
                'post_slug': $id,
                'post_title': post_title
              }
            }).done(function(response) {
                $('#modal-home').html(response); // Afficher le HTML
            });
        });
        // Close Modal
        $('button.closed').on('click', function(event){
            event.preventDefault();
            $('.modal-body').empty();
        })
    /*--------------------------------------------------------------*/
        setTimeout(function() {
            if(window.scrollY === 0) {
                jQuery('#backtop').fadeOut(1000);
            }
        },300);
    /*--------------------------------------------------------------*/
        window.onscroll = function () {
            let scrollPos = document.documentElement.scrollTop || document.body.scrollTop;
            // console.log(scrollPos);
            if(scrollPos < 200) {
                jQuery('#backtop').fadeOut(2000);
            }
            else if(scrollPos > 201) {
                jQuery('#backtop').fadeIn(2000);
            }
        };
    /*--------------------------------------------------------------*/
    // Set attributes of viewport for responsive
        setTimeout(function () {
        // Fix bug to avoid elements to shrink when keyboard is launch
                let viewheight = $(window).height();
                let viewwidth = $(window).width();
                let viewport = document.querySelector("meta[name=viewport]");
                viewport.setAttribute("content", "height=" + viewheight + ", width=" + viewwidth + ", initial-scale=1.0");
            }, 300);
        // Fix problem of interface browsers
        // We listen to the resize event
        roundLogo = () => {
            //Resize round above logo
            let logoSize = document.getElementById('figlogo').offsetHeight;
            document.getElementById('angel').style.setProperty('--heightRoundLogo', `${logoSize}px`);
        }
        roundLogo();
        window.addEventListener('resize', () => {
            // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
            let vh = window.innerHeight * 0.01;
            // Then we set the value in the --vh custom property to the root of the document
            document.getElementById('angel').style.setProperty('--vh', `${vh}px`);
            // Bottom Logo Circle
            roundLogo();
        });
    /*--------------------------------------------------------------*/
        // Remove empty p Tag
        $('p').each(function(index, item) {
            if ($.trim($(item).text()) === "") {
                $(item).remove();
                // $(item).slideUp();
            }
        });
    /*--------------------------------------------------------------*/
        // Slick Carousel init
          $('.slick-carousel').slick({
              dots: true,
              infinite: true,
              speed: 500,
              slidesToShow: 1,
              adaptiveHeight: false,
              autoplay: true,
              autoplaySpeed: 15000,
              arrows: false,
              mobileFirst:true
          });
    /*--------------------------------------------------------------*/
        // Counter Home
        $('.count-up').each(function () {
          let $this = $(this);
          jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
            duration: 1000,
            easing: 'swing',
            step: function () {
              $this.text(Math.ceil(this.Counter));
            }
          });
        });
    /*--------------------------------------------------------------*/
        // Accordion Cross
        let $cross = $(".card-header h5");
        $cross.click(function(e) {
            e.preventDefault();
            $cross.not(this).addClass('add-before').removeClass('open');
            $(this).toggleClass('add-before open');
        });
        // Scroll to Top
        $(".card h5").click(function() {
            var currentWidth = $(window).width();
            var xScroll = currentWidth < 767 ? 0 : 170;
            $('html, body').animate({
                scrollTop: $('#accordion').offset().top - xScroll
            }, 1000);
        });
    /*--------------------------------------------------------------*/
        // Partners
        let $container = $( "#partners" );
        let $openPartners = $('.btn-open');
        let $closeCross = $( ".close-cross" );
        // Bind the link to toggle the slide.
        $openPartners.on('click', function( event ) {
                // Prevent the default event.
                event.preventDefault();
                // Toggle the slide based on its current
                // visibility.
                if ($container.is( ":visible" )) {
                    // slide Down.
                    $container.slideUp( 500 );
                    $container.attr('aria-hidden','true');
                    $openPartners.addClass('close-partners');
                    $openPartners.removeClass('open-partners');
                    $closeCross.fadeOut(800);
                } else {
                    // slide Up.
                    $container.slideDown( 800 );
                    $container.removeAttr('aria-hidden');
                    $openPartners.addClass('open-partners');
                    $openPartners.removeClass('close-partners');
                    $closeCross.fadeIn(200);
                }
            });
        $closeCross.on('click', function(event) {
            event.preventDefault();
            $container.slideToggle(400, function() {
                $closeCross.fadeOut(100);
            });
            $openPartners.addClass('close-partners');
        });
    /*--------------------------------------------------------------*/
        // Smooth Scroll
        $('a.top, .smooth-scroll').on('click', function(e) {
            let $urlSection = $(this).attr('href');
            // prevent default anchor click behavior
            e.preventDefault();
            // store hash
            const $urlBase = new URL('https://www.angelus-plongee.com/' + $urlSection);
            newHash = $urlBase.hash;
            // debugger;

            // animate to the top
            $('html, body').animate({
                scrollTop: $(newHash).offset().top
            }, 600, function() {
            jQuery('#backtop').fadeOut(2000);

                // when done, add hash to url
                // (default click behaviour)
                window.location.hash = newHash;
            });
        });
    /*--------------------------------------------------------------*/
        /* Display adaptative Navigation */
        let navigation = $('.navigation.topnav'),
            windowWidth = $(window).width(),
            $burgerMenu = $('#burgerMenu'),
            $body = $('body'),
            $closeMenu = $('.close-menu');

            // Hamburger Menu
        if (windowWidth < 960) {
            closedMenu = () => {
                $burgerMenu.slideUp();
                $burgerMenu.fadeOut();
                $closeMenu.fadeOut();
                $body.removeClass('fix-menu-burger');
            }
            $(function() {
                // Open Burger Menu
                $('.bar-menu').on('click', function(event) {
                    event.preventDefault();
                    $burgerMenu.slideDown();
                    $burgerMenu.fadeIn(200);
                    $closeMenu.fadeIn(200);
                    $body.addClass('fix-menu-burger');
                });
                // Close Burger Menu
                $closeMenu.on('click', function() {
                    closedMenu();
                })
            });
            // Close menu when click outside hamburger
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.bar-menu').length) {
                    closedMenu();
                }
            });
        }
    /*--------------------------------------------------------------*/
        /* Home Height */
        heightAdaptWindow = () => {
            let heightMenu = $('#container-main-menu').outerHeight(true);
            let heightHomeBody = $(window).height();
            let heightMobileMenu = $('#mobile-menu').outerHeight(true);
            let heightTitle = $('h1').outerHeight(true); // include Margin
            let heightSubTitle = $('h2.sub-title').outerHeight(true);
            let heightCTA = $('.cta_home').outerHeight(true);
            if (windowWidth > 960) {
                let heightHomeSection = heightHomeBody -(heightTitle + heightMenu + heightSubTitle + heightCTA);
                $('#home').css('height', heightHomeSection);
            }
            else if (windowWidth < 960 && $('#mobile-menu').length) {
                let heightHomeSection = heightHomeBody -(heightTitle + heightMobileMenu + heightSubTitle + heightCTA);
                $('#home').css('height', heightHomeSection);
                $('.home').css('height', heightHomeBody);
            }
        }
    /*--------------------------------------------------------------*/
        heightAdaptWindow();
  });
})(jQuery);
