@extends('main')
@section('head')
@include('parts.head',['title'=>'Статьи'])
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
        <section class="articles-page">
            <div class="container">
                <div class="articles-page__title-row">
                    <h1 class="title title-h2 articles-page__title">Статьи</h1>
                    <button class="filter-btn articles-page__filter-btn" type="button" @click="filter = true"><svg width="68" height="48">
                            <use xlink:href="resources/svgSprites/svgSprite.svg#filter-btn-icon"></use>
                        </svg>Фильтры</button>
                    <nav class="filter filter--mobile" :class="{'active': filter === true}" x-data="{filterDropdown: ''}">
                        <button class="filter__close-btn filter__close-btn--mobile" type="button" @click="filter = false">
                            <!-- <svg width="20" height="28" class="filter__close-btn-icon filter__close-btn-icon--mobile">
                            <use xlink:href="resources/svgSprites/svgSprite.svg#catalog-filter-arrow"></use>
                            </svg> -->
                            <svg width="36" height="36" class="filter__close-btn-icon filter__close-btn-icon--tablet">
                                <use xlink:href="resources/svgSprites/svgSprite.svg#icon-exit"></use>
                            </svg>
                        </button>
                        <button class="filter__close-btn filter__close-btn--tablet" type="button" @click="filter = false">
                            <svg width="36" height="36" class="filter__close-btn-icon filter__close-btn-icon--tablet">
                                <use xlink:href="resources/svgSprites/svgSprite.svg#icon-exit"></use>
                            </svg>
                        </button>
                        <div class="container">
                            <ul role="list">
                                <li>
                                    <div class="filter-dropdown" x-data="{filter: ''}">
                                        <div class="filter-dropdown__top" @click="filterDropdown !==1 ? filterDropdown = 1: filterDropdown = null" :class="{'active': filterDropdown === 1}">
                                            <p>Редукторы</p>
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
                                        <div class="filter-dropdown__top" @click="filterDropdown !==2 ? filterDropdown = 2: filterDropdown = null" :class="{'active': filterDropdown === 2}">
                                            <p>Электродвигатели</p>
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
                                        <div class="filter-dropdown__top" @click="filterDropdown !==3 ? filterDropdown = 3: filterDropdown = null" :class="{'active': filterDropdown === 3}">
                                            <p>Мотор-редукторы</p>
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
                                        <div class="filter-dropdown__top" @click="filterDropdown !==4 ? filterDropdown = 4: filterDropdown = null" :class="{'active': filterDropdown === 4}">
                                            <p>Преобразователи частоты</p>
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
                                        <div class="filter-dropdown__top" @click="filterDropdown !==5 ? filterDropdown = 5: filterDropdown = null" :class="{'active': filterDropdown === 5}">
                                            <p>Защитное и коммутационное оборудование</p>
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
                                            <p>Станция управления насосными агрегатами</p>
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
                            </ul>
                        </div>
                        <button type="submit" class="filter__submit-btn">Применить</button>
                    </nav>
                </div>
                <div class="articles-page__grid">
                    <aside class="articles-page__aside">
                        <nav class="filter filter--desktop" x-data="{filterDropdown: ''}">
                            <ul role="list">
                                <li>
                                    <div class="filter-dropdown" x-data="{filter: ''}">
                                        <div class="filter-dropdown__top" @click="filterDropdown !==1 ? filterDropdown = 1: filterDropdown = null" :class="{'active': filterDropdown === 1}">
                                            <p>Редукторы</p>
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
                                        <div class="filter-dropdown__top" @click="filterDropdown !==2 ? filterDropdown = 2: filterDropdown = null" :class="{'active': filterDropdown === 2}">
                                            <p>Электродвигатели</p>
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
                                        <div class="filter-dropdown__top" @click="filterDropdown !==3 ? filterDropdown = 3: filterDropdown = null" :class="{'active': filterDropdown === 3}">
                                            <p>Мотор-редукторы</p>
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
                                        <div class="filter-dropdown__top" @click="filterDropdown !==4 ? filterDropdown = 4: filterDropdown = null" :class="{'active': filterDropdown === 4}">
                                            <p>Преобразователи частоты</p>
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
                                        <div class="filter-dropdown__top" @click="filterDropdown !==5 ? filterDropdown = 5: filterDropdown = null" :class="{'active': filterDropdown === 5}">
                                            <p>Защитное и коммутационное оборудование</p>
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
                                            <p>Станция управления насосными агрегатами</p>
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
                            </ul>
                        </nav>
                    </aside>
                    <div class="articles-page__main">
                        <ul role="list" class="articles-page__list">
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Как правильно подобрать электродвигатель</a></h3>
                                    <p>Как правильно подобрать электродвигатель.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Основные неисправности электродвигателя и способы их устранения</a></h3>
                                    <p>Электрические и механические неисправности, способы защиты двигателя.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Коротко о ПЛК — программируемых логических контроллерах</a></h3>
                                    <p>Основные элементы ПЛК, общие принципы подбора контроллера для производственной линии.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Обзор устройств плавного пуска Siemens</a></h3>
                                    <p>Особенности и возможности устройств плавного пуска Siemens Sirius серий 3RW30, 3RW40, 3RW44.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Как правильно подобрать электродвигатель</a></h3>
                                    <p>Как правильно подобрать электродвигатель.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Основные неисправности электродвигателя и способы их устранения</a></h3>
                                    <p>Как правильно подобрать электродвигатель.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Основные неисправности электродвигателя и способы их устранения</a></h3>
                                    <p>Электрические и механические неисправности, способы защиты двигателя.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Как правильно подобрать электродвигатель</a></h3>
                                    <p>Как правильно подобрать электродвигатель.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Основные неисправности электродвигателя и способы их устранения</a></h3>
                                    <p>Как правильно подобрать электродвигатель.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                            <li>
                                <article>
                                    <time datetime="2022.15.03">15.03.2022</time>
                                    <h3><a href="#">Основные неисправности электродвигателя и способы их устранения</a></h3>
                                    <p>Электрические и механические неисправности, способы защиты двигателя.</p>
                                    <ul class="articles-page__tags" role="list">
                                        <li>Название тега</li>
                                        <li>Название тега</li>
                                    </ul>
                                </article>
                            </li>
                        </ul>
                        <ul class="pagination articles-page__pagination" role="list">
                            <li><a href="#">1</a></li>
                            <li><a href="#" class="active">2</a></li>
                        </ul>
                    </div>
                </div>
        </section>
    </main>
@endsection
