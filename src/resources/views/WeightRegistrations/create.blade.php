@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create.blade.php</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <form action="{{route('WeightRegistrations.post')}}" method="post">
                        @csrf
                        氏名
                        <input name="clint_name" type="text"><br>
                        生年月日
                        <input name="birth_date" type="date"><br>
                        性別
                        <input name="sex" type="radio" value="0">男性
                        <input name="sex" type="radio" value="1">女性<br>
                        身長
                        <input name="height" type="text"><br>
                        体重
                        <input name="weight" type="text"><br>
                        測定年月
                        <input name="measurement_date" type="month"><br>
                        <input class="btn btn-primary" type="submit" value="確認画面へ" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection