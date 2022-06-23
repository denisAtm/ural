<!DOCTYPE html>
<html lang="ru">
@yield('head')
<body x-data="{mobileMenu: false, mobileSubMenu: false, searchMenu: false, headerSubMenu:false, filter: false, orderForm: false, questionModal: false}" :class="{'mobileMenuOpened': mobileMenu === true || searchMenu === true || filter === true || orderForm === true || questionModal === true}">
@include('parts.header')
@yield('content')
@include('parts.footer')
</body>
</html>
