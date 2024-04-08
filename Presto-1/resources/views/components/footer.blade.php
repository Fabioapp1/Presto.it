
    <div class="container-expand">
        <div class="row mx-0">  
        <hr class="my-hr mt-5">
        
            {{-- company --}}
            <div class="col-12 col-md-4 mb-0 p-3">
                <h5 class="text-center my-footer-title">{{__('footer.company')}}</h5>
            
                <div class="text-center footer-text">      
                    <a class="text-decoration-none text-muted" href="{{ route('aboutUs') }}">{{__('footer.aboutUs')}}</a>
                    <br>
                    <a class="text-decoration-none text-muted" href="{{ route('contactUs') }}">{{__('footer.contactUs')}}</a>
                    <br>
                    <a class="text-decoration-none text-muted" href="{{ route('revisor.job') }}">{{__('footer.carrers')}}</a>
                    
                </div>  
            </div>    
         
            {{-- custommers --}}
            <div class="col-12  col-md-4 mb-0 p-3">
                <h5 class="text-center my-footer-title">{{__('footer.customers')}}</h5>
            
                <div class="text-center footer-text">      
                    <a class="text-decoration-none text-muted" href="{{ route('products') }}">{{__('footer.products')}}</a>
                    <br>
                    <a class="text-decoration-none text-muted" href="{{ route('services') }}">{{__('footer.services')}}</a>
                    <br>
                </div> 
            </div>

            {{-- further info --}}
            <div class="col-12 col-md-4 mb-0 p-3">
                <h5 class="text-center my-footer-title">{{__('footer.moreInfo')}}</h5>
        
                <div class="text-center footer-text">      
                    <a class="text-decoration-none text-muted" href="{{ route('termAndConditions') }}">{{__('footer.terms&Conditions')}}</a>
                    <br>
                    <a class="text-decoration-none text-muted" href="{{ route('privacy') }}">{{__('footer.privacy')}}</a>
                </div>  
                
                <div class="p-1 text-center d-flex justify-content-evenly  flex-wrap">
                    <i class="bi bi-facebook text-danger opacity-75"></i>
                    <i class="bi bi-twitter text-danger opacity-75"></i>
                    <i class="bi bi-instagram text-danger opacity-75"></i>
                </div>
            </div>
            <p class="text-center">&copy;2024 The Minimalist Inc.</p>
        </div>
        