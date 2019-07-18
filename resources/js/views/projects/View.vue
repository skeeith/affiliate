<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="text-primary" :to="{ name: 'projects.index' }">Projects</router-link>
                /
                <span class="text-secondary">View Project</span>
            </div>
            <div class="card-body">
                <div v-if="ifReady">
                    <fieldset disabled>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="project.name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="description" class="form-control" v-model="project.description">
                        </div>
                    </fieldset>

                    <br>

                    <router-link class="btn btn-outline-secondary btn-sm" :to="{ name: 'projects.index' }"><i class="fas fa-chevron-left"></i>&nbsp; Back</router-link>
                    <router-link class="btn btn-primary btn-sm" :to="{ name: 'projects.edit' , params: { id: project.id }}"><i class="fas fa-edit"></i>&nbsp; Edit Project</router-link>
                    <button type="button" class="btn btn-danger btn-sm" @click.prevent.default="openDeleteProjectModal()"><i class="fas fa-trash-alt"></i>&nbsp; Delete Project</button>
                </div>
                <div v-else>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteProjectModal" tabindex="-1" role="dialog" aria-labelledby="deleteProjectTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">You're about to delete this Project?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this Project?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" @click.prevent.default="deleteProject()">Confirm Delete</button>
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
                project: ''
            };
        },

        mounted() {
            let promise = new Promise((resolve, reject) => {
                axios.get('/api/projects/' + this.$route.params.id).then(res => {
                    this.Project = res.data.Project;
                    resolve();
                });
            });

            promise.then(() => {
                this.ifReady = true;
            });
        },

        methods: {
            openDeleteProjectModal() {
                $('#deleteProjectModal').modal('show');
            },
            deleteProject() {
                $('#deleteProjectModal').modal('hide');
                axios.delete('/api/projects/' + this.$route.params.id).then(res => {
                    this.$router.push({ name: 'projects.index' });
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>
