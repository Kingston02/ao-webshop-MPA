@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card my-4">
                    <div class="card-header">Session contents:</</div>

                    <div class="card-body">

                        <ul>
                        @foreach($session ?? '' as $ses)

                            <img src="{{ $ses->image_url }}" style='width:200px;position:relative;'>
                            <h1>{{ $ses->name }}</h1>
                            <p>{{ $ses->description }}</p>
                            <h1>€{{ $ses->price }},-</h1>

                            <p class="btn-holder"><a href="{{ url('delete/'.$ses->id) }}" class="btn btn-danger btn-block text-center" role="button">Verwijderen</a> </p>
                            </div>

                        @endforeach
                        </ul>




                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection
