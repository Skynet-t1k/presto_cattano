    <div>
    @if (session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
   @endif
        
    <form class="mt-5 border rounded shadow p-4 glow-form fw-bold" wire:submit="store">
        <div class="mb-3">
            <label for="title" class="form-label">{{__('ui.title')}}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.blur="title">
            @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{__('ui.description')}}</label>
            <textarea id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" wire:model.blur="description"></textarea>
            @error('description')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">{{__('ui.price')}}</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price">
            @error('price')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <select id="category" wire:model.blur="category" class="form-control @error('category') is-invalid @enderror">
                <option value="" disabled selected>{{__('ui.selcategory')}}</option>
                @foreach ($categories as $category)
               
                <option value="{{ $category->id }}">{{__("ui.$category->name")  }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn form-button w-100">{{__('ui.publish')}}</button>
    </form>
</div>

