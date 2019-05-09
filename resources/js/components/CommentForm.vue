<template>
    <div class="comment-form">
        <div class="card">
            <div class="card-body">
                <!--<div class="comment-form-info"></div>-->
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>评论请注意：</strong> 理性评论，互相学习，共同研究.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--markdown textarea 开始-->
                <markdown-textarea id="contentEditor" ref="contentEditor" v-model="content" :zIndex="20"></markdown-textarea>
                <!--markdown textarea 结束-->
                <!--form-footer 开始-->
                <div class="comment-form-footer mt-3">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked>
                            <i class="fa fa-circle-o-notch fa-spin" v-if="loading"></i>
                            <i class="fa fa-comment" v-else></i>
                        </label>
                        <label class="btn btn-secondary padding-btn" @click="submit">
                            <input type="radio" name="options" id="option2" autocomplete="off"> 评论
                        </label>
                    </div>
                </div>
                <!--form-footer 结束-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                content: '',
                loading: false,
            }
        },
        methods: {
            submit() {
                this.loading = true;
                axios.post('/articles/' + this.id + '/comment', {content: this.content}).then(response => {
                    this.loading = false;
                    noty('info', response.data.message);
                    setTimeout("window.location.reload()", 1000);
                });
            }
        }
    }
</script>

<style scoped>

</style>