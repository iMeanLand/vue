<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th v-for="column in columns">{{ column.name }}</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td v-for="column in columns">
                    <!--TODO: IF link show link -->
                    <a v-if="column.link" :href="column.link + item.id">
                        {{ item[column.field_name] }}
                    </a>
                    <span v-else-if="!column.link">{{ item[column.field_name] }}</span>
                </td>
            </tr>
            </tbody>
        </table>
        <Loader :show="loader"/>
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" v-if="current_page > from" v-on:click="switchPage(current_page - 1)" href="#">Previous</a>
                </li>
                <li v-for="from in last" class="page-item">
                    <a class="page-link" v-on:click="switchPage(from)" href="#">{{ from }}</a>
                </li>
                <li class="page-item">
                    <a class="page-link" v-if="current_page < last" v-on:click="switchPage(current_page + 1)" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    import Loader from './misc/Loader';

    export default {

        props: [
            'columns'
        ],

        data() {
            return {
                items: [],
                from: '',
                last: '',
                current_page: 1,
                loader: false
            }
        },

        mounted() {
            console.log(this.columns);
            this.getItems();
        },

        components: {
            Loader
        },

        methods: {

            getItems() {

                axios.post('/cars', {})
                    .then(res => {
                        console.log(res.data);
                        this.items = res.data.data;
                        this.from = res.data.from;
                        this.last = res.data.last_page;
                        this.loader = false
                    });
                this.loader = true
            },

            switchPage(page = 1) {
                this.current_page = page;
                axios.post('/cars?page=' + page, {})
                    .then(res => {
                        this.items = res.data.data;
                        this.next_page = res.data.next_page;
                        this.previous_page = res.data.previous_page;
                        this.loader = false
                    });
                this.loader = true

            }

        }

    }
</script>