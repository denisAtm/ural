<li data-aos="fade-in" data-aos-delay="200{{$loop->iteration}}"><a href="/news/{{$news->slug}}">
        <figure>
            <picture>
                <img src="storage/images/news/{{$news->image}}" loading="lazy" decoding="async" alt="image" width="241" height="180">
            </picture>
            <figcaption>
                <time datetime="2022-03-15">{{$news->created_at}}</time>
                <h3 class="title title-h3">{{$news->title}}</h3>
            </figcaption>
        </figure>
    </a></li>
