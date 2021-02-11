@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($products as $prod)

                <div class="card my-4">

                    <img src="{{ $prod->image_url }}" style='width:300px;'>
                    <h1>{{ $prod->name }}</h1>
                    <p>{{ $prod->description }}</p>
                    <h1>{{ $prod->price }}</h1>
                    <h1>{{ $prod->price }}</h1>
                </div>

            @endforeach
            
        </div>
    </div>
</div>
@endsection
