@extends('layout.base')

@section('content')
        <div class="row g-1">
            <h1>__('report_index_title')</h1>
            <div class="container">
                <div class="row">
                    <form method="get" action="{{ route('report_index') }}" class="d-flex">
                        <div class="col-sm-3 m-1">
                            <div class="mb-3">
                                <label for="status" class="form-label">{{ __('forms.report_status_title') }}</label>
                                <select class="form-control" name="status" id="report_status">
                                    <option @if (request()->get('status') == -1 || request()->get('status') === null) selected @endif value="-1">Все</option>
                                    <option @if (request()->get('status') === 0) selected @endif value="0">Не обработанно</option>
                                    <option @if (request()->get('status') == 1) selected @endif value="1">В обработке</option>
                                    <option @if (request()->get('status') == 2) selected @endif value="2">Обработано</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 m-1">
                            <div class="mb-3">
                                <label for="category" class="form-label">{{__('forms.report_category_title')}}</label>
                                <select class="form-control" name="category" id="report_category">
                                    <option @if (request()->get('category') == 'all') selected @endif value="all">Все</option>
                                @foreach ($categories as $category)
                                    <option @if (request()->get('category') == $category->id ) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 m-1 mt-3 ms-auto align-self-center">
                            <div class="mb-3 d-inline">
                                <button type="submit" class="btn btn-primary">{{__('forms.filter_button')}}</button>
                            </div>
                            {{-- <div class="mb-3 d-inline">
                                <button type="submit" name="clear" value="1" class="btn btn-danger">{{__('forms.filter_clear_button')}}</button>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
            @if (count($reports) == 0)
                Нет результатов
            @endif
            @foreach ($reports as $item)
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
        <div class="row p-1">
            <div class="col-md-12">
                {{ $reports->appends(request()->input())->links('vendor.pagination.bootstrap-5') }}
            </div>
            
        </div>
        
    
@endsection