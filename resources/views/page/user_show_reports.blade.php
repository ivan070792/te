@extends('layout.base')

@section('content')
    <div class="row g-1">
        <h1>Обращения пользователя {{ $user_data->last_name }} {{ $user_data->first_name }}</h1>
        @foreach ($user_data->report as $item)
        <div class="col-md-6">
            <div class="card p-0 h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Номер обращения: {{$item->id}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Категория: {{$item->reportCategory->name}}</h6>
                    <p class="card-text">{{$item->text}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
@endsection