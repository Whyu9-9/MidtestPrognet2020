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
                 <th>ID Rental</th>
                 <th>ID PS</th>
                 <th>Tanggal Mulai Sewa</th>
                 <th>Tanggal Selesai Sewa</th>
                 <th style="text-align:center;" colspan="2">Action</th>
              </tr>
           </thead>
           <tbody>
              @foreach($rents as $rent)
              <tr>
                 <td>{{ $loop->iteration }}</td> 
                 <td>{{ $rent->id}}</td>
                 <td>{{ $rent->ps_id}}</td>
                 <td>{{ date('Y-m-d', strtotime($rent->start_sewa)) }}</td>
                 <td>{{ date('Y-m-d', strtotime($rent->finish_sewa)) }}</td>
                 <td><a href="{{ route('rent_details.show',$rent->id)}}" class="btn btn-primary">Detail</a></td>
                 <td>
                 <form action="{{ route('rents.destroy', $rent->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Apa yakin ingin menghapus data ini?')">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $rents->links() !!}
       </div> 
   </div>
</div>
@endsection