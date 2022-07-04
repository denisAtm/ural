@extends('main')
@section('head')
    @include('parts.head',['title'=>'Эта страница не найдена'])
@endsection
@section('content')
    <main>
        <nav class="breadcrumbs">
            <div class="container">
                <ul role="list">
                    <li><a href="/">Главная</a></li>
                    <li><a href="#">404</a></li>
                </ul>
            </div>
        </nav>
        <section class="errors-page errors-404-page">
            <div class="container errors-page__container">
                <h1>404</h1>
                <p>Эта страница не найдена</p>
                <a href="http://" class="secondary-btn error404-btn">Вернуться на главную</a>
            </div>
        </section>
    </main>
@endsection

