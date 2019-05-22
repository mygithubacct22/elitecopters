@php
use App\Models\User;

$currentUser = Auth::user();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{url('/dboard')}}">
          ELITECOPTERS
        </a> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        


         @guest
                    @if (Route::has('register'))
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if (User::ROLE_BOOKER == $currentUser->role)
                    <li class="nav-item active">
                  <a class="nav-link" href="{{url('/dboard')}}">Home
                        <span class="sr-only">(current)</span>
                      </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/services')}}">Services</a>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bookings.index') }}">Bookings</a>
                        </li>
                   <li class="nav-item">
                    <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                  </li>
                    @elseif (User::ROLE_BOOKEE == $currentUser->role)
                <li class="nav-item active">
                  <a class="nav-link" href="{{url('/dboard')}}">Home
                        <span class="sr-only">(current)</span>
                      </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/services')}}">Services</a>
      
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bookee.bookings.index') }}">Manage Bookings</a>
                        </li>
                    @endif

       
                    
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
    </div>
  </div>
</nav>
