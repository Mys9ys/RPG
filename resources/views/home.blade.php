@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
    @if($profile)
        <div class="container">
            <h2>{{ Auth::user()->name }}</h2>
            <h3>Основные характеристики</h3>
            <h4>Level: {{ $profile->level }}</h4>
            <h4>Кубиков на атаку: {{ $profile->cube_att }}</h4>
            <h4>Кубиков на защиту: {{ $profile->cube_def }}</h4>
            <h4>Здоровье: {{ $profile->HP }}</h4>
            <h4>Опыт: {{ $profile->XP }}</h4>
            <h4>Атака: {{ $profile->attack }}</h4>
            <h4>Защита: {{ $profile->defense }}</h4>
            <h4>Инициатива: {{ $profile->initiative }}</h4>
            <h4>Уворот: {{ $profile->avoid }}</h4>
            <h4>Удача: {{ $profile->fortune }}</h4>
            <h4>Критический удар: {{ $profile->crit }}</h4>
            <h4>Стойкость: {{ $profile->resistance }}</h4>
            <h4>Скорость передвижения: {{ $profile->speed }}</h4>
            <h3>Дополнительные характеристики</h3>
            <h4>Вампиризм: {{ $profile->vampirism }}</h4>
            <h4>Ослабление: {{ $profile->weakness }}</h4>
            <h4>Разрушение: {{ $profile->destruction }}</h4>
            <h4>Регенерация: {{ $profile->regeneration }}</h4>
            <h4>Кровотечение: {{ $profile->bleeding }}</h4>
            <h3>Боевые достижения</h3>
            <h4>Боев с мобами: {{ $profile->battle_mobs }}</h4>
            <h4>Победы над мобами: {{ $profile->win_mobs }}</h4>
            <h3 class="{{ $i=1 }}">Фраги</h3>
            @foreach($mobs as $mob)
                <div class="container">
                    <div class="col-lg-2 {{ $number='mob'.$i  }}{{ $i++ }}">{{ $mob->name }}</div>
                    <div class="col-lg-2"> {{ $frag->$number  }}</div></div>
            @endforeach
        </div>

        {{--<a href="{{ route('map') }}">Map</a>--}}
    @endif
@endsection

