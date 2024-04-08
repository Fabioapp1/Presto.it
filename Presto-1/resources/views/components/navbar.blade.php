<nav class="navbar navbar-expand-lg bg-white fixed-top">

    <div class="container-fluid justify-content-between">

        <div class="d-flex justify-content-between m-auto">
            {{-- inizio menu lingua versione smartphone --}} 

        <div class="smartphone-only text-center m-auto">
            <ul class="nav-item m-auto">
                @php
                    $langLocal = session('locale', 'en');
                @endphp
    
                <li class="nav-item dropdown list-unstyled">
                    <a class="nav-link dropdown-toggle z-5 position-relative" href="#" id="flagDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span><img src="{{ asset('vendor/blade-flags/language-' . $langLocal . '.svg') }}"
                                width="25" height="25" /></span>
                    </a>

                    <ul class="dropdown-menu list-inline-item " aria-labelledby="flagDropdown">
                        <li class="p-1"><x-_locale lang="it" /> </li>
                        <li class="p-1"><x-_locale lang="en" /></li>
                        <li class="p-1"><x-_locale lang="nl" /></li>
                    </ul>
                </li>
            </ul>
        </div>
        {{-- fine menu lingua versione smartphone --}}

        {{-- inizio link revisore e creazione annuncio smartphone --}}

        <div class="smartphone-only text-center m-auto">
            <ul class="navbar-nav align-content-center mb-lg-0">

                @guest
                    @if (!Auth::user())
                        <li class="nav-item">
                            <a href="{{ route('announcements.create') }}"
                                class="btn text-danger mybtn-nav"><i class="bi bi-pencil-square i-size"></i></a>
                        </li>
                    @endif
                @endguest

                @auth
                    @if (!Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a href="{{ route('announcements.create') }}"
                                class="btn text-danger mybtn-nav"><i class="bi bi-pencil-square i-size"></i></a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">

                            
                            <a href="{{ route('revisor.index') }}"
                                class="btn text-black mybtn-nav">
                                
                                <div class="container text-center">
                                    <div class="icon">
                                        <i class="bi bi-person-gear text-secondary i-size"></i>
                                        <span class=" translate-middle badge rounded-pill bg-danger">
                                            {{ App\Models\Announcement::toBeRevisionedCount() }}
                                            <span class="visually-hidden">{{ __('navbar.ureadMsg') }}</span>
                                        </span>
                                    </div>
                                  {{--   <div class="icon-user-text">{{ __('navbar.reviewer') }}</div> --}}
                                </div>
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>

        {{-- fine link revisore e creazione annuncio smarpthone --}}


        </div>

        {{-- inizio logo versione mobile --}}
        <div class="m-auto">
            <div class="smartphone-only">
                <a class="text-decoration-none text-black" href="/">
                    <div class="d-flex justify-content-evenly">
                        <img class="logo-img mylogo-nav shadow-sm" src="{{ asset('img/prestologopiccolo.png') }}"
                            alt="">
                    </div>
                </a>
            </div>
        </div>

        {{-- fine logo versione mobile --}}

        <div class="d-flex justify-content-between m-auto">

            <div class="ms-2 me-2 my-auto">
                {{-- inizio bottone search smartphone --}}

                <button class="smartphone-only btn btn-accent btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-search"></span>
                </button>

                {{-- fine bottone search smartphone--}}
            </div>

            {{-- inizio user versione smartphone --}} 
            @auth
                <div class="navbar-nav smartphone-only text-center ms-2 me-2 my-auto">
                    
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle z-5" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-check-fill i-size"></i>
                        </a>
    
                        <ul class="dropdown-menu position-absolute force-right" aria-labelledby="userDropdown">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i
                                        class="bi bi-box-arrow-right text-danger ps-2"></i> {{ __('navbar.logout') }}</button>
                                </form>
                        </ul>
                    </li>

                </div>
            @else
                <div class="navbar-nav smartphone-only ms-2 me-2 my-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="bi bi-person-circle text-secondary i-size"></i></a>
                    </li>
                </div>
            @endauth
        {{-- fine logo user versione smartphone --}}
        </div>

        {{-- inizio bottone menu versione table + desktop--}}
        <button class="navbar-toggler tablet-desktop-only" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- fine bottone menu versione table + desktop--}}

       
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <div class="tablet-desktop-only">
                <a class="text-decoration-none text-black" href="/">
                    <div class="d-flex justify-content-evenly">
                        <img class="logo-img mylogo-nav shadow-sm ms-4" src="{{ asset('img/prestologopiccolo.png') }}"
                            alt="">
                        <div class="m-2 ms-2 my-presto">Presto</div>
                    </div>
                </a>
            </div>
            
            {{-- inizio link revisore e creazione annuncio tablet + desktop --}}

            <ul class="navbar-nav align-content-center mb-lg-0 tablet-desktop-only">

                @guest
                    @if (!Auth::user())
                        <li class="nav-item">
                            <a href="{{ route('announcements.create') }}"
                                class="btn text-danger mybtn-nav">{{ __('navbar.postAd') }}</a>
                        </li>
                    @endif
                @endguest

                @auth
                    @if (!Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a href="{{ route('announcements.create') }}"
                                class="btn text-danger mybtn-nav">{{ __('navbar.postAd') }}</a>
                        </li>
                    @endif
                @endauth

                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a href="{{ route('revisor.index') }}"
                                class="btn text-black mybtn-nav">{{ __('navbar.reviewer') }}
                                <span class=" translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">{{ __('navbar.ureadMsg') }}</span>
                                </span>
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>

            {{-- fine link revisore e creazione annuncio tablet + desktop --}}

            <div class="margin-search ms-auto">  

                <form action="{{ route('annoucements.search') }}" method="GET" class="d-flex m-auto w-auto" role="search">
                    <input name="inputSearch" id="searchInput" class="form-control w-100 me-1" type="search"
                        placeholder="{{ __('navbar.search') }}" aria-label="Search"> <br>
                    <select class="form-select me-1" name="inputCategorySearch">
                        <option value="{{ implode(',', [null, null]) }}" selected>{{ __('categories.category') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ implode(',', [$category->id, $category->name]) }}">
                                {{ trans('categories.' . $category->name) }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-accent btn-sm me-3" type="submit"><i class="bi bi-search"></i></button>
                </form>
                
            </div>
        
            {{-- inizio menu lingua versione desktop --}} 
            <div class="tablet-desktop-only d-inline-flex "> 

               
                
                @auth
                <div class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('navbar.welcome') }} <strong>{{ auth()->user()->name }}</strong>!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit"><i
                                    class="bi bi-box-arrow-right text-danger ps-2"></i> {{ __('navbar.logout') }}</button>
                            </form>
                        </ul>
                    </li>
                </div>
                @else
                <div class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="bi bi-person-circle text-secondary i-size"></i></a>
                    </li>
                </div>
                @endauth




                <div class="navbar-nav m-auto me-4">
                    @php
                        $langLocal = session('locale', 'en');
                    @endphp

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="flagDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span><img src="{{ asset('vendor/blade-flags/language-' . $langLocal . '.svg') }}"
                                    width="25" height="25" /> {{ strtoupper($langLocal) }}</span>
                        </a>
                        <ul class="dropdown-menu list-inline-item " aria-labelledby="flagDropdown">
                            <li class="p-1"><x-_locale lang="it" /></li>
                            <li class="p-1"><x-_locale lang="en" /></li>
                            <li class="p-1"><x-_locale lang="nl" /></li>
                        </ul>
                    </li>
                </div>








                
            </div>
            {{-- versione desktop --}} 

    </div>
    </div>
    
</nav>