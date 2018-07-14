@extends('layout')


@section('title')
    {{$title}}
@endsection

@section('content')
    <form class="form-horizontal" action="{{route('currencies.store')}}" method="post">

        {{csrf_field()}}

        {{--Form include--}}
        @include('currencies.partials.form')


    </form>
@endsection
