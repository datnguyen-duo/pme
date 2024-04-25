import $ from 'jquery/src/jquery'

import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"
gsap.registerPlugin(ScrollTrigger)

export default () => {
    const nodeSelectors = {
        container: '[js-accordions="container"]',
        accordion: '[js-accordions="accordion"]',
        opener: '[js-accordions="opener"]',
        hiddenContent: '[js-accordions="hidden-content"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.container)) {
            return
        }

        // Loop all accordions containers
        $(nodeSelectors.container).each(function () {
            // Set current container
            let container = $(this)

            // Find accordions for current container
            let accordions = container.find(nodeSelectors.accordion)

            // Set variable for autoplay state(If they should be on autoplay or not)
            let autoPlayAccordions = container.data('js-accordions-autoplay')

            // This is interval for autoplay
            let interval = ''

            // Now for accordions openers and set events on click
            accordions.find(nodeSelectors.opener).on('click', function (event, wasTriggeredByCode = false) {
                /**
                 * wasTriggeredByCode parameter
                 * is for defining type of click, if code or user triggered the click
                 * **/

                let preventClick = false

                // Check if click is triggered by user
                if( !wasTriggeredByCode ) {
                    // Check if clicked item is currently active
                    if( $(this).hasClass('active') ) {
                        // Prevent click
                        preventClick = true
                    }
                }

                if( !preventClick ) {
                    container.find(nodeSelectors.hiddenContent).slideUp()
                    container.find(nodeSelectors.accordion).removeClass('active')
                    container.find(nodeSelectors.opener).removeClass('active')

                    // Toggle active classes
                    $(this).toggleClass('active').parent().toggleClass('active')

                    // Find hidden content
                    let hiddenContent = $(this).parent().find(nodeSelectors.hiddenContent)

                    // Toggle hidden content
                    hiddenContent.slideToggle()

                    if( autoPlayAccordions && !wasTriggeredByCode ) {
                        // If autoplay is enabled and if click is triggered only by user(not by code)
                        // reset everything
                        clearInterval(interval)
                        playAccordions()
                    }
                }
            })

            if( autoPlayAccordions ) {
                // If autoplay is enabled
                // play accordions when they are in view or cancel autoplay when they are not in view
                ScrollTrigger.create({
                    trigger: container,
                    pin: false,
                    markers: false,
                    start: "top 75%",
                    end: "bottom 20%",
                    invalidateOnRefresh: true,
                    onEnter: function () {
                        // console.log('onEnter')
                        playAccordions()
                    },
                    onEnterBack: function () {
                        // console.log('onEnterBack')
                        playAccordions()
                    },
                    onLeave: function () {
                        // console.log('onLeave')
                        stopAccordions()
                    },
                    onLeaveBack: function () {
                        // console.log('onLeaveBack')
                        stopAccordions()
                    }
                })
            }

            function stopAccordions() {
                container.removeClass('accordions-are-playing')
                clearInterval(interval)
            }

            function playAccordions() {
                // Clear interval and prevent making duplicated interval
                clearInterval(interval)
                container.addClass('accordions-are-playing')

                // Auto opener
                interval = setInterval(function () {
                    let activeAccordion = ''

                    // Find active accordion
                    accordions.each(function (index) {
                        let accordion = $(this)

                        if( accordion.hasClass('active') ) {
                            activeAccordion = accordion
                        }
                    })

                    // Check if active accordion exists
                    if( activeAccordion.length ) {
                        // Find current accordion opener
                        let currentAccordionOpener = activeAccordion.find(nodeSelectors.opener)

                        // Find next accordion opener
                        let nextAccordionOpener = activeAccordion.next().find(nodeSelectors.opener)

                        // Close current
                        // currentAccordionOpener.trigger('click', true)

                        // Check if next accordion exists
                        if( nextAccordionOpener.length ) {
                            // If next accordion exists open it
                            nextAccordionOpener.trigger('click', true)
                        } else {
                            // If next doesn't exist(current is the last one) go to first
                            accordions.eq(0).find(nodeSelectors.opener).trigger('click', true)
                        }
                    } else {
                        // If active accordion doesn't exist, trigger click on the first
                        accordions.eq(0).find(nodeSelectors.opener).trigger('click', true)
                    }
                }, 8000)
                // Auto opener END
            }
        })
    }

    return Object.freeze({
        init,
    })
}