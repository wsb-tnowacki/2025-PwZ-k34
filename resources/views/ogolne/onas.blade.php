@extends('layout.template')
@section('tytul', "O nas")
@section('podtytul', 'Strona o nas')
@section('tresc')
    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">Treść strony o nas <br>
       {{--  @dd($zadania) --}}
       {{-- @dump($zadania) --}}
        @isset($zadania)
       <ol>
        @foreach ($zadania as $zadanie)
            <li>{{ $zadanie }}</li>
        @endforeach
       </ol>
        @endisset
        @isset($tasks)
        @dump($tasks)            
        @endisset

     </p>
@endsection