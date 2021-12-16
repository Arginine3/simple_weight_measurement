@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">addition.blade.php</div>

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

                    <form action="{{route('WeightRegistrations.addition', ['id' => $personal_info->id])}}" method="POST">
                        @csrf
                        氏名
                        <span>{{$personal_info->clint_name}}</span><br>
                        測定年月
                        <input name="year_month_date" type="month" value=""><br>
                        体重
                        <input name="weight" type="text" value=""><br>

                        <a class="btn btn-warning" name="back" type="submit" onclick="history.back()" value="">戻る</a>
                        <button class="btn btn-primary" name="" type="submit" value="">登録</button>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection