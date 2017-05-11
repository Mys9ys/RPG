@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    @if($locations)
        <div class="container">
            <div class="col-lg-3">Локация</div>
            <div class="col-lg-1">Перейти кнопкой</div>
            <div class="col-lg-1">Мобов доступно</div>
        </div>
        @foreach($locations as $location)
            <div class="container">
                <div class="col-lg-3">{{ $location->name }}</div>
                <div class="col-lg-1 button-blue"><a href="{{ route('location', array('id'=>$location->id)) }}">Пойти</a></div>
                <div class="col-lg-1">{{ $location->live_mobs }}</div>
            </div>
        @endforeach
    @endif
    </div>
@endsection