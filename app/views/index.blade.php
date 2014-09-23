@extends('layouts.base')

@section('title')
    Magic Pack Generator
@stop
    @section('content')
        @foreach($pack as $card)
            <img src='http://mtgimage.com/set/{{ $card['set'] }}/{{ rawurlencode($card['image']) }}.jpg' />
        @endforeach
    @stop