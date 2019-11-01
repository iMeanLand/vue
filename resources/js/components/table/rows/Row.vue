<template>
    <tr>
        <td v-for="column in columns">
            <component :is="column.type" :column="column" :item="item" v-if="!$scopedSlots[`column.${column.field_name}`]"></component>
            <slot :name="`column.${column.field_name}`" :item="item"></slot>
        </td>
    </tr>
</template>

<script>
    import Links from './cells/Links';
    import Linked from './cells/Linked';
    import Simple from './cells/Simple';
    import Checkbox from './cells/Checkbox';

    export default {

        props: [
            'item',
            'columns'
        ],

        mounted() {
        },

        components: {
            Linked,
            Simple,
            Checkbox,
            Links
        }

    }
</script>