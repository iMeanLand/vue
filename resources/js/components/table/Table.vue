<template>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th v-for="column in columns">
                    <span v-if="!$scopedSlots[`header.${column.field_name}`]">
                        <span v-on:click="sort(column.field_name)" v-if="column.sortable">
                            <Sortable :direction="direction" :column="column.name" :active="current_sort_field == column.field_name ? true : false" />
                        </span>
                        <span v-else>
                            {{ column.name }}
                        </span>
                    </span>
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
                    <a :class="'page-link ' + (from === current_page ? 'active' : '')" v-on:click="switchPage(from)" href="#">{{ from }}</a>
                </li>
                <li class="page-item">
                    <a class="page-link" v-if="current_page < last" v-on:click="switchPage(current_page + 1)" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>
<style lang="scss">
    .page-link {
        &.active {
            background: #1d68a7;
            color: #fff;
        }
    }
</style>

<script>
    import Provider from './Provider.js';
    import Loader from '../misc/Loader';
    import Row from './rows/Row';
    import Sortable from './rows/header/Sortable';

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
                direction: null,
                current_sort_field: null,
                last: '',
                current_page: 1,
                loader: false
            }
        },

        mounted() {
            this.getItems();
        },

        components: {
            Loader,
            Row,
            Sortable,
        },

        methods: {

            getItems() {
                this.switchPage();
            },

            switchPage(page = 1) {
                this.current_page = page;

                this.dataProvider.fetchData(this.action, {
                    page: page
                }).then(data => {
                    this.items = data.data;
                    this.next_page = data.next_page;
                    this.last = data.last_page;
                    this.previous_page = data.previous_page;
                    this.loader = false
                });

                this.loader = true
            },

            sort(field) {
                if (this.current_sort_field == field) {
                    switch (this.direction) {
                        case null:
                            this.direction = 'ASC';
                            break;
                        case 'ASC':
                            this.direction = 'DESC';
                            break;
                        case 'DESC':
                            this.direction = null;
                            break;
                    }
                } else {
                    this.direction = 'ASC';
                }


                this.current_sort_field = field;

                this.dataProvider.fetchData(this.action, {
                    page: this.current_page,
                    sortby: field,
                    direction: this.direction
                }).then(data => {
                    this.items = data.data;
                    this.loader = false
                });
                this.loader = true;
            }

        }

    }
</script>