@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header">Winkelmandje:</</div>

                    @foreach($items as $item)
                        <div class="card my-4" style='padding:40px;'>
                            <ul>
                                <img src="{{ $item->image_url }}" style='width:200px;position:relative;'>
                                <h1>{{ $item->name }}</h1>
                                <p>{{ $item->description }}</p>
                                <p>€{{ $item->price }},-</p>
                            </ul>
                            <p class="btn-holder"><a href="{{ url('remove-from-cart/'.$item->id) }}" class="btn btn-danger btn-block text-center" role="button">Remove</a> </p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
