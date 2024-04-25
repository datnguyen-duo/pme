import $ from 'jquery/src/jquery';
import { Swiper } from 'swiper';
import {Navigation, EffectFade, Pagination, Autoplay} from "swiper/modules";
Swiper.use([Navigation, EffectFade, Pagination, Autoplay]);

export default () => {
    const nodeSelectors = {
        container: '[js-testimonial-slider="container"]',
        slider: '[js-testimonial-slider="slider"]',
        prev: '[js-testimonial-slider="prev"]',
        next: '[js-testimonial-slider="next"]',
        pagination: '[js-testimonial-slider="pagination"]',
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
                spaceBetween: 10,
                loop: true,
                speed: 500,
                effect: 'fade',
                autoHeight: true,
                // autoplay: {
                //     delay: 6000,
                //     disableOnInteraction: false
                // },
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: container.querySelector(nodeSelectors.pagination),
                    clickable: true
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