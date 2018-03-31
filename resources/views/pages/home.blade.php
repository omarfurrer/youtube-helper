@extends('layouts.main')

@section('content')

<form action="{{ url('/youtube/link/info') }}" method="GET">
    <input name="url" type="text">
    <button type="submit">Get Info</button>
</form>

@endsection
