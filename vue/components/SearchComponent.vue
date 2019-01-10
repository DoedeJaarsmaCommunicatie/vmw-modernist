<template>
    <div class="vmw__special__search has-border-radius">
        <form class="text-center text-white d-flex flex-column py-1 px-3" v-on:submit.prevent="submitData">
            <p class="m-0">
                Ik ben op zoek naar:
            </p>
            
            <span class="sec-back has-border-radius my-1 d-flex justify-content-center px-3 chevron-back position-relative cursor-pointer" v-on:click="changeCategoryOpen" v-on:blur="changeCategoryOpen">
                <label for="product-category" class="p-0 m-0 w-25 cursor-pointer">een</label> <span data-target="product-category">{{ categories['rode-wijn'] }}</span>
                <input type="hidden" disabled name="product-category" id="product-category" value="rode-wijn">
                <ul class="filter-category">
                    <li v-for="(category, key) in categories" :key="key" :data-category="key" v-on:click="selectCategory" class="p-1 border-bottom">{{category}}</li>
                </ul>
            </span>
            
            <span class="sec-back has-border-radius my-1 d-flex justify-content-center px-3 position-relative cursor-pointer chevron-back" v-on:click="changeLandOpen">
                <label for="product-land" class="p-0 m-0 w-25 cursor-pointer">uit</label> <span data-target="product-land">{{ landen['*'] }}</span>
                <input type="hidden" name="product-land" id="product-land" value="*">
                <ul class="filter-land">
                    <li v-for="(land, key) in landen" :key="key" :data-land="key" v-on:click="selectland" class="p-1 border-bottom">{{land}}</li>
                </ul>
            </span>
            
            <span class="sec-back has-border-radius my-1 d-flex justify-content-center px-3 position-relative cursor-pointer chevron-back" v-on:click="changePrijsOpen">
                <label for="product-price" class="p-0 m-0 w-25 cursor-pointer">voor</label> <span data-target="product-price">{{ prijzen[0].name }}</span>
                <input type="hidden" name="product-price" id="product-price" value="">
                <ul class="filter-price">
                    <li v-for="(prijs, index) in prijzen" :key="index" :data-price="prijs.key" v-on:click="selectPrijs" v-html="prijs.name" class="p-1 border-bottom">{{ index }}</li>
                </ul>
            </span>

            <button type="submit" class="btn bg-white text-dark has-border-radius">Vind mijn wijn</button>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
        },
        data() {
            return {
                categories: {
                    'rode-wijn': 'Rode wijn',
                    'witte-wijn': 'Witte wijn',
                    'rose-wijn': 'Rose wijn',
                    'dessert-wijn': 'Dessert wijn',
                    'mousserende-wijn': 'Mousserende wijn'
                },
                landen: {
                    '*': 'alle landen',
                    'frankrijk': 'Frankrijk',
                    'italie': 'Italie',
                    'duitsland': 'Duitsland',
                    'portugal': 'Portugal',
                    'spanje': 'Spanje'
                },
                prijzen: [
                    {
                        key: '',
                        name: 'alle prijzen',
                    },
                    {
                        key: '5-5',
                        name: '&euro; 5'
                    },
                    {
                        key: '5-15',
                        name: '&euro; 5 - &euro; 15'
                    },
                    {
                        key: '15-25',
                        name: '&euro; 15 - &euro; 25',
                    },
                    {
                        key: '25',
                        name: '&euro; 25 +'
                    }
                ]
            }
        },
        props: {
            url: {
                type: String,
                default: 'https://vindmijnwijn.nl/vmw_new_staging/winkel/'
            }
        },
        methods: {
            submitData: function() {
                let land = document.querySelector('#product-land').value
                let prijs = document.querySelector('#product-price').value
                let category = document.querySelector('#product-category').value
                let params = new URLSearchParams();

                params.append('product-category', category)
                if ( land !== '*') {
                    params.append('product-land', land)
                }
                params.append('product-price', prijs)

                let pUrl = `${this.url}?${params.toString()}`
                window.location.href = pUrl
            },
            changeCategoryOpen: function () {
                event.target.classList.toggle('up')
                document.querySelector('.filter-category').classList.toggle('active')
            },
            changeLandOpen: function () {
                event.target.classList.toggle('up')
                document.querySelector('.filter-land').classList.toggle('active')
            },
            changePrijsOpen: function () {
                event.target.classList.toggle('up')
                document.querySelector('.filter-price').classList.toggle('active')
            },
            selectCategory: function(ev) {
                let k = ev.target.dataset.category
                document.querySelector('input#product-category').value = k;
                document.querySelector('[data-target="product-category"]').innerHTML = this.categories[k]
                this.allChevronDown();
            },
            selectland: function (ev) {
                let k = ev.target.dataset.land
                document.querySelector('input#product-land').value = k;
                document.querySelector('[data-target="product-land"]').innerHTML = this.landen[k]
                this.allChevronDown();
            },
            selectPrijs: function (ev) {
                let k = ev.target.dataset.price
                document.querySelector('input#product-price').value = k;
                document.querySelector('[data-target="product-price"]').innerHTML = this.prijzen[k]
                this.allChevronDown();
            },
            allChevronDown: function () {
                document.querySelectorAll('.chevron-back').forEach( el => {
                    el.classList.remove('up')
                })
            },
            closeAll: function () {
                this.allChevronDown()
                document.querySelector('.filter-category').classList.remove('active')
                document.querySelector('.filter-land').classList.remove('active')
                document.querySelector('.filter-price').classList.remove('active')
            }
        },
    }
</script>

<style lang="scss" scoped>
    @import "https://use.fontawesome.com/releases/v5.6.3/css/all.css";
    $prim: #F2664B;
    $sec: #EB5538;
    
    * {
        font-family: "Signika";
        font-weight: 300;
    }
    select {
        border:none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -ms-appearance: none; /* get rid of default appearance for IE8, 9 and 10*/
    }
    
    .cursor-pointer {
        cursor: pointer;
    }

    .chevron-back {
        position: relative;
        &::after {
            position: absolute;
            right: 20px;
            font-family: "Font Awesome 5 Free";
            font-weight: 800;
            content: '\f078';
            display: inline-block;
        }
        
        &.up::after {
            content: '\f077';
        }
    }
    
    .vmw__special__search {
        background: $prim;
    }
    
    .sec-back {
        background: $sec;
    }
    
    .border-bottom:last-of-type {
        border-bottom: 0 !important;
    }
    
    .filter-category, .filter-land, .filter-price {
        display: none;
        padding: 10px;
        width: 100%;
        top: 24px;
        background: $sec;
        z-index: 3;
        list-style-type: none;
        position: absolute;
        text-align: left;
        
        &.active {
            display: block;
        }
    }
</style>
