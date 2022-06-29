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
        <section class="product-card">
            <div class="container">
                <h1 class="title title-h2 product-card__title">
                    <a class="previous-page-link" href="#">
                        <svg width="18" height="32" data-aos="fade-up" data-aos-easing="linear" data-aos-delay="250">
                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#product-title-arrow')}}"></use>
                        </svg>
                    </a>
                    {{$product->name}}
                </h1>
                <div class="product-card__grid">
                    <div class="product-card__main">
                        <div class="product-card__gallery" data-aos="fade-in" data-aos-delay="200">
                            <div class="product-card__gallery-main swiper">
                                <ul class="swiper-wrapper" role="list">
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/catalog-card-img.png')}}" alt="image" width="328" height="220">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="328" height="220">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="328" height="220">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="328" height="220">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="328" height="220">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="328" height="220">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="328" height="220">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="328" height="220">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="328" height="220">
                                    </li>
                                </ul>
                            </div>
                            <div class="product-card__gallery-thumbs swiper">
                                <ul class="swiper-wrapper" role="list">
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/catalog-card-img.png')}}" alt="image" width="50" height="50">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="50" height="50">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="50" height="50">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="50" height="50">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="50" height="50">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="50" height="50">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="50" height="50">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="50" height="50">
                                    </li>
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-img-2.png')}}" alt="image" width="50" height="50">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="primary-btn order-btn order-btn--adaptive" type="button" @click="orderForm = true">Заказать</button>
                    </div>
                    <aside class="product-card__aside">
                        <details class="product-card__details">
                            <summary>
                                <div class="product-card__details-title">
                                    <h3>Тип передачи</h3>
                                    <h4>{{$product->series->category->name}}</h4>
                                </div>
                                <svg width="16" height="16">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-dropdown')}}"></use>
                                </svg>
                            </summary>
                            <ul role="list">
                                <li><p>Количество передаточных ступеней</p><span>{{$product->numberOfTransferStages->name}}</span></li>
                                <li><p>Передаточное отношение</p><span>{{$product->series->getGearRatio()}}</span></li>
                                <li><p>Расположение осей</p><span>{{$product->locationOfAxes->name}}</span></li>
                                <li><p>Климатическое исполнение</p><span>{{$product->climatic_version}}</span></li>
                                <li><p>Вариант сборки</p><span>@foreach($product->series->buildOptions as $option)
                                            {{$option->name}};
                                        @endforeach,</span></li>
                                @if($product->gost==1)
                                <li><p>ГОСТ</p></li>
                                @endif
                            </ul>
                        </details>
                        <ul role="list" class="product-card__list">
                            <li><p>Тип передачи</p><span>{{$product->series->category->name}}</span></li>
                            <li><p>Количество передаточных ступеней</p><span>{{$product->numberOfTransferStages->name}}</span></li>
                            <li><p>Передаточное отношение</p><span>{{$product->series->getGearRatio()}}</span></li>
                            <li><p>Расположение осей</p><span>{{$product->locationOfAxes->name}}</span></li>
                            <li><p>Климатическое исполнение</p><span>{{$product->climatic_version}}</span></li>
                            <li><p>Вариант сборки</p><span>@foreach($product->series->buildOptions as $option)
                                        {{$option->name}};
                                    @endforeach</span></li>
                            @if($product->gost==1)
                                <li><p>ГОСТ</p></li>
                            @endif
                        </ul>
                        <button class="primary-btn order-btn order-btn--desktop" type="button" @click="orderForm = true">Заказать</button>
                    </aside>
                </div>
                <div class="product-card__info">
                    <ul class="product-card__tabs" role="list">
                        <li @click="toggleProductCardTabs(event,'productCardDescr')" class="active"><h3>Описание</h3></li>
                        <li @click="toggleProductCardTabs(event,'productCardSizes')"><h3>Размеры</h3></li>
                        <li @click="toggleProductCardTabs(event,'productCardQuestionAnswer')"><h3>Вопрос-ответ</h3></li>
                    </ul>
                    <div class="product-card-info product-card__descr" id="productCardDescr" style="max-height: 100%;">
                        <ul role="list">
                            {{$product->DescAttribute()}}
{{--                            <li>--}}
{{--                                <h4>Назначение</h4>--}}
{{--                                <p>Мотор-редукторы планетарные одно-, двух-, трехступенчатые типа 1МПЗ предназначены для снижения частоты вращения и передачи крутящего момента механизмам общемашиностроительного назначения, (исключая механизмы для подъема груза).</p>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <h4>Условия применения редукторов:--}}
{{--                                </h4>--}}
{{--                                <p>--}}
{{--                                    • режим работы – продолжительный, с продолжительностью работы 8-24 ч/сут;--}}
{{--                                    • нагрузка постоянная и переменная (в пределах номинального крутящего момента) одного направления и реверсивная;--}}
{{--                                    • высота над уровнем моря – до 1000 м;--}}
{{--                                    • внешняя среда – неагрессивная, невзрывоопасная с содержанием непроводящей пыли до 10 мг/мЗ--}}
{{--                                    • климатическое исполнение У – умеренный климат, категория размещения 3 – эксплуатация в помещениях, где колебания температуры и влажности воздуха существенно меньше, чем на открытом воздухе, рабочая температура окружающей среды от -45°С до +40°С, или Т – тропический климат, категория размещения 2 – эксплуатация под навесом или в помещении, где колебания температуры и влажности воздуха несущественно отличаются от колебаний на открытом воздухе, рабочая температура окружающей среды от -10°С--}}
{{--                                    до +45°С.--}}
{{--                                </p>--}}
{{--                                <p>--}}
{{--                                    Для комплектации мотор-редукторов применяются асинхронные двигатели серии 4АМ, серии АИР или серии АИ. По согласованию с изготовителем допускается комплектация мотор-редукторов двигателями сельскохозяйственного исполнения 4А...СУ1 и другими специальными двигателями (морского, взрывобезопасного исполнения, постоянного тока, пониженного напряжения).--}}
{{--                                </p>--}}

