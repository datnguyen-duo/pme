import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
    const nodeSelectors = {
        container: '[js-animation-move-left-right="container"]',
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
            let section = container
            let tl = gsap.timeline({defaults: {duration: 0.5}})
            tl.to(section, {transform: 'translateX(-100px)'})

            ScrollTrigger.create({
                animation: tl,
                trigger: container,
                pin: false,
                markers: false,
                // start: "top 90%",
                // end: "bottom 60%",
                scrub: 3,
                invalidateOnRefresh: true,
            })
        })
    }

    return Object.freeze({
        init,
    })
}