@extends('layout.base')

@section('content')
        {{var_dump($myclass);}}
        <div class="row g-1">
            <h1>Все обращения</h1>
            @foreach ($report as $item)
            <div class="col-md-4">
                <div class="card p-0 h-100">
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{ route('user_show_reports', ['user_id' => $item->reportUser->id]) }}">{{$item->reportUser->last_name}} (+{{$item->reportUser->phone}})</a></h5>
                      <h6 class="card-subtitle mb-2 text-muted">Номер обращения: {{$item->id}}</h6>
                      <h6 class="card-subtitle mb-2 text-muted">Категория: {{$item->reportCategory->name}}</h6>
                      <h6 class="card-subtitle mb-2 text-muted">
                        Статус:
                        @switch($item->status)
                            @case(0)
                                Не обработано
                                @break
                            @case(1)
                                В обработке
                                @break
                            @case(2)
                                Обработано
                                @break
                            @default
                            Ошибка    
                        @endswitch
                      </h6>
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