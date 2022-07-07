@extends('main')
@section('head')
    @include('parts.head',['meta'=>$meta])
@endsection
@section('content')
    <main>
        <nav class="breadcrumbs">
            <div class="container">
                <ul role="list">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/news">Новости</a></li>
                    <li><a href="#">{{$news->name}}</a></li>
                </ul>
            </div>
        </nav>
        <section class="news-card">
            <div class="container">
                <h1 class="title title-h2 news-card__title">
                    <a class="previous-page-link" href="#">
                        <svg data-aos="fade-up" data-aos-easing="linear" data-aos-delay="250" width="18" height="32">
                            <use xlink:href="resources/svgSprites/svgSprite.svg#product-title-arrow"></use>
                        </svg></a>{{$news->name}}</h1>
                <h1 class="title title-h3 news-card__title">
                    <a class="previous-page-link" href="#">
                        <svg width="18" height="32">
                            <use xlink:href="resources/svgSprites/svgSprite.svg#product-title-arrow"></use>
                        </svg></a>{{$news->name}}}</h1>
                <div class="news-card__grid">
                    <time datetime="2022.15.03">{{$news->echoCreatedAt()}}</time>
                    <div class="news-card__main">
                        <img data-aos="fade-right" data-aos-delay="300" data-aos-easing="ease-in-sine" loading="lazy" decoding="async" src="{{asset('storage/images/news/'.$news->image)}}" alt="image" width="328" height="200">
                        {{$news->DescAttribute()}}
                    </div>
                </div>
                <div class="news-card__prev-next">
                    @if($prev)
                        <ul class="news-card__prev" role="list">
                            <li><a href="/news/{{$prev->slug}}"><strong>Предыдущая<span>новость</span></strong></a></li>
                            <li><a href="/news/{{$prev->slug}}"><time datetime="{{$prev->echoCreatedAt()}}">{{$prev->echoCreatedAt()}}</time></a></li>
                            <li><a href="/news/{{$prev->slug}}"><p>{{$prev->title}}</p></a></li>
                        </ul>
                    @endif
                    @if($next)
                        <ul class="news-card__next" role="list">
                            <li><a href="/news/{{$next->slug}}"><strong>Следующая<span>новость</span></strong></a></li>
                            <li><a href="/news/{{$next->slug}}"><time datetime="{{$next->echoCreatedAt()}}">{{$next->echoCreatedAt()}}</time></a></li>
                            <li><a href="/news/{{$next->slug}}"><p>{{$next->title}}</p></a></li>
                        </ul>
                    @endif
                </div>
        </section>
    </main>
@endsection
