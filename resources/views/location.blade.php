@extends('layouts.app')

@section('content')
{{--{{ $locations->name }}--}}
    @if($location)
        <div class="container">
            <h2>{{ $location->name }}</h2>
        <p>Живых мобов: {{ $location->live_mobs }}</p>
        @for($i=0; $i < ($location->live_mobs); $i++)
            <a href="{{ route('battle', array('mob'=> $mob->id, 'user'=>Auth::user()->id, 'location' => $location->id)) }}">{{ $mob->name }}</a>
        @endfor
        </div>
    @endif
@endsection