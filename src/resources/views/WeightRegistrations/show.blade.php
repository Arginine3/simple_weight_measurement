@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="">show.blade.php</div>

                <div class="">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <form action="{{route('WeightRegistrations.edit', ['id' => $WeightRegistration->id])}}" method="GET">
                        @csrf
                        {{$WeightRegistration->clint_name }}<br>
                        {{$WeightRegistration->weight }}<br>
                        {{$WeightRegistration->height }}<br>
                        {{$sex }}<br>
                        <button class="btn btn-warning">戻る</button>
                        <input class="btn btn-primary" type="submit" value="変更する" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection