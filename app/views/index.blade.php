@extends('layouts.base')

@section('title')
    Magic Pack Generator
@stop
    @section('content')
        @foreach($pack as $card)
            <img src='http://manastack.com/cards/images/{{ $card['set'] }}/{{ $card['num'] }}.jpg' />
        @endforeach
    @stop