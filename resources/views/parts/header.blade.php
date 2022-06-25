<script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sticksy/dist/sticksy.min.js"></script>
<script src="{{asset('js/main.min.js')}}" defer></script>
@yield('cdn')
<header class="header">
    <div class="container header__container">
    <button type="button" class="header__hamb-btn" @click="mobileMenu = !mobileMenu;searchMenu = false" :class="{'active': mobileMenu === true}"><span>
    </span></button>
    <div class="header__left">
      <div class="header__logo">
        <a href="/">
          <svg width="30" height="30">
            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#logo')}}"></use>
            </svg>
        </a>
      </div>
      <nav class="header__menu" x-data="{headerSubMenu1:false}">
        <ul class="header__menu-list" role="list">
          <li @click="headerSubMenu = !headerSubMenu" :class="{'active': headerSubMenu === true}"><a href="#">Каталог</a></li>
          <li @click="headerSubMenu1 = !headerSubMenu1" :class="{'active': headerSubMenu1 === true}"><a href="#">О компании</a></li>
          <li><a href="/contacts">Контакты</a></li>
        </ul>
          <nav class="header__dropdown-menu-wrapper" x-show="headerSubMenu1" @click.outside="headerSubMenu1 = false" x-transition.origin.top.left.duration.300ms style="display:none;">
              <ul class="header__dropdown-menu" role="list">
                  <li>
                      <a href="/about">
                          <svg width="68" height="48">
                              <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#submenu-icon-1')}}"></use>
                          </svg>
                          <span>О нас</span>
                      </a>
                  </li>
                  <li>
                      <a href="/news">
                          <svg width="68" height="48">
                              <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#submenu-icon-1')}}"></use>
                          </svg>
                          <span>Новости</span>
                      </a>
                  </li>
                  <li>
                      <a href="/articles">
                          <svg width="68" height="48">
                              <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#submenu-icon-1')}}"></use>
                          </svg>
                          <span>Статьи</span>
                      </a>
                  </li>
              </ul>
          </nav>
        <nav class="header__dropdown-menu-wrapper" x-show="headerSubMenu" @click.outside="headerSubMenu = false" x-transition.origin.top.left.duration.300ms style="display:none;">
        <ul class="header__dropdown-menu" role="list">
            @foreach($categories as $category)
                <li><a href="/catalog/{{$category->slug}}">
                        <svg width="68" height="48">
                            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#submenu-icon-'.$loop->iteration)}}"></use>
                        </svg>
                        <span>
                        @if(str_contains($category->name,'редукторы'))
                            {{$category->name}}
                        @else
                            {{$category->name}} редукторы
                        @endif
                        </span>
                    </a></li>
            @endforeach

        </ul>
       </nav>
      </nav>
    </div>
    <ul class="header__search-phone-list" role="list">
        <li>
<svg class="header__search header__search--adaptive" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32" width="32" height="32" @click="searchMenu = !searchMenu; mobileMenu = false" :class="{'active': searchMenu === true}">
  <path stroke="#07012E" stroke-width="2" d="M22.38 11.69c0 5.904-4.786 10.69-10.69 10.69S1 17.594 1 11.69 5.786 1 11.69 1s10.69 4.786 10.69 10.69Z"/>
  <path fill="#07012E" d="m19.601 17.535 12.4 12.4L29.933 32l-12.4-12.399z"/>
</svg>
<nav class="header-search-menu header-search-menu--desktop" x-data="{searchInputText:'',searchMenuDesktop: false}" @mouseover.outside="searchInputText = '';searchMenuDesktop = false" @click.outside="searchInputText = '';searchMenuDesktop = false">
  <div class="header-search-menu__wrapper header-search-menu__wrapper--desktop">
    <div class="header-search-menu__bottom-line" :class="{'active': searchMenuDesktop === true}">
      <svg class="header__search header__search--desktop" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" @mouseover.self="searchMenuDesktop = true" :class="{'active': searchMenuDesktop === true}">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2285 20.1238C16.589 20.1238 20.1238 16.589 20.1238 12.2285C20.1238 7.86814 16.589 4.33333 12.2285 4.33333C7.86814 4.33333 4.33333 7.86814 4.33333 12.2285C4.33333 16.589 7.86814 20.1238 12.2285 20.1238ZM12.2285 22.4571C17.8776 22.4571 22.4571 17.8776 22.4571 12.2285C22.4571 6.57948 17.8776 2 12.2285 2C6.57948 2 2 6.57948 2 12.2285C2 17.8776 6.57948 22.4571 12.2285 22.4571Z" fill="#07012E"/>
        <path d="M19.151 17.3438L30 28.1928L28.1918 30.0009L17.3428 19.1519L19.151 17.3438Z" fill="#07012E"/>
        </svg>
  <input type="text" x-model.debounce.500ms="searchInputText" :class="{'active': searchMenuDesktop === true}" placeholder="Поиск по марке">
  </div>
  <button type="button" @click="searchInputText = '';searchMenuDesktop = false" :class="{'active': searchMenuDesktop === true}"><svg width="32" height="32">
    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#search-icon-close')}}"></use>
    </svg></button>
  </div>
  <ul class="header-search-menu__list header-search-menu__list--desktop" role="list" x-show="searchInputText" style="display: none;" x-transition.origin.top.left.duration.300ms>
    <li class="header-search-menu__item header-search-menu__item--title"><h3><a href="#">Название раздела, который выдает поиск</a></h3></li>
    <li class="header-search-menu__item">
      <a href="#">
        <picture>
          <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
        </picture>
      <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
    </a>
  </li>
  <li class="header-search-menu__item">
    <a href="#">
      <picture>
        <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
      </picture>
    <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
  </a>
