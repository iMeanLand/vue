<template>
    <span>{{ getItemValue }}</span>
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
            getItemValue() {
                let functions = new Functions();

                return functions.getItemValue(this.column.field_name, this.item);
            }
        }

    }
</script>