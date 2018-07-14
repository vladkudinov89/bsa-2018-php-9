@extends('layout')


@section('title')
    {{$title}}
@endsection

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Короткое имя</th>
            <th scope="col">Логотип</th>
            <th scope="col">Цена USD</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$currency->id}}</th>
            <td>{{$currency->title}}</td>
            <td>{{$currency->short_name}}</td>
            <td><img src="{{$currency->logo_url}}" alt="{{$currency->title}}"></td>
            <td>{{$currency->price}}</td>
            <td>
                <a class="float-left edit-button" href="{{route('currencies.edit' , $currency->id)}}"><ion-icon name="create"></ion-icon>Edit</a>
                <form action="{{ route('currencies.destroy',$currency->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button class="delete-button button-delete" type="submit">
                        <ion-icon name="close"></ion-icon>Delete
                    </button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>

@endsection
