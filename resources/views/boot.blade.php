@extends('layouts.app')

@section('content')

    {{--<div class="mute">--}}
        {{--<div class="container startBattle">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4 text-right portrait"><img src="../../public/img/user.jpg" alt=""></div>--}}
                {{--<div class="col-md-4 text-center">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<button class="button"><img src="../../public/img/attcubepicms.png" alt="">В бой</button>--}}
                        {{--</div>--}}
                        {{--<button class="button"><img src="../../public/img/whiteFlag.png" alt="">Отступить</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 portrait"><img src="../../public/img/mobs/wolf.jpg" alt=""></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="container col-md-6 table-bordered" id="warrior1">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-offset-7"><div class="tablecube"></div></div>--}}

            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="container col-md-6 table-bordered" id="warrior2">2</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="progress-bar"></div>--}}

{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-lg-6 table-bordered" id="warrior1">--}}
            {{--<div class="row" >--}}
                {{--<div class="col-lg-2">nameUser</div>--}}
                {{--<div class="col-lg-1 text-right"><div class="tablecube"></div></div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-2 name" >nameUser</div>--}}
                {{--<div class="col-lg-2 hidden id" >userId</div>--}}
                {{--<div class="row"><div class="col-lg-2 hidden category" >user</div></div>--}}
                {{--<div class="col-lg-pull-2 level">level: <span></span></div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="row ">--}}
            {{--<div class="col-lg-6 table-bordered" id="warrior2">--}}
                {{--<div class="row" >--}}
                    {{--<div class="col-lg-8 "><div class="tablecube"></div></div>--}}
                    {{--<div class="col-lg-offset-6">nameMob</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="container">--}}
        {{--<div class="col-md-4"></div>--}}
        {{--<div class="col-md-4"></div>--}}
        {{--<div class="col-md-4"></div>--}}
    {{--</div>--}}
    <div class="progress-bar progress-bar-success warrior1 HP" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="40" style="width: 100%;">
        40
    </div>
</div>
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/boot.js') }}"></script>

@endsection

