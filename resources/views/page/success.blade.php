@extends('layout.base')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Спасибо что оставитли заявку</h4>
            <p class="card-text">Номер вашей заявки {{ session('report_id') }}</p>
        </div>
    </div>
@endsection 