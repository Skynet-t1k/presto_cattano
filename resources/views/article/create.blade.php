<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="pt5">
                    {{__('ui.publisharticle')}}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <livewire:create-article-form />
            </div>
        </div>
    </div>

</x-layout>