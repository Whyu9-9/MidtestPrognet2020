@extends('layouts.app')

@section('content')

<h2 style="margin-top: 12px;" class="text-center">List Game</a></h2>
<div class="container" style="margin-left:300px;width:850px;">
<a href="{{ route('games.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>No.</th>
                 <th>ID</th>
                 <th style="text-align:center;">Judul Game</th>
                 <th style="text-align:center;">Deskripsi</th>
                 <th>Created at</th>
                 <th style="text-align:center;" colspan="2">Action</th>
              </tr>
           </thead>
           <tbody>
              @foreach($games as $game)
              <tr>
                 <td>{{ $loop->iteration }}</td> 
                 <td>{{ $game->id }}</td>
                 <td>{{ $game->judul_game }}</td>
                 <td>{{ $game->deskripsi }}</td>
                 <td>{{ date('Y-m-d', strtotime($game->created_at)) }}</td>
                 <td><a href="{{ route('games.edit',$game->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('games.destroy', $game->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Apa yakin ingin menghapus data ini?')">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $games->links() !!}
       </div> 
   </div>
</div>
@endsection