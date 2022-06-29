<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />

    @if(empty($meta))
        <title>Уралредуктор</title>
        <meta name="description" content="description">
        <meta property="og:title" content="title">
        <meta property="og:description" content="description">
        <meta name="keywords" content="ключевые слова">
    @else
        <title>{{$meta->meta_title}}</title>
        <meta property="og:image:alt" content="{{$meta->meta_image_description}}">
        <meta name="description" content="{{$meta->meta_description}}">
        <meta property="og:title" content="{{$meta->meta_title}}">
        <meta property="og:description" content="{{$meta->meta_description}}">
        <meta name="keywords" content="{{$meta->meta_keywords}}">
    @endif
<meta property="og:image" content="https://www.mywebsite.com/image.jpg">

<meta property="og:locale" content="ru">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta property="og:url" content="https://www.mywebsite.com/page">
<link rel="canonical" href="https://www.mywebsite.com/page">
<link rel="icon" href="/favicon.ico">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="manifest" href="/my.webmanifest">
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
