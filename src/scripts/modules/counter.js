import $ from 'jquery/src/jquery';
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
    const nodeSelectors = {
        container: '[js-counter="container"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.container)) {
            return
        }

        $(nodeSelectors.container).each(function () {
            let counter = $(this);

            ScrollTrigger.create({
                trigger: counter,
                pin: false,
                markers: false,
                start: "top 92%",
                end: "bottom 10%",
                scrub: 0,
                invalidateOnRefresh: true,
                onEnter: function() {
                    animate(counter)
                },
                onEnterBack: function () {
                    animate(counter)
                }
            })
        });

        function animate(counter) {
            if( !counter.hasClass('animated') ) {
                // Prevent repeating animation if element is already animated

                jQuery({ Counter: 0 }).animate({ Counter: counter.attr('data-js-counter-stop') }, {
                    duration: 1500,
                    easing: 'swing',
                    step: function (now) {
                        counter.text(Math.ceil(now));
                    }
                });

                counter.addClass('animated')
            }
        }
    }

    return Object.freeze({
        init,
    })
}