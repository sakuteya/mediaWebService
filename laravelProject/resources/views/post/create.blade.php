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

    <form action='post' method='store'>
        {{ csrf_field() }}

        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- input type="text" string -->
                <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                    <label>タイトル</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control">
                    <span class="help-block">{{$errors->first('title')}}</span>
                </div>


                <!-- textarea -->
                <div class="form-group @if(!empty($errors->first('body'))) has-error @endif">
                    <label>本文</label>
                    <textarea name="body" class="form-control" rows="10">{{old('body')}}</textarea>
                    <span class="help-block">{{$errors->first('body')}}</span>
                </div>

                <div class="text-right">
                    <button type='submit' class="btn btn-primary">
                        投稿する
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection
