<template>
    <div>
    <span v-for="link in column.links">
        <a :href="getItemLink(link)">
            {{ link.label }}
        </a>
    </span>
    </div>
</template>

<script>
    import Functions from "../../Functions";

    export default {

        props: [
            'column',
            'item'
        ],

        mounted() {
        },

        methods: {
            getItemLink: function (link) {
                let functions = new Functions();
                return functions.getLink(link, this.item);
            }
        }

    }
</script>