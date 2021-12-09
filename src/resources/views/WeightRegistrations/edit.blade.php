@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit.blade.php</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <form action="{{route('WeightRegistrations.update', ['id' => $personal_info->id])}}" method="POST">
                        @csrf
                        氏名
                        <input name="clint_name" type="text" value="{{$personal_info->clint_name }}"><br>
                        生年月日
                        <input name="birth_date" type="date" value="{{$personal_info->birth_date }}"><br>
                        性別
                        <input name="sex" type="radio" value="0" @if('sex' == 0) checked @endif>男性
                        <input name="sex" type="radio" value="1" @if('sex' == 1) checked @endif>女性<br>
                        身長
                        <input name="height" type="text" value="{{$personal_info->height }}"><br>
                        <!-- 測定年月
                        <input name="measurement_date" type="month" value="{{$weight_months->year_month_date }}"><br>
                        体重
                        <input name="weight" type="text" value="{{$weight_months->weight }}"><br> -->

                        <a class="btn btn-warning" name="back" type="submit" onclick="history.back()" value="">戻る</a>
                        <button class="btn btn-primary" name="" type="submit" value="">更新</button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection