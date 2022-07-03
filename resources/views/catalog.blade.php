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
        <section class="catalog">
            <div class="container catalog__container">
                <aside class="catalog__aside">
                    <nav class="filter filter--desktop" x-data="{filterDropdown: ''}">
                        <ul role="list">
                            <li>
                                <div class="filter-dropdown" x-data="{filter: ''}">
                                    <div class="filter-dropdown__top" @click="filterDropdown !==1 ? filterDropdown = 1: filterDropdown = null" :class="{'active': filterDropdown === 1}">
                                        <p>Тип передачи</p>
                                        <ul class="filter-dropdown__icon-list" role="list">
                                            <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                            </svg>
                                            <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                            </svg>
                                        </ul>
                                    </div>
                                    <ul role="list" class="filter-dropdown__list" id="filter1" x-ref="selectDropdownList" x-bind:style="filterDropdown === 1 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                        @foreach($attr1 as $attr)
                                            <li><button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button></li>
                                        @endforeach
                                        </ul>
                                </div>
                            </li>
                            <li>
                                <div class="filter-dropdown" x-data="{filter: ''}">
                                    <div class="filter-dropdown__top" @click="filterDropdown !==2 ? filterDropdown = 2: filterDropdown = null" :class="{'active': filterDropdown === 2}">
                                        <p>Количество ступеней</p>
                                        <ul class="filter-dropdown__icon-list" role="list">
                                            <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                            </svg>
                                            <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                            </svg>
                                        </ul>
                                    </div>
                                    <ul role="list" class="filter-dropdown__list" id="filter2" x-ref="selectDropdownList" x-bind:style="filterDropdown === 2 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                        @foreach($attr2 as $attr)
                                            <li><button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="filter-dropdown" x-data="{filter: ''}">
                                    <div class="filter-dropdown__top" @click="filterDropdown !==3 ? filterDropdown = 3: filterDropdown = null" :class="{'active': filterDropdown === 3}">
                                        <p>Передаточное отношение</p>
                                        <ul class="filter-dropdown__icon-list" role="list">
                                            <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                            </svg>
                                            <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                            </svg>
                                        </ul>
                                    </div>
                                    <ul role="list" class="filter-dropdown__list" id="filter3" x-ref="selectDropdownList" x-bind:style="filterDropdown === 3 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                        @foreach($attr3 as $attr)
                                            <li><button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="filter-dropdown" x-data="{filter: ''}">
                                    <div class="filter-dropdown__top" @click="filterDropdown !==4 ? filterDropdown = 4: filterDropdown = null" :class="{'active': filterDropdown === 4}">
                                        <p>Расположение осей</p>
                                        <ul class="filter-dropdown__icon-list" role="list">
                                            <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                            </svg>
                                            <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                            </svg>
                                        </ul>
                                    </div>
                                    <ul role="list" class="filter-dropdown__list" id="filter4" x-ref="selectDropdownList" x-bind:style="filterDropdown === 4 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                        @foreach($attr4 as $attr)
                                            <li><button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="filter-dropdown" x-data="{filter: ''}">
                                    <div class="filter-dropdown__top" @click="filterDropdown !==5 ? filterDropdown = 5: filterDropdown = null" :class="{'active': filterDropdown === 5}">
                                        <p>Консольная нагрузка</p>
                                        <ul class="filter-dropdown__icon-list" role="list">
                                            <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                            </svg>
                                            <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                            </svg>
                                        </ul>
                                    </div>
                                    <ul role="list" class="filter-dropdown__list" id="filter5" x-ref="selectDropdownList" x-bind:style="filterDropdown === 5 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                        <li><button type="button" aria-label="button" @click="filter !==1 ?filter = 1: filter = null" :class="{'active': filter === 1}">Конический</button></li>
                                        <li><button type="button" @click="filter !==2 ?filter = 2: filter = null" :class="{'active': filter === 2}">Червячный</button></li>
                                        <li><button type="button" @click="filter !==3 ?filter = 3: filter = null" :class="{'active': filter === 3}">Цилиндрический</button></li>
                                        <li><button type="button" @click="filter !==4 ?filter = 4: filter = null" :class="{'active': filter === 4}">Планетарный</button></li>
                                        <li><button type="button" @click="filter !==5 ?filter = 5: filter = null" :class="{'active': filter === 5}">Червячный моторредуктор</button></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="filter-dropdown" x-data="{filter: ''}">
                                    <div class="filter-dropdown__top" @click="filterDropdown !==6 ? filterDropdown = 6: filterDropdown = null" :class="{'active': filterDropdown === 6}">
                                        <p>Масса</p>
                                        <ul class="filter-dropdown__icon-list" role="list">
                                            <svg class="filter-dropdown__clear-list-icon filter-dropdown__clear-list-icon--range-slider" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                            </svg>
                                            <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                            </svg>
                                        </ul>
                                    </div>
                                    <ul role="list" class="filter-dropdown__list" id="filter6" x-ref="selectDropdownList" x-bind:style="filterDropdown === 6 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                        <li>
                                            <input type="text" class="js-range-slider" name="my_range" value=""
                                                   data-type="double"
                                                   data-min="5000"
                                                   data-max="1000000"
                                                   data-from="5000"
                                                   data-to="1000000"
                                            />
                                            <div class="range-slider-values">
                                                <p>От<span class="range-slider-min-value">5000</span></p>
                                                <p>До<span class="range-slider-max-value">1 000 000</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <button class="filter__clear-btn" type="button"><svg width="16" height="16">
                                        <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#clear-filter-icon')}}"></use>
                                    </svg>Удалить фильтры</button>
                            </li>
                        </ul>
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
                            <ul role="list">
                                <li>
                                    <div class="filter-dropdown" x-data="{filter: ''}">
                                        <div class="filter-dropdown__top" @click="filterDropdown !==1 ? filterDropdown = 1: filterDropdown = null" :class="{'active': filterDropdown === 1}">
                                            <p>Тип передачи</p>
                                            <ul class="filter-dropdown__icon-list" role="list">
                                                <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                    <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                    <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                                </svg>
                                                <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                                </svg>
                                            </ul>
                                        </div>
                                        <ul role="list" class="filter-dropdown__list" id="filter1" x-ref="selectDropdownList" x-bind:style="filterDropdown === 1 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                            @foreach($attr1 as $attr)
                                                <li><button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="filter-dropdown" x-data="{filter: ''}">
                                        <div class="filter-dropdown__top" @click="filterDropdown !==2 ? filterDropdown = 2: filterDropdown = null" :class="{'active': filterDropdown === 2}">
                                            <p>Количество ступеней</p>
                                            <ul class="filter-dropdown__icon-list" role="list">
                                                <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                    <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                    <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                                </svg>
                                                <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                                </svg>
                                            </ul>
                                        </div>
                                        <ul role="list" class="filter-dropdown__list" id="filter2" x-ref="selectDropdownList" x-bind:style="filterDropdown === 2 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                            @foreach($attr2 as $attr)
                                                <li><button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="filter-dropdown" x-data="{filter: ''}">
                                        <div class="filter-dropdown__top" @click="filterDropdown !==3 ? filterDropdown = 3: filterDropdown = null" :class="{'active': filterDropdown === 3}">
                                            <p>Передаточное отношение</p>
                                            <ul class="filter-dropdown__icon-list" role="list">
                                                <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                    <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                    <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                                </svg>
                                                <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                                </svg>
                                            </ul>
                                        </div>
                                        <ul role="list" class="filter-dropdown__list" id="filter3" x-ref="selectDropdownList" x-bind:style="filterDropdown === 3 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                            @foreach($attr3 as $attr)
                                                <li><button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="filter-dropdown" x-data="{filter: ''}">
                                        <div class="filter-dropdown__top" @click="filterDropdown !==4 ? filterDropdown = 4: filterDropdown = null" :class="{'active': filterDropdown === 4}">
                                            <p>Расположение осей</p>
                                            <ul class="filter-dropdown__icon-list" role="list">
                                                <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                    <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                    <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                                </svg>
                                                <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                                </svg>
                                            </ul>
                                        </div>
                                        <ul role="list" class="filter-dropdown__list" id="filter4" x-ref="selectDropdownList" x-bind:style="filterDropdown === 4 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                            @foreach($attr4 as $attr)
                                                <li><button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="filter-dropdown" x-data="{filter: ''}">
                                        <div class="filter-dropdown__top" @click="filterDropdown !==5 ? filterDropdown = 5: filterDropdown = null" :class="{'active': filterDropdown === 5}">
                                            <p>Консольная нагрузка</p>
                                            <ul class="filter-dropdown__icon-list" role="list">
                                                <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                                                    <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                    <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                                </svg>
                                                <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                                </svg>
                                            </ul>
                                        </div>
                                        <ul role="list" class="filter-dropdown__list" id="filter5" x-ref="selectDropdownList" x-bind:style="filterDropdown === 5 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                            <li><button type="button" aria-label="button" @click="filter !==1 ?filter = 1: filter = null" :class="{'active': filter === 1}">Конический</button></li>
                                            <li><button type="button" @click="filter !==2 ?filter = 2: filter = null" :class="{'active': filter === 2}">Червячный</button></li>
                                            <li><button type="button" @click="filter !==3 ?filter = 3: filter = null" :class="{'active': filter === 3}">Цилиндрический</button></li>
                                            <li><button type="button" @click="filter !==4 ?filter = 4: filter = null" :class="{'active': filter === 4}">Планетарный</button></li>
                                            <li><button type="button" @click="filter !==5 ?filter = 5: filter = null" :class="{'active': filter === 5}">Червячный моторредуктор</button></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="filter-dropdown" x-data="{filter: ''}">
                                        <div class="filter-dropdown__top" @click="filterDropdown !==6 ? filterDropdown = 6: filterDropdown = null" :class="{'active': filterDropdown === 6}">
                                            <p>Масса</p>
                                            <ul class="filter-dropdown__icon-list" role="list">
                                                <svg class="filter-dropdown__clear-list-icon filter-dropdown__clear-list-icon--range-slider" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                                                    <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                                                </svg>
                                                <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                                                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                                                </svg>
                                            </ul>
                                        </div>
                                        <ul role="list" class="filter-dropdown__list" id="filter6" x-ref="selectDropdownList" x-bind:style="filterDropdown === 6 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                                            <li>
                                                <input type="text" class="js-range-slider" name="my_range" value=""
                                                       data-type="double"
                                                       data-min="5000"
                                                       data-max="1000000"
                                                       data-from="5000"
                                                       data-to="1000000"
                                                />
                                                <div class="range-slider-values">
                                                    <p>От<span class="range-slider-min-value">5000</span></p>
                                                    <p>До<span class="range-slider-max-value">1 000 000</span></p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <button class="filter__clear-btn" type="button"><svg width="16" height="16">
                                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#clear-filter-icon')}}"></use>
                                        </svg>Удалить фильтры</button>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="filter__submit-btn">Применить</button>
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

                        {{--                        <li data-aos="fade-in" data-aos-delay="200">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="400">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="600">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="200">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="400">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="600">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="200">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="400">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="600">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="200">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="400">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
{{--                        <li data-aos="fade-in" data-aos-delay="600">--}}
{{--                            <figure class="catalog-card">--}}
{{--                                <div class="catalog-card__main">--}}
{{--                                    <div class="catalog-card__top">--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('resources/images/catalog-card-img.png')}}" loading="lazy" decoding="async" alt="image" width="328" height="264">--}}
{{--                                        </picture>--}}
{{--                                        <ul class="catalog-card__descr catalog-card__descr--pos-abs">--}}
{{--                                            <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                            <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                            <li><span>Передаточное<br>отношение</span><span>от 1 до 80</span></li>--}}
{{--                                            <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                            <li><span>Климатическое<br>исполнение</span><span>У, Т--}}
{{--                            </span></li>--}}
{{--                                            <li><span>Масса</span><span>от 1 до 100--}}
{{--                            </span></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <figcaption>--}}
{{--                                        <h3 class="title title-h3">Мотор-редуктор 1МПз2-40 (3МП-40)</h3>--}}
{{--                                    </figcaption>--}}
{{--                                    <div class="catalog-card__link-btn-wrapper">--}}
{{--                                        <a href="/single" class="secondary-btn catalog-card__link-btn">Подробнее</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="catalog-card__aside">--}}
{{--                                    <ul class="catalog-card__descr">--}}
{{--                                        <li><span>Тип передачи</span><span>Планетарный</span></li>--}}
{{--                                        <li><span>Передаточные ступени</span><span>4</span></li>--}}
{{--                                        <li><span>Передаточное<br> отношение</span><span>от 1 до 80</span></li>--}}
{{--                                        <li><span>Расположение осей</span><span>Соосные</span></li>--}}
{{--                                        <li><span>Климатическое<br> исполнение</span><span>У, Т--}}
{{--                      </span></li>--}}
{{--                                        <li><span>Масса</span><span>от 1 до 100--}}
{{--                      </span></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </figure>--}}
{{--                        </li>--}}
                    </ul>
                    <ul class="pagination catalog-pagination" role="list">
{{--                        {{ $products->links() }}--}}
                    </ul>
                </div>
            </div>
        </section>
        <script>

            $(".js-range-slider").ionRangeSlider();


            $(".js-range-slider").on("change", function () {
                const inputValue = $(this);
                const minValue = inputValue.data("from");
                const maxValue = inputValue.data("to");
                $('.filter-dropdown__clear-list-icon--range-slider').addClass('active');

                $('.range-slider-min-value').text(minValue);
                $('.range-slider-max-value').text(maxValue);
            });

            let updateRangeSliderValues = $(".js-range-slider").data("ionRangeSlider");

            $('.filter-dropdown__clear-list-icon--range-slider').on('click',()=>{
                updateRangeSliderValues.update({
                    from: 5000,
                    to:1000000
                });
            })


        </script>
    </main>
@endsection
