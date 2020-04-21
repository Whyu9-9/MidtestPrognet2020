@extends('layouts.app')

@section('content')

<h2 style="margin-top: 12px;" class="text-center">Edit Product</a></h2>
<br>
 
<form action="{{ route('playstations.update', $product_info->id) }}" method="POST" name="update_product">
{{ csrf_field() }}
@method('PATCH')
<div class="container" style="margin-left:300px;width:850px;"> 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Jenis PS</strong>
            <input type="text" name="jenis_ps" class="form-control" placeholder="Masukan PS" value="{{ $product_info->jenis_ps }}">
            <span class="text-danger">{{ $errors->first('jenis_ps') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Deskripsi</strong>
            <textarea class="form-control" col="4" name="deskripsi" placeholder="Masukan Deskripsi" >{{ $product_info->deskripsi }}</textarea>
            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary" onclick="return confirm('Apa yakin ingin mengubah data ini?')">Submit</button>
    </div>
</div>
</div>
 
</form>
@endsection