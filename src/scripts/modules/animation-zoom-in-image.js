import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
    const nodeSelectors = {
        container: '[js-animation-zoom-in-image="container"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.container)) {
            return
        }

        initSlider()
    }

    function initSlider() {
        let containers = document.querySelectorAll(nodeSelectors.container)

        containers.forEach(function (container, index) {
            let sectionImage = container.querySelector('img')
            let tl = gsap.timeline({defaults: {duration: 1}})
            tl.to(sectionImage, {transform: 'scale(1.15)'})

            // data-js-animation-zoom-in-image-scroller-start="value"
            let customScrollerStart = container.dataset.jsAnimationZoomInImageScrollerStart
            let scrollerStart = (customScrollerStart) ? customScrollerStart : '80%'

            ScrollTrigger.create({
                animation: tl,
                trigger: container,
                pin: false,
                markers: false,
                start: "top " + scrollerStart,
                // end: "bottom 60%",
                scrub: 4,
                invalidateOnRefresh: true,
            })
        })
    }

    return Object.freeze({
        init,
    })
}