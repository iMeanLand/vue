<template>
    <span>{{ getItemValue }}</span>
</template>

<script>
    export default {

        props: [
            'column',
            'item'
        ],

        mounted() {},

        computed: {
            getItemValue: function() {
                let parts = this.column.field_name.split('.');
                let item = this.item;
                parts.forEach((val, index) => {
                    if (typeof item[val] === 'undefined' || item[val] == null) {
                        item = '';
                    } else {
                        item = item[val];
                    }
                });
                return item;
            }
        }

    }
</script>