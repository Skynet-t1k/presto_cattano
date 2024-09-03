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
        <div class="mb-3">
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
            @error('temporary_images')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>{{__('ui.photopreview')}}:</p>
                </div>
                <div class="row mx-auto border border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image)
                        <div class="col-12 d-flex flex-column align-items-center my-3">
                            <div class="img-preview mx-auto shadow rounded"
                            style="background-image: url({{ $image->temporaryUrl() }});"></div>
                        </div>
                        <button type="button" class="btn mt-1 btn-danger"
                            wire:click="removeImage({{ $key }})">X</button>
                    @endforeach
                </div>
            </div>
        @endif
        <button type="submit" class="btn form-button w-100 mt-2">{{__('ui.publish')}}</button>
    </form>
</div>

