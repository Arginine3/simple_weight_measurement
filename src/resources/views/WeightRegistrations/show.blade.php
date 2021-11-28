@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show.blade.php</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <!-- データの引き継ぎ{{$Individual->clint_name}} -->

                    {{ $Individual-> clint_name }}
                    {{ $Individual-> weight }}
                    {{ $Individual-> height }}

                    <form action="{{route('WeightRegistrations.edit', ['id' => $Individual->id ])}}" method="GET">
                        @csrf

                        <button class="btn btn-warning">戻る</button>
                        <input class="btn btn-primary" type="submit" value="編集画面へ" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection