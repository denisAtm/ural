@extends('main')
@section('head')
    @include('parts.head',['title'=>'Сервис недоступен'])
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
        <section class="errors-page errors-503-page">
            <div class="container errors-page__container">
                <h1>503</h1>
                <p>Сервис недоступен</p>
            </div>
        </section>
    </main>
@endsection

