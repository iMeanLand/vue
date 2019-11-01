<template>
    <a v-for="column.links" :href="getItemLink">
        {{ column.links.label }}
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
            getItemLink() {
                let functions = new Functions();

                return functions.getLink(this.column.links, this.item);
            }
        }

    }
</script>