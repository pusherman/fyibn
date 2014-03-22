@extends('layouts.master')


@section('content')

<div class="page-header">
    <h1>
        New Post <small>say somethin'</small>
    </h1>
</div>

<form role="form" method="post">
    <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="Title">
    </div>

    <div class="checkbox">
        <label>
            <input name="request" value="1" type="checkbox"> Request
        </label>
    </div>
    <br>
    
    <div class="form-group">
        <input type="text" name="url" class="form-control" placeholder="Link">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
</form>

@stop