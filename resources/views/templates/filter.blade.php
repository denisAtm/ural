

<ul role="list">
    <form action="{{$route}}" method="post">
        @csrf
    @foreach($categories as $category)
        <li>
            <div class="filter-dropdown" x-data="{filter: ''}">
                <div class="filter-dropdown__top" @click="filterDropdown !=={{$loop->iteration}} ? filterDropdown = {{$loop->iteration}}: filterDropdown = null" :class="{'active': filterDropdown === {{$loop->iteration}}}">
                    <p>{{$category->name}}</p>
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
                @if($category->children)
                    <ul role="list" class="filter-dropdown__list" id="filter{{$loop->iteration}}" x-ref="selectDropdownList" x-bind:style="filterDropdown === {{$loop->iteration}} ? 'height: ' + $refs.selectDropdownList.scrollHeight + 'px' : ''">
                        @foreach($category->children as $child)
                            <li>
                            <label>
                                <input type="radio" name="category_id{{$category->id}}" value="{{$child->id}}" style="">
                                <button type="button" {{$loop->first? 'aria-label="button"' : ''}} @click="filter !=={{$loop->iteration}} ?filter = {{$loop->iteration}}: filter = null" :class="{'active': filter === {{$loop->iteration}}}">{{$child->name}}</button>
                            </label>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </li>
    @endforeach
    </form>
</ul>
