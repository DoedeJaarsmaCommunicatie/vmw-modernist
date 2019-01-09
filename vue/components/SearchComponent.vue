<template>
    <div class="vmw__special__search bg-primary has-border-radius">
        <form class="text-center text-white d-flex flex-column py-1 px-3" v-on:submit.prevent="submitData">
            <p>
                Ik ben op zoek naar:
            </p>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3 chevron-back">
                <label for="product-category" class="p-0 m-0 w-25">een</label>
                <select id="product-category" name="product-category" class="bg-transparent w-100">
                    <option value="rode-wijn">Rode wijn</option>
                    <option value="witte-wijn">Witte wijn</option>
                </select>
            </span>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3 chevron-back">
                <label for="product-land" class="p-0 m-0 w-25">uit</label>
                <select id="product-land" name="product-land" class="bg-transparent w-100">
                    <option value="frankrijk">Frankrijk</option>
                    <option value="duitsland">Duitsland</option>
                    <option value="italie">Italie</option>
                </select>
            </span>
            
            <span class="bg-primary-dark-10 has-border-radius my-1 d-flex justify-content-center px-3 chevron-back">
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

    .chevron-back {
        background-image: url("data:image/png;base64,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");
        background-repeat: no-repeat;
        background-size: contain;
        background-position-x: 89%;
    }
</style>
