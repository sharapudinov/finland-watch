jQuery.noConflict();

jQuery(document).ready(function () {
    var jcarousel = jQuery('.jcarousel.slider-two');

    jcarousel
        .on('jcarousel.slider-two:reload jcarousel.slider-two:create', function () {
            var width = jcarousel.innerWidth();

            //if (width >= 600) {
            //  width = width / 4;
            //} else if (width >= 350) {
            //    width = width / 2;
            // }

            jcarousel.jcarousel('items').css('width', width + 'px');
        })
        .jcarousel({
            wrap: 'circular'
        });

    jQuery('.jcarousel-control-prev')
        .jcarouselControl({
            target: '-=1'
        });

    jQuery('.jcarousel-control-next')
        .jcarouselControl({
            target: '+=1'
        });

    jQuery('.jcarousel-pagination')
        .on('jcarouselpagination:active', 'a', function () {
            jQuery(this).addClass('active');
        })
        .on('jcarouselpagination:inactive', 'a', function () {
            jQuery(this).removeClass('active');
        })
        .on('click', function (e) {
            e.preventDefault();
        })
        .jcarouselPagination({
            perPage: 1,
            item: function (page) {
                return '<a href="#' + page + '">' + page + '</a>';
            }
        });
});

