@extends('layout.base')

@section('content')

        <div class="row g-1">
            <h1>Все обращения</h1>
            @foreach ($report as $item)
            {{-- {{var_dump($item->reportUser)}} --}}
            {{-- <tr>
                <td>{{$item->reportUser->last_name}}</td>
                <td>{{$item->reportUser->first_name}}</td>
                <td>{{$item->reportUser->middle_name}}</td>
                <td>{{$item->reportUser->phone}}</td>
                <td>{{$item->reportCategory->name}}</td>
                <td>{{$item->text}}</td>
            </tr> --}}
            <div class="col-md-4">
                <div class="card p-0 h-100">
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{ route('user_show_reports', ['user_id' => $item->reportUser->id]) }}">{{$item->reportUser->last_name}} (+{{$item->reportUser->phone}})</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Категория: {{$item->reportCategory->name}}</h6>
                      <h6 class="card-subtitle mb-2 text-muted">Статус: {{$item->status}}</h6>
                      <p class="card-text">{{$item->text}}</p>
                      {{-- <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a> --}}
                      
                    </div>
                    <div class="card-footer text-muted">
                        <a class="btn btn-success w-100 m-1" href="{{ route('show_report', ['report_id' => $item->id]) }}">Подробнее</a>
                    </div>
                  </div>
            </div>
            
        @endforeach
        </div>
        
    
@endsection