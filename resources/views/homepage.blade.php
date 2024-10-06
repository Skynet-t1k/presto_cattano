<x-layout>

<div class="z-2 position-relative shadow container-fluid height-custom bg-gradient bg-light d-flex align-items-center justify-content-center">
    <h1 class="position-custom-h1">Presto.it</h1>
</div>

@if (session()->has('errorMessage'))
    <div class="alert alert-danger text-center shadow rounded w-50 mx-auto mt-3">
        {{session('errorMessage')}}
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success text-center shadow rounded w-50 mx-auto mt-3">
        {{session('message')}}
    </div>
@endif


<div class="container position-custom-home">
<div class="row height-custom justify-content-center align-items-center pb-5 bg-white h-100">
    @forelse ($articles as $article)
        <div class="col-12 col-md-4">
            <x-card :article="$article" />
        </div>
    @empty
        <div class="col-12">
            <h3 class="text-center">{{__('ui.noarticle')}}</h3>
        </div>
    @endforelse
</div>
</div>


</x-layout>