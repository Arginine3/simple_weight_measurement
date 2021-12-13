@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">show.blade.php</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <form action="{{route('WeightRegistrations.edit', ['id' => $personal_info->id])}}" method="GET">
                        @csrf
                        {{$personal_info->clint_name }}<br>
                        {{$personal_info->birth_date }}<br>
                        {{$sex }}<br>
                        {{$personal_info->height }}<br>
                        <button type="button" onclick="history.back()" class="btn btn-warning">戻る</button>
                        <input class="btn btn-primary" type="submit" value="変更する" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection