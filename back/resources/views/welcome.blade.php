@extends('layouts.master')

@section('content')
<div class="container mt-5 text-center">
    <h1>Benvingut al CRUD de NetCore {{ Auth::user()->name }}!!</h1>
</div>
@endsection
