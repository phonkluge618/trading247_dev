function css_browser_selector(u) { var ua = u.toLowerCase(), is = function (t) { return ua.indexOf(t) > -1 }, g = 'gecko', w = 'webkit', s = 'safari', o = 'opera', m = 'mobile', h = document.documentElement, b = [(!(/opera|webtv/i.test(ua)) && /msie\s(\d)/.test(ua)) ? ('ie ie' + RegExp.jQuery1) : is('firefox/2') ? g + ' ff2' : is('firefox/3.5') ? g + ' ff3 ff3_5' : is('firefox/3.6') ? g + ' ff3 ff3_6' : is('firefox/3') ? g + ' ff3' : is('gecko/') ? g : is('opera') ? o + (/version\/(\d+)/.test(ua) ? ' ' + o + RegExp.jQuery1 : (/opera(\s|\/)(\d+)/.test(ua) ? ' ' + o + RegExp.jQuery2 : '')) : is('konqueror') ? 'konqueror' : is('blackberry') ? m + ' blackberry' : is('android') ? m + ' android' : is('chrome') ? w + ' chrome' : is('iron') ? w + ' iron' : is('applewebkit/') ? w + ' ' + s + (/version\/(\d+)/.test(ua) ? ' ' + s + RegExp.jQuery1 : '') : is('mozilla/') ? g : '', is('j2me') ? m + ' j2me' : is('iphone') ? m + ' iphone' : is('ipod') ? m + ' ipod' : is('ipad') ? m + ' ipad' : is('mac') ? 'mac' : is('darwin') ? 'mac' : is('webtv') ? 'webtv' : is('win') ? 'win' + (is('windows nt 6.0') ? ' vista' : '') : is('freebsd') ? 'freebsd' : (is('x11') || is('linux')) ? 'linux' : '', 'js']; c = b.join(' '); h.className += ' ' + c; return c; }; css_browser_selector(navigator.userAgent);

