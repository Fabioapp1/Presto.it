<x-layout>
    <x-navbar/>
    <div class="container-fluid p-5 bg-gradient mb-4 mt-5">
        <div class="container my-card-border bg-light p-5 mt-5 shadow-sm">

            <div class="col-12 pt-5 px-4 d-flex">
                <h1 class="my-description">{{ $announcement->title}}</h1>
            </div>

            <div class="row">
                <div class="col-12 d-flex flex-wrap pb-4"> 
                    <div class="col-12 col-md-6 p-3">
                        <div id="showCarousel" class="carousel slide carousel-container" data-bs-theme="dark" data-bs-ride="carousel">
                            <div class="carousel-inner rounded-5">

                                @forelse($announcement->images as $image)
                                        <div class="carousel-item @if($loop->first) active @endif">
                                            <img class="img-fluid" src="{{ $image->getUrl(1000,1000) }}" alt="...">
                                        </div>

                                        <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>


                                    @empty
                                       
                                    <img src="{{ asset('img/img-notavailable.jpg') }}" alt="">
                                @endforelse

                               
                            </div>
                        </div>
                    </div>
                    

                    <div class="row align-items-center flex-wrap p-3">
                        <div class="col-12 col-md-6 align-middle">
                            <h3 class="text-danger my-description">{{__('ann_show.details')}}</h3>
                            <p class="card-text fs-1">€{{ $announcement->price }}</p>
                            <p class="card-footer">{{__('ann_show.published')}} {{ $announcement->created_at->format('d/m/Y') }}</p>
                            <p class="card-footer">{{__('ann_show.author')}} {{ $announcement->user->name ?? ''}}</p>
                        </div>
                    </div>


                    </div>
                </div>

                <hr class="my-hr" >

                <div class="card-text p-3">
                    <h4 class="text-danger my-description">{{__('ann_show.description')}}</h4>
                    {{ $announcement->body }}
                </div>
                <div>
                    <a href="{{ route('category.show', ['category'=>$announcement->category])}}" class="py-5 btn text-bold text-decoration-underline"><i class="bi bi-arrow-left-circle text-danger-emphasis"></i> {{__('ann_show.back_to_category')}}</a>
                </div>
            </div>  
        </div>
    </div>
    
</x-layout>