</li>
<li class="header-search-menu__item">
  <a href="#">
    <picture>
      <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
    </picture>
  <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
</a>
</li>
<li class="header-search-menu__item">
  <a href="#">
    <picture>
      <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
    </picture>
  <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
</a>
</li>
<li class="header-search-menu__item">
  <a href="#">
    <picture>
      <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
    </picture>
  <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
</a>
</li>
  </ul>
</nav>
        </li>
        <li>
          <a href="tel:+7(343) 236–44–44" class="header__phone-text">+7(343) 236–44–44</a>
<svg class="header__phone" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 32" width="24" height="32">
  <path fill="#07012E" d="M2.377 9.282c-.442-3.037 1.61-5.765 4.745-6.764a2.2 2.2 0 0 1 1.679.14c.522.27.926.735 1.13 1.303l1.007 2.8c.162.45.19.942.084 1.41a2.438 2.438 0 0 1-.686 1.217l-2.994 2.86c-.147.142-.257.32-.319.52a1.26 1.26 0 0 0-.032.615l.027.125.072.314a17.98 17.98 0 0 0 1.687 4.357 17.433 17.433 0 0 0 2.998 3.928l.093.087c.15.138.33.234.526.277.195.044.398.034.589-.029l3.87-1.272a2.22 2.22 0 0 1 1.354-.01 2.31 2.31 0 0 1 1.127.78l1.832 2.32a2.44 2.44 0 0 1-.206 3.237c-2.399 2.334-5.698 2.812-7.993.888a30.42 30.42 0 0 1-6.997-8.518A30.867 30.867 0 0 1 2.375 9.282h.002Zm7.04 4.26 2.48-2.375a4.876 4.876 0 0 0 1.373-2.434 5.025 5.025 0 0 0-.167-2.819l-1.004-2.8A4.732 4.732 0 0 0 9.824.494 4.426 4.426 0 0 0 6.447.21C2.553 1.453-.573 5.096.089 9.646A33.377 33.377 0 0 0 3.97 21.083a32.807 32.807 0 0 0 7.547 9.185c3.443 2.885 8.038 1.9 11.023-1.002a4.865 4.865 0 0 0 1.449-3.182 4.918 4.918 0 0 0-1.035-3.354l-1.833-2.323a4.619 4.619 0 0 0-2.255-1.558 4.443 4.443 0 0 0-2.705.023l-3.214 1.055a15.881 15.881 0 0 1-2.165-2.952 15.499 15.499 0 0 1-1.365-3.43v-.003Z"/>
</svg>
        </li>
    </ul>
</div>
<nav class="header__mobile-menu" :class="{'active': mobileMenu === true}">
  <ul class="header__list" role="list">
    <li><a href="#">
