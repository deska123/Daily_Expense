<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
  </a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      @if (!empty($page) && $page == 'vehicle_type')
        <a class="nav-link active" href="{{url('vehicle_type')}}">Vehicle Type</a>
      @else
        <a class="nav-link" href="{{url('vehicle_type')}}">Vehicle Type</a>
      @endif
    </li>
    <li class="nav-item">
      @if (!empty($page) && $page == 'transportation')
        <a class="nav-link active" href="{{url('transportation')}}">Transportation</a>
      @else
        <a class="nav-link" href="{{url('transportation')}}">Transportation</a>
      @endif
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
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
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
  </ul>
</nav>
