<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th v-for="column in columns">
                    <span v-if="!$scopedSlots[`header.${column.field_name}`]">{{ column.name }}</span>
                    <slot :name="`header.${column.field_name}`" :item="column.name"></slot>
                </th>
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
    import Provider from './Provider.js';
    import Loader from '../misc/Loader';
    import Row from './rows/Row';

    export default {

        props: {
            columns: {
                type: Array
            },
            action: {
                type: String,
            },
            dataProvider: {
                default: () => {
                    return new Provider();
                }
            },
        },

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
                this.switchPage();
            },

            switchPage(page = 1) {
                this.current_page = page;

                this.dataProvider.fetchData(this.action, 'page=' + page).then(data => {
                    this.items = data.data;
                    this.next_page = data.next_page;
                    this.last = data.last_page;
                    this.previous_page = data.previous_page;
                    this.loader = false
                });

                this.loader = true
            }

        }

    }
</script>