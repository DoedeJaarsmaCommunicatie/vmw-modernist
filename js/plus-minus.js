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

        form.querySelector('.js-make-me-less').removeEventListener('click', this.makeItLess(input))
        form.querySelector('.js-make-me-more').removeEventListener('click', this.makeItMore(input))

        form.querySelector('.js-make-me-less').addEventListener('click', this.makeItLess(input))

        form.querySelector('.js-make-me-more').addEventListener('click', this.makeItMore(input))
    }

    makeItLess(input) {
        if( parseInt(input.value) <= 1) {
            return;
        }
        input.value--
    }

    makeItMore(input) {
        input.value++
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new PlusMinus()
})

document.addEventListener('blur', () => {
    new PlusMinus()
})