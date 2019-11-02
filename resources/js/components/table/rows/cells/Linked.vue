<template>
    <a :href="getItemLink">
        {{ item[column.field_name] }}
    </a>
</template>

<script>
    import Functions from "../../Functions";

    export default {

        props: [
            'column',
            'item'
        ],

        mounted() {},

        computed: {
            getItemLink: function() {
                let functions = new Functions();

                return functions.getLink(this.column, this.item);
            }
        }

    }
</script>