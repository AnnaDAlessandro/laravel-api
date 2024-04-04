@extends('layouts.app')

@section ('content')
<main class="conteiner py-5">
    <h1>{{$project->title}}</h1>
    <p>
       <strong>{{$project->category ? $project->category->name : 'Non ci sono categorie Selezionate'}}</strong>
    </p>
  
</main>



@endsection 