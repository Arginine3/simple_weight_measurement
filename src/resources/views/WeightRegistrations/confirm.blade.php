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
                        <div>{{ $personal_infos["clint_name"] }}</div>
                        <div>{{ $personal_infos['birth_date'] }}</div>
                        <div>{{ $personal_infos['sex'] }}</div>
                        <div>{{ $personal_infos['height'] }}</div>
                        <div>{{ $weight_months['year_month_date'] }}</div>
                        <div>{{ $weight_months['weight'] }}</div>
                        <input name="clint_name" type="hidden" value="{{ $personal_infos["clint_name"] }}">
                        <input name="birth_date" type="hidden" value="{{ $personal_infos["birth_date"] }}">
                        <input name="sex" type="hidden" value="{{ $personal_infos["sex"] }}">
                        <input name="height" type="hidden" value="{{ $personal_infos["height"] }}">
                        <input name="client_id" type="hidden" value="{{ $weight_months["client_id"] }}">
                        <input name="year_month_date" type="hidden" value="{{ $weight_months["year_month_date"] }}">
                        <input name="weight" type="hidden" value="{{ $weight_months["weight"] }}">
                        <button class="btn btn-warning" name="back" type="submit" value="true">戻る</button>
                        <button class="btn btn-primary" name="" type="submit" value="false">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection