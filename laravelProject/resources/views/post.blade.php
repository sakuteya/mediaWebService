@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <!-- ポスト完了！ -->
                    投稿しました！
                </div>
                <div class="card-body">
                    @include('articleBlock')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
