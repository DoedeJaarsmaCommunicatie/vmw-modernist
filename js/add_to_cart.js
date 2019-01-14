class CartAdder {

    constructor() {
        this.setters()

        if(this._add_to_cart_forms)
            this.main()

        document.addEventListener('DOMContentLoaded', this.addObserver)
    }

    setters() {
        this._add_to_cart_forms = document.querySelectorAll(`[data-action="product_add_to_cart"]`)
    }

    main() {
        this._add_to_cart_forms.forEach( form => {
            CartAdder.stopDefaultAction(form)
            if( !form.getAttribute('data-event')) {
                new AddForm( form )
            }
        })
    }


    addObserver() {
        let observer = new MutationObserver((mutations, observer) => {
            for (let mutation of mutations) {
                if (mutation.type == 'childList' &&
                    mutation.target == document.querySelector('body') &&
                    mutation.removedNodes.length > 0
                ) {

                    if (mutation.removedNodes[0].classList.contains('blockUI')) {
                        console.log('Adding listeners')
                        document.querySelectorAll(`form[data-action="product_add_to_cart"]`).forEach( el => {
                            CartAdder.stopDefaultAction( el )
                            if( !el.getAttribute('data-event')) {
                                new AddForm( el )
                            }
                        })
                    }

                }
            }
        })


        observer.observe(document, { childList: true, subtree: true })
    }

    static stopDefaultAction( form ) {
        form.addEventListener('submit', evt => evt.preventDefault())
    }
}


class AddForm {
    constructor( form ) {
        this.form = form
        this.submit_button = this.formSelect( 'input[type="submit"]' )

        this.form.setAttribute('data-event', 'on')

        this.submit_button.addEventListener('click', () => {
            this.quantity = this.formSelect('#quantity').value
            this.product_id = this.formSelect('#product_id').value

            this.setData()
            this.ajaxCall()
        })
    }

    ajaxCall() {
        jQuery.post(vmw_ajax_object.ajax_url, this.DATA, response => {
            if( response ) {
                // console.log( response )
                document.querySelector('.shopping__cart__container').innerHTML = jQuery.parseHTML(response)[1].innerHTML
                jQuery('.js-active-shopping-cart').click()
                new ShoppingCart()
            }
        })
    }

    setData() {
        return this.DATA = {
            action: 'vmw_ajax_add_to_cart_woo',
            product_id: this.product_id,
            quantity: this.quantity,
        }
    }

    get product_id() {
        return this._product_id
    }

    set product_id( value ) {
        this._product_id = value
    }

    get quantity() {
        return this._quantity
    }

    set quantity( value ) {
        this._quantity = value
    }
    get submit_button() {
        return this._submit_button
    }

    set submit_button( value ) {
        this._submit_button = value
    }

    get form() {
        return this._form
    }

    set form( value ) {
        this._form = value
    }

    formSelect( value ) {
        return this.form.querySelector( value )
    }
}

new CartAdder()
