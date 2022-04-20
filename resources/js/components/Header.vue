<template>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <nav class="py-2">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <router-link class="nav-link" aria-current="page" :to="{name: 'home'}">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'menu'}">Menu</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'order'}">Ordina la tua pizza!</router-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style>

</style>
