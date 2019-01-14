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
}

document.addEventListener('DOMContentLoaded', () => {
    new PlusMinus()
})
