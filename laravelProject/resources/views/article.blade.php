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
                    <p>お気に入り数：{{$article->countFavorite()}}</p>
                </div>
                @if ($article->isFavorite())
                    {!! Form::open(['url' => 'delFav']) !!}
                        <button type="submit" class="btn btn-warning" name="favorite" >
                            ★お気に入り済み
                        </button>
                        <input type="hidden" name="article_id" value="{{$article->id}}">
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['url' => 'fav']) !!}
                        <button type="submit" class="btn btn-warning" name="favorite" >
                            ☆お気に入りへ追加
                        </button>
                        <input type="hidden" name="article_id" value="{{$article->id}}">
                    {!! Form::close() !!}
                @endif
            </div>
        </div>

        @foreach ($article->comments as $comment)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <p>{{$comment->comment}}</p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">

                {!! Form::open(['url' => 'comment']) !!}
                    <textarea type="text" name="comment"></textarea>
                    <button type="submit" class="btn btn-primary" name="comment_btn" >
                        コメントする
                    </button>
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
