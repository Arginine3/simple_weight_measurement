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

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('WeightRegistrations.post')}}" method="post">
                        @csrf
                        <ul class="original_ul">
                            <li>
                                <label for="clint_name">氏名</label>
                                <input id="clint_name" name="clint_name" type="text" value="{{old('clint_name')}}"><br>
                            </li>
                            <li>
                                <label for="birth_date">生年月日</label>
                                <input id="birth_date"name="birth_date" type="date" value="{{old('birth_date')}}"><br>
                            </li>
                            <li>
                                <label for="sex">性別</label>
                                <input id="sex" name="sex" type="radio" value="0" @if(old('sex') == 0) checked @endif>男性
                                <input name="sex" type="radio" value="1" @if(old('sex') == 1) checked @endif>女性<br>
                            </li>
                            <li>
                                <label for="height">身長</label>
                                <input id="height" name="height" type="text" value="{{old('height')}}"><br>
                            </li>
                            <li>
                                <label for="year_month_date">測定年月</label>
                                <input id="year_month_date" name="year_month_date" type="month" value="{{old('year_month_date')}}"><br>
                            </li>
                            <li>
                                <label for="weight">体重</label>
                                <input id="weight" name="weight" type="text" value="{{old('weight')}}"><br>
                            </li>
                        </ul>
                        <ul class="original_ul2">
                            <li id="original_btn"">
                                <input id="" class="btn btn-warning" type="button" value="戻る" onclick="history.back()">
                                <input id="" class="btn btn btn-primary" type="submit" value="確認画面へ" >
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection