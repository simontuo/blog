<ul class="list-group tab-list">
    <li class="list-group-item disabled">
        <i class="icon ion-ios-apps"></i> Tags
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