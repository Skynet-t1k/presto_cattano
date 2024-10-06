<div class="card mx-auto card-w shadow text-center mb-3">
    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : asset('img/no-image.png')}}" class="card-img-top" alt="Immagine dell'articolo {{$article->title}}">
    <div class="card-body">
        <h4 class="card-title">{{$article->title}}</h4>
        <h6 class="card-subtitle tect-body-secondary">{{$article->price}}</h6>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary me-2">{{__('ui.details')}}</a>
            <a href="{{route('byCategory', ['category' => $article->category])}}" class="btn btn-outline-info text-capitalize">{{ __("ui." . $article->category->name) }}</a>
        </div>
    </div>
</div>