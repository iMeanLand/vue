<template>
    <form v-on:submit.prevent="submit" id="add-form">
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
                           :required="field.required">
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary mb-2">{{ button }}</button>
            </div>
        </div>
        <Loader :show="loader" />
    </form>
</template>

<script>
    import Loader from './misc/Loader';

    export default {

        props: [
            'action',
            'fields',
            'button'
        ],

        mounted() {
            console.log(this.fields);
        },

        data() {
            return {
                loader: false,
            }
        },

        components: {
            Loader
        },

        methods: {

            submit() {
                let form = document.getElementById('add-form');
                let data = new FormData(form);
                data.append("_method", "POST");
                this.loader = true;
                axios.post(this.action, data)
                    .then(res => {
                        this.loader = false;
                        console.log(res);
                    })
            }

        }

    }
</script>