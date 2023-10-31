@extends('layouts.main')

@section('title', $episode->name)

@section('content')

<div class="container mt-5">
    <a href="javascript:history.back()" class="btn btn-outline-success btn-lg">{{__('Back')}}</a>
    <!-- Címsor az epizód nevével -->
    <h3 class="mt-3">{!! __(Sprintf('Characters of <i>%s</i>', $episode->name)) !!}</h3>

    @foreach ($episode->characters as $character)

    <!-- Karakter nevének megjelenítése -->
    <h6 class="mt-5">{{ mb_strtoupper($character->name, 'UTF-8') }}</h6>

    <!-- Táblázat a karakter részletekhez -->
    <table class="table table-striped mt-3">
        <tbody>
            @foreach (explode(",",'id,name,status,species,type,gender,image') as $item)
            <tr>
                <td>
                    {{UCFirst(__($item))}}
                </td>
                <td>
                    {!!$character->$item!!}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    @endforeach
</div>

@endsection