"use strict";
jQuery.each(portfolio_param_obj, function (index, value) {
    if (!isNaN(value)) {
        portfolio_param_obj[index] = parseInt(value);
    }
});

function Portfolio_Gallery_Faq(id) {
    var _this = this;
    _this.container = jQuery('#' + id + '.view-faq');
    _this.hasLoading = _this.container.data("show-loading");
    _this.optionsBlock = _this.container.parent().find('div[id^="huge_it_portfolio_options_"]');
    _this.filtersBlock = _this.container.parent().find('div[id^="huge_it_portfolio_filters_"]');
    _this.content = _this.container.parent();
    _this.element = _this.container.find('.portelement');
    _this.defaultBlockWidth = portfolio_param_obj.portfolio_gallery_ht_view4_block_width;
    _this.optionSets = _this.optionsBlock.find('.option-set');
    _this.optionLinks = _this.optionSets.find('a');
    _this.sortBy = _this.optionsBlock.find('#sort-by');
    _this.dropdownable = _this.element.find('div.dropdownable');
    _this.titleBlock = _this.element.find('.title-block');
    _this.filterButton = _this.filtersBlock.find('ul li');
    if (_this.container.data('show-center') == 'on' && ( ( !_this.content.hasClass('sortingActive') && !_this.content.hasClass('filteringActive') )
        || ( _this.optionsBlock.data('sorting-position') == 'top' && _this.filtersBlock.data('filtering-position') == 'top' ) ||
        ( _this.optionsBlock.data('sorting-position') == 'top' && !_this.content.hasClass('filteringActive') ) || ( !_this.content.hasClass('sortingActive') && _this.filtersBlock.data('filtering-position') == 'top' ) )) {
        _this.isCentered = _this.container.data("show-center");
    }
    _this.documentReady = function () {
        var options = {
            itemSelector: _this.element,
            masonry: {
                columnWidth: _this.defaultBlockWidth + 15 + portfolio_param_obj.portfolio_gallery_ht_view4_element_border_width * 2,
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
    };

    _this.manageLoading = function () {
        if (_this.hasLoading) {
            _this.container.css({'opacity': 1});
            _this.optionsBlock.css({'opacity': 1});
            _this.filtersBlock.css({'opacity': 1});
            _this.content.find('div[id^="huge-it-container-loading-overlay_"]').css('display', 'none');
        }
    };

    _this.showCenter = function () {
        if (_this.isCentered) {
            var count = _this.element.length;
            var elementwidth = _this.defaultBlockWidth + 10 + portfolio_param_obj.portfolio_gallery_ht_view4_element_border_width * 2;
            var enterycontent = _this.content.width();
            var whole = ~~(enterycontent / (elementwidth));
            if (whole > count) whole = count;
            if (whole == 0) {
                return false;
            }
            else {
                var sectionwidth = whole * elementwidth + (whole - 1) * 20;
            }
            _this.container.width(sectionwidth).css({
                "margin": "0px auto",
                "overflow": "hidden"
            });
        }
    };


    _this.addEventListeners = function () {
        _this.optionLinks.on('click', _this.optionsClick);
        _this.optionsBlock.find('#shuffle a').on('click', _this.randomClick);
        _this.titleBlock.on('click', _this.dropdownableClick);
        _this.dropdownable.on('click', _this.dropdownableClick);
        _this.filterButton.on('click', _this.filtersClick);
        jQuery(window).resize(_this.resizeEvent);


    };
    _this.resizeEvent = function () {
        _this.showCenter();
        var loadInterval = setInterval(function(){
            portfolioGalleryIsotope(_this.container,'layout');
        },100);
        setTimeout(function(){clearInterval(loadInterval);},5000);
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
    _this.dropdownableClick = function () {
        if (jQuery(this).parents('.portelement').hasClass("large")) {
            jQuery(this).parents('.portelement').animate({//
                height: 45 + 2 * portfolio_param_obj.portfolio_gallery_ht_view4_element_border_width + "px"//pakeluc heto erevacox masi chap@
            }, 700, function () {
                jQuery(this).removeClass('large');
                portfolioGalleryIsotope(_this.container,'layout');
            });

            jQuery(this).parents('.portelement').removeClass("active");
            return false;
        }


        jQuery(this).parents('.portelement').css({height: 45 + jQuery(this).parents('.portelement').find('.wd-portfolio-panel').height()});
        jQuery(this).parents('.portelement').addClass('large');

        portfolioGalleryIsotope(_this.container,'layout');
        jQuery(this).parents('.portelement').css({height: "45px"});

        var strheight = (jQuery(this).parents('.portelement').find('.wd-portfolio-panel').height() + 35 + 2 * portfolio_param_obj.portfolio_gallery_ht_view4_element_border_width);


        jQuery(this).parents('.portelement').animate({
            height: strheight + "px",
        }, 700, function () {
            portfolioGalleryIsotope(_this.container,'layout');
        });
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

    _this.init = function () {
        _this.showCenter();
        jQuery(window).load(_this.manageLoading);
        _this.documentReady();
        _this.addEventListeners();
    };

    this.init();
}
var portfolios = [];
jQuery(document).ready(function () {
    jQuery(".huge_it_portfolio_container.view-faq").each(function (i) {
        var id = jQuery(this).attr('id');
        portfolios[i] = new Portfolio_Gallery_Faq(id);
    });
});
