@extends('layouts.master')


@section('content')
<div class="page-header">
    <h1>
        Posts <small>what's the word</small>
        <small><span class="toggle-search pull-right glyphicon glyphicon-search"></span></small>
    </h1>
    <div class="search hidden">
        <input type="text" placeholder="Search&hellip;">
    </div>
</div>

<table class="table" id="post-table">
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>
                    <div class="dopeable dopped" data-object-type="post" data-object-id="{{ $post->id }}">
                        <span></span>
                    </div>
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
                        <a href="post/view/{{ $post->id }}#new">2 Comments</a>
                        <br>
                        <small>last by corey</small>
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}
<ul class="pagination">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
</ul>

@stop