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

        form.querySelector('.js-make-me-less').addEventListener('click', () => {
            if( parseInt(input.value) <= 1) {
                return;
            }
            input.value--
        })

        form.querySelector('.js-make-me-more').addEventListener('click', () => {
            input.value++
        })
    }

    watchForChanges() {
        let observer = new MutationObserver((mutationsList, observer) => {
            for( let mutation of mutationsList) {
                if (mutation.type == 'childList') {
                    console.log('A child node has been added or removed.');
                }
                else if (mutation.type == 'attributes') {
                    console.log('The ' + mutation.attributeName + ' attribute was modified.');
                }
            }
        })

        observer.observe(document.querySelector('.products'), { attributes: true, childList: true, subtree: true })
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new PlusMinus()
})


