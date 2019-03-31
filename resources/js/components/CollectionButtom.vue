<template>
    <button type="button" class="btn btn-light" @click="collect">
        <i class="fa fa-star text-danger"></i>
        <span class="text-dark"> 收藏</span>
    </button>
</template>

<script>
    export default {
        props: ['id'],
        data () {
            return {

            }
        },
        methods: {
            collect() {
                axios.post('/articles/' + this.id + '/collect',).then(response => {
                    noty('info', response.data.message);
                });
            }
        }
    }
</script>

<style scoped>

</style>