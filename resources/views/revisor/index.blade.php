<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center pb2">
                        Revisor Dashboard
                    </h1>
                </div>
            </div>
        </div>
        @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-5 alert alert-success text-center shadow rounded">
                {{session('message')}}
            </div>
        </div>
        @endif
        @if ($article_to_check)
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                @if ($article_to_check->images->count())
                @foreach ($article_to_check->images as $key=>$image)
                <div class="col-6">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow" 
                                alt="Immagine {{$key +1}} dell'articolo {{$article_to_check->title}}">
                            </div>
                            <div class="col-md-5 ps-3">
                                <div class="card-body">
                                    <h5>labels</h5>
                                    @if ($image->labels)
                                    @foreach ($image->labels as $label)
                                    #{{ $label }}
                                    @endforeach
                                    @else
                                    <p class="fst-italic">No labels</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-body">
                                    <h5 class="">Ratings</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto">{{ $image->adult }}</div>
                                        </div>
                                        <div class="col-10">adult</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto">{{ $image->violence }}</div>
                                        </div>
                                        <div class="col-10">violence</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto">{{ $image->spoof }}</div>
                                        </div>
                                        <div class="col-10">spoof</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto">{{ $image->racy }}</div>
                                        </div>
                                        <div class="col-10">racy</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto">{{ $image->medical }}</div>
                                        </div>
                                        <div class="col-10">medical</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="row justify-content-center">
                    @for ($i = 0; $i < 6; $i++)
                    <div class="col-6 col-md-4 mb-4 text-center">
                        <img src="https://picsum.photos/300" class="img-fluid rounded shadow" alt="immagine segnaposto">
                    </div>
                    @endfor
                    @endif
                </div>
            </div>
            <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                <div>
                    <h1>{{__('ui.title')}}: {{$article_to_check->title}}</h1>
                    <h3>{{__('ui.author')}}: {{$article_to_check->user->name}}</h3>
                    <h4>{{__('ui.price')}}: {{$article_to_check->price}}</h4>
                    <h4>{{__('ui.category')}}: {{__('ui.' . $article_to_check->category->name)}}</h4>
                    <p class="h6">{{__('ui.description')}}: {{$article_to_check->description}}</p>
                </div>
                <div class="d-flex pb-4 justify-content-around">
                    <form action="{{route('reject', ['article' => $article_to_check])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger py=2 px-5 fw-bold">{{__('ui.reject')}}</button>
                    </form>
                    <form action="{{route('accept', ['article' => $article_to_check])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success py=2 px-5 fw-bold">{{__('ui.accept')}}</button>
                    </form>
                </div>
            </div>
        </div>
        @else 
        <div class="row justify-content-center align-items-center height-custom text-center">
            <div class="col-12">
                <h1 class="fst-italic display-4">
                    {{__('ui.noarticletoreview')}}
                </h1>
                <a href="{{route('homepage')}}" class="mt-5 btn btn-success">{{__('ui.gotohome')}}</a>
            </div>
        </div>
        @endif
    </div>
</x-layout>