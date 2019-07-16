<template>
    <div>
        <navbar></navbar>
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-md-2" style="padding-right: 0px;">
                    <sidebar></sidebar>
                </div>
                <div class="col-md-10">
                    <div class="mt-3">
                        <transition name="fade" mode="out-in">
                            <router-view></router-view>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {}
        }
    }
</script>
