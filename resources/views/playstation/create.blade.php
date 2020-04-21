@extends('layouts.app')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Product</a></h2>
<br>
 
<form action="{{ route('playstations.store') }}" method="POST" name="add_product">
{{ csrf_field() }}
<div class="container" style="margin-left:370px;width:650px;">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Jenis PS</strong>
            <input type="text" name="jenis_ps" class="form-control" placeholder="Masukan PS">
            <span class="text-danger">{{ $errors->first('jenis_ps') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Deskripsi</strong>
            <textarea class="form-control" col="4" name="deskripsi" placeholder="Masukan Deskripsi"></textarea>
            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
 
</form>
@endsection