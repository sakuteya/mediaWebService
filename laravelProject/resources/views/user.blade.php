@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$vUserName}}</div>
                <div class="card-body">
                    <p>{{$vProfile}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">記事一覧</div>
                <div class="card-body">
                    <nav aria-label="検索結果ページ">
                        {{ $vArticles->links() }}
                    </nav>
                    @forelse ($vArticles as $article)
                        @include('articleBlock')
                    @empty
                        <p>記事なし</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
