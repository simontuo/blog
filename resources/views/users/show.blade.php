@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="user-resource">
                    <ul class="nav" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-articles-tab" data-toggle="pill" href="#pills-articles" role="tab" aria-controls="pills-home" aria-selected="true">文章</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" id="pills-comments-tab" data-toggle="pill" href="#pills-comments" role="tab" aria-controls="pills-profile" aria-selected="false">评论</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" id="pills-collections-tab" data-toggle="pill" href="#pills-collections" role="tab" aria-controls="pills-contact" aria-selected="false">收藏</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" id="pills-likes-tab" data-toggle="pill" href="#pills-likes" role="tab" aria-controls="pills-contact" aria-selected="false">点赞</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-articles" role="tabpanel" aria-labelledby="pills-home-tab">
                            <ul class="list-group list-group-flush">
                                @foreach($user->articles as $article)
                                    <li class="list-group-item">
                                        <a class="text-secondary" href="{{ route('articles.show', ['article' => $article->id]) }}">
                                            {{ $article->title }}
                                        </a></li>
                                @endforeach
                            </ul>
                            <div class="container index-loading-button">
                                <button type="button" class="btn btn-primary">加载更多</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-profile-tab">
                            @foreach($user->comments as $comment)
                                <div class="media pl-3 pr-3 pt-2 mb-2">
                                    <div class="media-body comment-show-contnet">
                                        <span class="text-secondary">{{ $comment->commentable->title }}</span>
                                        <div class="markdown-body">
                                            {!! $comment->content !!}
                                        </div>
                                        <div class="media-footer">
                                            <div class="row">
                                                <div class="media-footer-sub col-sm-8">
                                                    <span>评论于 {{ $comment->created_at }}</span> -
                                                    <span>点赞数 90</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <div class="container index-loading-button">
                                    <button type="button" class="btn btn-primary">加载更多</button>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="pills-collections" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <ul class="list-group list-group-flush">
                                @foreach($user->collections as $collection)
                                    <li class="list-group-item">
                                        <a class="text-secondary" href="{{ route('articles.show', ['article' => $collection->id]) }}">
                                            {{ $collection->title }}
                                        </a></li>
                                @endforeach
                            </ul>
                            <div class="container index-loading-button">
                                <button type="button" class="btn btn-primary">加载更多</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-likes" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <ul class="list-group list-group-flush">
                                @foreach($user->likes as $like)
                                    <li class="list-group-item">
                                        <a class="text-secondary" href="{{ route('articles.show', ['article' => $like->id]) }}">
                                            {{ $like->title }}
                                        </a></li>
                                @endforeach
                            </ul>
                            <div class="container index-loading-button">
                                <button type="button" class="btn btn-primary">加载更多</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                {{--头像开始--}}
                <div class="avatar-card mb-3">
                    <img src="{{ user()->avatar }}" class="rounded-circle"  width="100px" height="100px">
                    <div class="mt-2">
                        {{ $user->name }}
                    </div>
                </div>
                {{--头像结束--}}
                {{--tags 开始--}}
                @include('layouts._tag_list')
                {{--tags 结束--}}
                {{--resources 开始--}}
                @include('layouts._resource_list')
                {{--resources 结束--}}
            </div>
        </div>
    </div>
@endsection
