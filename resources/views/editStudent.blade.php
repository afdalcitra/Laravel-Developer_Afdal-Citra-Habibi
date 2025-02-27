@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                Edit Nilai Murid
            </div>
            <div class="card-body">
                <form action="{{ route('student.edit.act', ['id' => $student->id]) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $student->name }}"
                            name="name">
                    </div>
                    <div class="mb-3 d-flex justify-content-between gap-2">
                        <div class="biologi w-100">
                            <label for="exampleFormControlInput1" class="form-label">Nilai Biologi</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" value="{{ $student->biologi }}"
                                name="biologi">
                        </div>
                        <div class="fisika w-100">
                            <label for="exampleFormControlInput1" class="form-label">Nilai Fisika</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" value="{{ $student->fisika }}"
                                name="fisika">
                        </div>
                        <div class="kimia w-100">
                            <label for="exampleFormControlInput1" class="form-label">Nilai Kimia</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" value="{{ $student->kimia }}"
                                name="kimia">
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-between gap-2">
                        <div class="mtk w-100">
                            <label for="exampleFormControlInput1" class="form-label">Nilai Matematika</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" value="{{ $student->mtk }}"
                                name="mtk">
                        </div>
                        <div class="bindo w-100">
                            <label for="exampleFormControlInput1" class="form-label">Nilai Bahasa Indonesia</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" value="{{ $student->bindo }}"
                                name="bindo">
                        </div>
                        <div class="bing w-100">
                            <label for="exampleFormControlInput1" class="form-label">Nilai Bahasa Inggris</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" value="{{ $student->bing }}"
                                name="bing">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success w-100">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection