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
        @auth
            <th scope="col" class="border border-gray-300 px-4 py-2">Akcja</th>
        @endauth
    </tr>
    </thead>
    <tbody>
        {{-- @php($lp=1) --}}
        @php($lp=$posty->firstItem())
        @forelse ($posty as $post)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{$lp++}}</td>
                <td class="border border-gray-300 px-4 py-2"><a href="{{route('post.show', $post['id'])}}">{{$post->tytul}}</a></td>
                <td class="border border-gray-300 px-4 py-2">{{$post->autor}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$post->created_at->setTimezone('Europe/Warsaw')->locale('pl')->translatedFormat('j F Y')}}</td>
                @auth
                <td class="border border-gray-300 px-4 py-2">
                    <div class="flex items-center gap-x-2">
                        <a href="{{route('post.edit', $post->id)}}"><button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">E</button></a>
                        <form action="{{route('post.destroy', $post->id)}}" method="POST" onsubmit="return confirm('Czy na pewno usunąć ten post?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">X</button>
                        </form>
                    </div>
                </td>
                @endauth
            </tr>
            @empty
            <tr>
                @auth
                 <td class="border border-gray-300 px-4 py-2 text-center" colspan="5">Nie ma żadnych postów</td>  
                @else                 
                 <td class="border border-gray-300 px-4 py-2 text-center" colspan="4">Nie ma żadnych postów</td>                
                @endauth
            </tr>
        @endforelse
    </tbody>
</table> 
{{$posty->links()}}
@else
<div>Nie ma zadnych postów</div>   
@endisset
@endsection