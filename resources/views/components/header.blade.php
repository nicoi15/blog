
<nav class="navbar navbar-expand-lg sticky-top navbar-dark indigo">
  <img src="{{ asset('images/blog.png') }}" class="mr-3" height="30px" width="30px" alt="avatar">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/posts">Home</a>
    </ul>
    <div class="row">
      
    </div>
    <form class="form-group my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
        @if (Route::has('login'))
        @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(Auth::user()->role == '1')
                  {{ Auth::user()->name.' (Admin)' }}
                @else
                  {{ Auth::user()->name }}
                @endif
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                <a class="dropdown-item" href="{{ url('/account') }}">
                  <i class="fas fa-user-circle mr-1"></i>
                Account</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     <i class="fas fa-sign-out-alt mr-1"></i>
                    {{ __('Logout') }}
                </a>
              </div>
            </li>
        @else
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
              </li>
            @endif
        @endauth
      @else
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
          
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
            
          @endif
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
        </li>
        @endguest
      @endif
      </ul>
    </form>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</nav>