
    @if(Auth::user()->avatar)
    <div class="contenedor-avatar">
        <img src="{{route('avatar.user',['filename'=> Auth::user()->avatar])}}" class="avatar rounded-circle" alt="Image placeholder">
    </div>
    @endif
