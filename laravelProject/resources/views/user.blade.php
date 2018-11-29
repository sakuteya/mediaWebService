@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$vUserName}}</div>

                <div class="card-body">
                    <p>{{$vProfile}}</p>
                </div>
                <div class="card-body">

                    @forelse ($vArticels as $articel)
                        <div>
                            {{-- TODO: 記事リンクをbladeでごちゃごちゃ作りたくない --}}
                            <a href='{{ url("/article/{$vUserName}/{$articel->title}") }}'>{{ $articel->title }}</a>
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
