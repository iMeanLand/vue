<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th v-for="column in columns">{{ column.name }}</th>
            </tr>
            </thead>
            <tbody>
                <Row v-for="item in items" :item="item" :columns="columns">
                    <template v-for="column in columns" :slot="'column.' + column.field_name">
                        <slot :name="`column.${column.field_name}`" :item="item"></slot>
                    </template>
                </Row>
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
    import Loader from '../misc/Loader';
    import Row from './rows/Row';
    let jora = 'column.name';

    export default {

        props: [
            'columns',
            'action'
        ],

        data() {
            return {
                items: [],
                from: 1,
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
            Loader,
            Row
        },

        methods: {

            getItems() {
                this.switchPage(1);
            },

            switchPage(page = 1) {
                this.current_page = page;
                axios.post(this.action +'?page=' + page, {})
                    .then(res => {
                        this.items = res.data.data;
                        this.next_page = res.data.next_page;
                        this.last = res.data.last_page;
                        this.previous_page = res.data.previous_page;
                        this.loader = false
                    });

                this.loader = true
            }

        }

    }
</script>