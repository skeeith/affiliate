<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="text-primary" :to="{ name: 'partners.index' }">Partners</router-link>
                /
                <span class="text-secondary">View Partner</span>
            </div>
            <div class="card-body">
                <div v-if="ifReady">
                    <fieldset disabled>
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" class="form-control" v-model="partner.user.name">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="partner.name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" v-model="partner.description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>CSV URL</label>
                            <input type="text" class="form-control" v-model="partner.csv_url">
                        </div>
                        <div class="form-group">
                            <label>CSV Delimiter</label>
                            <input type="text" class="form-control" v-model="partner.csv_delimiter">
                        </div>
                    </fieldset>

                    <br>

                    <router-link class="btn btn-outline-secondary btn-sm" :to="{ name: 'partners.index' }"><i class="fas fa-chevron-left"></i>&nbsp; Back</router-link>
                    <router-link class="btn btn-primary btn-sm" :to="{ name: 'partners.edit' , params: { id: partner.id }}"><i class="fas fa-edit"></i>&nbsp; Edit Partner</router-link>
                    <button type="button" class="btn btn-danger btn-sm" @click.prevent.default="openDeletePartnerModal()"><i class="fas fa-trash-alt"></i>&nbsp; Delete Partner</button>
                </div>
                <div v-else>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deletePartnerModal" tabindex="-1" role="dialog" aria-labelledby="deletePartnerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">You're about to delete this Partner?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this Partner?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" @click.prevent.default="deletePartner()">Confirm Delete</button>
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
                partner: ''
            };
        },

        mounted() {
            let promise = new Promise((resolve, reject) => {
                axios.get('/api/partners/' + this.$route.params.id).then(res => {
                    console.log(res.data.partner);
                    this.partner = res.data.partner;
                    resolve();
                });
            });

            promise.then(() => {
                this.ifReady = true;
            });
        },

        methods: {
            openDeletePartnerModal() {
                $('#deletePartnerModal').modal('show');
            },
            deletePartner() {
                $('#deletePartnerModal').modal('hide');
                axios.delete('/api/partners/' + this.$route.params.id).then(res => {
                    this.$router.push({ name: 'partners.index' });
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>
