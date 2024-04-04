@extends('layouts.app')

@section ('content')
<main class="container py-5">
  <h1>Projects</h1>  
   <a class="btn btn-primary" href="{{route('dashboard.project.create')}}">Create</a>

  <table class="table-responsive">
  <thead>
    <tr>
    <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Slug</th>
      <th scope="col">Cover Image</th>
    </tr>
  </thead>
  <tbody>
    
      @foreach($projects as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>
            <a href="{{route('dashboard.project.show', $item->id)}}">
              {{$item->title}}
            </a>
            
          </td>
          <td>{{$item->content}}</td>
          <td>{{$item->slug}}</td>
          <td>{{$item->cover_image}}</td>
          <td>
            <a class="btn btn-primary" href="{{route('dashboard.project.edit',$item->slug)}}">Modifica</a>
            <form method="POST" action="{{route('dashboard.project.destroy',$item->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>

        </tr>

      @endforeach
    
  </tbody>
</table>
</main>



@endsection 