<template>
    <form id="edit-form">
        <div class="form-row align-items-center">
            <!--TODO: Action form by id from blade-->
            <div class="col-auto" v-for="field in fields">
                <label :for="field.name" class="sr-only">{{ field.label }}</label>
                <input :type="field.type" class="form-control mb-2" :name="field.name" :id="field.name" :value="" :placeholder="field.placeholder">
            </div>
            <div class="col-auto">
                <button type="button" v-on:click="submit" class="btn btn-primary mb-2">{{ button }}</button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {

        props: [
            'action',
            'fields',
            'button'
        ],

        mounted() {
            console.log(this.fields);
        },

        methods: {

            submit(el) {
                let form = document.getElementById('edit-form');
                let data = new FormData(form);
                data.append("_method", "POST");
                axios.post(this.action, data)
                    .then(res => {
                        console.log(res);
                    })
            }

        }

    }
</script>