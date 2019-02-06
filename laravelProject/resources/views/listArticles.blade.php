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
                        {{ $vArticels->links() }}
                    </nav>
                    @forelse ($vArticels as $articel)
                        <div class="border-bottom p-3">
                            <div class="d-flex small text-secondary">
                                <span>投稿者:</span>
                                <a href="#" class="mr-1">{{ $articel->user->name }}</a>
                                <span>更新日時:</span>
                                <span>{{$articel->updated_at}}</span>
                            </div>
                            <div>
                                {{-- TODO: 記事リンクをbladeでごちゃごちゃ作りたくない --}}
                                <a href='{{ url("/article/{$articel->user->name}/{$articel->title}") }}' class="h3">{{ $articel->title }}</a>
                            </div>
                            <div class="d-flex">
                                @foreach ($articel->tags as $tag)
                                    <a href="#" class="badge badge-secondary mr-1">{{$tag->tag_name}}</a>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <p>記事なし</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
