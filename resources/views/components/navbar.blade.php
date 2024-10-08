@if (!Route::is('register') && !Route::is('login'))
<nav class="navbar navbar-expand-md bg-navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/img/prestologo.png" class="shadow" alt="presto logo" width="120" height="60"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-around w100">
        <li class="nav-item  nav-hover">
          <a class="nav-link" aria-current="page" href="{{route('article.create')}}">{{__('ui.addArticle')}}</a>
        </li>
        <li class="nav-item  nav-hover">
          <a class="nav-link" aria-current="page" href="{{route('article.index')}}">{{__('ui.allArticles')}}</a>
        </li>
        
        <li class="nav-item dropdown d-flex flex-column flex-md-row">
          <a class="nav-link categ dropdown-toggle border rounded-0 border-0 px-1"
             href="#"
             role="button" 
             data-bs-toggle="dropdown" 
             aria-expanded="false">
             {{__('ui.category')}}
          </a>
          <ul class="dropdown-menu">
            @foreach($categories as $category)
                  <li><a class="dropdown-item text-capitalize" href=" {{route('byCategory', ['category' => $category])}}">{{__("ui.$category->name")}}</a></li>
              @if (!$loop->last)
                  <hr class="dropdown-divider">                
              @endif
            @endforeach
          </ul>
          <form class="d-flex p-0 s-input" role="search" action="{{ route('article.search') }}" method="GET">
            <input class="form-control smallrounded border-0 s-input" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn s-btn border-0"
                    style="width: 40px; flex-shrink: 0;" 
                    type="submit">
                  <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
            </button>
          </form>
        </li>

        <li class="nav-item dropdown login-w mt-custom-md">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="ps-1">
              {{__('ui.hello')}} 
              @auth 
              {{ Auth::user()->name }}
              @else
              {{__('ui.guest')}} 
              @endauth
            </span><i class="ms-2 fa-solid fa-right-to-bracket"></i>
          </a>
            <ul class="dropdown-menu">
            @guest
            <li><a class="dropdown-item" href="{{route('login')}}">{{__('ui.login')}}</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.register')}}</a></li>
            @endguest
            @auth
            <li><a class="dropdown-item" href="#"
            onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
              >Log Out</a> 
            </li>
            <form id="logout-form" method="post" action="{{route('logout')}}">@csrf</form>
            @endauth
          </ul>
        </li>

        <li class="nav-item">
          <x-_locale lang="it"/>
          <x-_locale lang="en"/>
          <x-_locale lang="es"/>
        </li>

          @auth
            @if (Auth::user()->is_revisor)
              <li class="nav-item mt-custom-md">
                <a href="{{route('revisor.index')}}" class="nav-link btn btn-revisor dropdown login-w position-relative">
                  {{__('ui.revarea')}} 
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{\App\Models\Article::toBeRevisedCount()}}</span>                  
                </a>
              </li>
            @endif
          @endauth
      </ul>
    </div>
  </div>
</nav>
@endif