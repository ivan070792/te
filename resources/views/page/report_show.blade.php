@extends('layout.base')

@section('content')
    <div class="row g-1">
        <h1>Обращение № {{ $report->id}} от {{ $report->reportUser->first_name }} {{ $report->reportUser->last_name }} ({{ $report->reportUser->phone }})</h1>
        <div class="col-md-12">
            <div class="card p-0 h-100">
                <div class="card-body">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <h6 class="card-subtitle mb-2 text-muted">Категория: {{$report->reportCategory->name}}</h6>
                            <p class="card-text">{{$report->text}}</p>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('change_status_report') }}" method="post">
                                @csrf
                                <input type="hidden" name="report_id" value="{{ $report->id }}">
                                <div class="mb-3">
                                  <label for="" class="form-label">Статус обращения</label>
                                  <select class="form-select" name="status" id="" aria-label="Статус обращения">
                                    <option @if($report->status == 0) selected @endif value="0">Не обработано</option>
                                    <option @if($report->status == 1) selected @endif value="1">В обработке</option>
                                    <option @if($report->status == 2) selected @endif value="2">Обработано</option>
                                  </select>
                                </div>
                                <input type="submit" value="Отправить"  class="w-100 btn btn-primary btn-lg">
                            </form>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer text-muted">
                    <a class="btn btn-success m-1" href="{{ route('report_index') }}">Ко всем обращениям</a>
                </div>
              </div>
        </div>
    </div>
@endsection