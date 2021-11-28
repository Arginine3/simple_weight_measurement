@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">index.blade.php</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <a href="{{ route('WeightRegistrations.create')}}">新規登録</a><br>
                    Home画面が表示される予定
                </div>
            </div>
        </div>
    </div>
</div>
@endsection