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
    </div>
    {{-- コメント一覧 --}}
    @foreach ($article->comments as $comment)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="text-left float-left">{{$comment->user->name}}</div>
                        <div class="text-right">{{$comment->created_at}}</div>
                    </div>
                    <div class="card-body">
                        <pre>{{$comment->comment}}</pre>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {!! Form::open(['url' => 'comment']) !!}
    <div class="row justify-content-center">
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header">コメントを投稿する</div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="form-control" row="40" name="comment"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" name="comment_btn" >
                            コメントする
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
