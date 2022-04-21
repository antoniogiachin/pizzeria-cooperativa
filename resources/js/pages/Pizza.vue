<template>
    <div class="container py-5">
        <h1 class="text-center my-2">La nostra fantastica pizza {{pizza.name}}</h1>
        <div class="row">
            <div class="col-6 offset-3">
                    <img v-if="path" :src="path" class="img-fluid" :alt="pizza.name">
                    <img v-if="pizza.image" :src="pizza.image" class="img-fluid" :alt="pizza.name">
                    <p v-if="imageToSet" class="text-warning">Nessuna immagine disponibile!</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Pizza',
    data() {
        return {
            pizza: [],
            path: '',
            imageToSet: false,
        }
    },
    methods: {
        getSinglePizza() {
            axios.get('/api/menu/' + this.$route.params.slug)
            .then(response =>{
                this.pizza = response.data.results
                if(this.pizza.image == null && this.$route.params.path == undefined ){
                    this.imageToSet = true;
                }
                this.setPath(this.$route.params.path)
                console.log(this.pizza);
            })
        },
        setPath(pathToSet){
            this.path = pathToSet;
        }
    },
    mounted () {
        this.getSinglePizza();
    },
}
</script>

<style>

</style>
