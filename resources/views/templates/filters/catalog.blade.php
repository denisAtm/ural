<ul role="list">
    <form action="{{$route}}" method="get">
<li>
    <div class="filter-dropdown" x-data="{filter: ''}">
        <div class="filter-dropdown__top" @click="filterDropdown !==1 ? filterDropdown = 1: filterDropdown = null" :class="{'active': filterDropdown === 1}">
            <p>Тип передачи</p>
            <ul class="filter-dropdown__icon-list" role="list">
                <a href="javascript:void(0)">
                <svg class="filter-dropdown__clear-list-icon" width="16" height="16" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" @click="filter = ''" :class="{'active': filter !== ''}">
                    <path d="M30.0003 4.66666C30.3685 4.29847 30.9655 4.29847 31.3337 4.66666C31.7018 5.03485 31.7018 5.6318 31.3337 5.99998L6.00055 31.3331C5.63236 31.7013 5.03541 31.7013 4.66723 31.3331C4.29904 30.9649 4.29904 30.368 4.66722 29.9998L30.0003 4.66666Z" fill="#07012E"/>
                    <path d="M31.3333 29.9998C31.7015 30.368 31.7015 30.965 31.3333 31.3332C30.9652 31.7014 30.3682 31.7014 30 31.3332L4.66692 6.00006C4.29873 5.63187 4.29873 5.03493 4.66692 4.66674C5.03511 4.29855 5.63205 4.29855 6.00024 4.66674L31.3333 29.9998Z" fill="#07012E"/>
                </svg>
                </a>
                <svg class="filter-dropdown__arrow-icon" width="16" height="16" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 -0.685211 0.728345 0.685211 13.1235 13.1724)" fill="#07012E"/>
                    <rect width="19.2237" height="1.20148" transform="matrix(0.728345 0.685211 -0.728345 0.685211 0.875 0.00390625)" fill="#07012E"/>
                </svg>
            </ul>
        </div>
        <ul role="list" class="filter-dropdown__list" id="filter1" x-ref="selectDropdownList" x-bind:style="filterDropdown === 1 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
            @foreach($attr1 as $attr)
                <li>
                    <label>
                        <input  type="radio" style="display: none" value="{{$attr->id}}" name="typeOfTransmission" {{isset($_GET['typeOfTransmission'])?$_GET['typeOfTransmission']==$attr->id?'checked':'':''}}>
                        <button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}" >{{$attr->name}}</button>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</li>
<li>
    <div class="filter-dropdown" x-data="{filter: ''}">
        <div class="filter-dropdown__top" @click="filterDropdown !==2 ? filterDropdown = 2: filterDropdown = null" :class="{'active': filterDropdown === 2}">
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
        <ul role="list" class="filter-dropdown__list" id="filter2" x-ref="selectDropdownList" x-bind:style="filterDropdown === 2 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
            @foreach($attr4 as $attr)
                <li>
                    <label>
                        <input type="radio" style="display: none" value="{{$attr->id}}" name="locationOfAxes" {{isset($_GET['locationOfAxes'])?$_GET['locationOfAxes']==$attr->id?'checked':'':''}}>
                        <button type="button" aria-label="button" @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$attr->name}}</button>
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
</li>

<li>
    <div class="filter-dropdown" x-data="{filter: ''}">
        <div class="filter-dropdown__top" @click="filterDropdown !==3 ? filterDropdown = 3: filterDropdown = null" :class="{'active': filterDropdown === 3}">
            <p>Передаточное отношение</p>
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
        <ul role="list" class="filter-dropdown__list" id="filter3" x-ref="selectDropdownList" x-bind:style="filterDropdown === 3 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
            <li>
                @if(request()->has('gearRatio'))
                    @php
                        $gearRatio = explode(';',request()->get('gearRatio'));
                    @endphp
                @endif
                <input type="text" class="js-range-slider" name="gearRatio" value=""
                       data-type="double"
                       data-min="5000"
                       data-max="100000"
                       data-from="{{isset($gearRatio)?$gearRatio[0]:'5000'}}"
                       data-to="{{isset($gearRatio)?$gearRatio[1]:'1000000'}}"
                />
                <div class="range-slider-values">
                    <p>От<input type="number" class="range-slider-min-value" value="{{isset($gearRatio)?$gearRatio[0]:'5000'}}"></p>
                    <p>До<input type="number" class="range-slider-max-value" value="{{isset($gearRatio)?$gearRatio[1]:'1000000'}}"></p>
                </div>

            </li>
        </ul>
    </div>
</li>
        <li>
            <div class="filter-dropdown" x-data="{filter: ''}">
                <div class="filter-dropdown__top" @click="filterDropdown !==4 ? filterDropdown = 4: filterDropdown = null" :class="{'active': filterDropdown === 4}">
                    <p>Крутящий момент Н*м</p>
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
                <ul role="list" class="filter-dropdown__list" id="filter4" x-ref="selectDropdownList" x-bind:style="filterDropdown === 4 ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                    <li>
                        @if(request()->has('torque'))
                            @php
                                $torque = explode(';',request()->get('torque'));
                            @endphp
                        @endif
                        <input type="text" class="js-range-slider" name="torque" value=""
                               data-type="double"
                               data-min="5000"
                               data-max="10000"
                               data-from="{{isset($torque)?$torque[0]:'5000'}}"
                               data-to="{{isset($torque)?$torque[1]:'1000000'}}"

                        />
                        <div class="range-slider-values">
                            <p>От<input type="number" class="range-slider-min-value" id="range-slider-min-value-torque" value="{{isset($torque)?$torque[0]:'5000'}}"></p>
                            <p>До<input type="number" class="range-slider-max-value" id="range-slider-max-value-torque" value="{{isset($torque)?$torque[1]:'1000000'}}"></p>
                        </div>

                    </li>
                </ul>
            </div>
        </li>
<li>
    <a href="{{request()->url()}}" class="filter__clear-btn" type="button"><svg width="16" height="16">
            <use xlink:href="{{asset('resources/svgSprites/svgSprite.svg#clear-filter-icon')}}"></use>
        </svg>Удалить фильтры</a>
</li>
    <li>
        <button type="button" class="filter__submit-btn">Применить</button>
    </li>
    </form>
</ul>


