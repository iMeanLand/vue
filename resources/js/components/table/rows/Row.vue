<template>
    <tr>
        <component v-for="column in columns" :is="column.type" :column="column" :item="item" />
    </tr>
</template>

<script>
    import Linked from './cells/Linked';
    import Simple from './cells/Simple';
    import Checkbox from './cells/Checkbox';

    export default {

        props: [
            'item',
            'columns'
        ],

        mounted() {
            console.log(this.item);
        },

        components: {
            Linked,
            Simple,
            Checkbox
        }

    }
</script>