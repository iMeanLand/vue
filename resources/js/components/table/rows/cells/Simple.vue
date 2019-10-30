<template>
    <td>
        <span>{{ item[column.field_name] }}</span>
    </td>
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