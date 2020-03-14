'use strict';
jQuery(function($) {
    var $Body = $('body'),
        $Window = $(window),
        $Preloader = $('#Preloader'),
        $Document = $(document);
    Loader();
    Instagram();
    Burger();
    Owls();
    Scroll();
    Lightbox();
    $('.ba-slider').beforeAfter();

    function areClipPathShapesSupported() {
        var base = 'clipPath',
            prefixes = ['webkit', 'moz', 'ms', 'o'],
            properties = [base],
            testElement = document.createElement('testelement'),
            attribute = 'polygon(50% 0%, 0% 100%, 100% 100%)';
        for (var i = 0, l = prefixes.length; i < l; i++) {
            var prefixedProperty = prefixes[i] + base.charAt(0).toUpperCase() + base.slice(1);
            properties.push(prefixedProperty);
        }
        for (var i = 0, l = properties.length; i < l; i++) {
            var property = properties[i];
            if (testElement.style[property] === '') {
                testElement.style[property] = attribute;
                if (testElement.style[property] !== '') {
                    return true;
                }
            }
        }
        return false;
    };
    var ClipPaths = areClipPathShapesSupported();

    function Reveals() {
        window.sr = ScrollReveal();
        if ($Body.width() > 767) {
            sr.reveal('.WidthWrapper:not(.NoReveal)', {
                duration: 600,
                scale: 1,
                distance: '50px',
                easing: 'ease-in-out',
                viewFactor: 0.05
            });
        } else {
            sr.reveal('.WidthWrapper:not(.NoReveal)', {
                duration: 600,
                scale: 1,
                distance: '50px',
                easing: 'ease-in-out',
                viewFactor: 0.05
            });
        }
    }

    function StevenCarousel() {
        $('.StevenCarousel').each(function() {
            var $Element = $(this);
            var $Slides = $Element.find('.CarouselItem');
            var $Nav;
            var $Navs;
            var $Next;
            var ZIndex = 10;
            var Current = 0;
            var Animation = false;
            var First = true;
            var Size = $Slides.length;
            $Slides.each(function() {
                var $This = $(this);
                if (ClipPaths && $Body.width() > 767) {
                    $This.css('clip-path', 'circle(0px at ' + $This.attr('data-clip-x') + ' ' + $This.attr('data-clip-y') + ')');
                    $This.css('opacity', '1');
                } else {
                    $This.css('opacity', '0');
                    $This.css('clip-path', 'none');
                }
                if (ClipPaths && $Body.width() <= 767) {
                    $Slides.css('opacity', '0');
                    $Slides.css('clip-path', 'none');
                    $Slides.eq(0).css('clip-path', 'circle(0px at ' + $This.attr('data-clip-x') + ' ' + $This.attr('data-clip-y') + ')');
                }
            });
            setTimeout(function() {
                _Activate(Current);
            }, 400);
            _GenerateNav();
            if ($Slides.length > 1) {
                var Interval = setInterval(function() {
                    setTimeout(function() {
                        Current++;
                        if (Current >= Size) {
                            Current = 0;
                        }
                        _Activate(Current);
                    }, 50);
                }, 7000);
            }
            var Clicktimeout;

            function _GenerateNav() {
                $Element.append('<ul class="CarouselNav"></ul>');
                $Nav = $Element.find('.CarouselNav');
                for (var i = 0; i < Size; i++) {
                    var Show = i + 1;
                    if (Show < 10) {
                        Show = "0" + Show;
                    }
                    $Nav.append('<li><button data-target="' + i + '">' + Show + '</button></li>');
                }
                $Nav.append('<li><button class="Next" data-target="NEXT"><span>></span></button></li>');
                $Nav.on('click', '[data-target]', function() {
                    if (Interval) {
                        window.clearInterval(Interval);
                    }
                    $Element.addClass('Intervaled');
                    if ($(this).attr('data-target') == 'NEXT') {
                        Current++;
                        if (Current >= Size) {
                            Current = 0;
                        }
                        console.log(Current);
                        _Activate(Current);
                    } else {
                        Current = parseInt($(this).attr('data-target'), 10);
                        console.log(Current);
                        _Activate(Current);
                    }
                });
                $Navs = $Nav.find('button');
                if ($Slides.length <= 1) {
                    $Nav.css('display', 'none');
                    $Element.addClass('Intervaled');
                }
            }

            function _Activate(Position) {
                if ($Slides.eq(Position).hasClass('Current')) {
                    return false;
                }
                if (Animation) {
                    window.clearTimeout(Clicktimeout);
                    Clicktimeout = setTimeout(function() {
                        _Activate(Position);
                    }, 100);
                    return false;
                }
                Animation = true;
                $Element.removeClass('Interval');
                if (ClipPaths) {
                    $Slides.eq(Position).css('clip-path', 'circle(0px at ' + $Slides.eq(Position).attr('data-clip-x') + ' ' + $Slides.eq(Position).attr('data-clip-y') + ')');
                } else {
                    $Slides.eq(Position).css('opacity', '0');
                }
                if (ClipPaths && $Body.width() <= 767) {
                    if (First) {
                        $Slides.eq(Position).css('clip-path', 'circle(0px at ' + $Slides.eq(Position).attr('data-clip-x') + ' ' + $Slides.eq(Position).attr('data-clip-y') + ')');
                        $Slides.eq(Position).css('opacity', '1');
                    } else {
                        $Slides.eq(Position).css('clip-path', 'none');
                        $Slides.eq(Position).css('opacity', '0');
                    }
                }
                ZIndex++;
                $Slides.eq(Position).css('z-index', ZIndex);
                $Navs.removeClass('Current');
                setTimeout(function() {
                    $Element.addClass('Interval');
                    $Slides.eq(Position).addClass('Animated');
                    $Slides.eq(Position).addClass('Current');
                    $Navs.eq(Position).addClass('Current');
                    $Element.find('.CarouselItem:not(:eq(' + Position + '))').each(function() {
                        var $This = $(this);
                        $This.removeClass('Current');
                    });
                }, 100);
                setTimeout(function() {
                    if (First) {
                        First = false;
                        if (ClipPaths) {
                            $Slides.eq(Position).css('clip-path', 'circle(100vmax at ' + $Slides.eq(Position).attr('data-clip-x') + ' ' + $Slides.eq(Position).attr('data-clip-y') + ')');
                        } else {
                            $Slides.eq(Position).css('opacity', '1');
                        }
                    } else {
                        if (ClipPaths && $Body.width() >= 768) {
                            $Slides.eq(Position).css('clip-path', 'circle(100vmax at ' + $Slides.eq(Position).attr('data-clip-x') + ' ' + $Slides.eq(Position).attr('data-clip-y') + ')');
                        } else {
                            $Slides.eq(Position).css('opacity', '1');
                        }
                    }
                }, 200);
                setTimeout(function() {
                    $Slides.eq(Position).removeClass('Animated');
                    Animation = false;
                }, 2000);
            }
        });
    }

    function Lightbox() {
        $Body.on('click', '.Lightbox[data-lightbox]', function() {
            var $Trigger = $(this);
            $Trigger.addClass('Active');
            $Body.css('overflow', 'hidden');
            $Body.append('<div class="TheLightbox"><span class="TheLightbox__Fader" style="top:' + $Trigger[0].getBoundingClientRect().top + 'px; left:' + $Trigger[0].getBoundingClientRect().left + 'px; width:' + $Trigger.outerWidth() + 'px; height:' + $Trigger.outerHeight() + 'px;"></span><div class="Spinner"></div><button class="TheLightbox__Close"><span>Close</span></button><img class="TheLightbox__Image" src="" alt="" /></div>');
            var $TheLightbox = $('.TheLightbox');
            var $Image = $TheLightbox.find('.TheLightbox__Image');
            $Image.load(function() {
                $TheLightbox.addClass('Loaded');
            });
            $Image.attr('src', $Trigger.attr('data-lightbox'));
            setTimeout(function() {
                $TheLightbox.addClass('Active');
            }, 100);
            setTimeout(function() {
                $TheLightbox.addClass('Activated');
            }, 1500);
            $TheLightbox.on('click', function() {
                $TheLightbox.addClass('Closing');
                setTimeout(function() {
                    $TheLightbox.remove();
                    $Body.css('overflow', 'auto');
                }, 1600);
            });
        });
    }

    function Scroll() {
        $Window.on('scroll', function() {
            if ($Document.scrollTop() > 0) {
                $Body.addClass('AfterScroll');
            } else {
                $Body.removeClass('AfterScroll');
            }
            if ($Document.scrollTop() > 300) {
                $Body.addClass('AfterScrollMore');
            } else {
                $Body.removeClass('AfterScrollMore');
            }
        });
        if ($Document.scrollTop() > 0) {
            $Body.addClass('AfterScroll');
        } else {
            $Body.removeClass('AfterScroll');
        }
        if ($Document.scrollTop() > 300) {
            $Body.addClass('AfterScrollMore');
        } else {
            $Body.removeClass('AfterScrollMore');
        }
    }

    function Owls() {
        $('.Products__Carousel').owlCarousel({
            smartSpeed: 1000,
            center: true,
            startPosition: 1,
            dots: false,
            nav: true,
            navText: ['ZURÜCK', 'WEITER'],
            autoHeight: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                }
            }
        });
        $('.Marke__Carousel').owlCarousel({
            items: 1,
            smartSpeed: 1000,
            dots: false,
            nav: true,
            navText: ['ZURÜCK', 'WEITER']
        });
    }

    function Burger() {
        var $Trigger = $('.SiteHeader__Burger'),
            $Nav = $('.SiteHeader__Nav');
        var $Logo = $('.SiteHeader__Logo'),
            $Navs = $Nav.find('a');
        $('.BackToTop').on('click', function() {
            $('body,html').animate({
                scrollTop: 0
            }, 1500);
        });
        $Logo.on('click', function() {
            if ($Body.hasClass('page-template-page-home')) {
                $('body,html').animate({
                    scrollTop: 0
                }, 1500);
                setTimeout(function() {
                    $Trigger.removeClass('Active');
                    $Nav.removeClass('Active');
                    $Body.removeClass('Menu');
                }, 300);
                return false;
            }
        });
        $Navs.on('click', function(event) {
            var Hash = this.hash;
            if (Hash !== "" && $(Hash).length) {
                event.preventDefault();
                if ($Body.width() > 767) {
                    $('body,html').animate({
                        scrollTop: $(Hash).offset().top - 150
                    }, 1500);
                } else {
                    $('body,html').animate({
                        scrollTop: $(Hash).offset().top - 75
                    }, 1500);
                }
                setTimeout(function() {
                    $Trigger.removeClass('Active');
                    $Nav.removeClass('Active');
                    $Body.removeClass('Menu');
                }, 300);
                return false;
            }
        });
        var OldScrollTop;
        $Trigger.on('click', function() {
            $Trigger.toggleClass('Active');
            $Nav.toggleClass('Active');
            if ($Trigger.hasClass('Active')) {
                setTimeout(function() {
                    OldScrollTop = $Window.scrollTop();
                    $Body.addClass('Menu');
                }, 1200);
            } else {
                $('body,html').animate({
                    scrollTop: OldScrollTop
                }, 0);
                $Body.removeClass('Menu');
            }
            return false;
        });
    }

    function Instagram() {
        $('.Instagram__List').each(function() {
            var $Element = $(this),
                Feed = [];
            $.get('https://api.instagram.com/v1/users/' + INSTAGRAM_USER_ID + '/media/recent/?client_id=' + INSTAGRAM_CLIENT_ID + '&access_token=' + INSTAGRAM_TOKEN, function(Response) {
                if (Response.meta.code != 200) {
                    return false;
                }
                $(Response.data).each(function() {
                    var TheDate = new Date(this.caption.created_time * 1000);
                    TheDate = TheDate.toLocaleDateString("en-US") + ' ' + TheDate.toLocaleTimeString();
                    Feed.push({
                        'content': this.caption.text,
                        'date': TheDate,
                        'image': this.images.standard_resolution.url,
                        'link': this.link
                    });
                })
                for (var i = 1; i < Feed.length && i < 4; i++) {
                    $Element.append('<a href="' + Feed[i].link + '"><div class="Image"><div class="Height" style="background-image:url(\'' + Feed[i].image + '\');"></div></div><div class="Content">' + Feed[i].content + '</div></a>');
                }
            });
        });
    }

    function Loader() {
        $Window.on('load', function() {
            $Body.addClass('Loaded');
            StevenCarousel();
            Reveals();
            if (window.location.hash) {
                if ($Body.width() > 767) {
                    $('body,html').animate({
                        scrollTop: $(window.location.hash).offset().top - 150
                    }, 0);
                } else {
                    $('body,html').animate({
                        scrollTop: $(window.location.hash).offset().top - 75
                    }, 0);
                }
            }
            $Preloader.animate({
                opacity: 0
            }, 1000, function() {
                $Preloader.remove();
            });
        });
    }
});