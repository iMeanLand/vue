<template>
    <span>{{ item[column.field_name] }}</span>
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