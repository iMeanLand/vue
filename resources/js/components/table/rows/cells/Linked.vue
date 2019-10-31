<template>
    <a :href="column.link + item.id">
        {{ item[column.field_name] }}
    </a>
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