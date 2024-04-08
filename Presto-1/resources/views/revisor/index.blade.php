<x-layout>
    <x-navbar/>
    <div class="container-fluid p-2 bg-gradient">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="mt-5 text-center">{{$announcement_to_check ? __('revisor.AdToReview') : __('revisor.AdToReview')}}
                </h1>
            </div>
        </div>
        
        <div class="container" >
            <x-message/>
        </div>
        
        @if($announcement_to_check)
        <div class="container mx-auto p-4">
            
            <div class="row">
       
                <div class="col-12 col-md-6 p-4">
                    <div id="showCarousel" class="carousel slide carousel-container" data-bs-theme="dark" data-bs-ride="carousel">
                        <div class="carousel-inner">

                        @forelse($announcement_to_check->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img class="img-fluid" src="{{ $image->getUrl(1000,1000) }}" alt="...">

                                <div class="pt-5">
                                    <h4>{{__('revisor.aiVerify')}}</h4>
                                    <p>{{__('revisor.contentVm')}} <span class="{{ $image->adult }}"></span></p>
                                    <p>{{__('revisor.satire')}} <span class="{{ $image->spoof }}"></span></p>
                                    <p>{{__('revisor.medicine')}} <span class="{{ $image->medical }}"></span></p>
                                    <p>{{__('revisor.violent')}} <span class="{{ $image->violence }}"></span></p>
                                    <p>{{__('revisor.bold')}} <span class="{{$image->racy}}"></span></p>
                                </div>
        
                                <hr class="my-hr">
        
                                <h4>{{__('revisor.tagsImg')}}</h4>
                                <div>
                                    @if($image->labels)
                                        @foreach ($image->labels as $label)
                                        <p class="d-inline">{{ $label }}, </p>
                                        @endforeach
                                    @endif
                                </div>

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
                        
            <div class="col-10 col-md-6 mt-5">
                <h2 class="card-title mb-5">{{ $announcement_to_check->title }}</h2>
                <h3 class="text-danger my-description">{{__('revisor.details')}}</h3>
                <p class="card-text fs-1">€{{ $announcement_to_check->price }}</p>
                <p class="card-footer">{{__('revisor.published')}} {{ $announcement_to_check->created_at->format('d/m/Y') }}</p>
                <p class="card-footer">{{__('revisor.author')}} {{ $announcement_to_check->user->name ?? ''}}</p>
                <hr class="my-hr" >

                <div class="card-text">
                    <h4 class="text-danger my-description">{{__('revisor.description')}}</h4>
                    {{ $announcement_to_check->body }}
                </div>
            </div>

            <hr class="my-hr" >

            <div class="row p-3">
                <div class="col-6">
                    <form action="{{route('revisor.accept_announcement' ,['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                    <button type="submit" class="btn btn-green text-success">{{__('revisor.Accept')}}</button>    
                    </form>
                </div>    
                <div class="col-6 text-end">
                    <form action="{{route('revisor.reject_announcement' ,['announcement'=>$announcement_to_check])}}" method="POST">
                        @csrf
                        @method('PATCH')
                    <button type="submit" class="btn btn-accent text-danger">{{__('revisor.Reject')}}</button>    
                    </form>
                </div>
            </div>
            </div>

        </div>
        @endif 

        <div class="container mt-5 pt-5">
           
            <h3 class="text-center mb-5">{{__('revisor.allAnnouncements')}}</h3>

            
            <div class="row g-5 m-2 justify-content-around">
                @foreach($announcements as $announcement)
                <div class="col-12 col-md-5 card my-card-revisor">
                    <div>
                        <p class="p-4">
                            {{__('revisor.title')}} {{ $announcement->title }}<br>
                            {{__('revisor.category')}} {{ trans('categories.' . $announcement->category->name)}}<br>
                            {{__('revisor.author')}} {{ $announcement->user->name }}<br>
                            Id: {{ $announcement->id }}<br>
                            {{__('revisor.status')}}
                            @if($announcement->is_accepted === 1)
                                <span class="text-success">{{__('revisor.accepted')}}</span>
                            @elseif($announcement->is_accepted === 0)
                                <span class="text-danger">{{__('revisor.rejected')}}</span>
                            @elseif($announcement->is_accepted === null)
                                <span class="text-secondary">{{__('revisor.pending')}}</span>
                            @endif
                        </p>
                    </div>

                        <div class="col-12 p-4 d-flex justify-content-around ">

                            <div class="col-6">
                                <form action="{{route('revisor.torevise_announcement' , $announcement)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                <button type="submit" class="btn btn-green text-success">{{__('revisor.toReviseBtn')}}</button>    
                                </form>
                            </div>
                            

                            <div class="col-md-6 text-end">

                                <button type="button" class="btn btn-accent text-danger" data-action="{{ route('revisor.todelete_announcement' , $announcement)}}" data-role="deleteAnnouncement" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    {{__('revisor.toDelete')}}
                                  </button>

                                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title text-center fs-5" id="exampleModalLabel">{{__('revisor.AttentionAlert')}}</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-start">{{__('revisor.Irreversible')}}</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-grey text-secondary" data-bs-dismiss="modal">{{__('revisor.Close')}}</button>
                                          
                                          <form action="" id="deleteAnnouncement" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-red text-danger">{{__('revisor.Confirmation')}}</button>    
                                        </form> 

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>

                </div>
                @endforeach
            </div>
            
                {{-- <div class="table-responsive-md">
                    <table class="table table-bordered mt-3 align-middle">
                        <tr>
                            <th>#</th>
                            <th>{{__('revisor.author')}}</th>
                            <th>{{__('revisor.title')}}</th>
                            <th>{{__('revisor.category')}}</th>
                            <th>{{__('revisor.status')}}</th>
                            <th>{{__('revisor.toRevise')}}</th>
                        </tr>
                        @foreach($announcements as $announcement)
                        
                        <tr>
                            <td>{{ $announcement->id }}</td>
                            <td>{{ $announcement->user->name }}</td>
                            <td>{{ $announcement->title }}</td>
                            <td>{{ trans($announcement->category->name) }}</td>
                            <td>
                                @if($announcement->is_accepted === 1)
                                    <span class="text-success">{{__('revisor.accepted')}}</span>
                                @elseif($announcement->is_accepted === 0)
                                    <span class="text-danger">{{__('revisor.rejected')}}</span>
                                @elseif($announcement->is_accepted === null)
                                    <span class="text-secondary">{{__('revisor.pending')}}</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <form action="{{route('revisor.torevise_announcement' , $announcement)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                <button type="submit" class="btn btn-red me-4">{{__('revisor.toRevise')}}</button>    
                                </form>

                                <form action="{{route('revisor.todelete_announcement' , $announcement)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-red">{{__('revisor.toDelete')}}</button>    
                                </form>
                            </td>
                        </tr>
 
                        @endforeach
                    </table>
                </div> --}}
            </div>

        </div>
    </div>
</x-layout>