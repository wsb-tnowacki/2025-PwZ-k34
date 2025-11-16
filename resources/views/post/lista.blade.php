@extends('layout.template')
@section('tytul', "Lista postów")
@section('podtytul', 'Strona listy postów')
@section('tresc')
@isset($posty)
{{-- @dump($posty) --}}
<table class="table-fixed border border-gray-300 divide-y divide-gray-200 w-full rounded-lg">
    <thead>
    <tr>
        <th scope="col" class="border border-gray-300 px-4 py-2">Lp</th>
        <th scope="col" class="border border-gray-300 px-4 py-2">Tytuł</th>
        <th scope="col" class="border border-gray-300 px-4 py-2">Autor</th>
        <th scope="col" class="border border-gray-300 px-4 py-2">Data utworzenia</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($posty as $post)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{$post['id']}}</td>
                <td class="border border-gray-300 px-4 py-2"><a href="{{route('post.show', $post['id'])}}">{{$post->tytul}}</a></td>
                <td class="border border-gray-300 px-4 py-2">{{$post->autor}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$post->created_at->setTimezone('Europe/Warsaw')->format('j F Y')}}</td>
            </tr>
        @endforeach
    </tbody>
</table> 
@else
<div>Nie ma zadnych postów</div>   
@endisset
@endsection