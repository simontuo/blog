@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                {{--jumbotron 开始--}}
                <div class="jumbotron jumbotron-fluid index-jumbotron">
                    <div class="container">
                        <h1 class="display-4">Weclome to Maguas</h1>
                        <p class="lead ">更新时间：2018.11.27 --向往魔法师的麻瓜.</p>
                    </div>
                </div>
                {{--jumbotron 结束--}}
                {{--列表开始--}}
                <div class="list-group index-list">
                    @foreach($articles as $article)
                        <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="list-group-item list-group-item-action">
                            <div class="float-left index-list-tag" style="background-color: {{ $article->tags->first()->color ?? '' }};"></div>
                            <div>
                                <h5>{{ $article->title }}
                                    @foreach($article->tags as $tag)
                                        <span class="badge badge-secondary float-right" style="background-color: {{ $tag->color ?? '' }};">{{ $tag->name }}</span>
                                    @endforeach
                                </h5>
                                <div class="index-list-footer">
                                    <span>
                                        <i class="icon ion-ios-at"></i> {{ $article->user->name }}
                                    </span>
                                    <span>
                                        <i class="icon ion-ios-eye"></i> 11
                                    </span>
                                    <span>
                                        <i class="icon ion-ios-thumbs-up"></i> 12
                                    </span>
                                    @if($article->type == 'carry')
                                        <span>
                                            <i class="icon ion-ios-link"></i> 原文链接
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                {{--列表结束--}}
                {{--加载按钮 开始--}}
                <div class="container index-loading-button">
                    @if($articles->count() >= 30)
                        <button type="button" class="btn btn-primary">加载更多</button>
                    @else
                        <p class="mt-2">没有更多了~</p>
                    @endif
                </div>
                {{--加载按钮 结束--}}
            </div>

            <div class="col-sm-3">
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