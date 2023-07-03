<template>
    <div class="w-25 mx-auto">
        <h3>Вход</h3>
        <form class="mt-4">
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
                    placeholder="Пароль..."
                >
            </div>
            <div v-if="this.error" class="text-danger mb-3">{{this.error}}</div>
            <button
                @click.prevent="login"
                type="submit"
                class="btn btn-primary"
            >Войти
            </button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Login",

    data () {
        return {
            email: "",
            password: "",
            error: null
        };
    },

    methods: {
        login () {
            axios.post("/api/auth/login", {email: this.email, password: this.password})
                .then(res => {
                    localStorage.setItem("access_token", res.data.access_token);
                    this.$router.push({name: "users.personal"})
                })
                .catch(error => {
                    this.error = error.response.data.error;
                });
        },

    },
};
</script>

<style scoped>

</style>
