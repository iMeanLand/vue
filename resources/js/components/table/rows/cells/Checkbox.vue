<template>
    <label>
        <input v-model="item[column.field_name]" type="checkbox"/>
    </label>
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