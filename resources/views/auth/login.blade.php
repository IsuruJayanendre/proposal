@include('header')
@include('user.navbar')
<div class="bg-image" 
     style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('images/login.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;">
            <div class="container p-5">
    <div class="row login-container">
        <div class="col-md-6 offset-md-6">
            <br><br><br>
            <div class="card p-4 bg-light">
                <div class="text-center mb-4">
                    <!-- Logo -->
                    <img src="{{url('images/logo.jpg')}}" alt="Logo" class="img-fluid" width="300"> <!-- Replace with your logo -->
                </div>

                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Status message -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login form -->
                <form method="POST" action="{{ route('login') }}" >
                    @csrf

                    <!-- Email field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                    </div>

                    <!-- Password field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" class="form-control" required>
                    </div>

                    <!-- Remember me checkbox -->
                    <div class="mb-3 form-check">
                        <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                        <label for="remember_me" class="form-check-label ">{{ __('Remember me') }}</label>
                    </div>

                    <!-- Forgot password and submit button -->
                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-decoration-none">{{ __('Forgot your password?') }}</a>
                        @endif

                        <button type="submit" class="btn btn-dark">{{ __('Log in') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
            </div>
</div>
@include('footer')