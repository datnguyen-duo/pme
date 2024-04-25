import $ from 'jquery/src/jquery';
import { Swiper } from 'swiper';
import {Navigation, Pagination} from "swiper/modules";
Swiper.use([Navigation, Pagination]);

export default () => {
    const nodeSelectors = {
        container: '[js-cards-slider="container"]',
        slider: '[js-cards-slider="slider"]',
        prev: '[js-cards-slider="prev"]',
        next: '[js-cards-slider="next"]',
        pagination: '[js-cards-slider="pagination"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.slider)) {
            return
        }

        let slidersContainers = document.querySelectorAll(nodeSelectors.container)

        slidersContainers.forEach(function (container, index) {
            let sliderEl = container.querySelector(nodeSelectors.slider)

            let slider = new Swiper(sliderEl, {
                slidesPerView: 1.21,
                spaceBetween: 10,
                loop: false,
                speed: 500,
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
                    550: {
                        slidesPerView: 1.6,
                        spaceBetween: 15,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1280: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    }
                }
            });
        })
    }

    return Object.freeze({
        init,
    })
}