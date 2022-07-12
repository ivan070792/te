@extends('layout.base')

@section('content')
    <div class="row g-1">
        <h1>Обращение № {{ $report->id}} от {{ $report->reportUser->first_name }} {{ $report->reportUser->last_name }} ({{ $report->reportUser->phone }})</h1>
        <div class="col-md-12">
            <div class="card p-0 h-100">
                <div class="card-body">
                  <h6 class="card-subtitle mb-2 text-muted">Категория: {{$report->reportCategory->name}}</h6>
                  <h6 class="card-subtitle mb-2 text-muted">Статус: {{$report->status}}</h6>
                  <p class="card-text">{{$report->text}}</p> 
                </div>
                <div class="card-footer text-muted">
                    <a class="btn btn-success m-1" href="{{ route('report_index') }}">Ко всем обращениям</a>
                </div>
              </div>

        </div>
    </div>
@endsection