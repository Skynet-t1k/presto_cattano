<x-layout>

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



<div class="row height-custom justify-content-center align-items-center py-5">
    @forelse ($articles as $article)
        <div class="col-12 col-md-3">
            <x-card :article="$article" />
        </div>
    @empty
        <div class="col-12">
            <h3 class="text-center">{{__('ui.noarticle')}}</h3>
        </div>
    @endforelse
</div>

</x-layout>