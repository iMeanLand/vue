<template>
    <td>
        <a :href="column.link + item.id">
            {{ item[column.field_name] }}
        </a>
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