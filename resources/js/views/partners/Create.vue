<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="text-primary" :to="{ name: 'partners.index' }">Partners</router-link>
                /
                <a class="text-secondary">Create New Partner</a>
            </div>
            <div class="card-body">
                <div v-if="ifReady">
                    <form v-on:submit.prevent="createNewPartner()">
                        <div class="form-group">
                            <label>Project</label>
                            <vue-select v-model="project" @input="selectProject()" label="name" :options="projects"></vue-select>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="title" class="form-control" v-model="name" autocomplete="off" minlength="2" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" v-model="description" maxlength="1000"></textarea>
                        </div>

                        <br>

                        <router-link class="btn btn-outline-secondary btn-sm" :to="{ name: 'partners.index' }"><i class="fas fa-chevron-left"></i>&nbsp; Back</router-link>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp; Create New Partner</button>
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
                ifReady: false,
                projejcts: [],
                project: '',
                project_id: '',
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

        mounted() {
            let promise = new Promise((resolve, reject) => {
                axios.get('/api/projects/get-all-projects').then(res => {
                    this.projects = res.data.projects;
                    resolve();
                }).catch(err => {
                    console.log(err);
                    reject();
                });
            });

            promise.then(() => {
                this.ifReady = true;
            });
        },

        methods: {
            selectProject() {
                this.project_id = this.project.id;
            },
            createNewPartner() {
                this.ifReady = false;

                axios.post('/api/partners', this.$data).then(res => {
                    this.$router.push({ name: 'partners.index' });
                }).catch(err => {
                    this.ifReady = true;
                    console.log(err);
                });
            }
        }
    }
</script>
