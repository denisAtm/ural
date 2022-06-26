@extends('main')
@section('head')
    @include('parts.head',['title'=>'О компании'])
@endsection
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
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
        <section class="about-company">
            <div class="container">
                <h1 class="title title-h2 about-company__title">О компании</h1>
            </div>
            <div class="about-company-row about-company-row--1">
                <div class="container">
                    <div class="about-company-row__info">
                        <p>Предприятие развивает и приумножает лучшие традиции производства советских времен, используя технологии современности.</p>
                        <p>Ведущие позиции поддерживаются накапливаемым знанием, постоянным обучением и развитием персонала, внедрением наиболее эффективных технологий. </p>
                    </div>
                </div>
                <img class="about-company-row__img" loading="lazy" decoding="async" src="resources/images/about-company-img-1.jpg" alt="image" width="360" height="336" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1000">
            </div>
            <div class="about-company-row about-company-row--reversed about-company-row--adaptive">
                <div class="container">
                    <div class="about-company-row__info">
                        <p>Вся продукция, выпускаемая предприятием, в обязательном порядке проходит технический контроль на  соответствие утвержденным техническим условиям, действующим стандартам и нормативам. </p>
                        <p>Гарантийные обязательства на продукцию «Уралредуктор» устанавливаются в полном соответствии с действующим законодательством РФ и техническими условиями.</p>
                    </div>
                </div>
                <img class="about-company-row__img" loading="lazy" decoding="async" src="resources/images/about-company-img-2.jpg" alt="image" width="360" height="336" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1000">
            </div>
            <div class="about-company-row about-company-row--reversed about-company-row--desktop about-company-row--2">
                <div class="container">
                    <div class="about-company-row__info">
                        <p>Вся продукция, выпускаемая предприятием, в обязательном порядке проходит технический контроль на  соответствие утвержденным техническим условиям, действующим стандартам и нормативам. </p>
                        <p>Гарантийные обязательства на продукцию «Уралредуктор» устанавливаются в полном соответствии с действующим законодательством РФ и техническими условиями.</p>
                    </div>
                    <img class="about-company-row__img" loading="lazy" decoding="async" src="resources/images/about-company-img-2.jpg" alt="image" width="360" height="336" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                         data-aos-duration="1000">
                </div>
            </div>
            <article class="about-company-slider-wrapper">
                <div class="container">
                    <h3>Репутация «Уралредуктора» перед клиентом – это качество его продукции.</h3>
                </div>
                <div class="container about-company-slider-wrapper__container">
                    <ul role="list" class="about-company-slider">
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-2--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-2--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-2--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-3--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-3--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-3--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-4--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-4--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-4--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-5--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-5--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-5--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-6--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-6--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-6--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-7--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-7--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-7--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-8--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-8--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-8--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-9--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-9--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-9--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-10--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-10--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-10--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-12--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-12--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-12--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-13--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-13--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-13--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                        <li class="carousel-cell">
                            <picture>
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-14--desktop.jpg" media="(min-width:1024px)">
                                <source type="image/jpg" srcset="resources/images/about-company-slider-img-14--tablet.jpg" media="(min-width:768px)">
                                <img src="resources/images/about-company-slider-img-14--mobile.jpg" loading="lazy" decoding="async" alt="image" width="240" height="240">
                            </picture>
                        </li>
                    </ul>
                </div>
                </div>
            </article>
            <article class="about-company-article about-company-mission">
                <div class="container about-company-mission__container">
                    <div class="about-company-mission__row">
                        <h2>Миссия компании</h2>
                        <p>Качественное и оптимальное решение для различных потребителей в отраслях промышленного оборудования. </p>
                    </div>
                    <img loading="lazy" decoding="async" src="resources/images/about-company-mission-img.jpg" alt="image" width="328" height="328" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                         data-aos-duration="1000">
                </div>
            </article>
            <article class="about-company-article about-company-projection">
                <div class="container about-company-projection__container">
                    <div class="about-company-projection__row">
                        <h2>Проектирование</h2>
                        <p>Используя современные технологии,методы проектирования и 25 летний опыт наших специалистов, наша компания расширила свои границы в лице клиентов как лидеров по качественному проектированию редукторов, что,несомненно, делает нас лучшими на рынке промышленных редукторов. </p>
                        <img loading="lazy" decoding="async" src="resources/images/about-company-projection-img.jpg" alt="image" width="328" height="208" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                             data-aos-duration="1000">
                    </div>
                </div>
            </article>
            <article class="about-company-article about-company-production">
                <div class="container about-company-production__container">
                    <div class="about-company-production__row">
                        <h2>Прозводство</h2>
                        <p>Компания имеет свое предприятие по изготовлению различных типов редукторов, совершенствует и продвигает идеалогию современного метода производства редукторов, что делает нашу продукцию эталоном качества, а для клиентов мы остаемся надежными поставщиками с долгосрочными отношениями.</p>
                    </div>
                    <ul class="about-company-production__gallery" role="list">
                        <li>
                            <img loading="lazy" decoding="async" src="resources/images/about-company-production-img-1.jpg" alt="image" width="241" height="240" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                 data-aos-duration="1000">
                        </li>
                        <li>
                            <img loading="lazy" decoding="async" src="resources/images/about-company-production-img-2.jpg" alt="image" width="241" height="240" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                 data-aos-duration="1000">
                        </li>
                        <li>
                            <img loading="lazy" decoding="async" src="resources/images/about-company-production-img-3.jpg" alt="image" width="241" height="240" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                 data-aos-duration="1000">
                        </li>
                        <li>
                            <img loading="lazy" decoding="async" src="resources/images/about-company-production-img-4.jpg" alt="image" width="241" height="240" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                 data-aos-duration="1000">
                        </li>
                        <li>
                            <img loading="lazy" decoding="async" src="resources/images/about-company-production-img-5.jpg" alt="image" width="241" height="240" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                 data-aos-duration="1000">
                        </li>
                        <li>
                            <img loading="lazy" decoding="async" src="resources/images/about-company-production-img-6.jpg" alt="image" width="241" height="240" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                 data-aos-duration="1000">
                        </li>
                    </ul>
                </div>
            </article>
            <article class="about-company-article about-company-repair">
                <div class="container about-company-repair__container">
                    <div class="about-company-repair__row">
                        <h2>Ремонт</h2>
                        <p>Наша компания предоставляет клиентам качественный ремонт всех типов редукторов общемашиностроительного назначения любых Европейских и Российских заводов-изготовителей, в том числе и по предоставленным Т3 или чертежам заказчика с возможностью выезда наших специалистов для проведения замеров и других прилегаемых задач.</p>
                    </div>
                </div>
                <img loading="lazy" decoding="async" src="resources/images/about-company-repair-img.jpg" alt="image" width="284" height="356" data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                     data-aos-duration="1000">
            </article>
            <article class="about-company-article about-company-upgrade">
                <div class="container about-company-upgrade__container">
                    <div class="about-company-upgrade__row">
                        <h2>Модернизация</h2>
                        <p>Современные методы проектирования позволяют производить не только ремонт, но и модернизацию устаревших редукторов, мотор-редукторов на более современные и качественные варианты продукции.</p>
                        <ul class="about-company-upgrade__gallery" role="list">
                            <li><img data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                     data-aos-duration="1000" loading="lazy" decoding="async" src="resources/images/about-company-upgrade-img-1.jpg" alt="image" width="328" height="256"></li>
                            <li><img data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                     data-aos-duration="1000" loading="lazy" decoding="async" src="resources/images/about-company-upgrade-img-2.jpg" alt="image" width="328" height="256"></li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <script>
        if (window.innerWidth >= 768) {
            const aboutCompanySlider = new Flickity( '.about-company-slider', {
                wrapAround: true,
                pageDots: false
            });
        }
    </script>
@endsection
