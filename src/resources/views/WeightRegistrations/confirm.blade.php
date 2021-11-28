@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">confirm.blade.php</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    create.bladeのデータを引き継いで表示する<br>
                    <button class="btn btn-warning">戻る</button>
                    <button class="btn btn-primary">登録</button><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection