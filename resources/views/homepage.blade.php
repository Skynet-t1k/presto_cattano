<x-layout>

@if (session()->has('errorMessage'))
    <div class="alert alert-danger text-center shadow rounded w-50">
        {{session('errorMessage')}}
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-danger text-center shadow rounded w-50">
        {{session('message')}}
    </div>
@endif



<div class="row height-custom justify-content-center align-items-center py-5">
    @forelse ($articles as $article)
        <div class="col-12 col-md-3">
            <x-card :article="$article" />
        </div>
    @empty
        <div class="col-12">
            <h3 class="text-center">Non sono stati creati articoli</h3>
        </div>
    @endforelse
</div>

</x-layout>