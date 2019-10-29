<template>
    <form v-on:submit.prevent="submit" id="edit-form">
        <div class="form-row align-items-center">
            <div class="col-lg-6" v-for="field in fields">
                <div v-if="field.type === 'hidden'">
                    <input :type="field.type"
                           :name="field.name"
                           :value="model[field.name]">
                </div>
                <div v-else>
                    <label :for="field.name" class="sr-only">{{ field.label }}</label>
                    <input :type="field.type" class="form-control mb-2"
                           :name="field.name" :id="field.name"
                           :placeholder="field.placeholder"
                           :value="model[field.name]"
                           v-on:change=""
                           :required="field.required">
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary mb-2">{{ button }}</button>
            </div>
        </div>
        <Loader :show="loader"/>
    </form>
</template>

<script>
    import Loader from './misc/Loader';

    export default {

        props: [
            'action',
            'fields',
            'button',
            'model'
        ],

        data() {
            return {
                loader: false,
                values: {}
            }
        },

        mounted() {
            console.log(this.fields);
        },

        components: {
            Loader
        },

        methods: {
            submit() {
                let form = document.getElementById('edit-form');
                let data = new FormData(form);
                this.loader = true;
                axios.post(this.action + this.model.id, data)
                    .then(res => {
                        this.loader = false;
                        console.log(res);
                    })
            }

        }

    }
</script>