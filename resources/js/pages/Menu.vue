<template>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-3 m-2" v-for="(pizza,index) in pizze" :key="index">
                <div class="card ms_card">
                    <img :src="pizza.path" class="card-img-top ms_img" :alt="pizza.name">
                    <div class="card-body">
                        <h5 class="card-title">{{ pizza.name }}</h5>
                        <p class="card-text">Prezzo: {{pizza.price}}</p>
                        <div class="d-flex">
                            <div class="me-2 p-1">
                                <a href="#" class="btn btn-primary rounded-pill">Vedi Pizza</a>
                            </div>
                            <div class="me-2 p-1">
                                <a href="#" class="btn btn-success rounded-pill">Aggiungi all'ordine</a>
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
                console.log(this.pizze);
            })
        },
        // funzione per settare immagine corrispondente a slug
        setImgBySlug(arrayObj, arrayImgObj){
            arrayObj.forEach(obj => {
                console.log(obj.slug)
                for (let i = 0; i < arrayImgObj.length; i++) {
                    if(obj.slug == arrayImgObj[i].slugRef){
                        obj.path = arrayImgObj[i].path;
                    }
                }
            });

            console.log(arrayObj);
        }
    },
    mounted () {
        this.getMenu();
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
