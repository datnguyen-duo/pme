import $ from 'jquery/src/jquery';
import SiteHeader from "../modules/site-header";

export default () => {
    const nodeSelectors = {
        container: '[js-site-nav-mobile="container"]',
        opener: '[js-site-nav-mobile="opener"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.container)) {
            return
        }

        initNav()
    }

    function initNav() {
        $(document).keyup(function(e) {
            if (e.key === "Escape") {
                close();
            }
        });

        $(nodeSelectors.opener).on('click', function () {
            if( $(nodeSelectors.container).is(':visible') ) {
                close()
            } else {
                open()
            }
        })

        $(nodeSelectors.container + ' .menu-item-has-children').on('click', function (e) {
            let subMenu = $(this).find(' > .sub-menu')

            if( !subMenu.is(':visible') ) {
                e.preventDefault()
            } else {}

            subMenu.slideToggle()
            $(this).toggleClass('active')
        })
    }

    function open() {
        $('body, html').addClass('no-scroll')
        $(nodeSelectors.opener).addClass('active');
        $(nodeSelectors.container).fadeIn(250);
        $(SiteHeader().nodeSelectors.container).addClass('nav-is-active')
    }

    function close() {
        $('body, html').removeClass('no-scroll')
        $(nodeSelectors.container).fadeOut(200);
        $(nodeSelectors.opener).removeClass('active');
        $(SiteHeader().nodeSelectors.container).removeClass('nav-is-active')
    }

    return Object.freeze({
        init,
    })
}