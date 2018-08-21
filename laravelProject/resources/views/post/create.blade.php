@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @@parent

    <p>ここはメインのサイドバーに追加される</p>
@endsection

@section('content')
    <p>ここが本文のコンテンツ</p>

    <h1>ポスト作成</h1>

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

        <button type='submit' name='tsts'>
            とうこうぼたん
        </button>
        <input type='text' name='title'>
        <input type='text' name='body'>

    </form>

@endsection