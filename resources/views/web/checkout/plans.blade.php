@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Choose Subscription Plan</h1>
{{--        @foreach()--}}
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Common</h5>
                        <p class="card-text">Основной план подписки</p>
                        <h3 class="card-text">$10/месяц</h3>
                        <a href="{{ route('checkout') }}" class="btn btn-primary">Выбрать</a>
                    </div>
                </div>
            </div>
        </div>
{{--        @endforeach--}}
    </div>
@endsection
