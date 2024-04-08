<x-layout>
    <x-navbar />

    <div class="container-fluid container-top bg-gradient mb-4 px-5 d-flex flex-column min-vh-100 justify-content-between">
        <div class="row">
            <div class="col-12">

                <div class="container mt-5 mb-4">
                   <x-message/>
                    <form action="{{ route('revisor.become') }}" method="POST" class="row g-4">
                        @csrf 
                        <div class="col-12 col-md-6">
                            <img class="w-100 h-100 img-work d-block" data-aos="fade-right" src="{{ asset('img/shoponline-main.jpg') }}" alt="">
                        </div>
                        
                        
                        <div class="col-12 col-md-6 p-5 bg-light my-card-border">
                            <div data-aos="fade-up"
                            data-aos-anchor="#example-anchor"
                            data-aos-offset="500"
                            data-aos-duration="500">
                            <h2 class="mt-4">{{__('job.work')}} <span class="text-danger">{{__('job.withUs')}}</span></h2>
                            <p>{{__('job.startCarreer')}}!</p>
                            
                            <label for="name_surname" class="form-label" placeholder="Name & Surname"></label>
                            <input name="name_surname" type="text" value="{{ old('name_surname') }}" class="form-control @error('name_surname') is-invalid @enderror" id="name_surname" placeholder="{{__('job.phName')}}">
                            @error('name_surname') <span class="text-danger small">{{ $message }}</span> @enderror
                            
                            <label for="messageBody" class="form-label"></label>
                            <textarea name="messageBody" id="messageBody" rows="4" placeholder="{{__('job.tellAboutYou')}}" class="form-control @error('messageBody') is-invalid @enderror">{{ old('messageBody') }}</textarea>
                            
                            
                            <button type="submit" class="mt-3 btn btn-accent text-back">{{__('job.btnSend')}}</button>
                        </div>
                        
                        
                    </form> 
                </div>


            </div>
        </div>
    </div>
</x-layout>