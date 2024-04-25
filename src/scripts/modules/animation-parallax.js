import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
    const nodeSelectors = {
        container: '[js-animation-parallax="container"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.container) ) {
            return
        }

        window.addEventListener("load", function () {
            initAnimation()
        })
    }

    function initAnimation() {
        $(nodeSelectors.container).each(function(){
            let section = $(this)
            let tl = gsap.timeline({defaults: {duration: 0.25}});
            tl.to(section, {transform: 'translate(0, 0)'});

            ScrollTrigger.create({
                animation: tl,
                trigger: $(this),
                pin: false,
                markers: false,
                start: "top 90%",
                end: "bottom 60%",
                scrub: 6,
                invalidateOnRefresh: true,
            });
        })
    }

    return Object.freeze({
        init,
    })
}