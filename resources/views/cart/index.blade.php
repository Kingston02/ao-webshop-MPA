@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card my-4">
                    <div class="card-header">Session contents:</</div>

                    <div class="card-body">

                        <ul>
                        <!--

                            <img src="" style='width:200px;position:relative;'>
                            <h1>title</h1>
                            <p>description</p>
                            <h1>€prijs,-</h1>
-->
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$prod->id) }}" class="btn btn-danger btn-block text-center" role="button">Verwijderen</a> </p>
                            </div>


                        </ul>

                        {{ $items }}


                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection
