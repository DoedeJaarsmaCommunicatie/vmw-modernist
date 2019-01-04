class Dropdown {

    constructor() {
        this.setters()
        this.addHovers()
    }

    setters() {
        this._linkTargets = document.querySelectorAll('[data-hover-target]')
    }

    addHovers() {
        this._linkTargets.forEach( element => {

            let hoverTarget = element.dataset.hoverTarget
            let megaMenu = document.querySelector(`[data-hover-anchor="${hoverTarget}"]`)

            element.addEventListener('mouseover', () => {
                megaMenu.classList.remove('d-none')
            })

            element.addEventListener('mouseout', () => {
                megaMenu.classList.add('d-none')
            })
        })
    }

}

class ShoppingCart {

    constructor() {
        this._cart =  document.querySelector('.js-target-shopping-cart')
        this._button = document.querySelector('.js-active-shopping-cart')
        this._close = document.querySelector('.js-shopping-cart-close')

        this.main()
    }

    main() {
        this.addOpenerListeners()
        this.addCloseListeners()
    }

    addOpenerListeners() {
        this._button.addEventListener('mouseover', () => this.addPeeking())

        this._button.addEventListener('click', () => this.addActive())
    }

    addCloseListeners() {
        this._button.addEventListener('mouseout', () => this.removePeeking())

        this._close.addEventListener('click', () => this.removeActive())
    }

    addActive() {
        this._cart.classList.add('is-active')
    }

    removeActive() {
        this._cart.classList.remove('is-active')
    }

    addPeeking() {
        this._cart.classList.add('is-peeking')
    }

    removePeeking() {
        this._cart.classList.remove('is-peeking')

    }

}

document.addEventListener('DOMContentLoaded', () => {
    new Dropdown()
    new ShoppingCart()
})