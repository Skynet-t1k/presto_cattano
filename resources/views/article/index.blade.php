<x-layout>

    <div class="container">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{__('ui.allArticles')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                       {{__('ui.noarticle')}}
                    </h3>
                </div>
            @endforelse
        </div>
    
    <div class="justify-content-center d-flex">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</div>

</x-layout>