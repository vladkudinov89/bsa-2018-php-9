@extends('layout')


@section('title')
    {{$title}}
@endsection

@section('content')
    <form class="form-horizontal" action="{{route('currencies.update' , $currency->id)}}" method="post">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}

        {{--Form include--}}
        @include('currencies.partials.form')


    </form>
@endsection

