class PlusMinus {
    constructor()
    {
        this.main()
    }

    main() {
        document.querySelectorAll('.js-make-me-less').forEach( el => {
            this.addButtonListeners( el.parentElement )
        })

        this.watchForChanges()
    }

    addButtonListeners( form ) {
        let input = form.querySelector('#quantity')

        if( !input.getAttribute('data-event') ) {
            form.querySelector('.js-make-me-less').addEventListener('click', () => {
                if( parseInt(input.value) <= input.step) {
                    return;
                }

                // input.value = parseInt(input.value) - input.step;
                input.stepDown()
            })

            form.querySelector('.js-make-me-more').addEventListener('click', () => {
                // input.value = parseInt(input.value) + input.step;
                input.stepUp()
            })

            input.setAttribute('data-event', 'on')

        }

    }

    watchForChanges() {
        let observer = new MutationObserver((mutationsList, observer) => {
            for( let mutation of mutationsList) {
                if (mutation.type == 'childList') {
                    document.querySelectorAll('.js-make-me-less').forEach( el => {
                        this.addButtonListeners( el.parentElement )
                    })
                }
            }
        })

        observer.observe(document, { attributes: true, childList: true, subtree: true })
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new PlusMinus()
})


