<template>
    <td>
        {{ item[column.field_name] }}
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