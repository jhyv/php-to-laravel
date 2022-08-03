@extends('layouts.app')
@section('page-title',$user->name)

@section('page-content')
<user-card :_user="{{ $user->toJson() }}"></user-card>
<footer id="footer">
    <ul class="copyright">
        <li>&copy; Pictureworks</li>
    </ul>
</footer>
@endsection