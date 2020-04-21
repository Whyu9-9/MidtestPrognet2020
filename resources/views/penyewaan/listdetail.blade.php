@extends('layouts.app')

@section('content')

<h2 style="margin-top: 12px;" class="text-center">List Penyewaan</a></h2>
<div class="container" style="margin-left:300px;width:850px;">
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>No.</th>
                 <th >Game</th>
              </tr>
           </thead>
           <tbody>
              @foreach($sewagame as $rent)
              @foreach($valid as $ids)
              <tr>
                 <td>{{ $loop->iteration }}</td>
                 <td>{{ $ids->games_id }}</td>
              </tr>
              @endforeach
              @endforeach
           </tbody>
          </table>
       </div> 
   </div>
</div>
@endsection