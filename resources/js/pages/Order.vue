<template>
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>Ordina da noi!</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div v-if="success" class="alert alert-success">
                    Ordine preso in carico. Presto saremo da te!
                </div>


                <form @submit.prevent="sendForm()">

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" :class="{'is-invalid': errors.name}" id="name" name="name" v-model="name">
                        <div v-for="(error, index) in errors.name" :key="'error_name' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number">Numero di telefono</label>
                        <input type="string" class="form-control" :class="{'is-invalid': errors.number}" id="number" name="number" v-model="number">
                        <div v-for="(error, index) in errors.number" :key="'error_number' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Indirizzo</label>
                        <input type="string" class="form-control" :class="{'is-invalid': errors.address}" id="address" name="address" v-model="address">
                        <div v-for="(error, index) in errors.address" :key="'error_address' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="pizzaSelected">Pizza</label>
                         <select class="custom-select" id="inputGroupSelect01" :class="{'is-invalid': errors.pizzaSelected}" name="selectedAddress" v-model="pizzaSelected">
                            <option selected>Choose...</option>
                            <option v-for="pizza in pizze" :key="pizza.id" :value="pizza.slug" >{{pizza.name}} ({{pizza.price}} &euro;)</option>
                        </select>
                        <div v-for="(error, index) in errors.pizzaSelected" :key="'error_pizzaSelected' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div> -->

                    <!-- checkbox pizze -->
                    <div>
                        <label class="typo__label">Simple select / dropdown</label>
                        <multiselect v-model="value" :options="pizze" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Seleziona la pizza" label="name" track-by="name" :preselect-first="true">
                            <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} Pizze selezionate</span></template>
                        </multiselect>
                        <h5 class="my-2 mx-0">Hai scelto: </h5>
                        <span class="badge bg-success mr-2 mb-3" v-for="(pizza,index) in value" :key="index">{{pizza.name}}</span>
                    </div>

                    <div class="form-group">
                        <label for="message">Messaggio</label>
                        <textarea class="form-control" :class="{'is-invalid': errors.message}" name="message" id="message" rows="10" placeholder="Scrivi i dettagli per lo chef..." v-model="message"></textarea>
                         <div v-for="(error, index) in errors.message" :key="'error_message' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{sending ? "invio in corso" : "Invia"}}</button>

                </form>

            </div>
        </div>

    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';

    export default {
        name: 'Order',

        components: {
            Multiselect,
        },

        data(){
            return{
                name: '',
                number: '',
                address: '',
                pizzaSelected: '',
                message: '',
                pizze: {},
                errors: {},
                sending: false,
                success: false,
                // prova multiselect
                value: [],
                try: [],
            }
        },

        mounted(){
            axios.get("/api/pizze")
                .then(response => {
                    this.pizze = response.data.results;
                    if(this.$route.params.pizza){
                        this.value.push(this.$route.params.pizza)
                    }

                });
        },

        methods:{
            sendForm(){
                const valueName = [];
                this.value.forEach(value => {
                    valueName.push(value.name);
                })
                console.log(valueName)
                this.try = valueName.toString();
                this.pizzaSelected = this.try;
                console.log(this.pizzaSelected);
                this.sending = true;

                axios.post('/api/orders', {
                    "name": this.name,
                    "number": this.number,
                    "address": this.address,
                    "pizzaSelected": this.pizzaSelected,
                    "message": this.message
                }).then(response => {
                    console.log(response);
                    if(response.data.success){
                        this.success = true;
                        this.name = '';
                        this.number = '';
                        this.address = '';
                        this.pizzaSelected = '';
                        this.message =  '';
                        this.errors = {};
                    }else{
                        this.errors = response.data.errors;
                    }

                    this.sending = false;
                });
            },
            turnSelectionString(){
                const valueName = [];
                this.value.forEach(value => {
                    valueName.push(value.name);
                })
                this.pizzaSelcted = valueName.toString();
            }
        }
    }
</script>


<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
