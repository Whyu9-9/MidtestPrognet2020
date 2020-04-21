@extends('layouts.app')

@section('content')

<h2 style="margin-top: 12px;" class="text-center">Sewa PS</a></h2>
<br>
 
<form action="/sewa/{{ $playstation->id }}" method="POST" name="add_sewa">
{{ csrf_field() }}
<div class="container" style="margin-left:370px;width:650px;">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Masukan Game</label>
            <select name="games_id[]" class="selectpicker form-control" multiple data-live-search="true"  multiple="multiple" required>
                @foreach ($games as $game)
                    <option value="{{ $game->id }}">{{ $game->judul_game }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Tanggal Sewa</strong>
            <input type="date" class="form-control" col="4" name="start_sewa">
            <span class="text-danger">{{ $errors->first('start_sewa') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Tanggal Kembali</strong>
            <input type="date" class="form-control" col="4" name="finish_sewa">
            <span class="text-danger">{{ $errors->first('finish_sewa') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
 
</form>
@endsection