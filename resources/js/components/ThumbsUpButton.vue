<template>
    <button type="button" class="btn btn-primary" @click="thumbsUp" :disabled="loading">
        <i class="fa fa-circle-o-notch fa-spin" v-if="loading"></i>
        点赞用户 <span class="badge badge-light">{{ amount }}</span>
        <span class="sr-only">unread messages</span>
    </button>
</template>

<script>
    export default {
        props: ['id', 'amount'],
        data () {
            return {
                loading: false,
            }
        },
        methods: {
            thumbsUp() {
                this.loading = true;
                axios.post('/articles/' + this.id + '/like',).then(response => {
                    this.loading = false;
                    noty('info', response.data.message);
                });
            }
        }
    }
</script>

<style scoped>

</style>