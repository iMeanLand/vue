<template>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="car in cars">
            <td :key="car.name">{{ car.name }}</td>
            <td>{{ car.created_at }}</td>
            <td>{{ car.updated_at }}</td>
            <td></td>
        </tr>
        </tbody>
        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li v-for="from in last" class="page-item"><a class="page-link" v-on:click="switchPage(from)" href="#">{{ from }}</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </table>


</template>

<script>
    export default {

        data() {
            return {
                cars: [],
                from: '',
                last: ''
            }
        },

        mounted() {
            this.getItems();
        },

        methods: {

            getItems() {
                axios.post('/cars', {})
                    .then(res => {
                        this.cars = res.data.data;
                        this.from = res.data.from;
                        this.last = res.data.last_page;
                    })
            },

            switchPage(page = 1) {

                axios.post('/cars?page=' + page, {})
                    .then(res => {
                        this.cars = res.data.data
                    })
            }

        }

    }
</script>