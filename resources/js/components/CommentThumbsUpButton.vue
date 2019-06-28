<template>
    <button type="button" class="btn btn-light text-secondary" @click="thumbsUp">点赞</button>
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
            thumbsUp() {
                this.loading = true;
                axios.post('/comments/' + this.id + '/like',).then(response => {
                    this.loading = false;
                    noty('info', response.data.message);
                });
            }
        }
    }
</script>

<style scoped>

</style>
