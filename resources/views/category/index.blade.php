@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($categories as $cat)

                <div class="card my-4">
                    <div class="card-header">{{ $cat->name }}</div>

                    <a href='products/{{ $cat->id }}'>
                        <div class="card-body">
                            <img src="{{ $cat->image_url }}" style='width:100px;'>
                        </div>
                    </a>

                </div>
                

            @endforeach

            <form action='/filter' method='GET'>
                <select name="categoryId" id="categoryId">
                        @foreach(App\Category::all() as $cat) 
                            <option value="{{ $cat['id'] }}">{{ $cat['id'] }}</option>
                        @endforeach
                </select>
                <button type='submit'>Filter</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
