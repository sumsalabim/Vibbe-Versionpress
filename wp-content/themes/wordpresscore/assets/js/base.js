function openNav() {
    $(document).find('.main-navigation').addClass('is-open');
    $('html, body').addClass('no-scroll');
    $(document).find('#burgerButton').addClass('is-active');
}

function closeNav() {
    $(document).find('.main-navigation').removeClass('is-open');
    $('html, body').removeClass('no-scroll');
    $(document).find('#burgerButton').removeClass('is-active');
}
$(window).on('load resize', function () {
    if ($(this).width() > 767) {
        $('html, body').removeClass('no-scroll');
    }
});
$(window).on('scroll load resize', function () {
    if ($(this).scrollTop() > 60) { // this refers to window
        $('.header').addClass('is_scrolled');
    } else {
        $('.header').removeClass('is_scrolled');
    }
});
(function () {
    var app = {
        _startApp: function () {
            this._cache();
            this._domEvents();
            this._toggleSubmenuMobile();
            this._blogFeaturedPostSlider();
        },
        _cache: function () {
            this.nav = $('.main-navigation');
            this.footerToggle = $('.footer__column .footer__title');
        },
        _domEvents: function () {
            $('#burgerButton').on('click', this._menuAction.bind(this));
            $('.menu-item-has-children > a').on('click', this._preventDefaultAction.bind(this));
            this.footerToggle.on('click', this._openFooterDropdown.bind(this));
            $(document).on('mouseup', this._clickOutside.bind(this));

        },
        _preventDefaultAction: function(e) {
            e.preventDefault();
        },
        _menuAction: function() {
            if ($(document).find('.main-navigation').hasClass('is-open')) {
                closeNav();
            } else {
                openNav();
            }
        },
        _toggleSubmenuMobile: function() {
            $('.sub-menu').siblings().on('click', function(e) {
                console.log(this);
                $(this).parent().toggleClass('submenu-open');
            });

        },
        _openFooterDropdown: function (event) {
            var target = $(event.target);
            target.parent().siblings().removeClass("dropdown-open");
            target.parent().toggleClass("dropdown-open");
        },
        _clickOutside: function (event) {
            if (!this.nav.is(event.target) && this.nav.has(event.target).length === 0) {
                this.nav.removeClass('is-open');
            }
        },
        // BLOG

        _blogFeaturedPostSlider: function () {
            var mySwiper = new Swiper ('#blogFeatured', {
                // Optional parameters
                loop: true,
                slidesPerView: 4,
                spaceBetween: 0,
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                    },
                    576: {
                        slidesPerView: 2,
                    },
                    1100: {
                        slidesPerView: 3,
                    },
                    1440: {
                        slidesPerView: 4,
                    }
                }

            })
        },
    };
    $(document).ready(function () {
        app._startApp();
        $(document).find(".copyright__year").text((new Date).getFullYear());

    });
})();