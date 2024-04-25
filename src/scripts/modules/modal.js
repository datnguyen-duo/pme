import $ from 'jquery/src/jquery';

export default () => {
    const nodeSelectors = {
        container: '[js-modal="container"]',
        close: '[js-modal="close"]',
        open: '[js-modal="open"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.container)) {
            return
        }

        $(nodeSelectors.container).each(function () {
            let modal = $(this)

            $(modal).find(nodeSelectors.close).on('click', function () {
                close(modal)
            })
        })

        $(nodeSelectors.open).on('click', function () {
            let target = $(this).data('js-modal')
            let modal = $(target)
            open(modal)
        })

        function close(modal) {
            $('body, html').removeClass('no-scroll')
            modal.fadeOut()
        }

        function open(modal) {
            $('body, html').addClass('no-scroll')
            modal.fadeIn()
        }
    }

    return Object.freeze({
        init,
    })
}