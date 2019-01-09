<template>
    <div class="vmw__special__search bg-primary has-border-radius">
        <form class="text-center text-white d-flex flex-column p-3" v-on:submit.prevent="submitData">
            <p>
                Ik ben op zoek naar:
            </p>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3">
                <label for="product-category" class="p-0 m-0 w-25">een</label>
                <select id="product-category" name="product-category" class="bg-transparent w-100">
                    <option value="rode-wijn">Rode wijn</option>
                    <option value="witte-wijn">Witte wijn</option>
                </select>
            </span>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3">
                <label for="product-land" class="p-0 m-0 w-25">uit</label>
                <select id="product-land" name="product-land" class="bg-transparent w-100">
                    <option value="frankrijk">Frankrijk</option>
                    <option value="duitsland">Duitsland</option>
                    <option value="italie">Italie</option>
                </select>
            </span>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3">
                <label for="product-price" class="p-0 m-0 w-25">voor</label>
                <select id="product-price" name="product-price" class="bg-transparent w-100">
                    <option value="5-5">&lt; &euro;5</option>
                    <option value="5-10">&euro;5 tot &euro;10</option>
                    <option value="15-25">&euro;15 tot &euro;25</option>
                    <option value="25">&euro;25+</option>
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
                params.append('product-land', land)
                params.append('product-price', prijs)

                let pUrl = `${this.url}?${params.toString()}`
                window.location.href = pUrl
            }
        }
    }
</script>

<style>
    select {
        border:none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -ms-appearance: none; /* get rid of default appearance for IE8, 9 and 10*/
    }
</style>
