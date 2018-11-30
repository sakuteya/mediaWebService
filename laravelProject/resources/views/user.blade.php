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
                    @forelse ($vArticels as $articel)
                        <div class="border-bottom p-3">
                            <div>
                                {{-- TODO: 記事リンクをbladeでごちゃごちゃ作りたくない --}}
                                <a href='{{ url("/article/{$vUserName}/{$articel->title}") }}'>{{ $articel->title }}</a>
                            </div>
                            <div class="d-flex">
                                @foreach ($articel->tags as $tag)
                                    <a href="#" class="badge badge-dark mr-1">{{$tag->tag}}</a>
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
