<ul class="list-group tab-list mb-3">
    <li class="list-group-item disabled">
        文档
    </li>
    @foreach($documents as $document)
        <li class="list-group-item">
            <a href="{{ $document->url }}" target="_blank">
                {{--<span class="tag-icon" style="background-color: {{ $tag->color }};"></span>--}}
                <img src="{{ $document->icon }}" width="18" height="18" alt="{{ $document->name }}" class="mr-1">
                {{ $document->name }}
                {{--<span class="badge badge-light float-right">{{ $tag->articles_count }}</span>--}}
            </a>
        </li>
    @endforeach
</ul>