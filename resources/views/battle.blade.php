@extends('layouts.app')

@section('content')
    @if($name)
    <div class="hidden" id="location">{{ $location }}</div>
    <div class="mute">
        <div class="container startBattle">
            <div class="row">
                <div class="col-md-4 text-right portrait"><img class="img-thumbnail" src="/public/img/user.jpg" alt=""></div>
                <div class="col-md-4 text-center">
                    <div class="row">
                        <div class="col-md-12"><p class="text-warning warning img-thumbnail">Вы напали на:</p></div>
                        <div class="col-md-12"><span class="text-warning warning img-thumbnail">{{ $mob->name }}</span></div>
                        <div class="col-md-12">
                            <button class="btn btn-default btn-lg" id="battleStart"><img src="/public/img/attcubepicms.png" alt="В бой">В бой</button>
                        </div>
                        <button class="btn btn-default" id="retreat"><img src="/public/img/whiteFlag.png" alt="">Отступить</button>
                    </div>
                </div>
                <div class="col-md-4 portrait"><img src="/public/img/{{ $mob->image }}" alt=""></div>
            </div>
        </div>
    </div>

    <div class="battleContainer hidden">
        <div class="container">
            <div class="row">
                {{--User info--}}
                <div class="col-lg-6 ">
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-lg-12 warrior1 name" >{{ $name->name }}</div>
                        <div class="col-lg-pull-2 hidden warrior1 id" >{{ $user->id }}</div>
                        <div class="col-lg-pull-2 hidden warrior1 category" >user</div>
                        <div class="col-md-12 img-thumbnail warrior1 level ">level: <span>{{ $user->level }}</span></div>
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-3"><div class="warrior1 tablecube attTable"></div></div>
                </div>
                {{--Mob info--}}
                <div class="col-lg-6 ">
                <div class="col-md-7  text-center"><div class="warrior2 tablecube defTable"></div></div>
                    <div class="col-lg-2 col-lg-offset-3">
                        <div class="row">
                            <div class="col-lg-12 warrior2 name" >{{ $mob->name }}</div>
                            <div class="col-lg-pull-8 hidden warrior2 id" >{{ $mob->id }}</div>
                            <div class="col-lg-pull-8 hidden warrior2 category" >mob</div>
                            <div class="col-md-12 img-thumbnail warrior2 level ">level: <span>{{ $mob->level }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="col-md-12">
                        <div class="progress live">
                            <div class="progress-bar progress-bar-success warrior1 HP" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="{{ $user->HP }}" style="width: 100%;">
                                {{ $user->HP }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3">
                    <div class="col-md-12">
                        <div class="progress live">
                            <div class="progress-bar progress-bar-success warrior2 HP" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="{{ $mob->HP }}" style="width: 100%;">
                                {{ $mob->HP }}
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="col-md-12 text-center portrait"><img class="img-thumbnail" src="/public/img/user.jpg" alt=""></div>
                    <div class="col-md-12 warrior1 cube_att">cube_att: <span>{{ $user->cube_att }}</span></div>
                    <div class="col-md-12 warrior1 cube_def">cube_def: <span>{{ $user->cube_def }}</span></div>
                    <div class="col-md-12 warrior1 initiative">initiative: <span>{{ $user->initiative }}</span></div>
                    <div class="col-md-12 warrior1 attack">attack: <span>{{ $user->attack }}</span></div>
                    <div class="col-md-12 warrior1 defense">defense: <span>{{ $user->defense }}</span></div>
                </div>
                    <div class="col-lg-6">
                        <div class="logLarge"></div>
                        <textarea class="logSmall"></textarea>
                    </div>
                <div class="col-lg-3">
                    <div class="col-md-12 text-center portrait"><img src="/public/img/{{ $mob->image }}" alt=""></div>
                    <div class="col-md-12 warrior2 cube_att">cube_att: <span>{{ $mob->cube_att }}</span></div>
                    <div class="col-md-12 warrior2 cube_def">cube_def: <span>{{ $mob->cube_def }}</span></div>
                    <div class="col-md-12 warrior2 initiative">initiative: <span>{{ $mob->initiative }}</span></div>
                    <div class="col-md-12 warrior2 attack">attack: <span>{{ $mob->attack }}</span></div>
                    <div class="col-md-12 warrior2 defense">defense: <span>{{ $mob->defense }}</span></div>
                </div>
            </div>
        </div>
        </div>
    </div>

    @endif

@endsection

