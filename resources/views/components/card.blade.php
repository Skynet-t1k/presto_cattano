<a href="{{ route('article.show', ['article' => $article]) }}" class="text-decoration-none" aria-label="View details of {{ $article->title }}">
<div class="card mx-auto card-w shadow text-center mb-3">
    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : asset('img/no-image.png')}}" class="card-img-top z-3 position-relative rounded border" alt="Immagine dell'articolo {{$article->title}}">
    <div class="card-body rounded">
        <h4 class="card-title m-0">{{$article->title}}</h4>
        <h5 class="card-subtitle py-2">{{ __("ui." . $article->category->name)}}</h5>
        <h6 class="card-subtitle tect-body-secondary">{{__('ui.price')}}: {{$article->price}}€</h6>
    </div>
</div>
</a>