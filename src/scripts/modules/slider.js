import $ from 'jquery/src/jquery';
import { Swiper } from 'swiper';
import {Navigation, Pagination, Autoplay} from "swiper/modules";
Swiper.use([Navigation, Pagination, Autoplay]);

export default () => {
    const nodeSelectors = {
        container: '[js-slider="container"]',
        slider: '[js-slider="slider"]',
        prev: '[js-slider="prev"]',
        next: '[js-slider="next"]',
        pagination: '[js-slider="pagination"]',
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
                spaceBetween: 20,
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
                    // type: "progressbar"
                },
                navigation: {
                    nextEl: container.querySelector(nodeSelectors.next),
                    prevEl: container.querySelector(nodeSelectors.prev),
                },
                on: {
                    slideChange: function (slide) {
                        /**
                         * Accordions remote control
                         * Control accordions remotely with slider
                         * Slider container must have data-js-slider-accordions="accordion-element-id-or-class"
                         **/
                        let accordions = $(container).data('js-slider-accordions')

                        if( accordions ){
                            let nextAccordionOpener = $(accordions).find('.accordion-header').eq(slide.activeIndex)

                            setTimeout(function () {
                                if( !nextAccordionOpener.hasClass('active') ) {
                                    nextAccordionOpener.trigger('click')
                                }
                            }, 50)
                        }
                        /**
                         * Accordions remote control END
                         **/
                    }
                }
            });

            /**
             * Accordions remote control
             * Control slider remotely with accordions
             * Slider container must have data-js-slider-accordions="accordion-element-id-or-class"
             **/
            let accordions = $(container).data('js-slider-accordions')

            $(accordions).find('.accordion-header').on('click', function () {
                slider.slideTo($(this).parent().index())
            })
            /**
             * Accordions remote control END
             **/
        })
    }

    return Object.freeze({
        init,
    })
}