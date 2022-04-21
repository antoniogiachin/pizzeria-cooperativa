<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3 m-2" v-for="(pizza,index) in pizze" :key="index">
                <div class="card">
                    <img src="https://picsum.photos/200/300" class="card-img-top" :alt="pizza.name">
                    <div class="card-body">
                        <h5 class="card-title">{{ pizza.name }}</h5>
                        <p class="card-text">Prezzo: {{pizza.price}}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Menu',
    data() {
        return {
            pizze: [],
        }
    },
    methods: {
        getMenu() {
            axios.get('api/pizze')
            .then(response =>{
                this.pizze = response.data.results;
                console.log(this.pizze);
            })
        }
    },
    mounted () {
        this.getMenu();
    },
}
</script>

<style>

</style>
