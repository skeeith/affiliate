<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="text-primary" :to="{ name: 'brands.index' }">Brands</router-link>
                /
                <a class="text-secondary">Create New Brand</a>
            </div>
            <div class="card-body">
                <div v-if="ifReady">
                    <form v-on:submit.prevent="createNewBrand()">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="title" class="form-control" v-model="name" autocomplete="off" minlength="2" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text-area" class="form-control" v-model="description" autocomplete="off" minlength="2" maxlength="255" required>
                        </div>

                        <br>

                        <router-link class="btn btn-outline-secondary btn-sm" :to="{ name: 'brands.index' }"><i class="fas fa-chevron-left"></i>&nbsp; Back</router-link>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp; Create New Brand</button>
                    </form>
                </div>

                <div v-else>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { required, minLength, sameAs } from 'vuelidate/lib/validators';

    export default {
        data() {
            return {
                ifReady: true,
                name: '',
                description: ''
            };
        },

        validations: {
            name: {
                required,
                minLength: minLength(2)
            },
            description: {
                required,
                minLength: minLength(8)
            }
        },

        methods: {
            createNewBrand() {
                this.ifReady = false;

                axios.post('/api/brands', this.$data).then(res => {
                    this.$router.push({ name: 'brands.index' });
                }).catch(err => {
                    this.ifReady = true;
                    console.log(err);
                });
            }
        }
    }
</script>
