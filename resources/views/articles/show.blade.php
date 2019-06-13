@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                {{--文章内容 开始--}}
                <div class="article-show">
                    <div class="card">
                        <div class="card-body">
                            {{--文章标题 开始--}}
                            <div class="row">
                                <div class="col-sm-9">
                                    <p class="card-title">{{ $article->title }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card-title-btn-group btn-group float-right " role="group" aria-label="Basic example">
                                        <collection-button id="{{ $article->id }}"></collection-button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-title-sub">
                                <span>创建于 {{ $article->created_at }}</span> -
                                <span>阅读数 {{ $article->read_count }}</span> -
                                <span>点赞数 {{ $article->likes->count() }}</span> -
                                <span>评论数 {{ $article->comments->count() }}</span>
                            </div>
                            {{--文章标题 结束--}}
                            {{--文章内容 开始--}}
                            <div class="article-show-contnet markdown-body">
                                {!! $article->content !!}
                            </div>
                            {{--文章内容 结束--}}
                            {{--文章脚部 开始--}}
                            <div class="article-show-footer">
                                <div class="article-show-footer-icon">
                                    @foreach($article->tags as $tag)
                                        <span class="badge badge-secondary" style="background-color: {{ $tag->color }};">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                @if($article->type == 'carry')
                                    <div>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>原文作者：{{ $article->original_author }}</strong> 该文章为搬运文章，若涉及侵权马上删除，原文链接
                                            <a href="{{ $article->original_link }}">请点击</a>.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            {{--文章脚部 结束--}}
                        </div>
                    </div>
                </div>
                {{--文章内容 结束--}}
                {{--点赞用户头像 开始--}}
                <div class="thumbs-up-avatar-list">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="thumbs-up-button">
                                        <thumbs-up-button class="mt-2 mr-2" id="{{ $article->id }}" amount="{{ $article->likes->count() }}"></thumbs-up-button>
                                    </div>
                                </div>
                                <div class="col-xs-10">
                                    @if ($article->likes->count() > 0)
                                        @foreach($article->likes as $user)
                                        <img class="mr-1 rounded-circle"
                                             src="{{ $user->avatar }}"
                                             alt="{{ $user->name }}"
                                             width="50"
                                             height="50">
                                        @endforeach
                                    @else
                                        <div class="thumbs-up-avatar-alert" >
                                            <p>该文章<strong>暂无</strong>小伙伴点赞</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--点赞用户头像 结束--}}
                {{--评论列表开始 --}}
                <comment-list comments="{{ $article->comments->toJson() }}" id="{{ $article->id }}"></comment-list>
                {{--评论列表 结束--}}
                {{--评论表单 开始--}}
                <comment-form id="{{ $article->id }}"></comment-form>
                {{--<markdown-form id="{{ $article->id }}"></markdown-form>--}}
                {{--评论表单 结束--}}
            </div>
            <div class="col-sm-3">
                {{--tags 开始--}}
                @include('layouts._tag_list')
                {{--tags 结束--}}
                {{--resources 开始--}}
                @include('layouts._resource_list')
                {{--resources 结束--}}
                {{--document 开始--}}
                @include('layouts._document_list')
                {{--document 结束--}}
            </div>
        </div>
    </div>
@endsection
