<template>
    <div class="container py-4">
        <h1 class="text-center">Registrati ora!</h1>
        <h3 v-if="success" class="my-3 text-success">Registrazione avvenuta con successo!</h3>
        <div class="row">
            <div class="col-6 offset-3">
                <form @submit.prevent="registerCustomer()">

                    <!-- nome -->
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input  type="text" :class="{'is-invalid' : errors.name}" v-model="name" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        <div v-for="(error, index) in errors.name" :key="'error_name' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>
                    <!-- indirizzo -->
                    <div class="form-group">
                        <label for="address">Indirizzo di consegna</label>
                        <input  type="text" :class="{'is-invalid' : errors.address}" v-model="address" class="form-control" id="address" name="address" aria-describedby="emailHelp">
                        <div v-for="(error, index) in errors.address" :key="'error_address' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>
                    <!-- telefono -->
                    <div class="form-group">
                        <label for="address">Numero di Telefono</label>
                        <input  type="text" :class="{'is-invalid' : errors.phone}" v-model="phone" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
                        <div v-for="(error, index) in errors.phone" :key="'error_address' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" :class="{'is-invalid' : errors.email}"  v-model="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <div v-for="(error, index) in errors.email" :key="'error_email' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>
                    <!-- password -->
                    <div class="form-group">
                        <label for="password">Inserisci la Password</label>
                        <input type="password" :class="{'is-invalid' : errors.password}" v-model="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                        <div v-for="(error, index) in errors.password" :key="'error_password' + index" class="invalid-feedback">
                            {{error}}
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="password_confirmation">Inserisci di nuovo la Password</label>
                        <input type="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="emailHelp">
                    </div> -->
                    <!-- button submit -->
                    <button type="submit" class="btn btn-success">{{ sending ? 'Invio in corso...' : 'Registrati' }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            name: '',
            address: '',
            phone: '',
            email: '',
            password: '',
            errors: {},
            sending: false,
            success: false,
        }
    },
    methods: {
        registerCustomer() {
            this.sending = true;
            axios.post('/api/customers',
                {
                    'name' : this.name,
                    'address' : this.address,
                    'phone' : this.phone,
                    'email' : this.email,
                    'password' : this.password,
                }
            ).then(response=>{
                this.sending = false;
                    console.log(response);
                if(response.data.success == false){
                    this.errors = response.data.results;
                    console.log(this.errors)
                } else {
                    this.name = ''
                    this.address = ''
                    this.phone = ''
                    this.email = ''
                    this.password = ''
                    this.errors = {}
                    this.success= true
                }
            })
        }
    },

}
</script>

<style>

</style>
