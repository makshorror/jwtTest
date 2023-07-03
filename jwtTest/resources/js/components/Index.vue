<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <router-link
                                v-if="!accessToken"
                                class="nav-link"
                                :to="{name: 'users.login'}"
                            >Вход
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link
                                v-if="!accessToken"
                                class="nav-link"
                                :to="{name: 'users.registration'}"
                            >Регистрация
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a
                                href="#"
                                v-if="accessToken"
                                class="nav-link"
                                @click.prevent="logout"
                            >Выход
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div
                        class="collapse navbar-collapse"
                        id="navbarNav"
                    >
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <router-link
                                    class="nav-link"
                                    :to="{name: 'fruit.index'}"
                                >Список
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link
                                    v-if="accessToken"
                                    class="nav-link"
                                    :to="{name: 'users.personal'}"
                                >Личный кабинет
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div>
            <router-view :key="$route.fullPath"></router-view>
        </div>
    </div>
</template>

<script>
import api from "../api.js";
export default {
    name: "Index",

    data () {
        return {
            accessToken: null,
        };
    },
    mounted () {
        this.getAccessToken();
    },

    updated () {
        this.getAccessToken();
    },

    methods: {
        getAccessToken () {
            this.accessToken = localStorage.getItem("access_token");
        },

        logout(){
            api.post('/api/auth/logout')
                .then(
                    res => {
                        localStorage.removeItem('access_token')
                        this.$router.push({name: "users.login"})
                    }
                )
        }
    },


}
;
</script>

<style scoped>

</style>
