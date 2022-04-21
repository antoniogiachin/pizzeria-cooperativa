<template>
    <div class="container py-5">
        <h1 class="text-center my-2">La nostra fantastica pizza {{pizza.name}}</h1>
        <div class="row">
            <div class="col-4 offset-4">
                    <img v-if="path" :src="path" class="img-fluid rounded" :alt="pizza.name">
                    <img v-if="pizza.image" :src="pizza.image" class="img-fluid rounded" :alt="pizza.name">
                    <p v-if="imageToSet" class="text-danger">Nessuna immagine disponibile!</p>
            </div>
        </div>
        <h4 class="text-center my-3">Tua per soli {{pizza.price}} &euro; </h4>
        <h2 class="text-center my-3">La sua storia</h2>
        <div class="row">
            <div class="col-8 offset-2">
                <p>
                    Velit anim tempor duis cillum laborum elit non velit ullamco exercitation. Et deserunt irure sunt ex deserunt nulla adipisicing anim velit ad eiusmod. Dolore ut consectetur irure ullamco ex nulla. Non amet consectetur id. Consequat magna nostrud incididunt elit tempor consequat consequat. Adipisicing cillum ad quis commodo nisi veniam deserunt sunt est sint. Amet dolore cillum incididunt. Dolore magna ut et consectetur dolore ipsum sit commodo fugiat excepteur cillum do nulla ullamco veniam. Minim minim officia velit et fugiat veniam veniam qui aliqua tempor. Nostrud laborum dolore consectetur.
                </p>
            </div>
        </div>
        <div class="d-flex justify-content-center my-3">
            <router-link :to="{name: 'menu'}" class="btn btn-primary">Torna Indietro</router-link>
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
