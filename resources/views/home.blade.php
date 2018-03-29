@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row text-center">
        <div class="col-sm-12">
            <h1>ME name is gallad</h1>
        </div>
    </div>
</div>

@if(count($todos) == 0)

<h3>Gots no todos</h3>

@else

<h3>Here are the todods :</h3>
<ul>
    @for($i=0; $i < count($todos); $i++)
    <li>{{ $todos[$i] }}</li>
    @endfor
</ul>

@endif

@endsection
