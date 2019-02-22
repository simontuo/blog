<template>
    <button type="button" class="btn btn-primary" @click="thumbsUp">
        点赞用户 <span class="badge badge-light">{{ amount }}</span>
        <span class="sr-only">unread messages</span>
    </button>
</template>

<script>
    export default {
        props: ['id', 'amount'],
        data () {
            return {

            }
        },
        methods: {
            thumbsUp() {
                axios.post('/articles/' + this.id + '/like',).then(response => {
                    noty('info', response.data.message);
                });
            }
        }
    }
</script>

<style scoped>

</style>