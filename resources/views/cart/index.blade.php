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
                                <img src="{{ $item->image_url }}" style='width:100px;position:relative;'>
                                <h1>{{ $item->name }}</h1>
                                <p>{{ $item->description }}</p>
                                <p>€{{ $item->price }},-</p>
                            </ul>
  
                            <div class="btn-group">
                                <input type="number" id="quantity" name="quantity" min="1" max="100" value='1'>
                                <a href="#" class="btn btn-primary">Update</a>
                                <a href="{{ url('remove-from-cart/'.$item->id) }}" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <br>
                    <h3>Totaal prijs: €{{ $priceTot }},-</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
