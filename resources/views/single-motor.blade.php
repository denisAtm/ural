@extends('main')
@section('head')
    @php
        $motor_meta=[];
        $motor_meta['title']=$product->title;
        $motor_meta['name']=$product->name;
         $motor_meta['description']=$product->description;
          $motor_meta['alt']=$product->alt;
           $motor_meta['keywords']=$product->keywords;
            $motor_meta['canonical']=$product->canonical;
            $motor_meta['slug']=$product->slug;
    @endphp
    @include('parts.head',['motor_meta'=>$motor_meta])
@endsection
@section('cdn')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endsection
@section('content')
    @include('js.order-conf')
    <main>
        <nav class="breadcrumbs">
            <div class="container">
                <ul role="list">
                    <li><a href="/" >Главная</a></li>
                    <li><a href="javascript:history.go(-1)">Каталог</a></li>
                    <li><a href="#">{{$product->name}}</a></li>
                </ul>
            </div>
        </nav>
        <section class="product-card">
            <div class="container">
                <h1 class="title title-h2 product-card__title">
                    <a class="previous-page-link" href="javascript:history.go(-1)">
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
                                        <img loading="lazy" decoding="async" src="{{asset('storage/images/products/'.$product->image)}}" alt="image" width="328" height="220">
                                    </li>
                                    @foreach($product->images as $image)
                                        <li class="swiper-slide">
                                            <img loading="lazy" decoding="async" src="{{asset('storage/images/products/'.$image->name)}}" alt="image" width="328" height="220">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="product-card__gallery-thumbs swiper">
                                <ul class="swiper-wrapper" role="list">
                                    <li class="swiper-slide">
                                        <img loading="lazy" decoding="async" src="{{asset('storage/images/products/'.$product->image)}}" alt="image" width="50" height="50">
                                    </li>

                                    @foreach($product->images as $image)
                                        <li class="swiper-slide">
                                            <img loading="lazy" decoding="async" src="{{asset('storage/images/products/'.$image->name)}}" alt="image" width="50" height="50">
                                        </li>
                                    @endforeach
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
                                    <h4>{{$product->category->name}}</h4>
                                </div>
                                <svg width="16" height="16">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-dropdown')}}"></use>
                                </svg>
                            </summary>
                            <ul role="list">
                                {{$product->details(true)}}
                            </ul>
                        </details>
                        <ul role="list" class="product-card__list">
                            {{$product->details()}}
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
                        </ul>
                    </div>
                    <div class="product-card-info product-card__sizes" id="productCardSizes">
                        <ul role="list">
                            {{$product->echoSize()}}
                        </ul>
                    </div>
                    <div class="product-card-info product-card__question-answer" id="productCardQuestionAnswer">
                        <div class="product-card__question-answer-top">
                            <h3>Нужно больше информации?</h3>
                            <p>Напишите свой вопрос и наши менеджеры свяжутся с Вами в максимально короткое время.</p>
                        </div>
                        <div>
                            <form action="/send-form/gear" class="request-form" method="post">
                                @csrf
                                @php
                                    $attributes = []
                                @endphp
                                <fieldset>
                                    <div class="request-form__input-group">
                                        <label for="name">Ваше имя</label>
                                        <div class="form-controls-wrapper request-form__form-controls-wrapper">
                                            <input type="text" name="name" id="name" placeholder="Иван">
                                            <input type="hidden" name="id" value="{{$product->id}}"></div>
                                        <?php
                                        echo'<input type="hidden" name="link" value="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"'
                                        ?>
                                    </div>
                                    <div class="request-form__input-group">
                                        <label for="email">Ваш e-mail</label>
                                        <div class="form-controls-wrapper request-form__form-controls-wrapper">
                                            <input type="email" name="email" id="email" placeholder="ivan@mail.ru">
                                        </div>
                                    </div>
                                    <div class="request-form__input-group">
                                        <label for="textarea">Задайте вопрос</label>
                                        <div class="form-controls-wrapper request-form__form-controls-wrapper">
                                            <textarea name="textarea" id="textarea" placeholder="Введите текст"></textarea>
                                        </div>
                                    </div>
                                    {!! Captcha::display($attributes) !!}
                                    <button type="submit" class="secondary-btn request-form__submit-btn">Задать вопрос</button>
                                </fieldset>
                            </form>
                        </div>
                        <nav class="product-card-answers-list">
                            <h3>Ответы</h3>
                            <ul role="list">
                                @foreach($product->questions as $one)

                                    @if($one->status->id == 1 && !empty($one->answer))
                                        <li>
                                            <div class="product-card-answers-list__top">
                                                <p>{{$one->name}}</p>
                                                <time datetime="2022-04-25">{{$one->created_at}}</time>
                                            </div>
                                            <p class="product-card-answers-list__text">
                                                {{$one->question}}
                                            </p>
                                            <div class="product-card-answers-list__answer">
                                                <p>Ответ:</p>
                                                <span> {{$one->answer}}</span>
                                            </div>
                                        </li>
                                    @endif

                                @endforeach
                            </ul>
                        </nav>
                        <ul class="pagination product-card-answers-list__pagination" role="list">
                            {{$quest->withQueryString()->links('vendor.pagination.semantic-ui')}}
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

                currentTab.style.maxHeight = "fit-content";
                evt.currentTarget.className += "active";
            }

        </script>
    </main>
    <div class="order-form" :class="{'active': orderForm === true}" x-data="{toggleNextStep: false, nextStep: false}">
        <div class="order-form__content" data-simplebar>
            <form action="/makeOrder" id="makeOrder" method="post">
                <input type="hidden" name="product_name" value="{{$product->name}}">
                <input type="hidden" name="uri" value="{{url()->current()}}">
                @csrf
                <div class="order-form__step-page order-form__step-page-1">
                    <div class="order-form__step-top">
                        <p class="order-form__step">Шаг 1 из 2</p>
                        <svg @click="orderForm = false" width="36" height="36">
                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-exit')}}"></use>
                        </svg>
                    </div>
                    <h3 class="title title-h3 users-conf-name" >{{$product->name}};</h3>
                    <fieldset>
                        <div class="order-form-controls-group order-form-controls-group--not-last">
                            <h4 class="order-form-controls-group__title"><span>i</span> - передаточное отношение</h4>
                            <ul class="order-form-controls-group__radio-list" role="list" x-data="{setup: ''}">
                                @foreach($product->series->gearRatios()->orderBy('name','asc')->get() as $option)
                                    <li :class="{'active': setup === {{$option->name}}}" @click="setup = {{$option->name}};toggleNextStep = true">
                                        <input type="radio" name="Передаточное отношение" value="{{$option->name}}" id="{{$option->name}}" data-name="{{$option->name}}">
                                        <label for="{{$option->name}}">{{$option->name}}</label>
                                    </li>
                                @endforeach
                                <li style="min-width: 79px;" :class="{'active': setup === 'Не знаю'}" @click="setup = 'Не знаю';toggleNextStep = true">
                                    <input type="radio" name="Передаточное отношение" value="Не знаю" id="Не знаю" data-name="">
                                    <label for="Не знаю">Не знаю</label>
                                </li>
                            </ul>
                        </div>
                        <div class="order-form-controls-group order-form-controls-group--not-last">
                            <h4 class="order-form-controls-group__title">Вал выходной</h4>
                            <div class="order-form__select-dropdown" x-data="{selectDropdowntext: '', toggleDropdownList: false}">
                                <div class="order-form__select-dropdown-top" @click="toggleDropdownList = !toggleDropdownList">
                                    <span x-text="selectDropdowntext === '' ? '{{$product->outputShaft!=null?$product->outputShaft->name:('Вариант')}}' : selectDropdowntext" :class="{'active':selectDropdowntext != ''}">{{$product->outputShaft!=null?$product->outputShaft->name:'Вариант'}}</span>
                                    <svg :class="{'active': toggleDropdownList}" width="16" height="16">
                                        <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-dropdown')}}"></use>
                                    </svg>
                                </div>
                                <select name="Вал выходной" style="display:none">
                                    @foreach($product->outputShafts as $shaft)
                                        <option value="{{$shaft->name}}" {{$product->outputShaft!=null?($product->outputShaft->name==$shaft->name?'selected':''):''}}>{{$shaft->name}}</option>
                                    @endforeach
                                </select>
                                <ul role="list" class="order-form__select-dropdown-list" x-ref="selectDropdownList" x-bind:style="toggleDropdownList === true ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''" :class="{'active': toggleDropdownList === true}">
                                    @foreach($product->outputShafts as $shaft)
                                        <li @click="selectDropdowntext = '{{$shaft->name}}';toggleNextStep = true" data-select="Вал выходной" data-option = "{{$shaft->name}}" {{$product->outputShaft!=null?($product->outputShaft->name==$shaft->name?'active':''):''}}> <span :class="{'active': selectDropdowntext === '{{$shaft->name}}'}" >{{$shaft->name}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="order-form-controls-group order-form-controls-group--not-last">
                            <h4 class="order-form-controls-group__title">Монтажное положение на лапах</h4>
                            <ul class="order-form-controls-group__radio-list" role="list" x-data="{setup: ''}">
                                @foreach($product->series->paws as $seriesPaw)
                                    <li {{$product->paws->contains('name',$seriesPaw->name)? ' ad': 'class=disabled'}}  :class="{'active': setup === {{$seriesPaw->name}}}" @click="setup = {{$seriesPaw->name}};toggleNextStep = true">
                                        <input type="radio" name="Монтажное положение на лапах" value="{{$seriesPaw->name}}" id="{{$seriesPaw->name}}" data-name="{{$seriesPaw->name}}">
                                        <label for="{{$seriesPaw->name}}">{{$seriesPaw->name}}</label>
                                    </li>
                                @endforeach
                                <li style="min-width: 79px;" :class="{'active': setup === 'Не знаю'}" @click="setup = 'Не знаю';toggleNextStep = true">
                                    <input type="radio" name="Монтажное положение на лапах" value="Не знаю" id="Не знаю" data-name="">
                                    <label for="Не знаю">Не знаю</label>
                                </li>
                            </ul>
                        </div>
                        <div class="order-form-controls-group">
                            <h4 class="order-form-controls-group__title">Монтажное положение на фланце</h4>
                            <ul class="order-form-controls-group__radio-list" role="list" x-data="{setup: ''}">
                                @foreach($product->series->flanges as $seriesFlange)
                                    <li {{$product->flanges->contains('name',$seriesFlange->name)? '': 'class=disabled'}}  :class="{'active': setup === {{$seriesFlange->name}}}" @click="setup = {{$seriesFlange->name}};toggleNextStep = true">
                                        <input type="radio" name="Монтажное положение на фланце" value="{{$seriesFlange->name}}" id="{{$seriesFlange->name}}" data-name="{{$seriesFlange->name}}">
                                        <label for="{{$seriesFlange->name}}">{{$seriesFlange->name}}</label>
                                    </li>
                                @endforeach
                                <li style="min-width: 79px;" :class="{'active': setup === 'Не знаю'}" @click="setup = 'Не знаю';toggleNextStep = true">
                                    <input type="radio" name="Монтажное положение на фланце" value="Не знаю" id="Не знаю" data-name="">
                                    <label for="Не знаю">Не знаю</label>
                                </li>
                            </ul>
                        </div>

                        <div class="order-form__accept-label">
                            <input type="checkbox" name="accept" id="accept">
                            <label for="accept" @click="toggleNextStep = true">Выберите этот вариант, чтобы сразу перейти <br>к оформлению заявки.</label>
                        </div>
                        <button type="button" id="nextStep" class="primary-btn order-form__submit-btn order-form__next-step-btn" :class="{'disable': toggleNextStep === false}" @click="nextStep = true">Следующий шаг</button>
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
                    <h3 class="title title-h3 users-conf-name" >{{$product->name}};</h3>
                    <fieldset>
                        <div class="order-form__product-dropdown" x-data="{selectDropdownList: '',toggleDropdownList: false}">
                            <div class="order-form__product-dropdown-top" @click="toggleDropdownList = !toggleDropdownList">
                                <div class="order-form__product-dropdown-title">
                                    <p>Тип передачи</p>
                                    <span>{{$product->category->name}}</span>
                                </div>
                                <svg :class="{'active': toggleDropdownList}" width="16" height="16">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-dropdown')}}"></use>
                                </svg>
                            </div>
                            <ul role="list" id="users-list" class="order-form__product-dropdown-list" x-ref="selectDropdownList" x-bind:style="toggleDropdownList === true ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''" :class="{'active': toggleDropdownList === true}">
                                <li>
                                    <p>Количество передаточных ступеней</p>
                                    <span>{{ $product->numberOfTransferStages===null? 'Не указано':$product->numberOfTransferStages->name}}</span>
                                </li>
                                <li>
                                    <p>Расположение осей</p>
                                    <span>{{($product->locationOfAxes===null)? 'Не указано':$product->locationOfAxes->name}}</span>
                                </li>

                                <li>
                                    <p>Крутящий момент Н*м</p>
                                    <span>{{($product->torque===null)? 'Не указано':$product->torque}}</span>
                                </li>

                            </ul>
                        </div>
                        <div class="order-form__input-group">
                            <label for="orderFormName">ФИО
                                <svg width="8" height="8">
                                    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#required-icon')}}"></use>
                                </svg>
                            </label>
                            <div class="form-controls-wrapper order-form__form-controls-wrapper">
                                <input type="text" name="user_name" id="orderFormName" placeholder="Ваше имя" required>

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
                                <input type="text" name="user_email" id="orderFormMail" placeholder="ivan@mail.ru" required>
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
                                <input type="text" name="user_phone" id="orderFormTel" placeholder="8-999-99-99-99" required>
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
                                <textarea name="user_comment" id="textarea" placeholder="Введите текст"></textarea>
                            </div>
                        </div>
                        <div class="order-form__accept-label order-form__accept-label--policy">
                            <input type="checkbox" name="acceptPolicy" id="acceptPolicy" required>
                            <label for="acceptPolicy"><a href="#">Подтверждаю согласие с политикой конфиденциальности</a></label>
                        </div>
                        {{--                        {!! Captcha::display($attributes) !!}--}}
                        <button type="submit" class="primary-btn order-form__submit-btn">Отправить заявку</button>
                    </fieldset>
                </div>

            </form>
        </div>
    </div>
@endsection
