import $ from 'jquery/src/jquery';

export default () => {
    // const nodeSelectors = {
    //     sectionContainer: '[js-form="section-container"]',
    // }

    function init() {
        if (!document.querySelector('.wpcf7')) {
            return
        }

        let wpcf7Elm = document.querySelectorAll('.wpcf7');

        wpcf7Elm.forEach(function (form) {
            $(form).find('.submit-holder').append('<div class="gl-loader-holder"><div class="loader"></div></div>')
        })
    }

    return Object.freeze({
        init,
    })
}