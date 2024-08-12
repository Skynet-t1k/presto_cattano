@if (!Route::is('register') && !Route::is('login'))
<nav class="navbar navbar-expand-lg bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/img/prestologo.png" class="shadow" alt="presto logo" width="120" height="60"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-around w100">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('article.create')}}">Aggiungi articolo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
        </li>
        
        <li class="nav-item dropdown d-flex">
          <a class="nav-link dropdown-toggle border rounded-0 border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu p-0 rounded-0 border-0">
            @foreach($categories as $category)
                  <li><a class="dropdown-item text-capitalize" href=" {{ route('byCategory', ['category' => $category]) }}">{{$category->name}}</a></li>
              @if (!$loop->last)
                  <hr class="dropdown-divider">                
              @endif
            @endforeach
          </ul>
          <form class="d-flex p-0 s-input" role="search">
            <input class="form-control rounded-0 border-0" type="search" placeholder="Search" aria-label="Search">
            <button class="btn s-btn border-0" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
          </form>
        </li>
        <li class="nav-item dropdown">
        
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span>
              Ciao, 
              @auth 
              {{ Auth::user()->name }}
              @else
              ospite 
              @endauth
            </span><i class="ms-2 fa-solid fa-right-to-bracket"></i>
          </a>
        
          <ul class="dropdown-menu">
            @guest
            <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
            @endguest
            @auth
            <li><a class="dropdown-item" href="#"
            onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
              >Log Out</a> 
            </li>
            <form id="logout-form" method="post" action="{{route('logout')}}">@csrf</form>
            @endauth
          </ul>
        
        
        
      </ul>
    </div>
  </div>
</nav>
@endif