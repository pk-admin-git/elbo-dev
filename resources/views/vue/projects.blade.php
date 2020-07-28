@extends('layouts.app')

@section('content')
<div id="projectApp" class="container">
        
        @auth
        <router-view name="navTab"></router-view>
        <router-view name="content"></router-view>
        @endauth
</div>
@endsection