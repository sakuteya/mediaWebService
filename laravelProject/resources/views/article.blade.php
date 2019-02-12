@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{$article->title}}</div> --}}
                @include('articleBlock')
                <div class="card-body">
                    <p>{{$article->body}}</p>
                </div>
                <div class="card-body">
                    <p>お気に入り数：{{$article->favorite_count}}</p>
                </div>
                {!! Form::open(['url' => 'fav']) !!}
                    <button type="submit" class="badge badge-secondary mr-1" name="favorite" >
                        Fav!!
                    </button>
                <input type="hidden" name="article_id" value="{{$article->id}}">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
