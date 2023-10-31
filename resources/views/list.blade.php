@extends('layouts.main')

@section('title', 'Rick and Morty API')

@section('content')

<div class="container mt-5">

    <form action="{{route('sync')}}" method="post">
        @csrf
        <button class="btn btn-outline-danger btn-lg awaiting">{{__('Sync list')}}</button>
    </form>

    <table class="table table-striped mt-3">
        <thead>
            <!-- Rendezéshez tartozó hivatkozások -->
            <tr>
                <th>
                    @include('_colorder', ['field'=>'id', 'label'=>__('Id')])
                </th>
                <th width="50%">
                    @include('_colorder', ['field'=>'name', 'label'=>__('Name')])
                </th>
                <th width="30%">
                    @include('_colorder', ['field'=>'created', 'label'=>__('Created')])
                </th>
                <th>
                    {{__('Characters')}}
                </th>
            </tr>
        </thead>
        <!-- Adatok megjelenítése a táblázatban -->
        <tbody>
            @foreach ($list as $item)
            <tr>
                <td>
                    {{$item->id}}
                </td>
                <td>
                    {{$item->name}}
                </td>
                <td>
                    {{$item->created}}
                </td>
                <td>
                    <a href="{{ route('characters', [
                            'episode' => $item->id
                        ]) }}" class="btn btn-outline-success btn-sm">{{__('Characters')}}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Lapozási hivatkozások megjelenítése -->
    {{ $list->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection