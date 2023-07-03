<template>
    <div class="w-25 mx-auto">
        <h3>Регистрация</h3>
        <form class="mt-4">
            <div class="mb-3">
                <label
                    for="nameForm"
                    class="form-label"
                >Имя пользователя</label>
                <input
                    v-model="name"
                    type="text"
                    class="form-control"
                    id="nameForm"
                    placeholder="Имя пользователя..."
                >
            </div>
            <div class="mb-3">
                <label
                    for="emailForm"
                    class="form-label"
                >Email</label>
                <input
                    v-model="email"
                    type="email"
                    class="form-control"
                    id="emailForm"
                    placeholder="Email..."
                >
                <div v-if="this.error" class="text-danger">{{error}}</div>
            </div>
            <div class="mb-3">
                <label
                    for="passwordForm"
                    class="form-label"
                >Пароль</label>
                <input
                    v-model="password"
                    type="password"
                    class="form-control"
                    id="passwordForm"
                    placeholder="Пароль"
                >
            </div>
            <div class="mb-3">
                <label
                    for="confirmPasswordForm"
                    class="form-label"
                >Подтвердите пароль</label>
                <input
                    v-model="password_confirmation"
                    type="password"
                    class="form-control"
                    id="confirmPasswordForm"
                    placeholder="Подтвердите пароль..."
                >
            </div>
            <div v-if="this.confirmed" class="text-danger mb-3">{{confirmed}}</div>
            <button
                type="submit"
                class="btn btn-primary"
                @click.prevent="store"
            >Зарегестрироваться
            </button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Registration",

    data () {
        return {
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            error: null,
            confirmed: null
        };
    },

    mounted () {

    },

    methods: {
        store () {
            axios.post('/api/users', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation,
            })
                .then(res => {
                    localStorage.setItem('access_token', res.data.access_token)
                    this.$router.push({name: "users.personal"})
                })
                .catch(error => {
                    this.error = error.response.data.error;
                    this.confirmed = 'Пароль не совпадает'
                });
        },
    },
};
</script>

<style scoped>

</style>
