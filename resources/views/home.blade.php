@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Total Jumlah Playstation   :   {{ \App\Playstations::all()->count() }}</p>
                    <p>Total Jumlah Game          :   {{ \App\Game::all()->count() }}</p>
                    <p>Total Jumlah Penyewaan     :   {{ \App\Rent::all()->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
