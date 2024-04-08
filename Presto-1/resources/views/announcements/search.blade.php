<x-layout >
    <x-navbar/>
    <div class="container-fluid p-5 bg-gradient mb-4">
        <div class="row">
            <div class="col-12 p-5 text-center">
                <h1 class="display-2">{{__('search.searchResult')}}
                    @if($inputSearch && $nameCategory[1])
                        {{ $inputSearch . ' & ' . $nameCategory[1] }}
                    @elseif($inputSearch)
                        {{ $inputSearch }}
                    @elseif($nameCategory[1])
                        {{__('categories.category')}} - {{ __('categories.'. $nameCategory[1]) }}
                    @endif
                </h1>
            </div>
        </div>


        <div class="container">
                <div class="row align-items-center d-flex p-0">
                    @forelse($announcements as $announcement)
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
                        @empty
                        <div class="col-12 text-center ">
                                <p class="fs-2 mb-5">{{__('search.noResult')}}</p>
                                <a href="{{ route('announcements.create') }}" class="btn btn-accent fs-1">{{__('search.postAd')}}</a>
                        </div>
                    @endforelse
                    {{$announcements->links()}}
                </div>
        </div>
    </div>
</x-layout >