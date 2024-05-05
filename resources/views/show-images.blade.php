@extends('layout')
@section('title', 'Show Images')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12" style="padding:20px;">
            <div class="card">
                <div class="card-header">Show Images</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($mems as $mem)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ Storage::url($mem->Attels) }}" class="card-img-top" alt="{{ $mem->Nosaukums }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $mem->Nosaukums }}</h5>
                                    <p class="card-text">{{ $mem->Apraksts }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
