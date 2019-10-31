<template>
    {{ item[column.field_name] }}
</template>

<script>
    export default {

        props: [
            'column',
            'item'
        ],

        mounted() {

        }

    }
</script>