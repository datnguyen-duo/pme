import $ from 'jquery/src/jquery';
import { Swiper } from 'swiper';
import {Navigation, Pagination, Autoplay} from "swiper/modules";
Swiper.use([Navigation, Pagination, Autoplay]);

export default () => {
    const nodeSelectors = {
        container: '[js-list-slider="container"]',
        slider: '[js-list-slider="slider"]',
        prev: '[js-list-slider="prev"]',
        next: '[js-list-slider="next"]',
        pagination: '[js-list-slider="pagination"]',
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
                spaceBetween: 40,
                loop: false,
                speed: 500,
                // autoHeight: true,
                // autoplay: {
                //     delay: 6000,
                //     disableOnInteraction: false
                // },
                pagination: {
                    el: container.querySelector(nodeSelectors.pagination),
                    clickable: true,
                },
                navigation: {
                    nextEl: container.querySelector(nodeSelectors.next),
                    prevEl: container.querySelector(nodeSelectors.prev),
                },
                breakpoints: {
                    768: {
                        spaceBetween: 70,
                        slidesPerView: 2,
                    },
                    800: {
                        spaceBetween: 70,
                        slidesPerView: 2,
                    },
                    1024: {
                        spaceBetween: 70,
                        slidesPerView: 3,
                    },
                    1200: {
                        spaceBetween: 70,
                        slidesPerView: 4,
                    },
                    1300: {
                        spaceBetween: 85,
                        slidesPerView: 4,
                    },
                    1600: {
                        spaceBetween: 110,
                        slidesPerView: 4,
                    },
                    1700: {
                        spaceBetween: 138,
                        slidesPerView: 4,
                    }
                }
            });
        })
    }

    return Object.freeze({
        init,
    })
}