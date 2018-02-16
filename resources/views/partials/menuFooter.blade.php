<nav class="navbar navbar-dark bg-dark ">
  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="nav nav-pills">  
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
    </ul>
  </div>
</nav>