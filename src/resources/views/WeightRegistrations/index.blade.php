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
                    <a href="{{ route('WeightRegistrations.create')}}">新規登録</a>
                    <a href="">今月の体重を記録する</a><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">氏名</th>
                                <th scope="col">性別</th>
                                <th scope="col">生年月日</th>
                                <th scope="col">個人情報</th>
                                <th scope="col">今月の体重</th>
                                <th scope="col">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($personal_infos as $personal_info)
                                <tr>
                                    <th>{{$personal_info->id }}</th>
                                    <td>{{$personal_info->clint_name}}</td>
                                    <td>{{$personal_info->sex}}</td>
                                    <td>{{$personal_info->birth_date}}</td>
                                    <td><a href="{{route('WeightRegistrations.show', ['id' => $personal_info->id])}}">詳細</a></td>
                                    <td><a href="{{route('WeightRegistrations.WeightCreate', ['id' => $personal_info->id])}}">登録</a></td>
                                    <td><form method="POST" action="{{route('WeightRegistrations.destroy', ['id' => $personal_info->id])}}" id="delete_{{$personal_info->id}}">
                                            @csrf
                                            <a href="#" style="color: red;" data-id="{{$personal_info->id}}" onclick="deletePost(this);">削除する</a>
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

