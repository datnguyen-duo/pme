import $ from 'jquery/src/jquery';
import { Swiper } from 'swiper';
import {Navigation, Pagination, Autoplay} from "swiper/modules";
Swiper.use([Navigation, Pagination, Autoplay]);

export default () => {
    const nodeSelectors = {
        container: '[js-history-slider="container"]',
        slider: '[js-history-slider="slider"]',
        prev: '[js-history-slider="prev"]',
        next: '[js-history-slider="next"]',
        pagination: '[js-history-slider="pagination"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.slider)) {
            return
        }

        let slidersContainers = document.querySelectorAll(nodeSelectors.container)

        slidersContainers.forEach(function (container, index) {
            let sliderEl = container.querySelector(nodeSelectors.slider)

            let slider = new Swiper(sliderEl, {
                slidesPerView: 1,
                spaceBetween: 80,
                loop: false,
                speed: 500,
                autoHeight: true,
                // autoplay: {
                //     delay: 6000,
                //     disableOnInteraction: false
                // },
                pagination: {
                    el: container.querySelector(nodeSelectors.pagination),
                    clickable: true,
                    type: "progressbar"
                },
                navigation: {
                    nextEl: container.querySelector(nodeSelectors.next),
                    prevEl: container.querySelector(nodeSelectors.prev),
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                    1700: {
                        slidesPerView: 3,
                        spaceBetween: 315,
                    }
                }
            });
        })
    }

    return Object.freeze({
        init,
    })
}