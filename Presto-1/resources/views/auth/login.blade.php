<x-layout title="Login">
    <x-navbar />

    <div class="container-fllogind container-top bg-gradient mb-4 px-5">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="m-2 text-center">{{__('login.login')}}</h1>
            </div>

            <x-message/>

            <div class="col-12 d-flex flex-wrap-reverse mt-5 mb-4"> 
                
                <div class="col-12 col-md-6 p-4">
                    <img class="w-100 h-100 img-work d-block" data-aos="fade-left" src="{{ asset('img/loggati2.jpg') }}" alt="Image">
                </div>  
                
                <div class="col-12 col-md-6 p-4 d-flex" data-aos="fade-down"
                            data-aos-anchor="#example-anchor"
                            data-aos-offset="500"
                            data-aos-duration="500">
                            
                            <div class="m-auto p-5 bg-light my-card-border">
                                <h2 class="h5 pb-5 text-center">{{__( 'login.doYouAccount' )}}</h2>
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                            @error('email') <spa class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="password">{{__('login.password')}}</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                            @error('password') <spa class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-check col-12 ms-2">
                                            <input type="checkbox" name="remember" id="remember-check" class="form-check-input">
                                            <label  class= "form-check-label" for="remember-check">{{__( 'login.rememberMe' )}}</label>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-accent">Login</button>
                                        </div>
                                        <p class="pt-5">{{__( 'login.dontHave' )}}<a class="text-decoration-none text-primary-color" href="/register">{{__( 'login.signUp' )}}</a></p>
                                    </div>
                                </form>
                            </div>
                                
                </div>    
                
            </div> 
        </div>
    </div>
</x-layout>