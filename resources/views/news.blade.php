@extends('main')
@section('head')
    @include('parts.head',['meta'=>$meta[0]])
@endsection
@section('content')
    <main>
        <nav class="breadcrumbs">
            <div class="container">
                <ul role="list">
                    <li><a href="#">Каталог</a></li>
                    <li><a href="#">Крошка</a></li>
                    <li><a href="#">Крошка</a></li>
                </ul>
            </div>
        </nav>
        <section class="news-page">
            <div class="container">
                <h1 class="title title-h2 news-page__title">Новости</h1>
                <ul class="news-page__grid" role="list">
                    @php
                        $it = 0;

                    @endphp
                    @foreach($news as $one)
                        @php
                        $it++;
                        if($it==5){
                            $it=1;
                        }
                        @endphp
                        <li data-aos="fade-in" data-aos-delay="{{$it*200}}"><a href="/news/{{$one->slug}}">
                                <figure>
                                    <picture>
                                        <img src="storage/images/news/{{$one->image}}" loading="lazy" decoding="async" alt="image" width="241" height="180">
                                    </picture>
                                    <figcaption>
                                        <time datetime="2022-03-15">{{$one->created_at}}</time>
                                        <h3 class="title title-h3">{{$one->title}}</h3>
                                    </figcaption>
                                </figure>
                            </a></li>
                    @endforeach
                </ul>
            </div>
            <div class=" container" style="    display: flex;
    justify-content: center;">
                {!! $news->links('vendor.pagination.semantic-ui') !!}
            </div>
                <img class="news-spinner" loading="lazy" decoding="async" src="resources/images/news-spinner.png" alt="image" width="62" height="62">
        </section>
    </main>
@endsection