jQuery(function () {
    searchAssets();
    jQuery('.login input').placeHolder();
    setInterval(function () {
        var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
        var d = new Date();
        d.setDate(d.getDate());
        var o = ('0' + d.getHours()).slice(-2) + ' : ' + ('0' + d.getMinutes()).slice(-2) + ' : ' +
                ('0' + d.getSeconds()).slice(-2) + ' - ' + dayNames[d.getDay()] + " " +
                ('0' + d.getDate()).slice(-2) + ' ' + ('0' +parseInt(d.getMonth()+1)).slice(-2) + ' ' + d.getFullYear();
        jQuery('.dateTime').html(o);
    }, 1000);
    jQuery('.language').on('click', function () {
        var lang = jQuery(this);
        //view selection
        lang.find('ul').slideToggle('fast');
    });
    jQuery('.language ul li').on('click', function (o) {
        o.preventDefault();
        var iClass = jQuery(this).find('a i').attr('class'),
            text = jQuery(this).find('a').text();
        jQuery(this).parents('.language').find('span').text(text);
        jQuery(this).parents('.language').find('span').prepend('<i class="' + iClass + '" />');
    });
    //Side Navigation Hover
    jQuery('.side-nav li.current_page_item').prepend('<i class="l"></i>').append('<i class="r"></i>');
    jQuery('.side-nav li').hover(function () {
        var li = jQuery(this);
        if (!jQuery(this).hasClass('current_page_item') && !jQuery(this).is(':last-child')) {
            li.prepend('<i class="l"></i>').append('<i class="r"></i>');
        }
    }, function () {
        if (!jQuery(this).hasClass('current_page_item')) {
            jQuery(this).find('i.l, i.r').remove();
        }
    });

    //Step Trading
    jQuery('ol.trade-steps li').each(function (i) {
        jQuery(this).find('article').prepend('<h2>Step ' + (jQuery(this).index() + 1) + '</h2>');
    });
    jQuery('.atrade').each(function () {
        var atrade = jQuery(this);
        if (atrade.height() < 600) {
            atrade.parents('.viewport').height(atrade.height())
        }
    });
    if (jQuery('html').hasClass('lt-ie10')) {
        var wheelScroll = 215;
    } else {
        var wheelScroll = 203;
    };

    jQuery('.cScroll').tinyscrollbar({
        wheel: wheelScroll,
        lockscroll: false,
        invertscroll: false
    });
     
        
    // at-stock
    jQuery('.atrade img').each(function () {
        var h = jQuery(this).outerHeight() / 8;
        jQuery(this).css('margin-top', h)
    });
    jQuery('.customTabs .tab').hide();
    jQuery('.customTabs .tab:first').show();
    jQuery('.customTabs .ct-nav li:first').addClass('active');
    jQuery('.customTabs .ct-nav li a').click(function () {
        jQuery('.customTabs .ct-nav li ').removeClass('active');
        jQuery(this).parent().addClass('active');
        var currentTab = jQuery(this).attr('href');
        jQuery('.customTabs .tab').hide().css('opacity', '0');
        jQuery('.customTabs ' + currentTab + '.tab').show().animate({ opacity: 1 }, 500);
        return false;
    });
    
    jQuery.expr[":"].contains = jQuery.expr.createPseudo(function (arg) {
        return function (elem) {
            return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
        };
    });

    jQuery('.dl-ebook').customForm({
        width: 297
    });
    jQuery('.cotactUs').customForm({
        width: 330
    });
    jQuery('.meetrAnalyst').customForm({
        width: 310,
        textAreaHeight: 150,
        textAreaResize: false
    });
    jQuery('.meetrManager').customForm({
        width: 310,
        textAreaHeight: 150,
        textAreaResize: false
    });
    jQuery('#startTrading').customForm({
        theme: 2,
        responsive: true
    })

    jQuery('#searchFaq').bind('keyup change', function (ev) {

        var searchTerm = jQuery(this).val();

        var activeTab = jQuery('#faqs .ct-nav li.active a').attr('href');
        jQuery(activeTab).find('.faqs').removeHighlight();

        if (searchTerm) {
            jQuery(activeTab).find('.faqs').highlight(searchTerm).focus();
        }
    });

    jQuery('#faqs .ct-nav li a').click(function () {
        jQuery('#searchFaq').val('');
    });

    simple_tooltip(".sharethis a", "tooltip");


    jQuery('.sideTab').each(function () {
        var tab = jQuery(this);
        jQuery('.tab-section').css('opacity', 0)
        jQuery(tab.find('.st-nav li.active a').attr('href')).css('display', 'block')
        .animate({opacity: 1}, 300)


        tab.find('.st-nav li a').on('click', function (i) {
            i.preventDefault();
            jQuery(this).blur();

            var activeTab = jQuery(this).attr('href')

            tab.find('.st-nav li').removeClass('active');
            tab.find('.tab-section').css('display', 'none').css('opacity', 0)
            jQuery(this).parent('li').addClass('active');

            jQuery(activeTab).css('display', 'block').animate({ opacity: 1 }, 300)

        });
    })
});


jQuery(window).load(function () {
    //set cBody aside height
    if (jQuery('.cBody aside').outerHeight() < jQuery('.cBody section').outerHeight(true)) {

        jQuery('.cBody aside').outerHeight(jQuery('.cBody section').outerHeight(true));

    } else { jQuery('.cBody aside').height(this); };
});

//Placeholder Function
jQuery.fn.placeHolder = function () {
    var input = jQuery(this);
    input.blur(function () {
        if (this.value == '') { this.value = this.defaultValue; }
    })
    .focus(function () {
        if (this.value == this.defaultValue) { this.value = ''; }
    })
}

