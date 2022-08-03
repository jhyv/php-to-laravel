@extends('layouts.app')
@section('page-title','User Card - .'$user->name)

@section('page-content')
<div id="wrapper">
    <section id="main">
        <header>
            <span class="avatar"><img src="images/users/{{$user->id}}.jpg" alt="" /></span>
            <h1>{{ $user->name }}</h1>
            <p>{{ nl2br($user->comments) }}</p>
        </header>
    </section>
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; Pictureworks</li>
        </ul>
    </footer>
</div>
@endsection