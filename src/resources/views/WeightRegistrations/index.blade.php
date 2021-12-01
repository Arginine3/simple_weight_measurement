@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">index.blade.php</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->
                    <a href="{{ route('WeightRegistrations.create')}}">新規登録</a><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">氏名</th>
                                <th scope="col">最終計測年月</th>
                                <th scope="col">詳細</th>
                                <th scope="col">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($WeightRegistrations as $WeightRegistration)
                                <tr>
                                    <th>{{$WeightRegistration->id }}</th>
                                    <td>{{$WeightRegistration->clint_name}}</td>
                                    <td>{{$WeightRegistration->measurement_date}}</td>
                                    <td><a href="{{route('WeightRegistrations.show', ['id' => $WeightRegistration->id])}}">詳細を見る</a></td>
                                    <td><form method="POST" action="{{route('WeightRegistrations.destroy', ['id' => $WeightRegistration->id])}}" id="delete_{{$WeightRegistration->id}}">
                                            @csrf
                                            <a href="#" style="color: red;" data-id="{{$WeightRegistration->id}}" onclick="deletePost(this);">削除する</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deletePost(e){
        'use strict';
        if(confirm('本当に削除してよろしいですか??')){
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

@endsection

