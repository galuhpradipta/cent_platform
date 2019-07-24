@extends('layouts.app')

@section('title')
    <title>Dashboard</title>
@endsection

@section('custom-css')
   
@endsection


@section('content')
    @section('left-sidebar')
        @include('ent.spv.layouts.left-sidebar')
    @endsection

    <div class="container-fluid">
        <h1>Index Page</h1>
    </div>
@endsection

@section('scripts')

@endsection