{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <h4>Обозначения</h4>--}}
{{--                                <p>1МПЗ2 – 40 – 45 – 115 – 111 – УЗ</p>--}}
{{--                                <p>УЗ – климатическое исполнение и категория размещения--}}
{{--                                </p>--}}
{{--                                <p>111 – конструктивное исполнение по способу монтажа</p>--}}
{{--                                <p>115 – допускаемый крутящий момент на выходном валу Н•м</p>--}}
{{--                                <p>45 – частота вращения выходного вала, об/мин</p>--}}
{{--                                <p>40 - радиус расположения сателлитов, мм </p>--}}
{{--                                <p>МПО2М - тип мотор-редуктора</p>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                    <div class="product-card-info product-card__sizes" id="productCardSizes">
                        <ul role="list">
                            <li>
                                <h4>Габаритные и присоединительные размеры мотор-редукторов 1МПЗ
                                    на лапах, мм:</h4>
                                <ul class="product-card__sizes-list">
                                    <li><img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-sizes-img.jpg')}}" alt="image" width="550" height="224"></li>
                                </ul>
                            </li>
                            <li>
                                <h4>Габаритные и присоединительные размеры мотор-редукторов 1МПЗ
                                    на лапах, мм:</h4>
                                <ul class="product-card__sizes-list">
                                    <li> <img loading="lazy" decoding="async" src="{{asset('resources/images/product-card-sizes-img-2.jpg')}}" alt="image" width="550" height="224"></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="product-card-info product-card__question-answer" id="productCardQuestionAnswer">
                        <div class="product-card__question-answer-top">
                            <h3>Нужно больше информации?</h3>
                            <p>Напишите свой вопрос и наши менеджеры свяжутся с Вами в максимально короткое время.</p>
                        </div>
                        <div>
                            <form action="#" class="request-form">
                                <fieldset>
                                    <div class="request-form__input-group">
                                        <label for="name">Ваше имя</label>
                                        <div class="form-controls-wrapper request-form__form-controls-wrapper">
                                            <input type="text" name="name" id="name" placeholder="Иван">
                                            <svg class="icon-error" width="28" height="28">
                                                <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-error')}}"></use>
                                            </svg>
                                            <svg class="icon-correct" width="28" height="28">
                                                <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-correct')}}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="request-form__input-group">
                                        <label for="email">Ваш e-mail</label>
                                        <div class="form-controls-wrapper request-form__form-controls-wrapper">
                                            <input type="email" name="email" id="email" placeholder="ivan@mail.ru">
                                            <svg class="icon-error" width="28" height="28">
                                                <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-error')}}"></use>
                                            </svg>
                                            <svg class="icon-correct" width="28" height="28">
                                                <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-correct')}}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="request-form__input-group">
                                        <label for="textarea">Задайте вопрос</label>
                                        <div class="form-controls-wrapper request-form__form-controls-wrapper">
                                            <textarea name="textarea" id="textarea" placeholder="Введите текст"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="secondary-btn request-form__submit-btn">Задать вопрос</button>
                                </fieldset>
                            </form>
                        </div>
                        <nav class="product-card-answers-list">
                            <h3>Ответы</h3>
                            <ul role="list">
                                <li>
                                    <div class="product-card-answers-list__top">
                                        <p>Евгений</p>
                                        <time datetime="2022-04-25">25.04.2022</time>
                                    </div>
                                    <p class="product-card-answers-list__text">
                                        Здравствуйте, как можно получить конкретный прайс, чтобы сделать выбор, а не общие цены от и до.Прошу выслать если это возможно.Конкретно интерисуют в коридоре от 10 до 30 тысяч.Сколько будет стоить доставка вашим транспортом до Кургана. Надеюсь на быстрый ответ.
                                    </p>
                                    <div class="product-card-answers-list__answer">
                                        <p>Ответ:</p>
                                        <span>Запрос в отдел продаж.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-card-answers-list__top">
                                        <p>Евгений Анатольевич</p>
                                        <time datetime="2022-04-25">25.04.2022</time>
                                    </div>
                                    <p class="product-card-answers-list__text">
                                        Здраствуйте. Планирую заменить два редуктора РМ-350, установленные на ход мостового крана на редуктора Ц2У -200. Такая замена возможна, если нет то почему.
                                    </p>
                                    <div class="product-card-answers-list__answer">
                                        <p>Ответ:</p>
                                        <span>Запрос в отдел продаж.</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="product-card-answers-list__top">
                                        <p>Степан Юрьевич</p>
                                        <time datetime="2022-04-25">25.04.2022</time>
                                    </div>
                                    <p class="product-card-answers-list__text">
                                        Прошу подобрать аналоги мотор-редукторов SEW по имеющейся технической информации. Информация будет выслана вам после отклика на мой запрос.
                                    </p>
                                    <div class="product-card-answers-list__answer">
                                        <p>Ответ:</p>
                                        <span>Запрос в отдел продаж.</span>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <ul class="pagination product-card-answers-list__pagination" role="list">
                            <li><a href="#">1</a></li>
                            <li><a href="#" class="active">2</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function toggleProductCardTabs(evt, tab) {
                let productCardsInfo, productCardTabs, currentTab;
                productCardsInfo = document.querySelectorAll(".product-card-info");
                productCardTabs = document.querySelectorAll(".product-card__tabs li");
                currentTab = document.getElementById(tab);

                productCardsInfo.forEach(element => {
                    element.style.maxHeight = null;
                });

                productCardTabs.forEach(element => {
                    element.className = element.className.replace("active", "");
                });

                currentTab.style.maxHeight = currentTab.scrollHeight + "px";
                evt.currentTarget.className += "active";
            }

        </script>
    </main>
    <div class="order-form" :class="{'active': orderForm === true}" x-data="{toggleNextStep: false, nextStep: false}">
        <div class="order-form__content" data-simplebar>
            <form action="#">
                <div class="order-form__step-page order-form__step-page-1">
                    <div class="order-form__step-top">
                        <p class="order-form__step">Шаг 1 из 2</p>
                        <svg @click="orderForm = false" width="36" height="36">
                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-exit')}}"></use>
                        </svg>
                    </div>
                    <h3 class="title title-h3">{{$product->name}};</h3>
                    <fieldset>
                        <div class="order-form-controls-group order-form-controls-group--not-last">
                            <h4 class="order-form-controls-group__title"><span>i</span> - передаточное отношение</h4>
                            <div class="order-form__select-dropdown" x-data="{selectDropdowntext: '', toggleDropdownList: false}">
                                <div class="order-form__select-dropdown-top" @click="toggleDropdownList = !toggleDropdownList">
                                    <span x-text="selectDropdowntext === '' ? 'Вариант' : selectDropdowntext" :class="{'active':selectDropdowntext != ''}">Вариант</span>
                                    <svg :class="{'active': toggleDropdownList}" width="16" height="16">
                                        <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-dropdown')}}"></use>
                                    </svg>
                                </div>
                                <ul role="list" class="order-form__select-dropdown-list" x-ref="selectDropdownList" x-bind:style="toggleDropdownList === true ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''" :class="{'active': toggleDropdownList === true}">
                                    @foreach($product->series->gearRatios as $ratio)
                                        <li @click="selectDropdowntext = '{{$ratio->name}}';toggleNextStep = true"><span :class="{'active': selectDropdowntext === '{{$ratio->name}}'}">{{$ratio->name}}</span></li>

                                    @endforeach
{{--                                    <li @click="selectDropdowntext = 'От 1 до 9';toggleNextStep = true"><span :class="{'active': selectDropdowntext === 'От 1 до 9'}">От 1 до 9</span></li>--}}
{{--                                    <li @click="selectDropdowntext = 'От 1 до 10';toggleNextStep = true"><span :class="{'active': selectDropdowntext === 'От 1 до 10'}">От 1 до 10</span></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="order-form-controls-group order-form-controls-group--not-last">
                            <h4 class="order-form-controls-group__title">Вариант сборки</h4>
                            <ul class="order-form-controls-group__radio-list" role="list" x-data="{setup: ''}">
                                @foreach($product->series->buildOptions as $option)
                                <li :class="{'active': setup === {{$option->name}}}" @click="setup = {{$option->name}};toggleNextStep = true">
                                    <input type="radio" name="setup" value="{{$option->name}}" id="{{$option->name}}">
                                    <label for="{{$option->name}}">{{$option->name}}</label>
                                </li>
                                @endforeach
{{--                                <li :class="{'active': setup === 23}" @click="setup = 23;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="23" id="23">--}}
{{--                                    <label for="23">23</label>--}}
{{--                                </li>--}}
{{--                                <li class="disabled" :class="{'active': setup === 65}" @click="setup = 65;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="65" id="65">--}}
{{--                                    <label for="65">65</label>--}}
{{--                                </li>--}}
{{--                                <li class="disabled" :class="{'active': setup === 53}" @click="setup = 65;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="53" id="53">--}}
{{--                                    <label for="53" @click="setup = 53">53</label>--}}
{{--                                </li>--}}
{{--                                <li class="disabled" :class="{'active': setup === 8}" @click="setup = 8;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="8" id="8">--}}
{{--                                    <label for="8">8</label>--}}
{{--                                </li>--}}
{{--                                <li style="width:49px;" class="disabled" :class="{'active': setup === 43}" @click="setup = 43;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="43" id="43">--}}
{{--                                    <label for="43">43</label>--}}
{{--                                </li>--}}
{{--                                <li :class="{'active': setup === 63}" @click="setup = 63;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="63" id="63">--}}
{{--                                    <label for="63">63</label>--}}
{{--                                </li>--}}
{{--                                <li :class="{'active': setup === 67}" @click="setup = 67;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="67" id="67">--}}
{{--                                    <label for="67">67</label>--}}
{{--                                </li>--}}
{{--                                <li :class="{'active': setup === 57}" @click="setup = 57;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="57" id="57">--}}
{{--                                    <label for="57">57</label>--}}
{{--                                </li>--}}
{{--                                <li class="disabled" :class="{'active': setup === 21}" @click="setup = 21;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="21" id="21">--}}
{{--                                    <label for="21">21</label>--}}
{{--                                </li>--}}
{{--                                <li class="disabled" :class="{'active': setup === 22}"  @click="setup = 22;toggleNextStep = true">--}}
{{--                                    <input type="radio" name="setup" value="22" id="22">--}}
{{--                                    <label for="22">22</label>--}}
{{--                                </li>--}}
                                <li style="min-width: 79px;" :class="{'active': setup === 'Не знаю'}" @click="setup = 'Не знаю';toggleNextStep = true">
                                    <input type="radio" name="setup" value="Не знаю" id="Не знаю">
                                    <label for="Не знаю">Не знаю</label>
                                </li>
                            </ul>
                        </div>
                        <div class="order-form-controls-group order-form-controls-group--not-last">
                            <h4 class="order-form-controls-group__title">Вал входной</h4>
                            <div class="order-form__select-dropdown" x-data="{selectDropdowntext: '', toggleDropdownList: false}">
                                <div class="order-form__select-dropdown-top" @click="toggleDropdownList = !toggleDropdownList">
                                    <span x-text="selectDropdowntext === '' ? 'Вариант' : selectDropdowntext" :class="{'active':selectDropdowntext != ''}">Вариант</span>
                                    <svg :class="{'active': toggleDropdownList}" width="16" height="16">
                                        <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-dropdown')}}"></use>
                                    </svg>
                                </div>
                                <ul role="list" class="order-form__select-dropdown-list" x-ref="selectDropdownList" x-bind:style="toggleDropdownList === true ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''" :class="{'active': toggleDropdownList === true}">
                                    @foreach($product->series->group->frontShafts as $shaft)
                                        <li @click="selectDropdowntext = '{{$shaft->name}}';toggleNextStep = true"><span :class="{'active': selectDropdowntext === '{{$shaft->name}}'}">{{$shaft->name}}</span></li>

                                    @endforeach
{{--                                    <li @click="selectDropdowntext = 'Выбранный вариант 2';toggleNextStep = true"><span :class="{'active': selectDropdowntext === 'Выбранный вариант 2'}">Выбранный вариант 2</span></li>--}}
{{--                                    <li @click="selectDropdowntext = 'Выбранный вариант 3';toggleNextStep = true"><span :class="{'active': selectDropdowntext === 'Выбранный вариант 3'}">Выбранный вариант 3</span></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="order-form-controls-group">
                            <h4 class="order-form-controls-group__title">Вал выходной</h4>
                            <div class="order-form__select-dropdown" x-data="{selectDropdowntext: '', toggleDropdownList: false}">
                                <div class="order-form__select-dropdown-top" @click="toggleDropdownList = !toggleDropdownList">
                                    <span x-text="selectDropdowntext === '' ? 'Вариант' : selectDropdowntext" :class="{'active':selectDropdowntext != ''}">Вариант</span>
                                    <svg :class="{'active': toggleDropdownList}" width="16" height="16">
                                        <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-dropdown')}}"></use>
                                    </svg>
                                </div>
                                <ul role="list" class="order-form__select-dropdown-list" x-ref="selectDropdownList" x-bind:style="toggleDropdownList === true ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''" :class="{'active': toggleDropdownList === true}">
                                    @foreach($product->series->group->backShafts as $shaft)
                                        <li @click="selectDropdowntext = '{{$shaft->name}}';toggleNextStep = true"><span :class="{'active': selectDropdowntext === '{{$shaft->name}}'}">{{$shaft->name}}</span></li>

                                    @endforeach
{{--                                    <li @click="selectDropdowntext = 'Выбранный вариант';toggleNextStep = true"><span :class="{'active': selectDropdowntext === 'Выбранный вариант'}">Выбранный вариант</span></li>--}}
{{--                                    <li @click="selectDropdowntext = 'Выбранный вариант 2';toggleNextStep = true"><span :class="{'active': selectDropdowntext === 'Выбранный вариант 2'}">Выбранный вариант 2</span></li>--}}
{{--                                    <li @click="selectDropdowntext = 'Выбранный вариант 3';toggleNextStep = true"><span :class="{'active': selectDropdowntext === 'Выбранный вариант 3'}">Выбранный вариант 3</span></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="order-form__accept-label">
                            <input type="checkbox" name="accept" id="accept">
                            <label for="accept" @click="toggleNextStep = true">Выберите этот вариант, чтобы сразу перейти <br>к оформлению заявки.</label>
                        </div>
                        <button type="button" class="primary-btn order-form__submit-btn order-form__next-step-btn" :class="{'disable': toggleNextStep === false}" @click="nextStep = true">Следующий шаг</button>
                    </fieldset>
                </div>
                <div class="order-form__step-page order-form__step-page-2" :class="{'active': nextStep === true}">
                    <div class="order-form__step-top">
                        <p class="order-form__step order-form__step-2" @click="nextStep = false">
                            <svg width="18" height="36">
                                <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#product-title-arrow')}}"></use>
                            </svg>Шаг 2 из 2</p>
                        <svg @click="orderForm = false" width="36" height="36">
                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-exit')}}"></use>
                        </svg>
                    </div>
                    <h2 class="title title-h2">Отправить заявку</h2>
                    <h3 class="title title-h3">{{$product->name}};</h3>
                    <fieldset>
                        <div class="order-form__product-dropdown" x-data="{selectDropdownList: '',toggleDropdownList: false}">
                            <div class="order-form__product-dropdown-top" @click="toggleDropdownList = !toggleDropdownList">
                                <div class="order-form__product-dropdown-title">
                                    <p>Тип передачи</p>
                                    <span>{{$product->series->category->name}}</span>
                                </div>
                                <svg :class="{'active': toggleDropdownList}" width="16" height="16">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-dropdown')}}"></use>
                                </svg>
                            </div>
                            <ul role="list" class="order-form__product-dropdown-list" x-ref="selectDropdownList" x-bind:style="toggleDropdownList === true ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''" :class="{'active': toggleDropdownList === true}">
                                <li>
                                    <p>Количество передаточных ступеней</p>
                                    <span>{{$product->numberOfTransferStages->name}}</span>
                                </li>
                                <li>
                                    <p>Передаточное отношение</p>
                                    <span>{{$product->series->getGearRatio()}}</span>
                                </li>
                                <li>
                                    <p>Расположение осей</p>
                                    <span>{{$product->locationOfAxes->name}}</span>
                                </li>
                                <li>
                                    <p>Климатическое исполнение</p>
                                    <span>{{$product->climatic_version}}</span>
                                </li>
                                <li>
                                    <p>Вариант сборки</p>
                                    <span>@foreach($product->series->buildOptions as $option)
                                              {{$option->name}};
                                        @endforeach</span>
                                </li>
                                @if($product->gost==1)
                                    <li><p>ГОСТ</p></li>
                                @endif
                            </ul>
                        </div>
                        <div class="order-form__input-group">
                            <label for="orderFormName">ФИО
                                <svg width="8" height="8">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#required-icon')}}"></use>
                                </svg>
                            </label>
                            <div class="form-controls-wrapper order-form__form-controls-wrapper">
                                <input type="text" name="orderFormName" id="orderFormName" placeholder="Ваше имя">
                                <svg class="icon-error" width="28" height="28">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-error')}}"></use>
                                </svg>
                                <svg class="icon-correct" width="28" height="28">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-correct')}}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="order-form__input-group">
                            <label for="orderFormMail">E-mail
                                <svg width="8" height="8">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#required-icon')}}"></use>
                                </svg>
                            </label>
                            <div class="form-controls-wrapper order-form__form-controls-wrapper">
                                <input type="text" name="orderFormMail" id="orderFormMail" placeholder="ivan@mail.ru">
                                <svg class="icon-error" width="28" height="28">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-error')}}"></use>
                                </svg>
                                <svg class="icon-correct" width="28" height="28">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-correct')}}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="order-form__input-group">
                            <label for="orderFormTel">Телефон</label>
                            <div class="form-controls-wrapper order-form__form-controls-wrapper">
                                <input type="text" name="orderFormTel" id="orderFormTel" placeholder="8-999-99-99-99">
                                <svg class="icon-error" width="28" height="28">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-error')}}"></use>
                                </svg>
                                <svg class="icon-correct" width="28" height="28">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-correct')}}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="order-form__input-group" style="padding-bottom:0;">
                            <label for="textarea">Комментарий</label>
                            <div class="form-controls-wrapper order-form__form-controls-wrapper">
                                <textarea name="textarea" id="textarea" placeholder="Введите текст"></textarea>
                            </div>
                        </div>
                        <div class="order-form__accept-label order-form__accept-label--policy">
                            <input type="checkbox" name="acceptPolicy" id="acceptPolicy">
                            <label for="acceptPolicy"><a href="#">Подтверждаю согласие с политикой конфиденциальности</a></label>
                        </div>
                        <button type="submit" class="primary-btn order-form__submit-btn">Отправить заявку</button>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
@endsection
