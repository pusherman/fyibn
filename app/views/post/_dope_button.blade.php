@if(Auth::user()->hasFavorited($post))
    <div class="dopeable dopped" data-object-type="post" data-object-id="{{ $post->id }}">
        <span>dope</span>
    </div>
@else
    <div class="dopeable" data-object-type="post" data-object-id="{{ $post->id }}"></div>
@endif
