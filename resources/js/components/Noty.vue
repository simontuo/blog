<template>
    
</template>

<script>
    export default {
        props: ['type', 'message'],
        mounted() {
            new Noty({
                timeout: 2000,
                text: this.message,
                type: this.type
            }).show();
        }
    }
</script>

<style scoped>

</style>