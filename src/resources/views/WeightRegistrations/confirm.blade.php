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
                    こちらの内容で登録します。よろしいですか??<br>
                    <form method="post" action="{{route('WeightRegistrations.store')}}">
                    @csrf
                        <div>{{ $input["clint_name"] }}</div>
                        <div>{{ $input['birth_date'] }}</div>
                        <div>{{ $input['sex'] }}</div>
                        <div>{{ $input['height'] }}</div>
                        <div>{{ $input['year_month_date'] }}</div>
                        <div>{{ $input['weight'] }}</div>
                        <input name="clint_name" type="hidden" value="{{ $input["clint_name"] }}">
                        <input name="birth_date" type="hidden" value="{{ $input["birth_date"] }}">
                        <input name="sex" type="hidden" value="{{ $input["sex"] }}">
                        <input name="height" type="hidden" value="{{ $input["height"] }}">
                        <input name="year_month_date" type="hidden" value="{{ $input["year_month_date"] }}">
                        <input name="weight" type="hidden" value="{{ $input["weight"] }}">
                        <button class="btn btn-warning" name="back" type="submit" value="true">戻る</button>
                        <button class="btn btn-primary" name="" type="submit" value="false">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection