<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="text-primary" :to="{ name: 'categories.index' }">Categories</router-link>
                /
                <a class="text-secondary">Create New Category</a>
            </div>
            <div class="card-body">
                <div v-if="ifReady">
                    <form v-on:submit.prevent="createNewCategory()">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" v-model="name" autocomplete="off" minlength="2" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="description" class="form-control" v-model="description" autocomplete="off" minlength="2" maxlength="255" required>
                        </div>

                        <br>

                        <router-link class="btn btn-outline-secondary btn-sm" :to="{ name: 'categories.index' }"><i class="fas fa-chevron-left"></i>&nbsp; Back</router-link>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp; Create New Category</button>
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
                minLength: minLength(5)
            }
        },

        methods: {
            createNewCategory() {
                this.ifReady = false;

                axios.post('/api/categories', this.$data).then(res => {
                    this.$router.push({ name: 'categories.index' });
                }).catch(err => {
                    this.ifReady = true;
                    console.log(err);
                });
            }
        }
    }
</script>
