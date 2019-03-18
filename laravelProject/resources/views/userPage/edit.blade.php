@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['method' => 'PATCH', 'url' => [ $user->name ]]) !!}
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{$user->name}}</div>
                    <div class="card-body">
                        <!-- textarea -->
                        <div class="form-group border-bottom pb-3 mb-3 @if(!empty($errors->first('profile'))) has-error @endif">
                            <label>プロフィール - 編集中</label>
                            <textarea name="profile" class="form-control" rows="10">{{$user->profile}}</textarea>
                            <span class="help-block">{{$errors->first('profile')}}</span>
                        </div>
                        <div class="text-right">
                            <button type='submit' class="btn btn-outline-success">
                                更新する
                            </button>
                        <div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
