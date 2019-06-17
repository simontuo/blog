<template>
    <div class="comment-list">
        <div class="card">
            <div class="card-body">
                <div v-if="JSON.parse(comments).length > 0">
                    <div>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                排序
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#" @click="commentSort('created_at')">
                                    <i class="icon ion-ios-timer"></i> 时间
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="media" v-for="comment in this.sortComments">
                        <img class="mr-3 rounded-circle"
                             :src="comment.user.avatar"
                             alt="Generic placeholder image"
                             width="50"
                             height="50">
                        <div class="media-body comment-show-contnet">
                            <h5 class="mt-0">{{ comment.user.name }}</h5>
                            <div class="markdown-body" v-html="comment.content"></div>
                            <div class="media-footer">
                                <div class="row">
                                    <div class="media-footer-sub col-sm-8">
                                        <span>评论于 {{ comment.created_at }}</span> -
                                        <span>点赞数 {{ comment.likes_count }}</span>
                                    </div>
                                    <div class="col-sm-4 media-footer-btn-group">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <comment-thumbs-up-button :id="comment.id"></comment-thumbs-up-button>
                                            <button type="button" class="btn btn-light text-secondary">回复</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thumbs-up-avatar-alert text-secondary" v-else>
                    <span>该文章<strong>暂无</strong>小伙伴评论</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['comments', 'id'],
        data() {
            return {
                sort: false,
                loading: false,
                sortComments: []
            }
        },
        mounted() {
            if (!this.sort) {
                this.sortComments = JSON.parse(this.comments);
            }
        },
        methods: {
            commentSort(query) {
                this.sort = true;
                this.loading = true;
                axios.get('/articles/' + this.id + '/comment/sort', {params: {sort_query: query}}).then(response => {
                    this.sortComments = response.data.comments;
                    this.loading = false;
                })
            }
        }
    }
</script>

<style scoped>

</style>
