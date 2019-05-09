<template>
    <button type="button" class="btn btn-light" @click="collect">
        <i class="fa fa-circle-o-notch fa-spin" v-if="loading"></i>
        <i class="fa fa-star text-danger" v-else></i>
        <span class="text-dark"> 收藏</span>
    </button>
</template>

<script>
    export default {
        props: ['id'],
        data () {
            return {
                loading: false,
            }
        },
        methods: {
            collect() {
                this.loading = true;
                axios.post('/articles/' + this.id + '/collect',).then(response => {
                    this.loading = false;
                    noty('info', response.data.message);
                });
            }
        }
    }
</script>

<style scoped>

</style>