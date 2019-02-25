<ul class="list-group tab-list mb-3">
    <li class="list-group-item disabled">
        <i class="icon ion-ios-apps"></i> 酷站
    </li>
    @foreach($resources as $resource)
        <li class="list-group-item">
            <a href="{{ $resource->url }}" target="_blank">
                {{--<span class="tag-icon" style="background-color: {{ $tag->color }};"></span>--}}
                <img src="{{ $resource->icon }}" width="18" height="18" alt="{{ $resource->name }}" class="mr-1">
                {{ $resource->name }}
                {{--<span class="badge badge-light float-right">{{ $tag->articles_count }}</span>--}}
            </a>
        </li>
    @endforeach
</ul>