//Tooltip
function simple_tooltip(target_items, name) {
    jQuery(target_items).each(function (i) {
        jQuery("body").append("<div class='" + name + "' id='" + name + i + "'><p>" + jQuery(this).attr('title') + "</p></div>");
        var my_tooltip = jQuery("#" + name + i);
        if (jQuery(this).attr("title") != "") { // checks if there is a title
            jQuery(this).removeAttr("title").mouseover(function () {
                my_tooltip.css({ opacity: 1, display: "none" }).fadeIn(50);
            })
            .mousemove(function (kmouse) {
                my_tooltip.css({ left: kmouse.pageX + 15, top: kmouse.pageY + 15 });
            })            .mouseout(function () {
                my_tooltip.fadeOut(50);
            });
        }
    });
}

function searchAssets() {
    var htmlData = jQuery('#assets').html();
    jQuery('.htmlStr').html(htmlData);

    jQuery('.htmlStr').find('.atrade figure').each(function () {
        var fig = jQuery(this);
        fig.attr('data-id', fig.parents('.tab').attr('id'));
    })


    jQuery('#searchAssets').on('keyup', function () {

        var searchAssets = jQuery(this);
        jQuery('#assets .atrade h2').remove();

        if (searchAssets.val().length > 2) {

            var searchVal = searchAssets.val();

            jQuery('#assets').find('.tab .atrade figure').remove();

            jQuery('.htmlStr figure:contains("' + searchVal + '")').each(function () {
                
                var toid = jQuery(this).attr('data-id');
                var assets = jQuery(this).html();

                
                jQuery('#assets #' + toid + ' .atrade').append('<figure>' + assets + '</figure>');
            });

            jQuery('#assets .tab').each(function () {
                var tab = jQuery(this);
                var navAttr = tab.attr('id');

                if (tab.find('.atrade figure').length == 0) {
                    tab.find('.atrade').append('<h2>No results found matching ' + searchVal + '</h2>');
                    jQuery('a[hrefjQuery="' + navAttr + '"]').removeAttr('style');
                } else {
                    jQuery('a[hrefjQuery="' + navAttr + '"]').trigger('click').css('background-color', '#fff');
                }
            });


        } else if (searchAssets.val() == "") {
            jQuery('.ct-nav li:first a').trigger('click');
            jQuery('.ct-nav li a').removeAttr('style');
            jQuery('#assets').find('.tab .atrade figure').remove();
            jQuery('.htmlStr #tab-1 .atrade figure').clone().appendTo('#assets #tab-1 .atrade');
            jQuery('.htmlStr #tab-2 .atrade figure').clone().appendTo('#assets #tab-2 .atrade');
            jQuery('.htmlStr #tab-3 .atrade figure').clone().appendTo('#assets #tab-3 .atrade');
            jQuery('.htmlStr #tab-4 .atrade figure').clone().appendTo('#assets #tab-4 .atrade');
        };
    });

}



