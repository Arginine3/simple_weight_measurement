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
                        氏名
                        <input name="clint_name" type="text" value="{{old('clint_name')}}"><br>
                        生年月日
                        <input name="birth_date" type="date" value="{{old('birth_date')}}"><br>
                        性別
                        <input name="sex" type="radio" value="0" @if(old('sex') == 0) checked @endif>男性
                        <input name="sex" type="radio" value="1" @if(old('sex') == 1) checked @endif>女性<br>
                        身長
                        <input name="height" type="text" value="{{old('height')}}"><br>
                        測定年月
                        <input name="year_month_date" type="month" value="{{old('year_month_date')}}"><br>
                        体重
                        <input name="weight" type="text" value="{{old('weight')}}"><br>

                        <input class="btn btn-primary" type="submit" value="確認画面へ" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection