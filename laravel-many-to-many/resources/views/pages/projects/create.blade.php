@extends('layouts.app')

@section ('content')
<main class="container py-5">
    <h1>Crea Un Nuovo Progetto</h1>
  <form action="{{route('dashboard.project.store')}}" method="POST" enctype="multipart/form-data">
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
   <input type="file"
    class="form-control  
    @error('cover_image')
       is-invalid
    @enderror"
    name="cover_image"
    id="cover_image"
    placeholder="Inerisci un immagine"
   
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