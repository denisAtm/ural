@extends('main')
@section('head')
@include('parts.head',['meta'=>$meta])
@endsection
@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
    @section('content')
        <script>
            $(document).ready(function(){
                $('.filter-dropdown__list li button').on('click',function(){
                    var radio = $(this).closest('label').find('input[type="radio"]');
                    console.log(radio.val())
                    if(radio.is(':checked')){
                        radio.prop('checked',false)
                    }else{
                        radio.prop('checked',true)
                    }
                })
            })
        </script>
    <main>
        <nav class="breadcrumbs">
            <div class="container">
                <ul role="list">
                    <li><a href="/">Главная</a></li>
                    <li><a href="#">Статьи</a></li>
                </ul>
            </div>
        </nav>
        <section class="articles-page">
            <div class="container">
                <div class="articles-page__title-row">
                    <h1 class="title title-h2 articles-page__title">Статьи</h1>
                    <button class="filter-btn articles-page__filter-btn" type="button" @click="filter = true"><svg width="68" height="48">
                            <use xlink:href="resources/svgSprites/svgSprite.svg#filter-btn-icon"></use>
                        </svg>Фильтры</button>
                    <nav class="filter filter--mobile" :class="{'active': filter === true}" x-data="{filterDropdown: ''}">
                        <button class="filter__close-btn filter__close-btn--mobile" type="button" @click="filter = false">
                            <!-- <svg width="20" height="28" class="filter__close-btn-icon filter__close-btn-icon--mobile">
                            <use xlink:href="resources/svgSprites/svgSprite.svg#catalog-filter-arrow"></use>
                            </svg> -->
                            <svg width="36" height="36" class="filter__close-btn-icon filter__close-btn-icon--tablet">
                                <use xlink:href="resources/svgSprites/svgSprite.svg#icon-exit"></use>
                            </svg>
                        </button>
                        <button class="filter__close-btn filter__close-btn--tablet" type="button" @click="filter = false">
                            <svg width="36" height="36" class="filter__close-btn-icon filter__close-btn-icon--tablet">
                                <use xlink:href="resources/svgSprites/svgSprite.svg#icon-exit"></use>
                            </svg>
                        </button>
                        <div class="container">
                            @include('templates.filter',['categories'=>$categories,'route'=>'/articles'])
                        </div>
                        <button type="submit" class="filter__submit-btn">Применить</button>
                    </nav>
                </div>
                <div class="articles-page__grid">
                    <aside class="articles-page__aside">
                        <nav class="filter filter--desktop" x-data="{filterDropdown: ''}">
                            @include('templates.filter',['categories'=>$categories,'route'=>'/articles'])
                        </nav>
                    </aside>
                    <div class="articles-page__main">
                        <ul role="list" class="articles-page__list">
                            @each('templates.cards.article',$articles,'article')
                        </ul>
                        <ul class="pagination articles-page__pagination" role="list">
                            {{$articles->withQueryString()->links('vendor.pagination.semantic-ui')}}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
