@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{$article->title}}</div> --}}
                @include('articleBlock')

                <div class="card-body">
                    {!! nl2br(e($article->body)) !!}
                </div>

                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                    <a class="navbar-brand" href="#">記事メニュー</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#articleNavbar" aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="articleNavbar">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            @if ($article->isFavorite())
                                {!! Form::open(['url' => 'delFav']) !!}
                                    <button type="submit" class="btn btn-warning m-1" name="favorite" >
                                        ★お気に入り済み
                                        <span class="badge badge-pill badge-light">{{$article->countFavorite()}}</span>
                                        <span class="sr-only">お気に入り数</span>
                                    </button>
                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['url' => 'fav']) !!}
                                    <button type="submit" class="btn btn-warning m-1" name="favorite" >
                                        ☆お気に入りへ追加
                                        <span class="badge badge-pill badge-light">{{$article->countFavorite()}}</span>
                                        <span class="sr-only">お気に入り数</span>
                                    </button>
                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                {!! Form::close() !!}
                            @endif
                        </li>
                        </ul>
                        @can('update', $article)
                            <div>
                                <a href='{{ $article->routeEdit() }}' class="btn btn-outline-success m-1">編集</a>
                            </div>
                            <!-- 削除モーダル呼び出し -->
                            <button type="button" class="btn btn-outline-danger m-1" data-toggle="modal" data-target="#deleteModal">
                                削除
                            </button>
                        @endcan
                    </div><!-- /.navbar-collapse -->
                </nav>
                <!-- 削除モーダルの設定 -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">記事の削除</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>記事、コメントは完全に削除されます。よろしいですか？</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <a href='{{ $article->routeDelete() }}' class="btn btn-outline-danger">削除</a>
                            </div><!-- /.modal-footer -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            </div>
        </div>
    </div>
    {{-- コメント一覧 --}}
    @foreach ($article->comments as $comment)
        <div class="row justify-content-center mb-2">
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
        {{-- FIXME:あんまりID書きたくない --}}
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header">コメントを投稿する</div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="form-control" row="40" name="comment"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-outline-primary" name="comment_btn" >
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
