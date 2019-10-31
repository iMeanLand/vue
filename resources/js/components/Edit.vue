<template>
    <form ref="form" id="edit-form">
        <div class="form-row align-items-center">
            <div class="col-lg-6" v-for="field in fields">
                <div v-if="field.type === 'hidden'">
                    <input :type="field.type"
                           :name="field.name"
                           :value="model[field.name]">
                </div>
                <div v-else-if="field.type === 'select'">
                    <label :for="field.name" class="sr-only">{{ field.label }}</label>
                    <select class="form-control" :name="field.name">
                        <option>Select an option</option>
                        <option :selected="(model.speed_unit_id === option.id)" :value="option.id" v-for="option in field.options">{{ option.name }}</option>
                    </select>
                </div>
                <div v-else>
                    <label :for="field.name" class="sr-only">{{ field.label }}</label>
                    <input :type="field.type" class="form-control mb-2"
                           :name="field.name" :id="field.name"
                           :placeholder="field.placeholder"
                           v-model="model[field.name]"
                           :required="field.required">
                </div>
            </div>
            <div class="col-lg-12">
                <button v-on:click.prevent="submit" type="submit" class="btn btn-primary mb-2">{{ button }}</button>
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
            }
        },

        mounted() {
            console.log(this.model);
        },

        components: {
            Loader
        },

        methods: {
            submit() {
                let form = this.$refs.form;
                console.log(form);
                let data = new FormData(form);
                this.loader = true;
                axios.post(this.action + this.model.id, data)
                    .then(res => {
                        this.loader = false;
                    })
            }

        }

    }
</script>