@extends('layouts.app')

@section('title', 'Доб')

@section('content')
<div class="card shadow m-5">
    <div class="card-body">
        <form method="POST" action="{{route('addHandler')}}">
            @csrf
            <div class="form-group row">
                <div class="col-12 mb-3 mb-sm-0">
                    <label>Ссылка</label>
                    <input 
                        type="text" 
                        class="form-control form-control-user @error('name') is-invalid @enderror" 
                        placeholder="Ссылка" 
                        name="name" 
                        value="{{ old('name') }}">

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 mb-3 mb-sm-0">
                    <label>Лимит переходов</label>
                    <input 
                        type="text" 
                        class="form-control form-control-user @error('redirects_limit') is-invalid @enderror" 
                        placeholder="Лимит" 
                        name="redirects_limit" 
                        value="{{ old('redirects_limit') }}">

                    @error('redirects_limit')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12 mb-3 mb-sm-0">
                    <label>Срок действия</label>
                    <select name="expire_hours" class="custom-select">
                        @for ($i = 1; $i < 25; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>

                    @error('redirects_limit')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-user btn-block">
                Добавить
            </button>

        </form>
    </div>
</div>
@endsection
