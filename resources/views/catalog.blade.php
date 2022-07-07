@extends('main')
@section('head')
    @include('parts.head',['meta'=>$meta])
@endsection
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <main>
        <nav class="breadcrumbs">
            <div class="container">
                <ul role="list">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/catalog">Каталог</a></li>
                </ul>
            </div>
        </nav>
        <script>
            $(document).ready(function(){
                $('.filter-dropdown__list li button').on('click',function(){
                    $(this).closest('label').find('input[type="radio"]').prop('checked',true);
                })
                $('.filter-dropdown__clear-list-icon').on('click',function(){
                    $(this).closest('.filter-dropdown').find('input[type="radio"]').prop('checked',false);
                })
                $('.filter__clear-btn').on('click',function(){
                    $(this).closest('form').find('input[type="radio"]').prop('checked',false);
                    $(this).closest('form').find('.magic-hover.magic-hover__square').removeClass('active');
                })
                $('input[type="radio"]').each(function(){
                    if($(this).is(':checked')){
                        $(this).closest('label').find('button').addClass('active')
                    }
                })
            })

        </script>
        <section class="catalog">
            <div class="container catalog__container">
                <aside class="catalog__aside">
                    <nav class="filter filter--desktop" x-data="{filterDropdown: ''}">

                            @include('templates.filters.catalog',[$attr1,$attr2,$attr3,$attr4,'route'=>'/catalog/'.$category->slug])

                    </nav>
                </aside>
                <div class="catalog__main">
                    <h1 class="title title-h2 catalog-title"><svg width="68" height="48">
                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-motor')}}"></use>
                        </svg>{{$categories->where('slug',$slug)->first()->name}}</h1>
                    <button class="filter-btn catalog-filter-btn" type="button" @click="filter = true"><svg width="68" height="48">
                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#filter-btn-icon')}}"></use>
                        </svg>Фильтры</button>
                    <nav class="filter filter--mobile" :class="{'active': filter === true}" x-data="{filterDropdown: ''}">
                        <button class="filter__close-btn filter__close-btn--mobile" type="button" @click="filter = false">
                            <!-- <svg width="20" height="28" class="filter__close-btn-icon filter__close-btn-icon--mobile">
                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#catalog-filter-arrow')}}"></use>
                            </svg> -->
                            <svg width="36" height="36" class="filter__close-btn-icon filter__close-btn-icon--tablet">
                                <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-exit')}}"></use>
                            </svg>
                        </button>
                        <button class="filter__close-btn filter__close-btn--tablet" type="button" @click="filter = false">
                            <svg width="36" height="36" class="filter__close-btn-icon filter__close-btn-icon--tablet">
                                <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#icon-exit')}}"></use>
                            </svg>
                        </button>
                        <div class="container">
                                @include('templates.filters.catalog',[$attr1,$attr2,$attr3,$attr4,'route'=>'/catalog/'.$category->slug])
                        </div>
                    </nav>
                    <!-- <script>
                         @touchstart="handleFilterTouchStart(event)"
                    @touchmove="handleFilterTouchMove(event)"
                    @touchend="handleFilterTouchEnd(event)"
                        let mobileFilter = document.querySelector('.filter--mobile');
           let startingY;
           console.log(screen);

           function handleFilterTouchStart(e) {
            startingY = e.touches[0].clientY;
           };

           function handleFilterTouchMove(e) {
            let touch = e.touches[0];
            let change = startingY + touch.clientY;
            if (change < 0) {
                return;
            };

            mobileFilter.style.transform = `translateY(${change}px)`;
            e.preventDefault();
        };

        function handleFilterTouchEnd(e) {
          let change = startingY + e.changedTouches[0].clientY;
          let threshold = screen.height / 3;
          console.log('change:'+ change);
          console.log('threshold:'+ threshold);
          if (change < threshold) {
            mobileFilter.style.transform = `translateY(0)`;
          } else {
            mobileFilter.style.transition = 'all .9s';
            mobileFilter.style.transform = `translateY(100%)`;
          }
        }
                    </script> -->
                    <ul class="catalog-list" role="list">
                        @php
                            $it = 0;

                        @endphp
                        @foreach($products as $product)
                            @php
                                $it++;
                                if($it==4){
                                    $it=1;
                                }
                            @endphp
                            <li data-aos="fade-in" data-aos-delay="{{$it*200}}">
                                <figure class="catalog-card">
                                    <div class="catalog-card__main">
                                        <div class="catalog-card__top">
                                            <picture>
                                                <img src="{{asset('storage/images/products/'.$product->image)}}" loading="lazy" decoding="async" alt="image" width="328" height="264">
                                            </picture>
                                            <ul class="catalog-card__descr catalog-card__descr--pos-abs">
{{--                                                <li><span>Тип передачи</span><span>{{$product->category->name}}</span></li>--}}
{{--                                                <li><span>Передаточные ступени</span><span>{{$product->numberOfTransferStages->name}}</span></li>--}}
{{--                                                <li><span>Передаточное<br>отношение</span><span>{{$product->series->getGearRatio()}}</span></li>--}}
{{--                                                <li><span>Расположение осей</span><span>{{$product->locationOfAxes->name}}</span></li>--}}
{{--                                                <li><span>Климатическое<br>исполнение</span><span>{{$product->climatic_version}}--}}
{{--                            </span></li>--}}
{{--                                                <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
                                                {{$product->details()}}
                                            </ul>
                                        </div>
                                        <figcaption>
                                            <h3 class="title title-h3">{{$product->name}}</h3>
                                        </figcaption>
                                        <div class="catalog-card__link-btn-wrapper">
                                            <a href="/catalog/{{$slug}}/{{$product->slug}}" class="secondary-btn catalog-card__link-btn">Подробнее</a>
                                        </div>
                                    </div>
                                    <div class="catalog-card__aside">
                                        <ul class="catalog-card__descr">
                                            <li><span>Тип передачи</span><span>Планетарный</span></li>
                                            <li><span>Передаточные ступени</span><span>4</span></li>
                                            <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>
                                            <li><span>Расположение осей</span><span>Соосные</span></li>
                                            <li><span>Климатическое<br> исполнение</span><span>У, Т
                      </span></li>
                                            <li><span>Масса</span><span>от 1 до 100
                      </span></li>
                                        </ul>
                                    </div>
                                </figure>
                            </li>
                        @endforeach

                    </ul>
                    <ul class="pagination catalog-pagination" role="list">
                        {{$products->withQueryString()->links('vendor.pagination.semantic-ui')}}
                    </ul>
                </div>
            </div>
        </section>
        <script>
$(document).ready(function(){
    $(".js-range-slider").ionRangeSlider();


    $(".js-range-slider").on("change", function () {
        const inputValue = $(this);
        const minValue = inputValue.data("from");
        const maxValue = inputValue.data("to");
        console.log(minValue,maxValue)
        inputValue.closest('.filter-dropdown').find('.filter-dropdown__clear-list-icon--range-slider').addClass('active');

        inputValue.closest('li').find('.range-slider-min-value').val(minValue);

        inputValue.closest('li').find('.range-slider-max-value').val(maxValue);
    });
    // $('#range-slider-min-value-torque').on('change',function(){
    //     var val = $(this).prop("value");
    //     console.log(val)
    // })
    //
    // let updateRangeSliderValues = $(".js-range-slider-torque").data("ionRangeSlider");

    $('.filter-dropdown__clear-list-icon--range-slider').on('click',()=>{
        updateRangeSliderValues.update({
            from: 5000,
            to:1000000
        });
    })
    $('input.range-slider-min-value').on('change',function(){
        console.log($(this).val())

        let rangeSliderMinValue = $(this).val();

        $(this).closest('li').find('.js-range-slider').data("ionRangeSlider").update({
            from: rangeSliderMinValue,
        });
    })
    $('.range-slider-max-value').on('change',function(){
        let rangeSliderMaxValue = $(this).val();
        $(this).closest('li').find('.js-range-slider').data("ionRangeSlider").update({
            to: rangeSliderMaxValue,
        });
    })
})


        </script>
    </main>
@endsection
