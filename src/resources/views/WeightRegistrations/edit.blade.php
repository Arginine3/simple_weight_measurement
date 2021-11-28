@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show.blade.php</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <!-- データの引き継ぎ{{$Individual->clint_name}} -->

                    <form action="{{route('WeightRegistrations.update', ['id' => $Individual->id ])}}" method="POST">
                        @csrf
                        氏名
                        <input name="clint_name" type="text" value="{{ $Individual-> clint_name }}"><br>
                        年齢
                        <input name="birth_date" type="text"><br>
                        性別
                        <input name="sex" type="radio" value="0">男性</input>
                        <input name="sex" type="radio" value="1">女性</input><br>
                        身長
                        <input name="height" type="text" height="{{ $Individual-> height }}"><br>
                        体重
                        <input name="weight" type="text" value="{{ $Individual-> weight }}"><br>
                        測定年月
                        <input name="measurement_date" type="month"><br>

                        <button class="btn btn-warning">戻る</button>
                        <input class="btn btn-primary" type="submit" value="更新する" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection