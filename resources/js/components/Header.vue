<template>
    <div class="container border-2 rounded bg-primary">
        <div class="row">
            <div class="col-10 offset-1">
                <nav class="py-2">
                    <ul class="nav justify-content-center">
                        <li v-for="(link, index) in navLinks" :key="index" class="nav-item">
                            <router-link class="  text-white nav-link" aria-current="page" :to="{name: link.to}">{{ link.name }}</router-link>
                        </li>
                        <!-- <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'menu'}">Menu</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'order'}">Ordina la tua pizza!</router-link>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                        <a class="nav-link text-white" href="/admin">Admin Access</a>
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
    data() {
        return {
            navLinks: [
                {
                    to : 'home',
                    name : 'Home',
                },
                {
                    to : 'menu',
                    name : 'Menu',
                },
                {
                    to : 'order',
                    name : 'Ordina subito!',
                },
            ]
        }
    },
}
</script>

<style>
.router-link-exact-active{
    text-transform: uppercase;
}
</style>
