@extends('layouts.master')


@section('content')

<div class="page-header">
    <div class="row" id="post-view">
        <div class="col-md-1">
            <div class="dopeable dopped" data-object-type="post" data-object-id="{{ $post->id }}" style="margin-top:20px">
                <span></span>
            </div>
        </div>

        <div class="col-md-11">
            <section id="post-details">
                <h2>
                    @if ($post->url)
                        {{{ $post->title }}}
                    @else
                        {{ link_to($post->url, $post->title, ['target' => '_blank']) }}
                    @endif
                    <br>
                    <small>
                        by {{ $post->user->username }} 
                        {{ $post->created_at->diffForHumans() }}
                    </small>
                </h2>
            </section>    
        </div>
    </div>
</div>

<div class="comment-list">

@foreach($post->comments as $comment)
<div class="row comment" style="margin-bottom:15px">
    <blockquote>
        <p>{{ $comment->body }}</p>
        <footer><cite title="{{ $comment->created_at->diffForHumans() }}">{{ $comment->user->username }}</cite></footer>
    </blockquote>
</div>
@endforeach

<form role="form" method="post" action="{{ route('createComment', ['post_id' => $post->id]) }}">
    <div class="form-group">
        <textarea placeholder="Add to the nonsense..." style="width:100%;height:300px" name="body"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>


@stop