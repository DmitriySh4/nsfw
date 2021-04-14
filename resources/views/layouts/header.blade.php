<div class="col-md-8 p-0 offset-md-2">
<nav class="navbar navbar-expand-md navbar-light">
  
    <a class="navbar-brand d-none" href="{{ url('/') }}">
        {{ config('app.name', 'Opwekkend') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <!-- <ul class="navbar-nav mr-auto hidden-md">

        </ul> -->

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav w-100">
            <!-- Authentication Links -->
            <!-- @guest
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
            @endguest -->
            @foreach ($navCat as $cat)
                <li>
                    <a class="nav-link" href="{{ route('categorySingle', $cat->id) }}"> {{ $cat->name }}</a>
                </li>
            @endforeach
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('advertisementIndex') }}"><b>Dashboard</b></a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
</div>