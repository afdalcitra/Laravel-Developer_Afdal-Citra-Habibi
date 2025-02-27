@extends('layout')

@section('content')

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h3>Character Counter</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('counter.act') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="text">Input 1</label>
                        <input type="text" name="input1" id="input1" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="text">Input 2</label>
                        <input type="text" name="input2" id="input1" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-success w-100">Count</button>
                    </div>
                </form>

                @if(session('result'))
                    <div class="alert alert-info">{{ session('result') }}</div>
                @endif
            </div>
        </div>
    </div>

@endsection