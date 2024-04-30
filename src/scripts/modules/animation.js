import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
    const nodeSelectors = {
        fadeUp: '[js-animation="fade-up"]',
        fadeDown: '[js-animation="fade-down"]',
        // Add more here
    }

    function init() {
        if (document.querySelector(nodeSelectors.fadeUp) ) {
            initFadeUp()
        }

        if (document.querySelector(nodeSelectors.fadeDown)) {
            initFadeDown()
        }
    }

    function initFadeUp() {
        let containers = document.querySelectorAll(nodeSelectors.fadeUp)

        containers.forEach(function (container, index) {
            let tl = gsap.timeline({defaults: {duration: 1}})
            tl.to(container, {transform: 'translateY(0)', opacity: 1})

            ScrollTrigger.create({
                animation: tl,
                trigger: container,
                pin: false,
                markers: false,
                start: "top 90%" ,
                // end: "bottom 60%",
                scrub: false,
                invalidateOnRefresh: true,
            })
        })
    }

    function initFadeDown() {
        let containers = document.querySelectorAll(nodeSelectors.fadeDown)

        containers.forEach(function (container, index) {
            let tl = gsap.timeline({defaults: {duration: 1}})
            tl.to(container, {transform: 'translate(0, 0)', opacity: 1})

            ScrollTrigger.create({
                animation: tl,
                trigger: container,
                pin: false,
                markers: false,
                start: "top 90%" ,
                // end: "bottom 60%",
                scrub: false,
                invalidateOnRefresh: true,
            })
        })
    }

    return Object.freeze({
        init,
    })
}