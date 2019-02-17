@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ばばん</div>
                <div class="card-body">
                    <a href="{{route('articles')}}">記事一覧</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">どどん</div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