(function (jQuery) {
    jQuery.fn.customForm = function (options) {
        var settings = jQuery.extend({
            width: 300,
            textAreaHeight: 95,
            textAreaResize: true,
            theme: 1,
            responsive: false
        }, options);

        return this.each(function () {
            var form = jQuery(this);

            
            if (settings.responsive == false) {
                form.width(settings.width);
            }
            //Form Type
            var inpuText = form.find('input:text'),
                select = form.find('select'),
                textArea = form.find('textarea');

            form.find('br').remove();

            inpuText.each(function () {
                var elem = jQuery(this);

                if (settings.theme == 1) {
                    elem.wrapElem();
                } else {
                    elem.wrap('<span class="textbox v2" />')
                }
                

                if (elem.val() == "") {
                    elem.val(elem.attr('data-default'));
                }

                if (settings.responsive == false) {
                    elem.width(settings.width - 20)
                    .parents('.cfBody').width(settings.width);
                }
                
                elem.blur(function () { if (this.value === '') { this.value = jQuery(this).attr('data-default'); } })
                .focus(function () { if (this.value == jQuery(this).attr('data-default')) { this.value = ''; } })

                
            });

            select.each(function () {
                var elem = jQuery(this);
                if (settings.responsive == false) {
                    elem.width(settings.width - 24);
                }
               

                if (settings.theme == 1) {
                    elem.wrapElem();
                    elem.parents('.cfBody').width(settings.width);
                    elem.parents('.sL').prepend('<i />')
                    elem.parents('.sL').prepend('<span />')
                    elem.parent().find('span').text(elem.find('option:selected').text())
                }

               
                elem.change(function () {
                    elem.parent().find('span').text(elem.find('option:selected').text());
                });
            });

            textArea.each(function () {
                var elem = jQuery(this);

                if (settings.responsive == false) {
                    elem.width(settings.width - 20)
                }
                

                elem.height(settings.textAreaHeight)
                    .focus(function () { if (elem.val() == elem.attr('data-default')) { elem.val("") } })
                    .blur(function () { if (elem.val() == "") { elem.val(elem.attr('data-default')) } })
                if (settings.textAreaResize == false) {
                    elem.css('resize', 'none')
                }

                if (settings.theme == 1) {
                    elem.wrapElem();
                }

                if (elem.val() == "") {
                    elem.val(elem.attr('data-default'))
                }
                
                


            });
        });
    }

    jQuery.fn.wrapElem = function () {
        var elem = jQuery(this);

        if (elem.is('select')) {

            elem.wrap('<div class="select cfBody" />');
            elem.css('opacity', '0');

        } else if (elem.is('textarea')) {

            elem.wrap('<div class="cfTextaBody xtop" />')
                .wrap('<div class="xbtm" />')
                .wrap('<div class="yleft" />')
                .wrap('<div class="yright" />')
                .wrap('<div class="tR" />')
                .wrap('<div class="tL" />')

        } else { elem.wrap('<div class="cfBody" />') }

        elem.wrap('<div class="sR" />')
            .wrap('<div class="sL" />')

    };
})(jQuery);


jQuery.fn.highlight = function (pat) {
    function innerHighlight(node, pat) {
        var skip = 0;
        if (node.nodeType == 3) {
            var pos = node.data.toUpperCase().indexOf(pat);
            if (pos >= 0) {
                var spannode = document.createElement('span');
                spannode.className = 'highlight';
                var middlebit = node.splitText(pos);
                var endbit = middlebit.splitText(pat.length);
                var middleclone = middlebit.cloneNode(true);
                spannode.appendChild(middleclone);
                middlebit.parentNode.replaceChild(spannode, middlebit);
                skip = 1;
            }
        }
        else if (node.nodeType == 1 && node.childNodes && !/(script|style)/i.test(node.tagName)) {
            for (var i = 0; i < node.childNodes.length; ++i) {
                i += innerHighlight(node.childNodes[i], pat);
            }
        }
        return skip;
    }
    return this.each(function () {
        innerHighlight(this, pat.toUpperCase());
    });
};

jQuery.fn.removeHighlight = function () {
    function newNormalize(node) {
        for (var i = 0, children = node.childNodes, nodeCount = children.length; i < nodeCount; i++) {
            var child = children[i];
            if (child.nodeType == 1) {
                newNormalize(child);
                continue;
            }
            if (child.nodeType != 3) { continue; }
            var next = child.nextSibling;
            if (next == null || next.nodeType != 3) { continue; }
            var combined_text = child.nodeValue + next.nodeValue;
            new_node = node.ownerDocument.createTextNode(combined_text);
            node.insertBefore(new_node, child);
            node.removeChild(child);
            node.removeChild(next);
            i--;
            nodeCount--;
        }
    }

    return this.find("span.highlight").each(function () {
        var thisParent = this.parentNode;
        thisParent.replaceChild(this.firstChild, this);
        newNormalize(thisParent);
    }).end();
};