<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="text-primary" :to="{ name: 'categories.index' }">Categories</router-link>
                /
                <span class="text-secondary">View Category</span>
            </div>
            <div class="card-body">
                <div v-if="ifReady">
                    <fieldset disabled>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="category.name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="email" class="form-control" v-model="category.description">
                        </div>
                    </fieldset>

                    <br>

                    <router-link class="btn btn-outline-secondary btn-sm" :to="{ name: 'categories.index' }"><i class="fas fa-chevron-left"></i>&nbsp; Back</router-link>
                    <router-link class="btn btn-primary btn-sm" :to="{ name: 'categories.edit' , params: { id: category.id }}"><i class="fas fa-edit"></i>&nbsp; Edit Category</router-link>
                    <button type="button" class="btn btn-danger btn-sm" @click.prevent.default="openDeleteCategoryModal()"><i class="fas fa-trash-alt"></i>&nbsp; Delete Category</button>
                </div>
                <div v-else>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteCategoryTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">You're about to delete this Category?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this Category?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" @click.prevent.default="deleteCategory()">Confirm Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
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
                category: ''
            };
        },

        mounted() {
            let promise = new Promise((resolve, reject) => {
                axios.get('/api/categories/' + this.$route.params.id).then(res => {
                    this.category = res.data.category;
                    resolve();
                });
            });

            promise.then(() => {
                this.ifReady = true;
            });
        },

        methods: {
            openDeleteCategoryModal() {
                $('#deleteCategoryModal').modal('show');
            },
            deleteCategory() {
                $('#deleteCategoryModal').modal('hide');
                axios.delete('/api/categories/' + this.$route.params.id).then(res => {
                    this.$router.push({ name: 'categories.index' });
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>
