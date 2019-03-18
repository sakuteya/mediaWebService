@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$user->name}}</div>
                <div class="card-body">
                    <div class="border-bottom pb-3 mb-3">
                        {!! nl2br(e($user->profile)) !!}
                    </div>
                    @can('update', $user)
                        <div class="text-right">
                            <a href='{{ $user->routeEdit() }}' class="btn btn-outline-success m-1">編集</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">記事一覧</div>
                <div class="card-body">
                    <nav aria-label="検索結果ページ">
                        {{ $articles->links() }}
                    </nav>
                    @forelse ($articles as $article)
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
