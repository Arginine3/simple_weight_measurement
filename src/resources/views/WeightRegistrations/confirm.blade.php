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
                    <form method="post" action="{{route('WeightRegistrations.store')}}">
                    @csrf
                      <div>{{ $input["clint_name"] }}</div>
                      <div>{{ $input['birth_date'] }}</div>
                      <div>{{ $input['sex'] }}</div>
                      <div>{{ $input['height'] }}</div>
                      <div>{{ $input['weight'] }}</div>
                      <div>{{ $input['measurement_date'] }}</div>
                      <input class="btn btn-warning" name="back" type="submit" value="戻る" />
                      <input class="btn btn-primary" type="submit" value="送信" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection