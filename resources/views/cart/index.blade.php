@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card my-4">
                    <div class="card-header">Session contents:</</div>

                    <div class="card-body">

                        <ul>
                        @foreach($session as $ses)
                            <li>{{ $ses or '' }}</li>
                        @endforeach
                        </ul>

                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection
