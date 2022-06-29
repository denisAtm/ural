@extends('main')
@section('head')
    @include('parts.head',['title'=>'Статьи'])
@endsection
@section('cdn')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
        <section class="articles-card">
            <div class="container">
                <div class="articles-card__title-row">
                    <h1 class="title title-h2 articles-card__title">
                        <a class="previous-page-link" href="#">
                            <svg width="18" height="32">
                                <use xlink:href="resources/svgSprites/svgSprite.svg#product-title-arrow"></use>
                            </svg></a>
                        <span>Заголовок статьи</span><span>{{$article->name}}</span></h1>
                    <h1 class="title title-h3 articles-card__title">
                        <a class="previous-page-link" href="#">
                            <svg data-aos="fade-up" data-aos-easing="linear" data-aos-delay="250" width="18" height="32">
                                <use xlink:href="resources/svgSprites/svgSprite.svg#product-title-arrow"></use>
                            </svg></a>{{$article->name}}</h1>
                    <time datetime="2022.15.03">{{$article->publishAtAttribute()}}</time>
                </div>
                <div class="articles-card-info">
                    <time datetime="2022.15.03">{{$article->publish_at}}</time>
                </div>
                <article class="articles-card-main-info articles-card-main-info--adaptive">
                    {{$article->echoContent()}}
                </article>
                <article class="articles-card-main-info articles-card-main-info--desktop">
                    {{$article->echoContent()}}
                </article>
                <div class="articles-card__prev-next">
                    @if($prev!=null)
                    <ul class="articles-card__prev" role="list">
                        <li><a href="/articles/{{$prev->slug}}"><strong>Предыдущая<span>статья</span></strong></a></li>
                        <li><a href="/articles/{{$prev->slug}}"><p>{{$prev->name}}</p></a></li>
                    </ul>
                    @endif
                    @if($next!=null)
                    <ul class="articles-card__next" role="list">
                        <li><a href="/articles/{{$next->slug}}"><strong>Следующая<span>статья</span></strong></a></li>
                        <li><a href="/articles/{{$next->slug}}"><p>{{$next->name}}</p></a></li>
                    </ul>
                    @endif
                </div>
            </div>
        </section>
        <script>
            // $(document).ready(function(){
            //     $('img').each(function(){
            //         if($(this).parent().get(0).tagName == 'LI'){
            //             var ul = $(this).closest('ul');
            //             ul.addClass('articles-card-info__descr-img-list');
            //             ul.attr('role','list')
            //             var li = ul.find('li');
            //             li.addClass('aos-init aos-animate')
            //             li.attr('data-aos','fade-up')
            //             li.attr('data-aos-anchor-placement','top-bottom')
            //             li.attr('data-aos-duration','1000')
            //         }
            //     })
            //
            // })
            new SimpleBar(document.querySelector('.articles-card-main-info__formula-lists'));
        </script>
    </main>
@endsection
