import Splide from '@splidejs/splide';
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';
import {Swiper} from "swiper";
import {Navigation, Pagination, Autoplay, FreeMode} from "swiper/modules";
Swiper.use([Navigation, Pagination, Autoplay, FreeMode]);

export default () => {
    const nodeSelectors = {
        container: '[js-gallery-slider="container"]',
        slider: '[js-gallery-slider="slider"]',
        mobileSlider: '[js-gallery-slider="mobile-slider"]',
        prev: '[js-gallery-slider="prev"]',
        next: '[js-gallery-slider="next"]',
        pagination: '[js-gallery-slider="pagination"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.slider)) {
            return
        }

        initSlider()
    }

    function initSlider() {
        let slidersContainers = document.querySelectorAll(nodeSelectors.container)

        slidersContainers.forEach(function (container, index) {
            let mobileSliderEl = container.querySelector(nodeSelectors.mobileSlider)
            let desktopSliderEl = container.querySelector(nodeSelectors.slider)

            // Desktop slider
            let splide = new Splide(desktopSliderEl, {
                type   : 'loop',
                drag   : 'free',
                focus  : 'center',
                perPage: 'auto',
                autoWidth: true,
                arrows: false,
                pagination: false,
                autoScroll: {
                    speed: 0,
                },
            } );

            splide.mount({});

            // Mobile slider
            let slider = new Swiper(mobileSliderEl, {
                slidesPerView: "auto",
                spaceBetween: 10,
                loop: false,
                speed: 500,
                freeMode: false,
                pagination: {
                    el: container.querySelector(nodeSelectors.pagination),
                    clickable: true,
                },
                navigation: {
                    nextEl: container.querySelector(nodeSelectors.next),
                    prevEl: container.querySelector(nodeSelectors.prev),
                }
            });
        })
    }

    return Object.freeze({
        init,
    })
}