@extends('layouts.app')

@section('content')
<div id="projectApp" class="container">
        
       
        <router-view name="navTab"></router-view>
        <router-view name="content"></router-view>
        
</div>
@endsection