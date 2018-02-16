<nav class="navbar navbar-dark bg-dark ">
  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="nav nav-pills">
    {{-- renvoie true si vous êtes connecté --}}
        @if(Auth::check())
  
            <li class="nav-item">
              <a class="nav-link active" href="{{route('home')}}">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('showByType','stage')}}">Stages</a>
             </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('showByType','formation')}}">Formations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('contact')}}">Contact</a>
            </li>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('post.index')}}">Dashboard</a></li> 
            <li><a href="{{ route('logout') }}" 
                                              onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                              Logout
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
            </form>
          </ul>

        @else 
          <li class="nav-item">
            <a class="nav-link active" href="{{route('home')}}">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('showByType','stage')}}">Stages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('showByType','formation')}}">Formations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('contact')}}">Contact</a>
          </li>

        @endif
    </ul>
  </div>
</nav>