import $ from 'jquery/src/jquery';
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
    const nodeSelectors = {
        container: '[js-site-header="container"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.container)) {
            return
        }

        initHeader()
    }

    function initHeader() {
        let scrollDirectionDown = true

        window.addEventListener('scroll', function() {
            /**
             * Hide/Show header on scroll
             * If user scrolls down header will be hidden or if user scrolls up header will be visible
             */
            scrollDirectionDown = this.oldScroll <= this.scrollY
            this.oldScroll = this.scrollY

            if(  window.scrollY > 100 ) {
                $(nodeSelectors.container).addClass('scrolled')
            } else {
                $(nodeSelectors.container).removeClass('scrolled')
            }

            if ( scrollDirectionDown ) {
                // Scrolling down
                if(
                    window.scrollY > 300
                    &&
                    !$(nodeSelectors.container).hasClass('nav-is-active')
                ) {
                    hide()
                }
            } else {
                show()
            }
            /**
             * Hide/Show header on scroll END
             */
        })
    }

    function show() {
        document.querySelector(nodeSelectors.container).style.top = '0px'
    }

    function hide() {
        document.querySelector(nodeSelectors.container).style.top = - document.querySelector(nodeSelectors.container).offsetHeight + 'px'
    }

    return Object.freeze({
        init,
        nodeSelectors,
        show,
        hide
    })
}