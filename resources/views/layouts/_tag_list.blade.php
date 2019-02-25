<ul class="list-group tab-list mb-3">
    <li class="list-group-item disabled">
        <i class="icon ion-ios-apps"></i> 标签
    </li>
    @foreach($tags as $tag)
        <li class="list-group-item">
            <a href="#">
                <span class="tag-icon" style="background-color: {{ $tag->color }};"></span>
                {{ $tag->name }}
                <span class="badge badge-light float-right">{{ $tag->articles_count }}</span>
            </a>
        </li>
    @endforeach
</ul>