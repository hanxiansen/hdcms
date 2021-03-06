@extends('layouts.admin')
@section('content')
    <form action="{{route('edu.category.update',$category)}}" method="post">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-sm">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('edu.category.index')}}">分类列表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">修改分类</a>
                    </li>
                </ul>
            </div>
            @include('edu.category._category')
        </div>
    </form>
@endsection

