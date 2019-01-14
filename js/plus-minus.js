class PlusMinus {
    constructor()
    {
        this.main()
    }

    main() {
        document.querySelectorAll('.js-make-me-less').forEach( el => {
            this.addButtonListeners( el.parentElement )
        })
    }

    addButtonListeners( form ) {
        let input = form.querySelector('#quantity')

        form.querySelector('.js-make-me-less').unbind('click')
        form.querySelector('.js-make-me-more').unbind('click')

        form.querySelector('.js-make-me-less').addEventListener('click', (event) => {
            if( parseInt(input.value) <= 1) {
                return;
            }
            input.value--
        })

        form.querySelector('.js-make-me-more').addEventListener('click', (event) => {
            // if( parseInt(input.value) <= 1) {
            //     return;
            // }
            input.value++
        })
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new PlusMinus()
})

document.addEventListener('blur', () => {
    new PlusMinus()
})