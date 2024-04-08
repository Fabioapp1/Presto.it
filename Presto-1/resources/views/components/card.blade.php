
    <div class="my-card bg-light m-2 rounded-5">
        <img src={{ $image }} alt="" class="card-img-top my-card-img">
        <div class="card-body m-3 p-2 my-card-body">
            <h5 class="card-title text-truncate">{{ $title }}</h5>
            <p class="card-text fs-3">€ {{ $price }}</p>
            <a href="{{ $routeView }}" class="btn btn-accent">{{__('card.view')}}</a>
            <br>
            <div class="card-footer btn bg-transparent pt-2"><a class="text-danger-emphasis text-decoration-none" href="{{ $routeCategory }}" class="my-2 mt-2 text-decoration-none text-secondary btn bg-white">{{ trans('categories.' . $category) }}</a></div>
        </div>
    </div>
