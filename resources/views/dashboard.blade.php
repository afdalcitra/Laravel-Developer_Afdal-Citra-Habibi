@extends('layout')

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-5">
        <h3>Selamat datang, {{ Auth::user()->name }}</h3>
        <p>Aplikasi penghitungan nilai siswa</p>
    </div>

    @if (Auth::check())
        <div class="container mb-2">
            <div class="add-student text-end">
                <a href="{{ route('student.add') }}" class="btn btn-success">Tambah Murid</a>
            </div>
        </div>
    @else
        <div class="container mb-2">
            <div class="add-student text-end">
                <button type="button" class="btn btn-success" disabled>Tambah Murid</button>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="card">
            <div class="card-body">
                @if ($students)
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-start w-10">No</th>
                                <th class="text-start">Nama</th>
                                <th class="text-start">Rata-rata</th>
                                <th class="text-start">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td class="text-start">{{$loop->iteration}}</td>
                                    <td class="text-start">{{$student->name}}</td>
                                    <td class="text-start">{{$student->rata_rata}}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('student.edit', ['id' => $student->id]) }}"
                                                class="btn btn-sm btn-primary w-100">Edit</a>
                                            <form action="{{ route('student.delete', ['id' => $student->id]) }}" method="post"
                                                class="w-100">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger w-100"
                                                    onclick="return confirm('Hapus siswa ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Belum ada data murid</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        new DataTable('#myTable');
    </script>


@endsection