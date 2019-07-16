<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="text-primary" :to="{ name: 'users.index' }">Users</router-link>
                /
                <a class="text-secondary">Create New User</a>
            </div>
            <div class="card-body">
                <div v-if="ifReady">
                    <form v-on:submit.prevent="createNewUser()">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" v-model="name" autocomplete="off" minlength="2" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" v-model="email" autocomplete="off" minlength="2" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" v-model="password" autocomplete="off" minlength="2" maxlength="255" required>
                            <p v-if="$v.password_confirmation.$error">Password Does Not Match Password Confirmation</p>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password" class="form-control" v-model="password_confirmation" autocomplete="off" minlength="2" maxlength="255" required @blur="$v.password_confirmation.$touch()">
                            <p v-if="$v.password_confirmation.$error">Password Confirmation Does Not Match Password</p>
                        </div>

                        <br>
                        
                        <router-link class="btn btn-outline-secondary btn-sm" :to="{ name: 'users.index' }"><i class="fas fa-chevron-left"></i>&nbsp; Back</router-link>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp; Create New User</button>
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
                email: '',
                password: '',
                password_confirmation: ''
            };
        },

        validations: {
            password: {
                required,
                minLength: minLength(8)
            },
            password_confirmation: {
                sameAsPassword: sameAs('password')
            }
        },

        methods: {
            createNewUser() {
                this.ifReady = false;

                axios.post('/api/users', this.$data).then(res => {
                    this.$router.push({ name: 'users.index' });
                }).catch(err => {
                    this.ifReady = true;
                    console.log(err);
                });
            }
        }
    }
</script>
