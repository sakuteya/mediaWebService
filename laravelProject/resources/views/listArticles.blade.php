@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">記事一覧</div>
                <div class="paginate card-body">
                    {{-- <div class="search">
                        {{ Form::open(['method' => 'GET']) }}
                        {{ Form::input('検索する', 'q', null) }}
                        {{ Form::close() }}
                    </div> --}}
                    <nav aria-label="検索結果ページ">
                        {{ $vArticles->appends(Request::query())->links() }}
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
