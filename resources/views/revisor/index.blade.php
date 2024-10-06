<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center mx-auto">
                        Revisor Dashboard
                    </h1>
                </div> 
            </div> 
        </div> 

        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        @if ($article_to_check)
            <div class="container">
                <div class="row justify-content-center p-2">
                    <!-- Images Section -->
                    <div class="col-md-8 d-flex flex-column align-items-center">
                        @if ($article_to_check->images->count())
                            <div class="row justify-content-center">
                                @foreach ($article_to_check->images as $key => $image)
                                <div class="col-12">
                                    <div class="card mb-3 rounded shadow">
                                        <div class="card-body">
                                            <!-- Center the image -->
                                            <div class="text-center">
                                                <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow"
                                                    alt="Image {{ $key + 1 }} of article {{ $article_to_check->title }}">
                                            </div>
                                            <!-- Labels and Ratings under the image -->
                                            <div class="row mt-3">
                                                <!-- Labels Column -->
                                                <div class="col-md-6">
                                                    <h5>Labels</h5>
                                                    @if ($image->labels)
                                                        @foreach ($image->labels as $label)
                                                            <span class="badge bg-secondary">#{{ $label }}</span>
                                                        @endforeach
                                                    @else
                                                        <p class="fst-italic">No labels</p>
                                                    @endif
                                                </div>
                                                <!-- Ratings Column -->
                                                <div class="col-md-6">
                                                    <h5>Ratings</h5>
                                                    @foreach (['adult', 'violence', 'spoof', 'racy', 'medical'] as $rating)
                                                            <div class="row justify-content-center">
                                                                <div class="col-12 d-flex">
                                                                    <div class="text-center me-1 {{ $image->$rating }}"></div>
                                                                    <div class="">{{ $rating }}</div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                            @endforeach
                            
                            </div> 
                        @else
                            <div class="row justify-content-center">
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="col-6 col-md-4 mb-4 text-center">
                                        <img src="{{ asset('img/no-image.png') }}" class="img-fluid rounded shadow"
                                            alt="Immagine segnaposto">
                                    </div>
                                @endfor
                            </div> 
                        @endif
                    </div> 

                    <!-- Article Info Section -->
                    <div class="col-md-4 ps-4 d-flex flex-column justify-content-between shadow-lg rounded revbox border">
                        <div class="h-100 d-flex flex-column justify-content-evenly">
                            <h1>{{ __('ui.title') }}: {{ $article_to_check->title }}</h1>
                            <h3>{{ __('ui.author') }}: {{ $article_to_check->user->name }}</h3>
                            <h4>{{ __('ui.price') }}: {{ $article_to_check->price }}</h4>
                            <h4>{{ __('ui.category') }}: {{ __('ui.' . $article_to_check->category->name) }}</h4>
                            <p class="h6">{{ __('ui.description') }}: {{ $article_to_check->description }}</p>
                        </div>
                        <div class="d-flex pb-4 justify-content-around">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-danger py-2 px-5 fw-bold shadow">{{ __('ui.reject') }}</button>
                            </form>
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success py-2 px-5 fw-bold shadow">{{ __('ui.accept') }}</button>
                            </form>
                        </div>
                    </div> 
                </div> 
            </div> 
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">
                        {{ __('ui.noarticletoreview') }}
                    </h1>
                    <a href="{{ route('homepage') }}" class="mt-5 btn btn-success">{{ __('ui.gotohome') }}</a>
                </div>
            </div>
        @endif
    </div> 
</x-layout>
