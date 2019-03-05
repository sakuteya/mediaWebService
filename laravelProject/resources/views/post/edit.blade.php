@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    {{-- TODO:なんだこれ --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ポスト作成フォーム -->

    {{-- {!! Form::open(['url' => 'post']) !!} --}}
    {!! Form::open(['method' => 'PATCH', 'url' => ['article', $article->user->name, $article->title]]) !!}
        <input type="hidden" name="article_id" value="{{$article->id}}">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- input type="text" string -->
                <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                    <label>タイトル - 編集中</label>
                    <input type="text" name="title" value="{{$article->title}}" class="form-control">
                    <span class="help-block">{{$errors->first('title')}}</span>
                </div>

                <div class="row">
                    @foreach ($article->tags as $tag)
                        <div class="col-md-2">
                            <!-- input type="text" string -->
                            <div class="form-group @if(!empty($errors->first('tag'.$loop->index))) has-error @endif">
                                <label>タグ{{ $loop->index }}</label>
                                <input type="text" name="tag{{ $loop->index }}" value="{{$tag->tag_name}}" class="form-control">
                                <span class="help-block">{{$errors->first('tag'.$loop->index)}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- textarea -->
                <div class="form-group @if(!empty($errors->first('body'))) has-error @endif">
                    <label>本文</label>
                    <textarea name="body" class="form-control" rows="10">{{$article->body}}</textarea>
                    <span class="help-block">{{$errors->first('body')}}</span>
                </div>

                <div class="text-right">
                    <button type='submit' class="btn btn-primary">
                        更新する
                    </button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

@endsection
