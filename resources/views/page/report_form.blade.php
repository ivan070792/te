@extends('layout.base')

@section('content')
<div class="row justify-content-center">
    <div class="col-md7 col-lg-8">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h1 class="text-center">Форма обратной связи</h1>
        <form action="{{ route('create_new_report') }}" method="post">
            @csrf
            <div class="row gy-3">
                <div class="col-sm-6">
                    <label for="first_name" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="{{ old('first_name') }}" required>
                    <div class="invalid-feedback">
                        Обязательно для ввода
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="last_name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="{{ old('last_name') }}" required>
                    <div class="invalid-feedback">
                        Обязательно для ввода
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="middle_name" class="form-label">Отчество</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="" value="{{ old('middle_name') }}" required>
                </div>
                <div class="col-sm-6">
                    <label for="phone" class="form-label">Номер телефона</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="71234567878" value="{{ old('phone') }}" required>
                    <div class="invalid-feedback">
                        Обязательно для ввода
                    </div>
                </div>
                <div class="col-12">
                    <select class="form-select" name="report_category" aria-label="Выберите категорию обращения" required>
                        @if (old('report_category') == 0) 
                            <option selected value="0">Выберите категорию обращения</option>
                            @foreach ($report_categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @else
                            <option value="0">Выберите категорию обращения</option>
                            @foreach ($report_categories as $item)
                                @if (old('report_category') == $item->id)
                                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        @endif
                      </select>
                </div>
                <div class="col-12">
                    <select class="form-select" name="hospital" aria-label="Выберите поликлинику" required>
                        @if (old('hospital') == 0)
                            <option selected value="0">Выберите поликлинику</option>
                            @foreach ($hospitals as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        @else
                            <option value="0">Выберите поликлинику</option>
                            @foreach ($hospitals as $item)
                                @if (old('hospital') == $item->id)
                                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label for="report" class="form-label">Содержание сообщения</label>
                    <textarea class="form-control" id="report" name="report_text" rows="3" required>{{old('report_text')}}</textarea>
                </div>
                <div class="col-12 mb-3">
                    <input type="submit" value="Отправить"  class="w-100 btn btn-primary btn-lg">
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection