@extends('layouts.welcome')

@section('content')
    <header>
        <div class="banner">
            <img src="https://lh3.googleusercontent.com/pw/AM-JKLXLh9VFpK2r3HGNe-LcCoiusooIYwh8XmjqTouG3yHxiJ7HGie24_wchtoytKFfUrUCLr-gjEhLi2JW2-wj_7dm9OkzEzXti6feyq0DywZ9vnzELvu9mfiKgUOx5OOQyPf8wTa348uuyReFOLMtnd1j=w1440-h720-no?authuser=0" alt="">
        </div>
    </header>

    <main class="container w-75 my-4 py-4">
        <div class="mb-4 pb-4">
            <h1>WAVEYA</h1>
            <p class="lead">
                WAVEYA is a duo dance group created by Ari and MiU. WAVEYA was created in 2006 and began posting dance videos on YouTube since 2011. As of this writing, they have 3.72M subscribers on YouTube. They have also started a membership based journey in MemberMe, where they post four exclusive dance videos and three livestreams per month.
            </p>
        </div>

        <div class="row">
            <div class="card col-md-6 bg-dark-0">
                <div class="card-header pt-4">
                    <h3>ARI</h3>
                    <p class="fst-italic mb-0">Leader, Choreographer</p>
                </div>

                <img src="https://lh3.googleusercontent.com/pw/AM-JKLXOsKfZF_z6TRxFsNUYW9SR1GsGKWbJ8_rRsFAjD-gUR6o-H4htNX9-cge7hFDR2epb1MThVSBhgJYocsE2DMrs4vSozWSsmF6YvufbjvxQQJGY92J7RmwxfAjwujvqqLN3T1sOkkVN6zdMPlWtEfwp=w564-h565-no?authuser=0" class="card-img" alt="">

                <div class="card-body pb-4">
                    <p class="lead">
                        Born in Seoul, South Korea, Ari is the older sister of MiU. Below are some facts about Ari:
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="fw-bold">Birth Name:</span> Jang Eun Young
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Birth Date:</span> November 12th, 1989
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Zodiac Sign:</span> Scorpio
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Height:</span> 5'5" (166cm)
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Loves Drawing</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card col-md-6 bg-dark-0">
                <div class="card-header pt-4">
                    <h3>MiU</h3>
                    <p class="fst-italic mb-0">Second Leader, Main Ballerina</p>
                </div>

                <img src="https://lh3.googleusercontent.com/pw/AM-JKLVqyIcKihIaTF4SpFDEwYKWRM9pHVtwr-Oxve0tSKj8eYTwJNGl6dCo-Gp2fH65JpZAxHKd9yP-WTL2GbjVoLYnwN7hXJKEgs0gpP2WCGg1M3UNibil9sxWEL-UTSdHE4c-9b8de0X3aPMptuwE-n8-=w564-h565-no?authuser=0" class="card-img" alt="">

                <div class="card-body pb-4">
                    <p class="lead">
                        Born in Seoul, South Korea, MiU is the younger sister of Ari. Below are some facts about MiU:
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="fw-bold">Birth Name:</span> Jang You Sun
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Birth Date:</span> January 9th, Unknown
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Zodiac Sign:</span> Capricorn
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Height:</span> 5'6" (168cm)
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Loves Laughing</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <footer class="container-fluid text-center bg-dark-0 my-4">
        <div class="row">
            <div class="col-7 footer-bg">
            </div>

            <div class="col-5 my-5">
                <h3 class="banner-text mb-4">Are you one of us?</h3>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
        
                        <div class="container w-75">
                            <div class="mb-3">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Email or username" required autocomplete="username" autofocus>
        
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-check mb-3 d-flex justify-content-start">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                <label class="form-check-label mx-2" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
    
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary w-25 me-4">
                                    {{ __('Login') }}
                                </button>
        
                                @if (Route::has('password.request'))
                                    <a class="btn btn-white-link-glow" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
@endsection
