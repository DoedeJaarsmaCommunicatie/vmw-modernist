class MobileMenu {

    constructor () {
        this.setters()
        this.menuToggle()
        this.subMenuToggle()
        this.megaSubMenuToggle()
    }

    setters() {
        this._bars = document.querySelector('[data-mobile-menu-target')
        this._menus = document.querySelectorAll('[data-submenu-target]')
        this._sub_menus = document.querySelectorAll('[data-mega-submenu-target]')
    }

    menuToggle() {
        this._bars.addEventListener('click', (event) => {
            let _mobile_menu_id = event.target.dataset.mobileMenuTarget
            document.querySelector( _mobile_menu_id).classList.toggle('d-none')
        })

        this._bars.addEventListener('touch', (event) => {
            let _mobile_menu_id = event.target.dataset.mobileMenuTarget
            document.querySelector(_mobile_menu_id).classList.toggle('d-none')
        })
    }

    subMenuToggle() {
        this._menus.forEach( element => {
            element.addEventListener('click', (event) => {
                let _submenu_id = event.target.dataset.submenuTarget
                document.querySelector(_submenu_id).classList.toggle('d-none')
            })

            element.addEventListener('touch', (event) => {
                let _submenu_id = event.target.dataset.submenuTarget
                document.querySelector(_submenu_id).classList.toggle('d-none')
            })
        })
    }

    megaSubMenuToggle() {
        this._sub_menus.forEach( element => {
            element.addEventListener('click', (event) => {
                let _submenu_id = event.target.dataset.megaSubmenuTarget
                document.querySelector(_submenu_id).classList.toggle('d-none')
            })

            element.addEventListener('touch', (event) => {
                let _submenu_id = event.target.dataset.megaSubmenuTarget
                document.querySelector(_submenu_id).classList.toggle('d-none')
            })
        })
    }

}

document.addEventListener('DOMContentLoaded', () => {
    new MobileMenu()
})