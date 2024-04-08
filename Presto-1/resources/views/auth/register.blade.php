<x-layout title="Register">

<x-navbar />

<div class="container container-top">

    <div class="row">
        <div class="col-12 p-5">
            <h1 class="m-2 text-center">{{__('register.register')}}</h1>
        </div>
    </div>

    <div class="row m-2">
        <div class="col-sm-12 col-md-8 col-lg-6 mx-auto p-5 bg-light my-card-border">

            <form action="/register" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label for="name">{{__('register.firstName')}}</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name') <spa class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email') <spa class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                        <label for="password">{{__('register.password')}}</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password') <spa class="text-danger small">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                        <label for="password_confirmation">{{__('register.confirmPassword')}}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-accent">{{__('register.register')}}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

</x-layout>
