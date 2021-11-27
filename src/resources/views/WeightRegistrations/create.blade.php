@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">createです</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <form action="{{route('WeightRegistrations.store')}}" method="post">
                        @csrf
                        氏名
                        <input name="your_name" type="text"><br>
                        年齢
                        <input name="age" type="text"><br>
                        性別
                        <input name="gender" type="radio" value="0">男性</input>
                        <input name="gender" type="radio" value="1">女性</input><br>
                        身長
                        <input name="height" type="text"><br>
                        体重
                        <input name="weight" type="text"><br>
                        測定年月
                        <input name="measurement_date" type="month"><br>
                        <input class="btn btn-primary" type="submit" value="登録する" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection