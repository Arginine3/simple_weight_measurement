@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">confirm.blade.php</div>

                @error('clint_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <form method="post" action="{{route('WeightRegistrations.store')}}">
                    @csrf
                    <ul class="original_ul">
                        <li>
                            <p>こちらの内容で登録します。よろしいですか??</p>
                        </li>
                        <li>
                            <div> <span>氏名 : </span> {{ $personal_infos["clint_name"] }}</div>
                        </li>
                        <li>
                            <div> <span>生年月日 : </span> {{ $personal_infos['birth_date'] }}</div>
                        </li>
                        <li>
                            <div> <span>性別 : </span> @if($personal_infos->sex == 0) 男性
                                @elseif($personal_infos->sex == 1) 女性
                                @endif
                            </div>
                        </li>
                        <li>
                            <div> <span>身長 : </span> {{ $personal_infos['height'] }}</div>
                        </li>
                        <li>
                            <div> <span>測定年月 : </span> {{ $weight_months['year_month_date'] }}</div>
                        </li>
                        <li>
                            <div> <span>体重 : </span> {{ $weight_months['weight'] }}</div>
                        </li>
                    </ul>
                    <ul class="original_ul2">
                            <li id="original_btn"">
                                <button class="btn btn-warning" name="back" type="submit" value="true">戻る</button>
                                <button class="btn btn-primary" name="" type="submit" value="false">登録</button>
                            </li>
                    </ul>
                        <!-- DBにデータを保存するために リクエストの形で postメソッドに送る -->
                        <input name="clint_name" type="hidden" value="{{ $personal_infos->clint_name }}">
                        <input name="birth_date" type="hidden" value="{{ $personal_infos->birth_date }}">
                        <input name="sex" type="hidden" value="{{ $personal_infos->sex }}">
                        <input name="height" type="hidden" value="{{ $personal_infos->height }}">
                        <input name="year_month_date" type="hidden" value="{{ $weight_months->year_month_date }}">
                        <input name="weight" type="hidden" value="{{ $weight_months->weight }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection