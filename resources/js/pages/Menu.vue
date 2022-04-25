<template>
    <div class="container py-5">
        <div class="row">
            <div class="col">

                <div class="d-flex justify-content-center align-items-center my-4">

                    <span class="mr-3">Categoria</span>

                    <div class="form-group mb-0 mr-3">
                        <select class="custom-select" id="categorySelected" name="categorySelected" v-model="categorySelected" @change="">
                            <option value="">Tutte le categorie</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id" >{{category.name}}</option>
                        </select>

                    </div>


                </div>


            </div>
        </div>
        <div class="row justify-content-center">
            <h3 v-if="getPizzaByCategory.length == 0">Nessuna pizza di questa cateogria presente</h3>
            <div class="col-3 m-2" v-for="(pizza,index) in getPizzaByCategory" :key="index">
                <div class="card ms_card">
                    <img :src="pizza.path" v-if="pizza.path" class="card-img-top ms_img" :alt="pizza.name">
                    <img :src="'storage/' + pizza.image" v-if="pizza.image" class="card-img-top ms_img" :alt="pizza.name">
                    <div class="card-body">
                        <h5 class="card-title">{{ pizza.name }}</h5>
                        <h6 class="card-text"> {{ pizza.category ? pizza.category.name : ''}} </h6>
                        <p class="card-text">Prezzo: {{pizza.price}}</p>

                        <!-- tags -->
                        <div v-if="pizza.tags.length != 0">
                            <span class="mr-2" v-for="tag in pizza.tags" :key="tag.id">
                                 <a href="#" class="badge badge-pill bg-primary text-white my-3">{{tag.name}}</a>
                            </span>

                        </div>

                        <div class="d-flex">
                            <div class="me-2 p-1">
                                <router-link :to="{name: 'pizza', params: {slug: pizza.slug, path: pizza.path} }" class="btn btn-primary rounded-pill">Vedi Pizza</router-link>
                            </div>
                            <div class="me-2 p-1">
                                <router-link :to="{name: 'order', params: {pizza : pizza}}" class="btn btn-success rounded-pill">Aggiungi all'ordine</router-link>
                            </div>
                        </div>
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
            categories: [],
            categorySelected: '',
            pizze: [],
            // creo array di oggetti con path immagine e slug per reference
            pizzeStandardImg : [
                {
                    path : 'img/cotto-e-funghi.jpeg',
                    slugRef : 'cotto-e-funghi'
                },

                {
                    path : '/img/diavola.jpeg',
                    slugRef : 'diavola'
                },

                {
                    path : '/img/margherita.jpeg',
                    slugRef : 'margherita'
                },

                {
                    path : '/img/parmigiana.jpeg',
                    slugRef : 'parmigiana'
                },

                {
                    path : '/img/pizza-napoli.jpeg',
                    slugRef : 'napoli'
                },

                {
                    path : '/img/speck-noci.jpeg',
                    slugRef : 'speck-e-noci'
                },
                {
                    path : '/img/marinara.webp',
                    slugRef : 'marinara'
                },

            ]
        }
    },
    methods: {
        getMenu() {
            axios.get('api/pizze')
            .then(response =>{
                this.pizze = response.data.results;
                // dopo lancia la funzione per settare in ciascun oggetto pizza la path img
                this.setImgBySlug(this.pizze, this.pizzeStandardImg);
                //console.log(this.pizze);
            })
        },
        // funzione per settare immagine corrispondente a slug
        setImgBySlug(arrayObj, arrayImgObj){
            arrayObj.forEach(obj => {
                //console.log(obj.slug)

                for (let i = 0; i < arrayImgObj.length; i++) {
                    if(obj.slug == arrayImgObj[i].slugRef){
                        obj.path = arrayImgObj[i].path;
                    }
                }

            });

            //console.log(arrayObj);
        },
        getCategories(){
            axios.get('/api/categories')
            .then(response => {
                // console.log(response);
                this.categories = response.data.results;
            })
        },
    },
    mounted () {
        this.getMenu();
        this.getCategories();
    },
    computed: {
        getPizzaByCategory() {
            if(this.categorySelected == '' ){
                return this.pizze
            } else {
                return this.pizze.filter(pizza=>{
                    return pizza.category_id == this.categorySelected;
                })
            }
        }
    },
}
</script>

<style lang="scss">
.ms_card{
    min-height: 400px;

    .ms_img{
        height: 200px;
        object-fit: cover;
    }
}
</style>
