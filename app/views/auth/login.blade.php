@extends('layouts.master')


@section('content')
    <form class="form-signin" role="form" method="post">
        <div><h3 class="masthead-brand brand-large">FYIBN</h3></div>
        <input name="username" type="text" class="form-control" placeholder="Username" required autofocus value="{{{ Input::old('username') }}}">
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
            <input name="remember" type="checkbox" value="1"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
@stop
