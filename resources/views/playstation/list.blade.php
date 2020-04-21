@extends('layouts.app')

@section('content')

<h2 style="margin-top: 12px;" class="text-center">List PS</a></h2>
<div class="container" style="margin-left:300px;width:850px;">
<a href="{{ route('playstations.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>No.</th>
                 <th>ID</th>
                 <th style="text-align:center;">Jenis PS</th>
                 <th style="text-align:center;">Deskripsi</th>
                 <th>Created at</th>
                 <th style="text-align:center;" colspan="3">Action</th>
              </tr>
           </thead>
           <tbody>
              @foreach($playstations as $ps)
              <tr>
                 <td>{{ $loop->iteration }}</td> 
                 <td>{{ $ps->id }}</td>
                 <td>{{ $ps->jenis_ps }}</td>
                 <td>{{ $ps->deskripsi }}</td>
                 <td>{{ date('Y-m-d', strtotime($ps->created_at)) }}</td>
                 <td><a href="{{ route('playstations.edit',$ps->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('playstations.destroy', $ps->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Apa yakin ingin menghapus data ini?')">Delete</button>
                </form>
                </td>
                <td><a href="{{ route('playstations.sewa',$ps->id)}}" class="btn btn-dark">Sewa</a></td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $playstations->links() !!}
       </div> 
   </div>
</div>
@endsection