<li>
    <article>
        <time datetime="2022.15.03">{{$article->publish_at}}</time>
        <h3><a href="/articles/{{$article->slug}}">{{$article->name}}</a></h3>
        {{ Str::limit($article->echoContent(), 20, ' (...)') }}
        <ul class="articles-page__tags" role="list">
            @foreach($article->tags as $tag)
                <li><a href="?tag={{$tag->slug}}">{{$tag->name}}</a></li>
            @endforeach
        </ul>
    </article>
</li>
