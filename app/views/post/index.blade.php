@extends('layouts.master')


@section('content')
<div class="page-header">
    <h1>
        Posts <small>what's the word</small>
        <small><span class="toggle-search pull-right glyphicon glyphicon-search"></span></small>
    </h1>
    <div class="search hidden">
        <form action="/search/all" method="get" accept-charset="utf-8">
            <input type="text" name="query" placeholder="Search&hellip;">
        </form>
    </div>
</div>

<table class="table" id="post-table">
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>
                    @include('post._dope_button')
                </td>
                <td>
                    <strong>
                        @if($post->isNew())
                            <span class="label label-danger">New</span>
                        @endif

                        {{ link_to_route('postView', $post->title, ['id' => $post->id]) }}
                    </strong>
                    <br>
                    <small>
                        <span id="dope-count-{{ $post->id }}">{{ $post->points }}</span>
                        {{ str_plural('point', $post->points) }}
                        &nbsp; Added {{ $post->created_at->diffForHumans() }} by
                        {{ $post->user->username }}
                    </small>
                </td>

                <td style="width:20%">
                    <div class="pull-right">
                        <a href="post/view/{{ $post->id }}#new">
                            {{ $post->comments->count() }} {{str_plural('Comment', $post->comments->count()) }}
                        </a>

                        @if($post->comments->count())
                            <br>
                            <small>last by {{ $post->lastCommentBy() }}</small>
                        @endif

                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

<div class="centered">
{{ $posts->links() }}
</div>

@stop
