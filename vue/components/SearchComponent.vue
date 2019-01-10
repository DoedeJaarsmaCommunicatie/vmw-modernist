<template>
    <div class="vmw__special__search has-border-radius">
        <form class="text-center text-white d-flex flex-column py-1 px-3" v-on:submit.prevent="submitData">
            <p class="m-0">
                Ik ben op zoek naar:
            </p>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3 chevron-back position-relative cursor-pointer" v-on:click="changeCategoryOpen">
                <label for="product-category" class="p-0 m-0 w-25">een</label> <span data-target="product-category">{{ categories['rode-wijn'] }}</span>
                <input type="hidden" disabled name="product-category" id="product-category" :value="categories['rode-wijn']">
                <ul class="filter-category">
                    <li v-for="(category, key) in categories" :key="key">{{category}}</li>
                </ul>
            </span>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3 chevron-back">
                <label for="product-land" class="p-0 m-0 w-25">uit</label>
                <select id="product-land" name="product-land" class="bg-transparent w-100">
                    <option v-for="(land, key) in landen" :value="key">{{land}}</option>
                </select>
            </span>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3 chevron-back">
                <label for="product-price" class="p-0 m-0 w-25">voor</label>
                <select id="product-price" name="product-price" class="bg-transparent w-100">
                    <option v-for="(prijs, key) in prijzen" :value="key" v-html="prijs"></option>
                </select>
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
                    'duitsland': 'Duitsland'
                },
                prijzen: {
                    '': 'alle prijzen',
                    '5-5': '&euro; 5',
                    '5-15': '&euro; 5 - &euro; 15',
                    '15-25': '&euro; 25 - &euro; 25',
                    '25': '&euro; 25 +',
                },
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
                document.querySelector('.filter-category').classList.toggle('active')
            }
        },
    }
</script>

<style lang="scss">
    $prim: #F2664B;
    $sec: #EB5538;
    
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
        background-image: url("data:application/xml;base64,PD94bWwgdmVyc2lvbj0nMS4wJyBlbmNvZGluZz0ndXRmLTgnPz4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDEyOSAxMjkiIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAxMjkgMTI5Ij4KICA8Zz4KICAgIDxwYXRoIGQ9Im0xMjEuMywzNC42Yy0xLjYtMS42LTQuMi0xLjYtNS44LDBsLTUxLDUxLjEtNTEuMS01MS4xYy0xLjYtMS42LTQuMi0xLjYtNS44LDAtMS42LDEuNi0xLjYsNC4yIDAsNS44bDUzLjksNTMuOWMwLjgsMC44IDEuOCwxLjIgMi45LDEuMiAxLDAgMi4xLTAuNCAyLjktMS4ybDUzLjktNTMuOWMxLjctMS42IDEuNy00LjIgMC4xLTUuOHoiLz4KICA8L2c+Cjwvc3ZnPgo=");
        background-repeat: no-repeat;
        background-size: contain;
        background-position-x: 89%;
    }
    
    .vmw__special__search {
        background: $prim;
    }
    
    .filter-category {
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
