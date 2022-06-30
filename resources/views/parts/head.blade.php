<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
{{--{{dd($meta[0])}}--}}

    @if(empty($meta[0]->meta_title))
        <title>Уралредуктор</title>
        <meta name="description" content="description">
        <meta property="og:title" content="title">
        <meta property="og:description" content="description">
        <meta name="keywords" content="ключевые слова">
    @else
        @if($meta[0]->meta_url=='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'')
            <title>{{$meta[0]->meta_title}}</title>
            <meta property="og:image:alt" content="{{$meta[0]->meta_image_description}}">
            <meta name="description" content="{{$meta[0]->meta_description}}">
            <meta property="og:title" content="{{$meta[0]->meta_title}}">
            <meta property="og:description" content="{{$meta[0]->meta_description}}">
            <meta name="keywords" content="{{$meta[0]->meta_keywords}}">
        @elseif(Str::contains($meta[0]->meta_url,'/news/'))
            <title>Новость Уралредуктор</title>
            <meta name="description" content="description">
            <meta property="og:title" content="title">
            <meta property="og:description" content="description">
            <meta name="keywords" content="ключевые слова">
        @elseif(Str::contains($meta[0]->meta_url,'/catalog/'))
            <title>Каталог Уралредуктор</title>
            <meta name="description" content="description">
            <meta property="og:title" content="title">
            <meta property="og:description" content="description">
            <meta name="keywords" content="ключевые слова">
        @elseif(Str::contains($meta[0]->meta_url,'/articles/'))
            <title>Статья Уралредуктор</title>
            <meta name="description" content="description">
            <meta property="og:title" content="title">
            <meta property="og:description" content="description">
            <meta name="keywords" content="ключевые слова">
        @else
            <title>{{$meta[0]->meta_title}}</title>
            <meta property="og:image:alt" content="{{$meta[0]->meta_image_description}}">
            <meta name="description" content="{{$meta[0]->meta_description}}">
            <meta property="og:title" content="{{$meta[0]->meta_title}}">
            <meta property="og:description" content="{{$meta[0]->meta_description}}">
            <meta name="keywords" content="{{$meta[0]->meta_keywords}}">
        @endif
    @endif
<meta property="og:image" content="{{asset('resources/svgSprites/logo.svg')}}">

<meta property="og:locale" content="ru">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta property="og:url" content="{{asset('resources/svgSprites/logo.svg')}}">
<link rel="canonical" href="{{asset('resources/svgSprites/logo.svg')}}">
<link rel="icon" href="{{asset('resources/svgSprites/logo.svg')}}">
<link rel="icon" href="{{asset('resources/svgSprites/logo.svg')}}">
<link rel="apple-touch-icon" href="{{asset('resources/svgSprites/logo.svg')}}">
<link rel="manifest" href="{{asset('resources/svgSprites/logo.svg')}}">
<meta name="theme-color" content="#fff" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
/>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"
/>
 <!--Plugin CSS file with desired skin-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
    <link rel="stylesheet" href="{{asset('styles/main.css')}}" />
</head>
