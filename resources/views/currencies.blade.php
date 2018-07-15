<!-- Write your code here -->
@extends('layout')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>{{$title}}</h1>
    <table id="example1" class="table table-bordered table-striped">
        @empty($currencies)
            <thead>
            <tr>
                <th>Имя</th>
                <th>Короткое имя</th>
                <th>Логотип</th>
                <th>Цена USD</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @endempty


                @forelse($currencies as $currency)
                    <td><a href="{{route('currencies.show' , $currency['id']) }}">{{$currency->title}}</a>
                    </td>
                    <td>{{$currency->short_name}}</td>
                    <td>
                        <img src="{{$currency->logo_url}}" alt="{{$currency->title}}">
                    </td>
                    <td>{{$currency->price}}</td>
                    @if( Gate::check('update',$currency) || Gate::check('delete',$currency) )
                        <td>
                            @can('update',$currency)
                                <a class="float-left edit-button" href="{{route('currencies.edit' , $currency->id)}}">
                                    <ion-icon name="create"></ion-icon>
                                    Edit</a>
                            @endcan
                            @can('delete',$currency)
                                <form action="{{ route('currencies.destroy',$currency->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button class="delete-button button-delete" type="submit">
                                        <ion-icon name="close"></ion-icon>
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </td>
                    @endcan
            </tr>
            @empty
                <p>No currencies</p>
        @endforelse
    </table>

@endsection
