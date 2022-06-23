@extends('main')
@section('head')
    @include('parts.head',['title'=>'Требуется авторизация'])
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
        <section class="errors-page errors-401-page">
            <div class="container errors-page__container">
                <h1>401</h1>
                <p>Требуется авторизация</p>
            </div>
        </section>
    </main>
@endsection

