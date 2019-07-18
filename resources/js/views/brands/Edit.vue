<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="text-primary" :to="{ name: 'brands.index' }">brands</router-link>
                /
                <span class="text-secondary">Edit brands</span>
            </div>
            <div class="card-body">
                <div v-if="ifReady">
                    <form v-on:submit.prevent="updateBrands()">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" v-model="name" autocomplete="off" minlength="2" maxlength="255" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text-area" class="form-control" v-model="description" disabled>
                        </div>

                        <br>

                        <router-link class="btn btn-outline-secondary btn-sm" :to="{ name: 'brands.index' }"><i class="fas fa-chevron-left"></i>&nbsp; Back</router-link>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>&nbsp; Update brands</button>
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
    export default {
        data() {
            return {
                ifReady: false,
                name: '',
                description: ''
            };
        },

        mounted() {
            let promise = new Promise((resolve, reject) => {
                axios.get('/api/brands/' + this.$route.params.id).then(res => {
                    this.name          = res.data.partner.name;
                    this.description         = res.data.partner.description;
                    resolve();
                });
            });

            promise.then(() => {
                this.ifReady = true;
            });
        },

        methods: {
            updateBrands() {
                this.ifReady = false;

                let formData = new FormData();

                formData.append('_method', 'PATCH');
                formData.append('name', this.name);
                formData.append('description', this.description);

                axios.brands('/api/brands/' + this.$route.params.id, formData).then(res => {
                    this.$router.push({
                        name: 'brands.view',
                        params: { id: this.$route.params.id }
                    });
                }).catch(err => {
                    this.ifReady = true;
                    console.log(err);
                });
            }
        }
    }
</script>
