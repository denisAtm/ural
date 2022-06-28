<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-archive la-lg"></i> Страницы</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('about-page') }}'><i class='nav-icon la la-star'></i> О нас</a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o la-lg"></i> Посты</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tag') }}'><i class="nav-icon la la-tags la-lg "></i> Тэги</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('news') }}'><i class="nav-icon la la-newspaper-o la-lg "></i> Новости</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('articles') }}'><i class='nav-icon la la-sticky-note-o'></i> Articles</a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-map-signs la-lg"></i> Магазин</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('products') }}'><i class='nav-icon la la-question'></i> Товары</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('categories') }}'><i class='nav-icon la  la-cog fa-spin'></i> Типы редукторов</a></li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cogs  la-lg"></i> Аттрибуты моторов</a>
            <ul class="nav-dropdown-items">
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('type-of-transmission') }}'><i class='nav-icon la la-question'></i>Типы передачи</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('number-of-transfer-stages') }}'><i class='nav-icon la la-question'></i>Количество передаточных ступеней</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('gear-ratio') }}'><i class='nav-icon la la-question'></i> Передаточное отношение</a></li>
                <li class='nav-item'><a class='nav-link' href='{{ backpack_url('location-of-axes') }}'><i class='nav-icon la la-question'></i>Расположение осей</a></li>

            </ul>
        </li>
    </ul>
</li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>

{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('group') }}'><i class='nav-icon la la-question'></i> Groups</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('paw') }}'><i class='nav-icon la la-question'></i> Paws</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('flange') }}'><i class='nav-icon la la-question'></i> Flanges</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('build-options') }}'><i class='nav-icon la la-question'></i> Build options</a></li>--}}


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Редукторы</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('series') }}'><i class='nav-icon la la-question'></i> Серии редукторов</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('reducer') }}'><i class='nav-icon la la-question'></i> Редукторы</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('build-option') }}'><i class='nav-icon la la-question'></i> Варианты сборки</a></li>

    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('gear-motor') }}'><i class='nav-icon la la-question'></i> Gear motors</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('paws') }}'><i class='nav-icon la la-question'></i> Paws</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('motor-series') }}'><i class='nav-icon la la-question'></i> Motor series</a></li>