@extends('layouts.app')

@section ('content')
<main class="container py-5">
    <h1>Crea Un Nuovo Progetto</h1>
  <form action="{{route('dashboard.project.store')}}" method="POST">
   @csrf

   <div class="mb-3">
    <label for="title" class="form-label">TITLE</label>
    <input type="text"
    class="form-control  
    @error('title')
       is-invalid
    @enderror"
    name="title"
    id="title"
    required
   
   >
   </div>

   <div class="mb-3">
    <label for="content" class="form-label">CONTENT</label>
     <textarea  class="form-control"
     name="content" 
     id="content"
     rows="3">

     </textarea>

     <button type="submit" class="btn btn-primary">Crea</button>
   </div>

  </form>
</main>



@endsection 