<template>
    <div class="w-50 mx-auto">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Фрукт</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="fruit in fruits">
                <th scope="row">{{ fruit.id }}</th>
                <td>{{ fruit.name }}</td>
                <td>{{ fruit.price }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import api from "../../api.js";

export default {
    name: "Index",

    data () {
        return {
            fruits: null,
        };
    },

    mounted () {
        this.getFruits();
    },

    methods: {
        getFruits () {
            api.get("/api/auth/fruits")
                .then(res => {
                    this.fruits = res.data.data;
                    if (this.fruits) {
                        let count = 1;
                        for (let i = 0;
                             i < res.data.data.length;
                             i++) {
                            this.fruits[i].id = count;
                            count++;
                        }
                    }
                });
        },
    },

};
</script>

<style scoped>

</style>
