class PlusMinus {
    constructor()
    {
        this.main()
    }


    // helper for enabling IE 8 event bindings
    addEvent(el, type, handler) {
        if (el.attachEvent) el.attachEvent('on'+type, handler); else el.addEventListener(type, handler);
    }

    // live binding helper
    live(selector, event, callback, context) {
        this.addEvent(context || document, event, function(e) {
            var found, el = e.target || e.srcElement;
            while (el && !(found = el.id == selector)) el = el.parentElement;
            if (found) callback.call(el, e);
        });
    }


    main() {
        document.querySelectorAll('.js-make-me-less').forEach( el => {
            this.addButtonListeners( el.parentElement )
        })
    }

    addButtonListeners( form ) {
        let input = form.querySelector('#quantity')

        this.live(form.querySelector('.js-make-me-less'), 'click', (event) => {
            if( parseInt(input.value) <= 1) {
                return;
            }
            input.value--
        })

        // form.querySelector('.js-make-me-less').addEventListener('click', (event) => {
        //     if( parseInt(input.value) <= 1) {
        //         return;
        //     }
        //     input.value--
        // })

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