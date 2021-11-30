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
                    <form action="" method="POST">
                        @csrf
                        氏名
                        <input name="clint_name" type="text" value="{{$WeightRegistration->clint_name }}"><br>
                        生年月日
                        <input name="birth_date" type="date" value="{{$WeightRegistration->date }}"><br>
                        性別
                        <input name="sex" type="radio" value="0" @if($WeightRegistration->sex === 0) checked @endif>男性
                        <input name="sex" type="radio" value="1" @if($WeightRegistration->sex === 1) checked @endif>女性<br>
                        身長
                        <input name="height" type="text" value="{{$WeightRegistration->height }}"><br>
                        体重
                        <input name="weight" type="text" value="{{$WeightRegistration->weight }}"><br>
                        測定年月
                        <input name="measurement_date" type="month"><br>

                        <button class="btn btn-warning">戻る</button>
                        <input class="btn btn-primary" type="submit" value="再登録" >
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection