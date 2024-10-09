<footer>

@auth
    @if (!Auth::user()->is_revisor)
        <div class="col-md-5 offset-md-1 mb-3 text-center">
            <h5>{{__('ui.becomereviewer')}}</h5>
            <p>{{__('ui.inforeviewer')}}</p>
            <a href="{{ route('become.revisor') }}" class="btn bg-btn-revisor">{{__('ui.clickreviewer')}}</a>
        </div>
    @endif
@endauth
<p class="text-center m-0">@Skynet</p>

</footer>