"use strict";
jQuery.each(portfolio_param_obj, function (index, value) {
    if (!isNaN(value)) {
        portfolio_param_obj[index] = parseInt(value);
    }
});
function Portfolio_Gallery_Store(id) {
    var _this = this;
    _this.body = jQuery('body');
    _this.container = jQuery('#' + id + '.view-store');
    _this.title_block=_this.container.find('.huge_it_container-title');
    _this.image_block=_this.container.find('.huge_it_main-carousel-wrapper');
    _this.description_block=_this.container.find('.huge_it_container-details');
    _this.thumbnail_block=_this.container.find('.huge_it_thumbnail-carousel  ');
    _this.thumbnail_ul=_this.container.find('.huge_it_thumbnail-carousel ul ');
    _this.thumbnail_li=_this.container.find('.huge_it_thumbnail-carousel ul li');
    _this.element = _this.container.find('.portelement');
    _this.defaultBlockWidth= portfolio_param_obj.portfolio_gallery_ht_view8_width;
    _this.thumbnail_link=_this.container.find('.huge_it_thumbnail-carousel ul li a ');
    _this.thumbnail_img=_this.container.find('.huge_it_thumbnail-carousel ul li img');
    _this.main_image=_this.container.find('.huge_it_main-image-carousel img ');
    _this.next_button=_this.container.find('.huge_it_thumbnail-next-button');
    _this.prev_button=_this.container.find('.huge_it_thumbnail-prev-button');
    _this.optionsBlock = _this.container.parent().find('div[id^="huge_it_portfolio_options_"]');
    _this.filtersBlock = _this.container.parent().find('div[id^="huge_it_portfolio_filters_"]');
    _this.optionSets = _this.optionsBlock.find('.option-set');
    _this.optionLinks = _this.optionSets.find('a');
    _this.zoomedImage=jQuery('.rwd-img-wrap img');
    _this.sortBy = _this.optionsBlock.find('#sort-by');
    _this.filterButton = _this.filtersBlock.find('ul li');
    _this.hasLoading = _this.container.data("show-loading") == "on";
    _this.optionsBlock = _this.container.parent().find('div[id^="huge_it_portfolio_options_"]');
    _this.filtersBlock = _this.container.parent().find('div[id^="huge_it_portfolio_filters_"]');
    _this.content = _this.container.parent();
    _this.thumbail_icone=_this.container.find('.thumbnail-icon');
    if (_this.container.data('show-center') == 'on' && ( ( !_this.content.hasClass('sortingActive') && !_this.content.hasClass('filteringActive') )
        || ( _this.optionsBlock.data('sorting-position') == 'top' && _this.filtersBlock.data('filtering-position') == 'top' ) ||
        ( _this.optionsBlock.data('sorting-position') == 'top' && !_this.content.hasClass('filteringActive') ) || ( !_this.content.hasClass('sortingActive') && _this.filtersBlock.data('filtering-position') == 'top' ) )) {
        _this.isCentered = _this.container.data("show-center");
    }
    _this.documentReady = function () {
        var options = {
            itemSelector: _this.element,
            masonry: {
                columnWidth: _this.defaultBlockWidth + 15 + portfolio_param_obj.portfolio_gallery_ht_view8_border_width * 2
            },
            masonryHorizontal: {
                rowHeight: 300 + 15
            },
            cellsByRow: {
                columnWidth: 300 + 15,
                rowHeight: 240
            },
            cellsByColumn: {
                columnWidth: 300 + 15,
                rowHeight: 240
            },
            getSortData: {
                symbol: function ($elem) {
                    return $elem.attr('data-symbol');
                },
                category: function ($elem) {
                    return $elem.attr('data-category');
                },
                number: function ($elem) {
                    return parseInt($elem.find('.number').text(), 10);
                },
                weight: function ($elem) {
                    return parseFloat($elem.find('.weight').text().replace(/[\(\)]/g, ''));
                },
                id: function ($elem) {
                    return $elem.find('.id').text();
                }
            }
        };
        portfolioGalleryIsotope(_this.container);
        portfolioGalleryIsotope(_this.container,options);


        _this.container.find('img').on('load', function () {
            portfolioGalleryIsotope(_this.container,'layout');
        });
    };

    _this.resizeEvent = function () {
        _this.showCenter();
        var loadInterval = setInterval(function(){
            portfolioGalleryIsotope(_this.container,'layout');
        },100);
        setTimeout(function(){clearInterval(loadInterval);},5000);
    };
    _this.showCenter = function () {
        if (_this.isCentered) {
            var count = _this.element.length;
            var elementwidth = _this.defaultBlockWidth + 15 + portfolio_param_obj.portfolio_gallery_ht_view8_border_width * 2;
            var enterycontent = _this.content.width();
            var whole = Math.floor(enterycontent / elementwidth);
            if (whole > count) whole = count;
            if (whole == 0) {
                return false;
            }
            else {
                var sectionwidth = whole * elementwidth ;
            }

            _this.container.width(sectionwidth).css({
                "margin": "0px auto",
                "overflow": "hidden"
            });
        }
    };
    var $grid = _this.container.hugeitmicro({
        getSortData: {
            name: '.name',
            load_date: '.load_date ',
            number:'.number parseInt'
        }
    });
    jQuery('.sort-by-button-group').on( 'click', 'a', function() {
        var sortByValue = jQuery(this).attr('data-option-value');
        $grid.hugeitmicro({ sortBy: sortByValue });

    });
    jQuery('.option-set').on( 'click', 'a', function() {
        var sortByKey = jQuery(this).attr('data-option-key');
        var sortByValue = jQuery(this).attr('data-option-value');
        $grid.hugeitmicro({ sortBy:sortByKey ,sortAscending: sortByValue === 'true' });
    });

    _this.randomClick = function () {
        portfolioGalleryIsotope(_this.container,'shuffle');
        _this.sortBy.find('.selected').removeClass('selected');
        _this.sortBy.find('[data-option-value="random"]').addClass('selected');
        return false;
    };
    _this.filtersClick = function () {
        _this.filterButton.each(function () {
            jQuery(this).removeClass('active');
        });
        jQuery(this).addClass('active');
        // get filter value from option value
        var filterValue = jQuery(this).attr('rel');
        // use filterFn if matches value
        filterValue = filterValue;
        portfolioGalleryIsotope(_this.container,{filter: filterValue});
    };
    _this.addEventListeners = function () {
        _this.optionLinks.on('click', _this.optionsClick);
        _this.optionsBlock.find('#shuffle a').on('click', _this.randomClick);
        _this.filterButton.on('click', _this.filtersClick);
        jQuery(window).resize(_this.resizeEvent);


    };


    _this.init = function () {
        _this.showCenter();
        _this.documentReady();
        _this.addEventListeners();
    };

    this.init();

    _this.thumbnail_link.each(function () {
        if(jQuery(this).hasClass('responsive_lightbox' ))
        {
            jQuery(this).removeClass('responsive_lightbox' );
        }

    });

    _this.thumbnail_link.each(function () {
        jQuery(this).click(function (e) {
            e.preventDefault();

            _this.thumbnail_link.each(function(){
                if(!jQuery(this).hasClass('p_responsive_lightbox')){
                    jQuery(this).addClass('p_responsive_lightbox');
                }
            });

            jQuery(this).removeClass('p_responsive_lightbox');

            if(jQuery('.main-icon').hasClass('main-you-icon')){
                jQuery('.main-icon').removeClass('youtube-icon').removeClass('main-you-icon');
            }
            if(jQuery('.main-icon').hasClass('main-vim-icon')){
                jQuery('.main-icon').removeClass('vimeo-icon').removeClass('main-vim-icon');
            }
            var thumb_src = jQuery(this).attr('href');
            _this.main_image.attr("src", thumb_src);
            _this.main_image.parent().attr("href", thumb_src);

        });
    });

    jQuery('.thumb-you-icon').each(function () {
        jQuery(this).click(function (e) {

            _this.thumbnail_link.each(function(){
                if(!jQuery(this).hasClass('p_responsive_lightbox')){
                    jQuery(this).addClass('p_responsive_lightbox');
                }
            });

            jQuery(this).parent().find('a').removeClass('p_responsive_lightbox');


            if(!jQuery('.main-icon').hasClass('main-you-icon')){
                jQuery('.main-icon')
                    .removeClass('vimeo-icon').removeClass('main-vim-icon')
                    .addClass('youtube-icon').addClass('main-you-icon');
            } else {
                jQuery('.main-icon').css('display', 'block');
            }


            var thumb_href =  jQuery(this).data('href');
            var thumb_src =  jQuery(this).data('src');
            _this.main_image.attr("src", thumb_src);
            _this.main_image.parent().attr("href", thumb_href);

        });
    });

    jQuery('.thumb-vimeo-icon').each(function () {
        jQuery(this).click(function (e) {

            _this.thumbnail_link.each(function(){
                if(!jQuery(this).hasClass('p_responsive_lightbox')){
                    jQuery(this).addClass('p_responsive_lightbox');
                }
            });

            jQuery(this).parent().find('a').removeClass('p_responsive_lightbox');

            if(!jQuery('.main-icon').hasClass('main-vim-icon')){
                jQuery('.main-icon')
                    .removeClass('youtube-icon').removeClass('main-you-icon')
                    .addClass('vimeo-icon').addClass('main-vim-icon');
            } else {
                jQuery('.main-icon').css('display', 'block');
            }


            var thumb_href =  jQuery(this).data('href');
            var thumb_src =  jQuery(this).data('src');
            _this.main_image.attr("src", thumb_src);
            _this.main_image.parent().attr("href", thumb_href);

        });
    });


    var position = 0;
    var count = _this.thumbnail_li.length;
    var height=  _this.thumbnail_li.height();
    var n = 1;  var k = 1;

    _this.next_button.on('click', function () {


        _this.thumbnail_ul.animate({scrollTop:200},300,'linear',function(){
            jQuery(this).scrollTop(0).find('li:first').before(jQuery('li:last', this));
        });

    });

    _this.prev_button.on('click', function () {

        _this.thumbnail_ul.animate({scrollTop: 200}, 300, 'linear', function () {
            jQuery(this).scrollTop(0).find('li:last').after(jQuery('li:first', this));
        });

    });


}
var portfolios=[];
jQuery(document).ready(function () {
    jQuery(".view-store").each(function (i) {
        var id = jQuery(this).attr('id');
        portfolios[i]  = new Portfolio_Gallery_Store(id);
    });
});

jQuery(window).load(function(){
     jQuery('a.huge_it_portfolio_item').each(function () {
        if(jQuery(this).hasClass('portfolio_responsive_lightbox'))
        {
            jQuery(this).removeClass('portfolio_responsive_lightbox')
        }
    });
    jQuery('.huge_it_thumbnail a').eq(0).removeClass('p_responsive_lightbox');
});

