<template>
    <!--TODO: preventdefualt-->
    <form id="add-form" v-on:submit="submit(e)">
        <div class="form-row align-items-center">
            <div class="col-auto" v-for="field in fields">
                <label :for="field.name" class="sr-only">{{ field.label }}</label>
                <input :type="field.type" class="form-control mb-2" :name="field.name" :id="field.name" :placeholder="field.placeholder" :required="field.required ? 'required' : ''">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">{{ button }}</button>
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

            submit(e) {
                e.preventDefault();

                let form = document.getElementById('add-form');
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