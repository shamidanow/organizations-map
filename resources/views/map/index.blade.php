<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Создание и удаление</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru-RU" type="text/javascript"></script>
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
    <script>
        var myMap;
    </script>
</head>

<body>
    <div id="map"></div>
    <div class="header-view _noprint">
        <div class="header-view__main-layout">
            <div class="header-view__form-layout">
                <form method="GET" action="/organizations/searched" 
            			class="search-form-view _view_default small-search-form-view"><button type="button"
                        class="button_air-search-large _pin-right"><span class="button_air-search-large__icon">
                            <div class="small-search-form-view__icon _type_back"></div>
                        </span></button>
                    <div class="search-form-view__input">
                        <div class="suggest"><span class="input_air-search-large"><span
                                    class="input_air-search-large__context">
                                    <input name="company"
                                        class="input_air-search-large__control" type="text"
                                        placeholder="Поиск мест и адресов" autocomplete="disable" autocorrect="off"
                                        value=""></span></span></div>
                    </div>
                    <div class="small-search-form-view__button"><button type="submit"
                            class="button_air-search-large _pin-left _pin-right" tabindex="2"><span
                                class="button_air-search-large__icon">
                                <div class="small-search-form-view__icon _type_search"></div>
                            </span></button></div>
                    <div class="small-search-form-view__delimiter"></div>
                    <div class="small-search-form-view__button"><button type="button"
                            class="button_air-search-large _pin-left"><span class="button_air-search-large__icon">
                                <div class="small-search-form-view__icon _type_close"></div>
                            </span></button></div>
                </form>
            </div>
        </div>

    </div>
    <div class="sidebar-container">
        <!-- _collapsed добавить -->
        <div class="sidebar-view ">
            <div class="sidebar-panel-view _name_search _show-search _view_full">
                <div class="sidebar-panel-view__content">
                    <div class="sidebar-panel-view__content-wrapper">
                        <div class="card-wrapper-view">
                            <div class="scroll _width_narrow">
                                <div class="scroll__container">
                                    <div class="scroll__content">
                                        <!-- начало -->
                                        <div class="company">
                                            <div class="company-block-twocolumns">
                                                <div class="company-block-twocolumns__item">
                                                    <span class="company-logo__default" role="img"
                                                        aria-label="Лототип"></span>
                                                </div>
                                                <div class="company-block-twocolumns__item">
                                                    <div class="company-additional-blocks">
                                                        <div class="company-additional__block">
                                                            <span class="company-additional__block-limit">Лимит</span>
                                                            <span class="company-additional__block-separator">-</span>
                                                            <span class="company-additional__block-value">25 000
                                                                руб.</span>
                                                        </div>
                                                        <div class="company-additional__block">
                                                            <span
                                                                class="company-additional__block-limit">Доступно</span>
                                                            <span class="company-additional__block-separator">-</span>
                                                            <span class="company-additional__block-value">0 руб.</span>
                                                        </div>
                                                        <div class="company-additional__block">
                                                            <span class="company-additional__block-limit">Сверх
                                                                лимита</span>
                                                            <span class="company-additional__block-separator">-</span>
                                                            <span class="company-additional__block-value">работаю</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- company-block-twocolumns -->
                                            <div class="company-block-linecolums">
                                                <div class="company-block-linecolums__item">
                                                    <svg class="company-block-linecolums__item-icon" width="17"
                                                        height="17" viewbox="0 0 17 17">
                                                        <path
                                                            d="M8.20503 3.79449C5.29719 3.79449 3.03198 5.52713 0.251953 8.33911C2.64498 10.7428 4.65455 12.8837 8.20503 12.8837C11.752 12.8837 14.3616 10.1712 16.1581 8.38882C14.319 6.30113 11.7129 3.79449 8.20503 3.79449ZM8.20503 11.5807C6.45109 11.5807 5.0238 10.125 5.0238 8.33911C5.0238 6.54967 6.45109 5.09752 8.20503 5.09752C9.95897 5.09752 11.3863 6.55322 11.3863 8.33911C11.3863 10.1286 9.95897 11.5807 8.20503 11.5807Z">
                                                        </path>
                                                        <path
                                                            d="M8.20285 7.20297C8.20285 6.92248 8.30582 6.66685 8.47269 6.46802C8.38393 6.45382 8.29516 6.44672 8.20285 6.44672C7.18031 6.44672 6.34595 7.29528 6.34595 8.33912C6.34595 9.38296 7.18031 10.2315 8.20285 10.2315C9.22539 10.2315 10.0598 9.38296 10.0598 8.33912C10.0598 8.25746 10.0527 8.1758 10.0456 8.09414C9.85028 8.24681 9.60884 8.33912 9.34256 8.33912C8.71057 8.33912 8.20285 7.8314 8.20285 7.20297Z">
                                                        </path>
                                                    </svg>
                                                    <div tooltip="Количество просмотров страницы компании" flow="right"
                                                        class="company-block-linecolums__item-value">330</div>
                                                    <span class="company-block-linecolums__item-text">Просмотр</span>
                                                </div>
                                                <div class="company-block-linecolums__item">
                                                    <svg class="company-block-linecolums__item-icon" width="17"
                                                        height="17" viewbox="0 0 17 17">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M14.6866 2.41813C14.4913 2.22146 14.1733 2.22146 13.9793 2.41813L6.52529 9.83746C6.32995 10.0355 6.01129 10.0355 5.81729 9.83746L2.55129 6.51146C2.45462 6.4128 2.32795 6.36413 2.20062 6.36346C2.07195 6.3628 1.94129 6.41146 1.84329 6.51146L0.399953 7.8088C0.303953 7.90746 0.251953 8.0308 0.251953 8.15946C0.251953 8.2888 0.303953 8.42413 0.40062 8.52213L3.69395 11.9781C3.88862 12.1755 4.20795 12.4955 4.40195 12.6915L5.81795 14.1188C6.01262 14.3141 6.33062 14.3141 6.52595 14.1188L16.1033 4.5588C16.2986 4.3628 16.2986 4.0408 16.1033 3.8448L14.6866 2.41813Z">
                                                        </path>
                                                    </svg>
                                                    <div tooltip="Количество просмотров страницы компании" flow="right"
                                                        class="company-block-linecolums__item-value">136</div>
                                                    <span class="company-block-linecolums__item-text">сделок</span>
                                                </div>
                                                <div class="company-block-linecolums__item">
                                                    <svg class="company-block-linecolums__item-icon" width="17"
                                                        height="17" viewbox="0 0 17 17">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.05155 3.89092C9.05155 3.89092 13.4516 7.67353 13.9404 8.02136C14.4293 8.41266 14.0738 9.02136 14.0738 9.02136C14.0738 9.02136 9.76267 12.8474 9.00711 13.2822C8.296 13.717 8.16267 12.8909 8.16267 12.8909L8.16267 10.804L2.82933 10.804C2.56267 10.804 2.38489 10.6301 2.38489 10.3692L2.38489 6.89092C2.38489 6.63005 2.56267 6.45614 2.82933 6.45614L8.16267 6.45614L8.16267 4.41266C8.16267 3.36918 9.05155 3.89092 9.05155 3.89092Z">
                                                        </path>
                                                    </svg>
                                                    <div tooltip="Количество просмотров страницы компании" flow="right"
                                                        class="company-block-linecolums__item-value">0</div>
                                                    <span class="company-block-linecolums__item-text">Заявок</span>
                                                </div>
                                            </div>
                                            <!-- /.company-block-linecolums -->
                                            <div class="company-block-colums">
                                                <div class="company-block-colums__contact-blocks">
                                                    <div class="company-block-colums__contact-block">
                                                        <svg class="company-block-colums__contact-block__icon"
                                                            viewbox="0 0 350 350"
                                                            style="enable-background:new 0 0 350 350;"
                                                            xml:space="preserve">
                                                            <g>
                                                                <path
                                                                    d="M175,171.173c38.914,0,70.463-38.318,70.463-85.586C245.463,38.318,235.105,0,175,0s-70.465,38.318-70.465,85.587   C104.535,132.855,136.084,171.173,175,171.173z" />
                                                                <path
                                                                    d="M41.909,301.853C41.897,298.971,41.885,301.041,41.909,301.853L41.909,301.853z" />
                                                                <path
                                                                    d="M308.085,304.104C308.123,303.315,308.098,298.63,308.085,304.104L308.085,304.104z" />
                                                                <path
                                                                    d="M307.935,298.397c-1.305-82.342-12.059-105.805-94.352-120.657c0,0-11.584,14.761-38.584,14.761   s-38.586-14.761-38.586-14.761c-81.395,14.69-92.803,37.805-94.303,117.982c-0.123,6.547-0.18,6.891-0.202,6.131   c0.005,1.424,0.011,4.058,0.011,8.651c0,0,19.592,39.496,133.08,39.496c113.486,0,133.08-39.496,133.08-39.496   c0-2.951,0.002-5.003,0.005-6.399C308.062,304.575,308.018,303.664,307.935,298.397z" />
                                                            </g>
                                                        </svg>
                                                        <svg class="company-block-colums__contact-block__separator"
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewbox="0 0 42 42" style="enable-background:new 0 0 42 42;"
                                                            xml:space="preserve">
                                                            <rect y="19" width="42" height="4" />
                                                        </svg>
                                                        
                                                        <!-- Владелец -->
                                                        <span class="company-block-colums__contact-block__text">
                                                        	{{ $first->contact_person ?? "" }}
                                                        </span>
                                                    </div>
                                                    <div class="company-block-colums__contact-block">
                                                        <svg class="company-block-colums__contact-block__icon"
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewbox="0 0 348.077 348.077" xml:space="preserve">
                                                            <path
                                                                d="M340.273,275.083l-53.755-53.761c-10.707-10.664-28.438-10.34-39.518,0.744l-27.082,27.076
                                                                        c-1.711-0.943-3.482-1.928-5.344-2.973c-17.102-9.476-40.509-22.464-65.14-47.113c-24.704-24.701-37.704-48.144-47.209-65.257
                                                                        c-1.003-1.813-1.964-3.561-2.913-5.221l18.176-18.149l8.936-8.947c11.097-11.1,11.403-28.826,0.721-39.521L73.39,8.194
                                                                        C62.708-2.486,44.969-2.162,33.872,8.938l-15.15,15.237l0.414,0.411c-5.08,6.482-9.325,13.958-12.484,22.02
                                                                        C3.74,54.28,1.927,61.603,1.098,68.941C-6,127.785,20.89,181.564,93.866,254.541c100.875,100.868,182.167,93.248,185.674,92.876
                                                                        c7.638-0.913,14.958-2.738,22.397-5.627c7.992-3.122,15.463-7.361,21.941-12.43l0.331,0.294l15.348-15.029
                                                                        C350.631,303.527,350.95,285.795,340.273,275.083z" />


                                                        </svg>


                                                        <svg class="company-block-colums__contact-block__separator"
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewbox="0 0 42 42" style="enable-background:new 0 0 42 42;"
                                                            xml:space="preserve">
                                                            <rect y="19" width="42" height="4" />
                                                        </svg>
                                                        
                                                        <!-- Телефон -->
                                                        <span class="company-block-colums__contact-block__text">
                                                        	@if(!is_null($first))+@endif
                                                            {{ $first->contact_phone ?? "" }}
                                                        </span>
                                                    </div>
                                                    <div class="company-block-colums__contact-block">
                                                        <svg class="company-block-colums__contact-block__icon" x="0px"
                                                            y="0px" viewbox="0 0 430.114 430.114" xml:space="preserve">

                                                            <path id="Facebook_Places"
                                                                d="M356.208,107.051c-1.531-5.738-4.64-11.852-6.94-17.205C321.746,23.704,261.611,0,213.055,0
                                                                   C148.054,0,76.463,43.586,66.905,133.427v18.355c0,0.766,0.264,7.647,0.639,11.089c5.358,42.816,39.143,88.32,64.375,131.136
                                                                   c27.146,45.873,55.314,90.999,83.221,136.106c17.208-29.436,34.354-59.259,51.17-87.933c4.583-8.415,9.903-16.825,14.491-24.857
                                                                   c3.058-5.348,8.9-10.696,11.569-15.672c27.145-49.699,70.838-99.782,70.838-149.104v-20.262
                                                                   C363.209,126.938,356.581,108.204,356.208,107.051z M214.245,199.193c-19.107,0-40.021-9.554-50.344-35.939
                                                                   c-1.538-4.2-1.414-12.617-1.414-13.388v-11.852c0-33.636,28.56-48.932,53.406-48.932c30.588,0,54.245,24.472,54.245,55.06
                                                                   C270.138,174.729,244.833,199.193,214.245,199.193z" />

                                                        </svg>

                                                        <svg class="company-block-colums__contact-block__separator"
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewbox="0 0 42 42" style="enable-background:new 0 0 42 42;"
                                                            xml:space="preserve">
                                                            <rect y="19" width="42" height="4" />
                                                        </svg>
                                                        
                                                        <!-- Адрес -->
                                                        <span class="company-block-colums__contact-block__text">
                                                        	{{ $first->fact_addr ?? "" }}
                                                        </span>
                                                    </div>
                                                    <div class="company-block-colums__contact-block">
                                                        <svg class="company-block-colums__contact-block__icon"
                                                            viewbox="-1 0 384 384">
                                                            <path
                                                                d="m359.28125 99.175781-1.832031-3.175781c-33.25-57.328125-95.257813-96-166.167969-96-70.914062 0-132.921875 38.671875-166.167969 96l-1.832031 3.175781c-12.824219 23.121094-20.984375 49.152344-23.28125 76.824219v32c2.296875 27.671875 10.457031 53.703125 23.28125 76.816406l1.832031 3.183594c33.246094 57.328125 95.253907 96 166.167969 96 70.910156 0 132.917969-38.671875 166.167969-96l1.832031-3.183594c12.824219-23.121094 20.984375-49.144531 23.277344-76.816406v-32c-2.292969-27.671875-10.453125-53.703125-23.277344-76.824219zm-72.328125 76.824219c-.632813-16.808594-2.25-32.878906-4.761719-48h55.632813c6.558593 14.960938 10.953125 31.078125 12.640625 48zm-95.671875 176c-18.089844 0-37.410156-24.648438-50.042969-64h100.089844c-12.640625 39.351562-31.960937 64-50.046875 64zm-58.167969-96c-2.816406-14.824219-4.722656-30.9375-5.464843-48h127.261718c-.742187 17.0625-2.644531 33.175781-5.460937 48zm-5.464843-80c.742187-17.0625 2.648437-33.175781 5.464843-48h116.335938c2.816406 14.824219 4.71875 30.9375 5.460937 48zm63.632812-144c18.085938 0 37.40625 24.65625 50.039062 64h-100.082031c12.632813-39.34375 31.953125-64 50.042969-64zm127.695312 64h-43.769531c-5.398437-19.519531-12.445312-36.71875-20.824219-50.984375 25.753907 11.105469 47.914063 28.855469 64.59375 50.984375zm-190.792968-50.984375c-8.382813 14.265625-15.429688 31.464844-20.832032 50.984375h-43.765624c16.679687-22.128906 38.839843-39.878906 64.597656-50.984375zm-83.449219 82.984375h55.632813c-2.503907 15.121094-4.128907 31.191406-4.757813 48h-63.519531c1.6875-16.921875 6.078125-33.039062 12.644531-48zm50.875 80c.628906 16.808594 2.246094 32.878906 4.757813 48h-55.632813c-6.558594-14.960938-10.949219-31.078125-12.636719-48zm-32.023437 80h43.765624c5.402344 19.519531 12.449219 36.71875 20.824219 50.984375-25.75-11.105469-47.910156-28.855469-64.589843-50.984375zm190.789062 50.984375c8.386719-14.265625 15.433594-31.464844 20.824219-50.984375h43.769531c-16.671875 22.128906-38.832031 39.878906-64.59375 50.984375zm83.457031-82.984375h-55.632812c2.503906-15.121094 4.128906-31.191406 4.761719-48h63.519531c-1.695313 16.921875-6.089844 33.039062-12.648438 48zm0 0" />
                                                        </svg>

                                                        <svg class="company-block-colums__contact-block__separator"
                                                            version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewbox="0 0 42 42" style="enable-background:new 0 0 42 42;"
                                                            xml:space="preserve">
                                                            <rect y="19" width="42" height="4" />
                                                        </svg>
                                                        
                                                        <!-- Сайт -->
                                                        <span class="company-block-colums__contact-block__text">
                                                        	<a href="{{ $first->site_url ?? "" }}" target="_blank">{{ $first->site_url ?? "" }}</a>
                                                        </span>
                                                    </div>
                                                    
                                                    <div class="company-block-colums__contact-block mt15">
                                                    
                                                        <!-- Блок vk -->
                                                        <a href="https://{{ $first->social_vkontakte ?? "" }}" target="_blank"
                                                            class="company-block-colums__contact-block__icon-vk"><svg
                                                                viewbox="0 0 485 485">
                                                                <path
                                                                    d="m144.753906 275.964844c12.160156 16.476562 26.132813 31.046875 44.183594 41.355468 20.441406 11.683594 42.449219 15.207032 65.660156 14.132813 10.84375-.519531 14.105469-3.347656 14.605469-14.152344.335937-7.402343 1.191406-14.785156 4.835937-21.4375 3.582032-6.523437 9.015626-7.757812 15.285157-3.699219 3.121093 2.050782 5.75 4.617188 8.238281 7.363282 6.109375 6.667968 12.023438 13.574218 18.351562 20.023437 7.957032 8.101563 17.394532 12.875 29.234376 11.902344l45.875.019531c7.382812-.5 11.222656-9.550781 6.984374-17.816406-2.984374-5.769531-6.902343-10.902344-11.042968-15.882812-9.375-11.261719-20.421875-20.859376-30.867188-31.046876-9.414062-9.191406-10.011718-14.527343-2.449218-25.132812 8.277343-11.585938 17.152343-22.710938 25.492187-34.234375 7.78125-10.765625 15.765625-21.515625 19.839844-34.390625 2.609375-8.21875.300781-11.839844-8.09375-13.292969-1.453125-.238281-2.964844-.238281-4.4375-.238281l-49.917969-.0625c-6.148438-.097656-9.53125 2.589844-11.703125 8.039062-2.945313 7.367188-5.96875 14.730469-9.476563 21.816407-7.917968 16.121093-16.777343 31.703125-29.195312 44.878906-2.746094 2.902344-5.792969 6.585937-10.367188 5.074219-5.710937-2.089844-7.402343-11.519532-7.304687-14.703125l-.042969-57.621094c-1.109375-8.214844-2.945312-11.898437-11.121094-13.496094h-51.847656c-6.902344 0-10.386718 2.691407-14.089844 7.007813-2.109374 2.511718-2.769531 4.121094 1.613282 4.957031 8.59375 1.628906 13.472656 7.203125 14.746094 15.824219 2.050781 13.792968 1.910156 27.640625.71875 41.472656-.339844 4.039062-1.035157 8.0625-2.632813 11.84375-2.503906 5.949219-6.566406 7.144531-11.878906 3.484375-4.792969-3.304687-8.175781-7.960937-11.503907-12.636719-12.4375-17.578125-22.347656-36.519531-30.449218-56.425781-2.328125-5.753906-6.367188-9.234375-12.457032-9.335937-14.96875-.238282-29.953124-.273438-44.941406.019531-8.996094.160156-11.683594 4.539062-8 12.71875 16.300782 36.28125 34.453125 71.546875 58.15625 103.671875zm0 0" />
                                                                <path
                                                                    d="m0 0v485h485v-485zm455 455h-425v-425h425zm0 0" />
                                                            </svg></a>
                                                            
                                                        <!-- Блок twitter -->
                                                        <a href="https://{{ $first->social_facebook ?? "" }}" target="_blank"
                                                            class="company-block-colums__contact-block__icon-twitter"><svg
                                                                viewbox="0 0 485 485">
                                                                <path
                                                                    d="m85 341.457031c28.597656 18.339844 62.566406 29.039063 99.066406 29.039063 118.871094 0 183.871094-98.472656 183.871094-183.878906 0-2.796876-.0625-5.585938-.183594-8.359376 12.628906-9.109374 23.582032-20.492187 32.246094-33.453124-11.589844 5.140624-24.042969 8.617187-37.117188 10.179687 13.34375-8 23.589844-20.664063 28.414063-35.753906-12.488281 7.402343-26.316406 12.785156-41.035156 15.679687-11.789063-12.558594-28.585938-20.40625-47.175781-20.40625-35.6875 0-64.625 28.9375-64.625 64.625 0 5.0625.574218 9.996094 1.675781 14.726563-53.707031-2.695313-101.328125-28.421875-133.203125-67.523438-5.5625 9.546875-8.75 20.644531-8.75 32.492188 0 22.417969 11.40625 42.199219 28.75 53.789062-10.597656-.335937-20.5625-3.246093-29.273438-8.085937-.003906.273437-.003906.542968-.003906.816406 0 31.308594 22.277344 57.429688 51.839844 63.367188-5.421875 1.472656-11.132813 2.269531-17.027344 2.269531-4.164062 0-8.210938-.40625-12.160156-1.164063 8.222656 25.675782 32.09375 44.359375 60.371094 44.878906-22.117188 17.335938-49.984376 27.667969-80.261719 27.667969-5.21875 0-10.363281-.304687-15.417969-.90625zm0 0" />
                                                                <path
                                                                    d="m0 0v485h485v-485zm455 455h-425v-425h425zm0 0" />
                                                            </svg></a>
                                                            
                                                        <!-- Блок instagram -->
                                                        <a href="https://{{ $first->social_instagram ?? "" }}" target="_blank"
                                                            class="company-block-colums__contact-block__icon-instagram"><svg
                                                                viewbox="0 0 388 388">
                                                                <path
                                                                    d="m0 0v388h388v-388zm364 364h-340v-340h340zm0 0" />
                                                                <path
                                                                    d="m256.425781 68.035156h-124.847656c-35.050781 0-63.5625 28.515625-63.5625 63.5625v124.847656c0 35.050782 28.511719 63.558594 63.5625 63.558594h124.847656c35.050781 0 63.558594-28.507812 63.558594-63.558594v-124.847656c0-35.046875-28.507813-63.5625-63.558594-63.5625zm36.140625 188.410156c0 19.929688-16.214844 36.144532-36.140625 36.144532h-124.847656c-19.925781 0-36.140625-16.214844-36.140625-36.144532v-124.847656c0-19.925781 16.214844-36.136718 36.140625-36.136718h124.847656c19.925781 0 36.140625 16.210937 36.140625 36.136718zm0 0" />
                                                                <path
                                                                    d="m260.980469 142.546875c-8.46875 0-15.359375-6.886719-15.359375-15.355469 0-8.464844 6.890625-15.351562 15.359375-15.351562s15.355469 6.886718 15.355469 15.351562c0 8.46875-6.886719 15.355469-15.355469 15.355469zm0 0" />
                                                                <path
                                                                    d="m193.996094 129.128906c-35.777344 0-64.890625 29.109375-64.890625 64.890625s29.113281 64.894531 64.890625 64.894531c35.785156 0 64.898437-29.113281 64.898437-64.894531 0-35.777343-29.113281-64.890625-64.898437-64.890625zm0 102.371094c-20.652344 0-37.472656-16.816406-37.472656-37.480469 0-20.65625 16.820312-37.464843 37.472656-37.464843 20.664062 0 37.472656 16.808593 37.472656 37.464843 0 20.664063-16.808594 37.480469-37.472656 37.480469zm0 0" />
                                                            </svg></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.company-block-colums -->
                                            <div class="company-block-dropdown">
                                                <ul class="company-block-dropdown__ul">
                                                    <li class="company-block-dropdown__li">
                                                        <input type="checkbox" checked>
                                                        <i></i>
                                                        <span class="company-block-dropdown__li-title">Подробнее об организации</span>
                                                        <div class="company-block-dropdown__li-item">
                                                            <div class="company-block-dropdown__list-item__info">
                                                                <span
                                                                    class="company-block-dropdown__list-item__info-title">Специализация:</span>
                                                                <span
                                                                    class="company-block-dropdown__list-item__info-text">{{ $first->specialization ?? "" }}</span>
                                                                <div
                                                                    class="company-block-dropdown__list-item__info-teg">
                                                                    <span
                                                                        class="company-block-dropdown__list-item__info-title">Теги #</span>
                                                                    <span
                                                                        class="company-block-dropdown__list-item__info-text">{{ $first->tags ?? "" }}</span>
                                                                </div>
                                                                <div
                                                                    class="company-block-dropdown__list-item__info-rating">
                                                                    <span
                                                                        class="company-block-dropdown__list-item__info-rating-title">Общая оценка</span>
                                                                    <div
                                                                        class="company-block-dropdown__list-item__info-rating-info">
                                                                        <div
                                                                            class="company-block-dropdown__list-item__info-rating-info__items">
                                                                            <svg class="company-block-dropdown__list-item__info-rating-info__items-icon"
                                                                                viewbox="0 0 152 152">
                                                                                <circle stroke="#FDD323"
                                                                                    stroke-dasharray="389.55748904513433 389.55748904513433"
                                                                                    stroke-width="7" fill="transparent"
                                                                                    r="62" cx="76" cy="76"
                                                                                    style="stroke-dashoffset: 0;">
                                                                                </circle> <text x="50%" y="62%"
                                                                                    text-anchor="middle"
                                                                                    style="font-size: 50px;">
                                                                                    5
                                                                                </text>
                                                                            </svg></div>
                                                                        <div
                                                                            class="company-block-dropdown__list-item__info-rating-info__items">
                                                                            <div
                                                                                class="company-block-dropdown__list-item__info-rating-info__item">
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-numeral">
                                                                                    5
                                                                                </div>
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-svg">
                                                                                    <svg width="18" height="18"
                                                                                        viewbox="0 0 18 18" fill="none">
                                                                                        <path
                                                                                            d="M8.1164 0.632879C8.42914 -0.21096 9.57086 -0.210959 9.8836 0.632879L11.5815 5.21418C11.716 5.57696 12.041 5.8239 12.4125 5.84552L17.1035 6.11853C17.9676 6.16881 18.3204 7.30435 17.6496 7.87615L14.0079 10.9806C13.7195 11.2264 13.5954 11.6259 13.6905 12.0021L14.8919 16.7521C15.1131 17.627 14.1895 18.3288 13.4622 17.8384L9.51355 15.1757C9.20087 14.9649 8.79913 14.9649 8.48645 15.1757L4.53784 17.8384C3.81053 18.3288 2.88686 17.627 3.10814 16.7521L4.30948 12.0021C4.40462 11.6259 4.28047 11.2264 3.99209 10.9806L0.35037 7.87615C-0.320405 7.30435 0.0324075 6.16881 0.896467 6.11853L5.58755 5.84552C5.95903 5.8239 6.28404 5.57696 6.4185 5.21418L8.1164 0.632879Z"
                                                                                            fill="#FDD323" />
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-line">
                                                                                    <svg version="1.1"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        x="0px" y="0px"
                                                                                        viewbox="0 0 42 42"
                                                                                        style="enable-background:new 0 0 42 42;"
                                                                                        xml:space="preserve">
                                                                                        <rect y="19" width="42"
                                                                                            height="4"></rect>
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-text">
                                                                                    8 отзывов
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="company-block-dropdown__list-item__info-rating-info__item">
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-numeral">
                                                                                    4
                                                                                </div>
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-svg">
                                                                                    <svg width="18" height="18"
                                                                                        viewbox="0 0 18 18" fill="none">
                                                                                        <path
                                                                                            d="M8.1164 0.632879C8.42914 -0.21096 9.57086 -0.210959 9.8836 0.632879L11.5815 5.21418C11.716 5.57696 12.041 5.8239 12.4125 5.84552L17.1035 6.11853C17.9676 6.16881 18.3204 7.30435 17.6496 7.87615L14.0079 10.9806C13.7195 11.2264 13.5954 11.6259 13.6905 12.0021L14.8919 16.7521C15.1131 17.627 14.1895 18.3288 13.4622 17.8384L9.51355 15.1757C9.20087 14.9649 8.79913 14.9649 8.48645 15.1757L4.53784 17.8384C3.81053 18.3288 2.88686 17.627 3.10814 16.7521L4.30948 12.0021C4.40462 11.6259 4.28047 11.2264 3.99209 10.9806L0.35037 7.87615C-0.320405 7.30435 0.0324075 6.16881 0.896467 6.11853L5.58755 5.84552C5.95903 5.8239 6.28404 5.57696 6.4185 5.21418L8.1164 0.632879Z"
                                                                                            fill="#FDD323" />
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-line">
                                                                                    <svg version="1.1"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        x="0px" y="0px"
                                                                                        viewbox="0 0 42 42"
                                                                                        style="enable-background:new 0 0 42 42;"
                                                                                        xml:space="preserve">
                                                                                        <rect y="19" width="42"
                                                                                            height="4"></rect>
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-text">
                                                                                    0 отзывов
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="company-block-dropdown__list-item__info-rating-info__item">
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-numeral">
                                                                                    3
                                                                                </div>
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-svg">
                                                                                    <svg width="18" height="18"
                                                                                        viewbox="0 0 18 18" fill="none">
                                                                                        <path
                                                                                            d="M8.1164 0.632879C8.42914 -0.21096 9.57086 -0.210959 9.8836 0.632879L11.5815 5.21418C11.716 5.57696 12.041 5.8239 12.4125 5.84552L17.1035 6.11853C17.9676 6.16881 18.3204 7.30435 17.6496 7.87615L14.0079 10.9806C13.7195 11.2264 13.5954 11.6259 13.6905 12.0021L14.8919 16.7521C15.1131 17.627 14.1895 18.3288 13.4622 17.8384L9.51355 15.1757C9.20087 14.9649 8.79913 14.9649 8.48645 15.1757L4.53784 17.8384C3.81053 18.3288 2.88686 17.627 3.10814 16.7521L4.30948 12.0021C4.40462 11.6259 4.28047 11.2264 3.99209 10.9806L0.35037 7.87615C-0.320405 7.30435 0.0324075 6.16881 0.896467 6.11853L5.58755 5.84552C5.95903 5.8239 6.28404 5.57696 6.4185 5.21418L8.1164 0.632879Z"
                                                                                            fill="#FDD323" />
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-line">
                                                                                    <svg version="1.1"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        x="0px" y="0px"
                                                                                        viewbox="0 0 42 42"
                                                                                        style="enable-background:new 0 0 42 42;"
                                                                                        xml:space="preserve">
                                                                                        <rect y="19" width="42"
                                                                                            height="4"></rect>
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-text">
                                                                                    8 отзывов
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="company-block-dropdown__list-item__info-rating-info__item">
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-numeral">
                                                                                    2
                                                                                </div>
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-svg">
                                                                                    <svg width="18" height="18"
                                                                                        viewbox="0 0 18 18" fill="none">
                                                                                        <path
                                                                                            d="M8.1164 0.632879C8.42914 -0.21096 9.57086 -0.210959 9.8836 0.632879L11.5815 5.21418C11.716 5.57696 12.041 5.8239 12.4125 5.84552L17.1035 6.11853C17.9676 6.16881 18.3204 7.30435 17.6496 7.87615L14.0079 10.9806C13.7195 11.2264 13.5954 11.6259 13.6905 12.0021L14.8919 16.7521C15.1131 17.627 14.1895 18.3288 13.4622 17.8384L9.51355 15.1757C9.20087 14.9649 8.79913 14.9649 8.48645 15.1757L4.53784 17.8384C3.81053 18.3288 2.88686 17.627 3.10814 16.7521L4.30948 12.0021C4.40462 11.6259 4.28047 11.2264 3.99209 10.9806L0.35037 7.87615C-0.320405 7.30435 0.0324075 6.16881 0.896467 6.11853L5.58755 5.84552C5.95903 5.8239 6.28404 5.57696 6.4185 5.21418L8.1164 0.632879Z"
                                                                                            fill="#FDD323" />
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-line">
                                                                                    <svg version="1.1"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        x="0px" y="0px"
                                                                                        viewbox="0 0 42 42"
                                                                                        style="enable-background:new 0 0 42 42;"
                                                                                        xml:space="preserve">
                                                                                        <rect y="19" width="42"
                                                                                            height="4"></rect>
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-text">
                                                                                    0 отзывов
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="company-block-dropdown__list-item__info-rating-info__item">
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-numeral">
                                                                                    1
                                                                                </div>
                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-svg">
                                                                                    <svg width="18" height="18"
                                                                                        viewbox="0 0 18 18" fill="none">
                                                                                        <path
                                                                                            d="M8.1164 0.632879C8.42914 -0.21096 9.57086 -0.210959 9.8836 0.632879L11.5815 5.21418C11.716 5.57696 12.041 5.8239 12.4125 5.84552L17.1035 6.11853C17.9676 6.16881 18.3204 7.30435 17.6496 7.87615L14.0079 10.9806C13.7195 11.2264 13.5954 11.6259 13.6905 12.0021L14.8919 16.7521C15.1131 17.627 14.1895 18.3288 13.4622 17.8384L9.51355 15.1757C9.20087 14.9649 8.79913 14.9649 8.48645 15.1757L4.53784 17.8384C3.81053 18.3288 2.88686 17.627 3.10814 16.7521L4.30948 12.0021C4.40462 11.6259 4.28047 11.2264 3.99209 10.9806L0.35037 7.87615C-0.320405 7.30435 0.0324075 6.16881 0.896467 6.11853L5.58755 5.84552C5.95903 5.8239 6.28404 5.57696 6.4185 5.21418L8.1164 0.632879Z"
                                                                                            fill="#FDD323" />
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-line">
                                                                                    <svg version="1.1"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        x="0px" y="0px"
                                                                                        viewbox="0 0 42 42"
                                                                                        style="enable-background:new 0 0 42 42;"
                                                                                        xml:space="preserve">
                                                                                        <rect y="19" width="42"
                                                                                            height="4"></rect>
                                                                                    </svg>
                                                                                </div>

                                                                                <div
                                                                                    class="company-block-dropdown__list-item__info-rating-info__item-text">
                                                                                    0 отзывов
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button
                                                                        class="company-block-dropdowm__list-item__info-rating__button-leave">
                                                                        Оставить отзыв
                                                                    </button><button
                                                                        class="company-block-dropdowm__list-item__info-rating__button-still">Смотреть все</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>
                                            <!-- /.company-bloack-dropdown -->
                                            <div class="company-block-colums">
                                                <button class="company-block-colums__item">
                                                    <div class="company-block-colums__item-block">
                                                        <svg class="company-block-colums__item-icon" x="0px" y="0px"
                                                            viewbox="0 0 487.23 487.23" xml:space="preserve">

                                                            <path
                                                                d="M55.323,203.641c15.664,0,29.813-9.405,35.872-23.854c25.017-59.604,83.842-101.61,152.42-101.61
                                                               c37.797,0,72.449,12.955,100.23,34.442l-21.775,3.371c-7.438,1.153-13.224,7.054-14.232,14.512
                                                               c-1.01,7.454,3.008,14.686,9.867,17.768l119.746,53.872c5.249,2.357,11.33,1.904,16.168-1.205
                                                               c4.83-3.114,7.764-8.458,7.796-14.208l0.621-131.943c0.042-7.506-4.851-14.144-12.024-16.332
                                                               c-7.185-2.188-14.947,0.589-19.104,6.837l-16.505,24.805C370.398,26.778,310.1,0,243.615,0C142.806,0,56.133,61.562,19.167,149.06
                                                               c-5.134,12.128-3.84,26.015,3.429,36.987C29.865,197.023,42.152,203.641,55.323,203.641z" />
                                                            <path d="M464.635,301.184c-7.27-10.977-19.558-17.594-32.728-17.594c-15.664,0-29.813,9.405-35.872,23.854
                                                               c-25.018,59.604-83.843,101.61-152.42,101.61c-37.798,0-72.45-12.955-100.232-34.442l21.776-3.369
                                                               c7.437-1.153,13.223-7.055,14.233-14.514c1.009-7.453-3.008-14.686-9.867-17.768L49.779,285.089
                                                               c-5.25-2.356-11.33-1.905-16.169,1.205c-4.829,3.114-7.764,8.458-7.795,14.207l-0.622,131.943
                                                               c-0.042,7.506,4.85,14.144,12.024,16.332c7.185,2.188,14.948-0.59,19.104-6.839l16.505-24.805
                                                               c44.004,43.32,104.303,70.098,170.788,70.098c100.811,0,187.481-61.561,224.446-149.059
                                                               C473.197,326.043,471.903,312.157,464.635,301.184z" />
                                                        </svg>
                                                        <span class="company-block-coluns__item-text">Заключить сделку</span>
                                                    </div>
                                                </button> <!-- /.company-block-colums__item -->
                                                <button class="company-block-colums__item">
                                                    <div class="company-block-colums__item-block">
                                                        <svg class="company-block-colums__item-icon" x="0px" y="0px"
                                                            viewbox="0 0 511.626 511.626" xml:space="preserve">

                                                            <path
                                                                d="M49.106,178.729c6.472,4.567,25.981,18.131,58.528,40.685c32.548,22.554,57.482,39.92,74.803,52.099
                                                                       c1.903,1.335,5.946,4.237,12.131,8.71c6.186,4.476,11.326,8.093,15.416,10.852c4.093,2.758,9.041,5.852,14.849,9.277
                                                                       c5.806,3.422,11.279,5.996,16.418,7.7c5.14,1.718,9.898,2.569,14.275,2.569h0.287h0.288c4.377,0,9.137-0.852,14.277-2.569
                                                                       c5.137-1.704,10.615-4.281,16.416-7.7c5.804-3.429,10.752-6.52,14.845-9.277c4.093-2.759,9.229-6.376,15.417-10.852
                                                                       c6.184-4.477,10.232-7.375,12.135-8.71c17.508-12.179,62.051-43.11,133.615-92.79c13.894-9.703,25.502-21.411,34.827-35.116
                                                                       c9.332-13.699,13.993-28.07,13.993-43.105c0-12.564-4.523-23.319-13.565-32.264c-9.041-8.947-19.749-13.418-32.117-13.418H45.679
                                                                       c-14.655,0-25.933,4.948-33.832,14.844C3.949,79.562,0,91.934,0,106.779c0,11.991,5.236,24.985,15.703,38.974
                                                                       C26.169,159.743,37.307,170.736,49.106,178.729z" />
                                                            <path
                                                                d="M483.072,209.275c-62.424,42.251-109.824,75.087-142.177,98.501c-10.849,7.991-19.65,14.229-26.409,18.699
                                                                       c-6.759,4.473-15.748,9.041-26.98,13.702c-11.228,4.668-21.692,6.995-31.401,6.995h-0.291h-0.287
                                                                       c-9.707,0-20.177-2.327-31.405-6.995c-11.228-4.661-20.223-9.229-26.98-13.702c-6.755-4.47-15.559-10.708-26.407-18.699
                                                                       c-25.697-18.842-72.995-51.68-141.896-98.501C17.987,202.047,8.375,193.762,0,184.437v226.685c0,12.57,4.471,23.319,13.418,32.265
                                                                       c8.945,8.949,19.701,13.422,32.264,13.422h420.266c12.56,0,23.315-4.473,32.261-13.422c8.949-8.949,13.418-19.694,13.418-32.265
                                                                       V184.437C503.441,193.569,493.927,201.854,483.072,209.275z" />

                                                        </svg>
                                                        <span class="company-block-coluns__item-text">Написать сообщение</span>
                                                    </div>
                                                </button> <!-- /.company-block-colums__item -->
                                                <button class="company-block-colums__item">
                                                    <div class="company-block-colums__item-block">
                                                        <svg class="company-block-colums__item-icon" x="0px" y="0px"
                                                            viewbox="0 0 512 512" xml:space="preserve">
                                                            <path
                                                                d="M507.494,426.066L282.864,53.537c-5.677-9.415-15.87-15.172-26.865-15.172c-10.995,0-21.188,5.756-26.865,15.172
                                                                           L4.506,426.066c-5.842,9.689-6.015,21.774-0.451,31.625c5.564,9.852,16.001,15.944,27.315,15.944h449.259
                                                                           c11.314,0,21.751-6.093,27.315-15.944C513.508,447.839,513.336,435.755,507.494,426.066z M256.167,167.227
                                                                           c12.901,0,23.817,7.278,23.817,20.178c0,39.363-4.631,95.929-4.631,135.292c0,10.255-11.247,14.554-19.186,14.554
                                                                           c-10.584,0-19.516-4.3-19.516-14.554c0-39.363-4.63-95.929-4.63-135.292C232.021,174.505,242.605,167.227,256.167,167.227z
                                                                            M256.498,411.018c-14.554,0-25.471-11.908-25.471-25.47c0-13.893,10.916-25.47,25.471-25.47c13.562,0,25.14,11.577,25.14,25.47
                                                                           C281.638,399.11,270.06,411.018,256.498,411.018z" />

                                                        </svg>
                                                        <span
                                                            class="company-block-coluns__item-text">Пожаловаться</span>
                                                    </div>
                                                </button> <!-- /.company-block-colums__item -->
                                            </div>
                                            <!-- /.company-bloack-colums -->
                                            <div class="company-block-dropdown">
                                                <ul class="company-block-dropdown__ul">
                                                    <li class="company-block-dropdown__li">
                                                        <input type="checkbox" checked>
                                                        <i></i>
                                                        <span class="company-block-dropdown__li-title">Категории</span>
                                                        <div class="company-block-dropdown__li-item">
                                                            <div class="company-block-dropdown__list-item__info">

                                                                <!-- начало -->
                                                                <ul class="company-block-dropdown__list-item__info__ul">
                                                                    <li
                                                                        class="company-block-dropdown__list-item__info__li">
                                                                        <input type="checkbox" checked>
                                                                        <!-- <i></i> -->
                                                                        <div
                                                                            class="company-block-dropdown__list-item__info__li-title">
                                                                            <svg class="company-block-dropdown__list-item__info__li-title__icon"
                                                                                x="0px" y="0px"
                                                                                viewbox="0 0 53.626 53.626"
                                                                                xml:space="preserve">

                                                                                <path style="fill:#010002;"
                                                                                    d="M48.831,15.334c-7.083-11.637-17.753-3.541-17.753-3.541c-0.692,0.523-1.968,0.953-2.835,0.955
                                                                                   l-2.858,0.002c-0.867,0.001-2.143-0.429-2.834-0.952c0,0-10.671-8.098-17.755,3.539C-2.286,26.97,0.568,39.639,0.568,39.639
                                                                                   c0.5,3.102,2.148,5.172,5.258,4.912c3.101-0.259,9.832-8.354,9.832-8.354c0.556-0.667,1.721-1.212,2.586-1.212l17.134-0.003
                                                                                   c0.866,0,2.03,0.545,2.585,1.212c0,0,6.732,8.095,9.838,8.354c3.106,0.26,4.758-1.812,5.255-4.912
                                                                                   C53.055,39.636,55.914,26.969,48.831,15.334z M20.374,24.806H16.7v3.541c0,0-0.778,0.594-1.982,0.579
                                                                                   c-1.202-0.018-1.746-0.648-1.746-0.648v-3.471h-3.47c0,0-0.433-0.444-0.549-1.613c-0.114-1.169,0.479-2.114,0.479-2.114h3.675
                                                                                   v-3.674c0,0,0.756-0.405,1.843-0.374c1.088,0.034,1.885,0.443,1.885,0.443l-0.015,3.604h3.47c0,0,0.606,0.778,0.656,1.718
                                                                                   C20.996,23.738,20.374,24.806,20.374,24.806z M37.226,28.842c-1.609,0-2.906-1.301-2.906-2.908c0-1.61,1.297-2.908,2.906-2.908
                                                                                   c1.602,0,2.909,1.298,2.909,2.908C40.135,27.542,38.828,28.842,37.226,28.842z M37.226,20.841c-1.609,0-2.906-1.3-2.906-2.907
                                                                                   c0-1.61,1.297-2.908,2.906-2.908c1.602,0,2.909,1.298,2.909,2.908C40.135,19.542,38.828,20.841,37.226,20.841z M44.468,25.136
                                                                                   c-1.609,0-2.906-1.3-2.906-2.908c0-1.609,1.297-2.908,2.906-2.908c1.602,0,2.909,1.299,2.909,2.908
                                                                                   C47.377,23.836,46.07,25.136,44.468,25.136z" />

                                                                            </svg>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-title__text">Досуг/Развлечения</span>
                                                                        </div>
                                                                        <!-- /.company-block-dropdown__list-item__info__li-title -->

                                                                        <div
                                                                            class="company-block-dropdown__list-item__info__li-item">
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <!-- конец -->
                                                                <!-- начало -->
                                                                <ul class="company-block-dropdown__list-item__info__ul">
                                                                    <li
                                                                        class="company-block-dropdown__list-item__info__li">
                                                                        <input type="checkbox" checked>
                                                                        <!-- <i></i> -->
                                                                        <div
                                                                            class="company-block-dropdown__list-item__info__li-title">
                                                                            <svg class="company-block-dropdown__list-item__info__li-title__icon"
                                                                                x="0px" y="0px"
                                                                                viewbox="0 0 53.626 53.626"
                                                                                xml:space="preserve">

                                                                                <path style="fill:#010002;"
                                                                                    d="M48.831,15.334c-7.083-11.637-17.753-3.541-17.753-3.541c-0.692,0.523-1.968,0.953-2.835,0.955
                                                                                       l-2.858,0.002c-0.867,0.001-2.143-0.429-2.834-0.952c0,0-10.671-8.098-17.755,3.539C-2.286,26.97,0.568,39.639,0.568,39.639
                                                                                       c0.5,3.102,2.148,5.172,5.258,4.912c3.101-0.259,9.832-8.354,9.832-8.354c0.556-0.667,1.721-1.212,2.586-1.212l17.134-0.003
                                                                                       c0.866,0,2.03,0.545,2.585,1.212c0,0,6.732,8.095,9.838,8.354c3.106,0.26,4.758-1.812,5.255-4.912
                                                                                       C53.055,39.636,55.914,26.969,48.831,15.334z M20.374,24.806H16.7v3.541c0,0-0.778,0.594-1.982,0.579
                                                                                       c-1.202-0.018-1.746-0.648-1.746-0.648v-3.471h-3.47c0,0-0.433-0.444-0.549-1.613c-0.114-1.169,0.479-2.114,0.479-2.114h3.675
                                                                                       v-3.674c0,0,0.756-0.405,1.843-0.374c1.088,0.034,1.885,0.443,1.885,0.443l-0.015,3.604h3.47c0,0,0.606,0.778,0.656,1.718
                                                                                       C20.996,23.738,20.374,24.806,20.374,24.806z M37.226,28.842c-1.609,0-2.906-1.301-2.906-2.908c0-1.61,1.297-2.908,2.906-2.908
                                                                                       c1.602,0,2.909,1.298,2.909,2.908C40.135,27.542,38.828,28.842,37.226,28.842z M37.226,20.841c-1.609,0-2.906-1.3-2.906-2.907
                                                                                       c0-1.61,1.297-2.908,2.906-2.908c1.602,0,2.909,1.298,2.909,2.908C40.135,19.542,38.828,20.841,37.226,20.841z M44.468,25.136
                                                                                       c-1.609,0-2.906-1.3-2.906-2.908c0-1.609,1.297-2.908,2.906-2.908c1.602,0,2.909,1.299,2.909,2.908
                                                                                       C47.377,23.836,46.07,25.136,44.468,25.136z" />

                                                                            </svg>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-title__text">Досуг/Развлечения</span>
                                                                        </div>
                                                                        <!-- /.company-block-dropdown__list-item__info__li-title -->

                                                                        <div
                                                                            class="company-block-dropdown__list-item__info__li-item">
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <!-- конец -->
                                                                <!-- начало -->
                                                                <ul class="company-block-dropdown__list-item__info__ul">
                                                                    <li
                                                                        class="company-block-dropdown__list-item__info__li">
                                                                        <input type="checkbox" checked>
                                                                        <!-- <i></i> -->
                                                                        <div
                                                                            class="company-block-dropdown__list-item__info__li-title">
                                                                            <svg class="company-block-dropdown__list-item__info__li-title__icon"
                                                                                x="0px" y="0px"
                                                                                viewbox="0 0 53.626 53.626"
                                                                                xml:space="preserve">

                                                                                <path style="fill:#010002;"
                                                                                    d="M48.831,15.334c-7.083-11.637-17.753-3.541-17.753-3.541c-0.692,0.523-1.968,0.953-2.835,0.955
                                                                                       l-2.858,0.002c-0.867,0.001-2.143-0.429-2.834-0.952c0,0-10.671-8.098-17.755,3.539C-2.286,26.97,0.568,39.639,0.568,39.639
                                                                                       c0.5,3.102,2.148,5.172,5.258,4.912c3.101-0.259,9.832-8.354,9.832-8.354c0.556-0.667,1.721-1.212,2.586-1.212l17.134-0.003
                                                                                       c0.866,0,2.03,0.545,2.585,1.212c0,0,6.732,8.095,9.838,8.354c3.106,0.26,4.758-1.812,5.255-4.912
                                                                                       C53.055,39.636,55.914,26.969,48.831,15.334z M20.374,24.806H16.7v3.541c0,0-0.778,0.594-1.982,0.579
                                                                                       c-1.202-0.018-1.746-0.648-1.746-0.648v-3.471h-3.47c0,0-0.433-0.444-0.549-1.613c-0.114-1.169,0.479-2.114,0.479-2.114h3.675
                                                                                       v-3.674c0,0,0.756-0.405,1.843-0.374c1.088,0.034,1.885,0.443,1.885,0.443l-0.015,3.604h3.47c0,0,0.606,0.778,0.656,1.718
                                                                                       C20.996,23.738,20.374,24.806,20.374,24.806z M37.226,28.842c-1.609,0-2.906-1.301-2.906-2.908c0-1.61,1.297-2.908,2.906-2.908
                                                                                       c1.602,0,2.909,1.298,2.909,2.908C40.135,27.542,38.828,28.842,37.226,28.842z M37.226,20.841c-1.609,0-2.906-1.3-2.906-2.907
                                                                                       c0-1.61,1.297-2.908,2.906-2.908c1.602,0,2.909,1.298,2.909,2.908C40.135,19.542,38.828,20.841,37.226,20.841z M44.468,25.136
                                                                                       c-1.609,0-2.906-1.3-2.906-2.908c0-1.609,1.297-2.908,2.906-2.908c1.602,0,2.909,1.299,2.909,2.908
                                                                                       C47.377,23.836,46.07,25.136,44.468,25.136z" />

                                                                            </svg>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-title__text">Досуг/Развлечения</span>
                                                                        </div>
                                                                        <!-- /.company-block-dropdown__list-item__info__li-title -->

                                                                        <div
                                                                            class="company-block-dropdown__list-item__info__li-item">
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <!-- конец -->
                                                                <!-- начало -->
                                                                <ul class="company-block-dropdown__list-item__info__ul">
                                                                    <li
                                                                        class="company-block-dropdown__list-item__info__li">
                                                                        <input type="checkbox" checked>
                                                                        <!-- <i></i> -->
                                                                        <div
                                                                            class="company-block-dropdown__list-item__info__li-title">
                                                                            <svg class="company-block-dropdown__list-item__info__li-title__icon"
                                                                                x="0px" y="0px"
                                                                                viewbox="0 0 53.626 53.626"
                                                                                xml:space="preserve">

                                                                                <path style="fill:#010002;"
                                                                                    d="M48.831,15.334c-7.083-11.637-17.753-3.541-17.753-3.541c-0.692,0.523-1.968,0.953-2.835,0.955
                                                                                       l-2.858,0.002c-0.867,0.001-2.143-0.429-2.834-0.952c0,0-10.671-8.098-17.755,3.539C-2.286,26.97,0.568,39.639,0.568,39.639
                                                                                       c0.5,3.102,2.148,5.172,5.258,4.912c3.101-0.259,9.832-8.354,9.832-8.354c0.556-0.667,1.721-1.212,2.586-1.212l17.134-0.003
                                                                                       c0.866,0,2.03,0.545,2.585,1.212c0,0,6.732,8.095,9.838,8.354c3.106,0.26,4.758-1.812,5.255-4.912
                                                                                       C53.055,39.636,55.914,26.969,48.831,15.334z M20.374,24.806H16.7v3.541c0,0-0.778,0.594-1.982,0.579
                                                                                       c-1.202-0.018-1.746-0.648-1.746-0.648v-3.471h-3.47c0,0-0.433-0.444-0.549-1.613c-0.114-1.169,0.479-2.114,0.479-2.114h3.675
                                                                                       v-3.674c0,0,0.756-0.405,1.843-0.374c1.088,0.034,1.885,0.443,1.885,0.443l-0.015,3.604h3.47c0,0,0.606,0.778,0.656,1.718
                                                                                       C20.996,23.738,20.374,24.806,20.374,24.806z M37.226,28.842c-1.609,0-2.906-1.301-2.906-2.908c0-1.61,1.297-2.908,2.906-2.908
                                                                                       c1.602,0,2.909,1.298,2.909,2.908C40.135,27.542,38.828,28.842,37.226,28.842z M37.226,20.841c-1.609,0-2.906-1.3-2.906-2.907
                                                                                       c0-1.61,1.297-2.908,2.906-2.908c1.602,0,2.909,1.298,2.909,2.908C40.135,19.542,38.828,20.841,37.226,20.841z M44.468,25.136
                                                                                       c-1.609,0-2.906-1.3-2.906-2.908c0-1.609,1.297-2.908,2.906-2.908c1.602,0,2.909,1.299,2.909,2.908
                                                                                       C47.377,23.836,46.07,25.136,44.468,25.136z" />

                                                                            </svg>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-title__text">Досуг/Развлечения</span>
                                                                        </div>
                                                                        <!-- /.company-block-dropdown__list-item__info__li-title -->

                                                                        <div
                                                                            class="company-block-dropdown__list-item__info__li-item">
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                            <span
                                                                                class="company-block-dropdown__list-item__info__li-item__text">Квесты</span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <!-- конец -->


                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.company-bloack-dropdown -->
                                            <div class="company-block-dropdown">
                                                <ul class="company-block-dropdown__ul">
                                                    <li class="company-block-dropdown__li">
                                                        <input type="checkbox" checked>
                                                        <i></i>
                                                        <span class="company-block-dropdown__li-title">Похожие
                                                            компании:</span>
                                                        <div class="company-block-dropdown__li-item">
                                                            <div class="company-block-dropdown__list-item__info">
                                                                <button
                                                                    class="company-block-dropdown__list-item__info__similar-companies">
                                                                    <div
                                                                        class="company-block-dropdown__list-item__info__similar-companies__logo">
                                                                        <img src="{{ asset('images/logo.png') }}" alt="">
                                                                    </div>
                                                                    <span
                                                                        class="company-block-dropdown__list-item__info__similar-companies__text">
                                                                        Интернет решение
                                                                    </span>
                                                                </button>
                                                                <!-- /.company-block-dropdown__list-item__info__similar-companies -->
                                                                <button
                                                                    class="company-block-dropdown__list-item__info__similar-companies">
                                                                    <div
                                                                        class="company-block-dropdown__list-item__info__similar-companies__logo">
                                                                        <img src="{{ asset('images/logo.png') }}" alt="">
                                                                    </div>
                                                                    <span
                                                                        class="company-block-dropdown__list-item__info__similar-companies__text">
                                                                        Интернет решение
                                                                    </span>
                                                                </button>
                                                                <!-- /.company-block-dropdown__list-item__info__similar-companies -->
                                                                <button
                                                                    class="company-block-dropdown__list-item__info__similar-companies">
                                                                    <div
                                                                        class="company-block-dropdown__list-item__info__similar-companies__logo">
                                                                        <img src="{{ asset('images/logo.png') }}" alt="">
                                                                    </div>
                                                                    <span
                                                                        class="company-block-dropdown__list-item__info__similar-companies__text">
                                                                        Интернет решение
                                                                    </span>
                                                                </button>
                                                                <!-- /.company-block-dropdown__list-item__info__similar-companies -->
                                                                <button
                                                                    class="company-block-dropdown__list-item__info__similar-companies">
                                                                    <div
                                                                        class="company-block-dropdown__list-item__info__similar-companies__logo">
                                                                        <img src="{{ asset('images/logo.png') }}" alt="">
                                                                    </div>
                                                                    <span
                                                                        class="company-block-dropdown__list-item__info__similar-companies__text">
                                                                        Интернет решение
                                                                    </span>
                                                                </button>
                                                                <!-- /.company-block-dropdown__list-item__info__similar-companies -->
                                                                <button
                                                                    class="company-block-dropdown__list-item__info__similar-companies">
                                                                    <div
                                                                        class="company-block-dropdown__list-item__info__similar-companies__logo">
                                                                        <img src="{{ asset('images/logo.png') }}" alt="">
                                                                    </div>
                                                                    <span
                                                                        class="company-block-dropdown__list-item__info__similar-companies__text">
                                                                        Интернет решение
                                                                    </span>
                                                                </button>
                                                                <!-- /.company-block-dropdown__list-item__info__similar-companies -->
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.company-bloack-dropdown -->
                                        </div>
                                        <!-- конец -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-panel-view__loading-indicator">
                    <div class="sidebar-panel-view__loading-text">Загрузка...</div>
                </div>
            </div>
            <div class="sidebar-dropdown-container"></div>
        </div>
        <!-- _collapsed добавить -->
        <div class="sidebar-toggle-button "><span class="sidebar-toggle-button__icon"
                style="font-size: 0px; line-height: 0;"><svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 4.62v6.756c0 .287-.105.575-.314.795-.418.44-1.097.44-1.515 0L4.886 8.797a1.165 1.165 0 0 1 0-1.59L9.17 3.83c.42-.44 1.098-.44 1.516 0 .208.218.312.504.314.79z"
                        fill="currentColor"></path>
                </svg></span></div>
    </div>
