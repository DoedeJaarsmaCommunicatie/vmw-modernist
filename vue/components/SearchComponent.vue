<template>
    <div class="vmw__special__search bg-primary has-border-radius">
        <form class="text-center text-white d-flex flex-column p-3">
            <p>
                Ik ben op zoek naar:
            </p>
            
            <span>
                <label for="product-cat">een</label>
                <select id="product-cat" name="product-cat">
                    <option value="rode-wijn">Rode wijn</option>
                    <option value="witte-wijn">Witte wijn</option>
                </select>
            </span>
            
            <span>
                <label for="product-land">uit</label>
                <select id="product-land" name="product-land">
                    <option value="frankrijk">Frankrijk</option>
                    <option value="duitsland">Duitsland</option>
                    <option value="italie">Italie</option>
                </select>
            </span>
            
            <span>
                <label for="product-land">voor &euro;</label>
                <select id="product-land" name="product-land">
                    <option value="5">&lt; 5</option>
                    <option value="5-10">5-10</option>
                    <option value="15-25">15-25</option>
                    <option value="25">25+</option>
                </select>
            </span>

            <button type="button" class="btn bg-white text-dark has-border-radius">Vind mijn wijn</button>
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