<svg width="30" height="30">
<use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#logo')}}"></use>
</svg>
<span>Главная</span>
    </a>
    </li>
    <li class="has-submenu" :class="{'active': mobileSubMenu === true}" @click.self="mobileSubMenu = !mobileSubMenu">
      <a @click.self="mobileSubMenu = !mobileSubMenu">
        <svg width="18" height="32" @click.self="mobileSubMenu = !mobileSubMenu">
          <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#menu-icon-back')}}"></use>
        </svg>
        <span @click.self="mobileSubMenu = !mobileSubMenu">Каталог</span>
      </a>
      <ul class="header__sub-menu" :class="{'active': mobileSubMenu === true}" role="list">
          @foreach($categories as $category)
              <li><a href="/catalog/{{$category->slug}}">
                      <svg width="68" height="48">
                          <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#submenu-icon-'.$loop->iteration)}}"></use>
                      </svg>
                      <span>
                        @if(str_contains($category->name,'редукторы'))
                              {{$category->name}}
                          @else
                              {{$category->name}} редукторы
                          @endif
                        </span>
                  </a></li>
          @endforeach
        <li><a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32" width="32" height="32">
            <circle cx="16" cy="16" r="15" stroke="#07012E" stroke-width="2"/>
            <path stroke="#07012E" stroke-width="2" d="M21.857 13.715a5.857 5.857 0 1 1-11.714 0 5.857 5.857 0 0 1 11.714 0Z"/>
            <mask id="a" fill="#fff">
              <path fill-rule="evenodd" d="M3.744 26.286A15.966 15.966 0 0 1 16 20.57c4.92 0 9.322 2.22 12.257 5.715A15.966 15.966 0 0 1 16 32c-4.92 0-9.32-2.22-12.256-5.714Z" clip-rule="evenodd"/>
            </mask>
            <path fill="#07012E" d="m3.744 26.286-1.531-1.287-1.081 1.287 1.08 1.286 1.532-1.286Zm24.513 0 1.531 1.286 1.08-1.286-1.08-1.287-1.531 1.287ZM5.275 27.572a13.97 13.97 0 0 1 10.725-5v-4a17.966 17.966 0 0 0-13.787 6.427l3.062 2.573Zm10.725-5c4.305 0 8.154 1.94 10.725 5l3.063-2.573A17.966 17.966 0 0 0 16 18.571v4Zm10.725 2.427c-2.57 3.06-6.42 5-10.725 5v4a17.966 17.966 0 0 0 13.788-6.427l-3.063-2.573ZM16 30a13.97 13.97 0 0 1-10.725-5l-3.062 2.573A17.966 17.966 0 0 0 16 34v-4Z" mask="url(#a)"/>
          </svg>
          <span>Личный кабинет</span>
              </a></li>
      </ul>
    </li>
    <li><a href="#">Услуги</a></li>
    <li><a href="/about">О компании</a></li>
    <li><a href="#">Справочник</a></li>
    <li><a href="/contacts">Контакты</a></li>
    <li><a href="#">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32" width="32" height="32">
        <circle cx="16" cy="16" r="15" stroke="#07012E" stroke-width="2"/>
        <path stroke="#07012E" stroke-width="2" d="M21.857 13.715a5.857 5.857 0 1 1-11.714 0 5.857 5.857 0 0 1 11.714 0Z"/>
        <mask id="a" fill="#fff">
          <path fill-rule="evenodd" d="M3.744 26.286A15.966 15.966 0 0 1 16 20.57c4.92 0 9.322 2.22 12.257 5.715A15.966 15.966 0 0 1 16 32c-4.92 0-9.32-2.22-12.256-5.714Z" clip-rule="evenodd"/>
        </mask>
        <path fill="#07012E" d="m3.744 26.286-1.531-1.287-1.081 1.287 1.08 1.286 1.532-1.286Zm24.513 0 1.531 1.286 1.08-1.286-1.08-1.287-1.531 1.287ZM5.275 27.572a13.97 13.97 0 0 1 10.725-5v-4a17.966 17.966 0 0 0-13.787 6.427l3.062 2.573Zm10.725-5c4.305 0 8.154 1.94 10.725 5l3.063-2.573A17.966 17.966 0 0 0 16 18.571v4Zm10.725 2.427c-2.57 3.06-6.42 5-10.725 5v4a17.966 17.966 0 0 0 13.788-6.427l-3.063-2.573ZM16 30a13.97 13.97 0 0 1-10.725-5l-3.062 2.573A17.966 17.966 0 0 0 16 34v-4Z" mask="url(#a)"/>
      </svg>
      <span>Личный кабинет</span>
          </a></li>
  </ul>
</nav>
<nav class="header-search-menu header-search-menu--adaptive" :class="{'active': searchMenu === true}" x-data="{searchInputText:''}">
  <div class="header-search-menu__wrapper header-search-menu__wrapper--adaptive">
  <input type="text" x-model.debounce.500ms="searchInputText" placeholder="Поиск по марке">
  <button type="button" @click="searchInputText = ''"><svg width="32" height="32">
    <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#search-icon-close')}}"></use>
    </svg></button>
  </div>
  <ul class="header-search-menu__list" role="list" x-show="searchInputText">
    <li class="header-search-menu__item header-search-menu__item--title"><h3><a href="#">Название раздела, который выдает поиск</a></h3></li>
    <li class="header-search-menu__item">
      <a href="#">
        <picture>
          <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
        </picture>
      <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
    </a>
  </li>
  <li class="header-search-menu__item">
    <a href="#">
      <picture>
        <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
      </picture>
    <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
  </a>
</li>
<li class="header-search-menu__item">
  <a href="#">
    <picture>
      <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
    </picture>
  <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
</a>
</li>
<li class="header-search-menu__item">
  <a href="#">
    <picture>
      <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
    </picture>
  <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
</a>
</li>
<li class="header-search-menu__item">
  <a href="#">
    <picture>
      <img src="{{asset('resources/images/search-menu-list-img.png')}}" loading="lazy" decoding="async" alt="image" width="48" height="48">
    </picture>
  <h3>Мотор-редуктор 1МПз2-40 (3МП-40)</h3>
</a>
</li>
  </ul>
</nav>
</header>
<div class="overlay" :class="{'active':mobileMenu === true || searchMenu === true || filter === true || orderForm === true || questionModal === true || orderCompleteModal === true,'z-998': filter === true || orderForm === true || orderCompleteModal === true}" @click="mobileMenu = false;searchMenu = false;filter = false;orderForm = false; questionModal = false; orderCompleteModal = false"></div>
