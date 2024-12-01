<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="{{url('images/logo.jpg')}}" height="50"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/pay"></a>
          </li>
          </li>
        </ul>
        @if (Route::has('login'))
              @auth
        <a class="nav-link" href="{{ route('profile') }}"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg>
      </a>&nbsp
        @endauth
        @endif
        <span class="navbar-text">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Login/Create
            </button>
            
            <ul class="dropdown-menu">
              @if (Route::has('login'))
              @auth
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" class="dropdown-item">
                    {{ __('Log Out') }}
                </button>
            </form>
              @else
              <li><a class="dropdown-item" href="{{ route('login') }}">log in</a></li>
              @if (Route::has('register'))
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
              @endif
                    @endauth
            </ul>
            @endif
          </div>
        </span>
      </div>
    </div>
  </nav>