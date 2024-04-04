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
    <label for="category_id" class="form-label">Categories</label>
    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">Select One</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    
</div>
<div class="mb-3">

  


    <label for="technologies" class="form-label">Technologies</label>
    <select multiple name="technologies[]" id="technologies" class="form-select @error('technologies') is-invalid @enderror"> 
       @if($errors->any())
       <option value="{{ $technology->id }}">{{in_array($technologies->id, old('technologies',[])) ? 'selected': ''}}</option>
       @else
       <option value="{{ $technology->id }}"
       {{$projects->technologies->contains($technology->id)? 'selected' : ''}}>
       {{$technology->name}}</option>


      @endif
        <option  value="">Select Technologies</option>
        @foreach($technologies as $technology)
            <option value="{{ $technology->id }}">{{ $technology->name }}</option>
        @endforeach
    </select>
    
    
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