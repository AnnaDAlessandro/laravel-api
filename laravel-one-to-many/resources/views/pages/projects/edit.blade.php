@extends('layouts.app')

@section ('content')
<main class="container py-5">
    <h1>Modifica il Progetto</h1>
  <form action="{{route('dashboard.project.update', $project->slug)}}" method="POST">
   @csrf
   @method('PUT')

   <div class="mb-3">
    <label for="title" class="form-label">TITLE</label>
    <input type="text"
    class="form-control  
    @error('title')
       is-invalid
    @enderror"
    name="title"
    id="title"
    value="{{old('title', $project->title )}}"
    required
   
   >
   </div>

   <div class="mb-3">
    <label for="content" class="form-label">CONTENT</label>
     <textarea  class="form-control"
     name="content" 
     id="content"
     rows="3"
     >{{old('content', $project->content )}}

     </textarea>

     <button type="submit" class="btn btn-primary">Crea</button>
   </div>

  </form>
</main>



@endsection 