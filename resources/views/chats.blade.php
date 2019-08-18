@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">

            <chats :user={{auth()->user()}}></chats>
    </div>
</div>
@endsection