</body>
<script src="{{ asset('js/panel.js') }}"></script>
<script>
    function init() {
        myMap = new ymaps.Map('map', {
            center: [54.74051563346905,55.95903507582377],
            zoom: 11,
            controls: ['zoomControl']
        }),
        // Создаем коллекцию.
        myCollection = new ymaps.GeoObjectCollection(null, {
            // Запретим появление балуна.
            hasBalloon: false,
            iconColor: '#3b5998'
        }),
        panel = new ymaps.Panel(),
        // Создаем массив с данными.
        myPoints = [
        	@foreach ($organizations as $organization)
            {
                coords: [{{ $organization->getPoint() ?? "" }}],
                text: '{!! htmlentities($organization->getComment(), ENT_QUOTES, "UTF-8", false) ?? "" !!}',
                hintContent: 'Улица Адмирала Макарова'
            },
            @endforeach
        ];
    
    myMap.controls.add(panel, {
        float: 'left'
    });   
    
    // Заполняем коллекцию данными.
    for (var i = 0, l = myPoints.length; i < l; i++) {
        var point = myPoints[i];
        let pl = new ymaps.Placemark(
            point.coords, { balloonContent: point['text'] }
        );
        myCollection.add(pl);
    }
    
    // Добавляем коллекцию меток на карту.
    myMap.geoObjects.add(myCollection);
    
    // Подпишемся на событие клика по коллекции.
    myCollection.events.add('click', function (e) {
        // Получим ссылку на геообъект, по которому кликнул пользователь.
        var target = e.get('target');
        // Зададим контент боковой панели.
        panel.setContent(target.properties.get('balloonContent'));
        // Переместим центр карты по координатам метки с учётом заданных отступов.
        //map.panTo(target.geometry.getCoordinates(), {useMapMargin: true});
    });
    
    // Создаем экземпляр класса ymaps.control.SearchControl
    var mySearchControl = new ymaps.control.SearchControl({
        options: {
            // Заменяем стандартный провайдер данных (геокодер) нашим собственным.
            provider: new CustomSearchProvider(myPoints),
            // Не будем показывать еще одну метку при выборе результата поиска,
            // т.к. метки коллекции myCollection уже добавлены на карту.
            noPlacemark: true,
            resultsPerPage: 5
        }
    });
    
    // Добавляем контрол в верхний правый угол,
    myMap.controls
        .add(mySearchControl, {
            float: 'left'
        }); 
    
    // Результаты поиска будем помещать в коллекцию.
    mySearchResults = new ymaps.GeoObjectCollection(null, {
        hintContentLayout: ymaps.templateLayoutFactory.createClass('$[properties.name]')
    });
    myMap.controls.add(mySearchControl);
    myMap.geoObjects.add(mySearchResults);
    // При клике по найденному объекту метка становится красной.
    mySearchResults.events.add('click', function (e) {
        e.get('target').options.set('preset', 'islands#redIcon');
    });
    // Выбранный результат помещаем в коллекцию.
    mySearchControl.events.add('resultselect', function (e) {
        var index = e.get('index');
        mySearchControl.getResult(index).then(function (res) {
            mySearchResults.add(res);
        });
    }).add('submit', function () {
        mySearchResults.removeAll();
    });
    }
    
    
    //Провайдер данных для элемента управления ymaps.control.SearchControl.
    //Осуществляет поиск геообъектов в по массиву points.
    //Реализует интерфейс IGeocodeProvider.
    function CustomSearchProvider(points) {
    this.points = points;
    }
    
    //Провайдер ищет по полю text стандартным методом String.ptototype.indexOf.
    CustomSearchProvider.prototype.geocode = function (request, options) {
    var deferred = new ymaps.vow.defer(),
        geoObjects = new ymaps.GeoObjectCollection(),
        // Сколько результатов нужно пропустить.
        offset = options.skip || 0,
        // Количество возвращаемых результатов.
        limit = options.results || 20;
    
    var points = [];
    // Ищем в свойстве text каждого элемента массива.
    for (var i = 0, l = this.points.length; i < l; i++) {
        var point = this.points[i];
        if (point.text.toLowerCase().indexOf(request.toLowerCase()) != -1) {
            points.push(point);
        }
    }
    // При формировании ответа можно учитывать offset и limit.
    points = points.splice(offset, limit);
    // Добавляем точки в результирующую коллекцию.
    for (var i = 0, l = points.length; i < l; i++) {
        var point = points[i],
            coords = point.coords,
            text = point.text;
    
        geoObjects.add(new ymaps.Placemark(coords, {
            name: text + ' name',
            description: text + ' description',
            balloonContentBody: '<p>' + text + '</p>',
            boundedBy: [coords, coords]
        }));
    }
    
    deferred.resolve({
        // Геообъекты поисковой выдачи.
        geoObjects: geoObjects,
        // Метаинформация ответа.
        metaData: {
            geocoder: {
                // Строка обработанного запроса.
                request: request,
                // Количество найденных результатов.
                found: geoObjects.getLength(),
                // Количество возвращенных результатов.
                results: limit,
                // Количество пропущенных результатов.
                skip: offset
            }
        }
    });
    
    // Возвращаем объект-обещание.
    return deferred.promise();
    };
    
    ymaps.ready(['Panel']).then(function () {
    init();
    });
</script>
<!-- <script src="{{ asset('js/sidebar.js') }}"></script> -->
<!-- <script src="{{ asset('js/test.js') }}"></script> -->
<script>
    $(document).ready(function () {
        $('.sidebar-toggle-button').on('click', function () {
            $(this).toggleClass('_collapsed');
            $('.sidebar-view').toggleClass('_collapsed');
        });
    });
</script>

</html>