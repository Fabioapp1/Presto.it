<x-layout>
    <x-navbar/>

    
        <div class="container container-top">
            <x-message/>
            <div class="row align-items-center d-flex">
                <div class="col-md-6 col-lg-g mb-3 text-center" data-aos="fade-down" data-aos-delay="800">
                    <h5 class="text-danger m-5 my-maintext">{{__( 'ui.specialPrize' )}}</h5>
                    <h1>{{__('ui.newProducts')}}</h1>
                    <p class="mx-5">{{__('ui.joinUs')}}</p>
                </div>
                <div class="col-md-6 mb-3 text-center">
                    <img class="w-100 h-100 my-img d-block" data-aos="fade-up"
                    data-aos-easing="linear"
                    data-aos-duration="1500" src="{{ asset('img/shop-card.jpg') }}" alt="">
                </div>
            </div>
        </div>

        
        <div class="container">
            <div class="row text-center mt-5 mb-5">
                <h4>{{__('ui.heyThere')}}</h4>
            </div>

              <!-- Search and Submit form -->
            <div class="container mt-0 p-4 mb-5 bg-white border-none rounded-5 shadow-sm ">

                <form action="{{route('annoucements.search')}}" method="GET" class="row search-form">
                    <div class="col-12 col-md-6 p-1">
                        <input name="inputSearch" id="searchInput" class="form-control opacity-75" type="search" placeholder="{{__('navbar.search')}}" aria-label="Search">
                    </div>
                    <div class="col-12 col-md-4 p-1">
                        <select class="form-select opacity-75" name="inputCategorySearch">
                            <option value="{{ implode(',', [null,null]) }}" selected>{{__('ui.chooseCategory')}}</option>
                            @foreach($categories as $category)
                                <option value="{{ implode(',', [$category->id, $category->name]) }}">{{ trans('categories.' . $category->name) }}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="col-12 col-md-2 p-1">
                        <input class="btn btn-accent" type="submit" value="{{__('ui.search')}}">
                    </div>
                </form>
            </div>

            <div class="text-center mb-5">
                <p class="m-3 bold text-danger-emphasis fs-3 ">{{__('ui.allAnnouncements')}}</p>
            </div>
    
        </div>



        <div class="container">
            <div class="row d-flex p-0">
                @foreach($announcements as $announcement)
                
                <div class="col-12 col-md-6 col-lg-4 my-center " data-aos="fade" data-aos-delay="200">
                    <x-card
                    :image="!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,400) : asset('img/img-notavailable.jpg')"
                    :title="$announcement->title"
                    :body="$announcement->body"
                    :price="$announcement->price"
                    :category="$announcement->category->name"
                    :routeView="route('announcement.show', $announcement)"
                    :routeCategory="route('category.show', ['category'=>$announcement->category])"
                    :published="$announcement->created_at->format('d/m/Y')"
                    :author="$announcement->user->name"
                    />
                </div>
                @endforeach
            </div>
        </div>

</x-layout>