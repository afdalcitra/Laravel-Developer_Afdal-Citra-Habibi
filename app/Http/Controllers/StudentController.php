<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function showFormPage()
    {
        return view('addStudent');
    }

    public function addStudentAction(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biologi' => 'required|integer|min:0|max:100',
            'fisika' => 'required|integer|min:0|max:100',
            'kimia' => 'required|integer|min:0|max:100',
            'mtk' => 'required|integer|min:0|max:100',
            'bindo' => 'required|integer|min:0|max:100',
            'bing' => 'required|integer|min:0|max:100',
        ]);

        // Hitung rata-rata dan bulatkan ke 2 desimal
        $totalNilai = $request->biologi + $request->fisika + $request->kimia + $request->mtk + $request->bindo + $request->bing;
        $rataRata = round($totalNilai / 6, 2);

        // Simpan ke database
        Student::create([
            'name' => $request->name,
            'biologi' => $request->biologi,
            'fisika' => $request->fisika,
            'kimia' => $request->kimia,
            'mtk' => $request->mtk,
            'bindo' => $request->bindo,
            'bing' => $request->bing,
            'rata_rata' => $rataRata,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function showEditPage($id)
    {
        $student = Student::find($id);
        return view('editStudent', compact('student'));
    }

    public function editStudentAction(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biologi' => 'required|integer|min:0|max:100',
            'fisika' => 'required|integer|min:0|max:100',
            'kimia' => 'required|integer|min:0|max:100',
            'mtk' => 'required|integer|min:0|max:100',
            'bindo' => 'required|integer|min:0|max:100',
            'bing' => 'required|integer|min:0|max:100',
        ]);

        // Hitung rata-rata dan bulatkan ke 2 desimal
        $totalNilai = $request->biologi + $request->fisika + $request->kimia + $request->mtk + $request->bindo + $request->bing;
        $rataRata = round($totalNilai / 6, 2);

        // Simpan perubahan ke database         
        $student = Student::find($id);
        $student->name = $request->name;
        $student->biologi = $request->biologi;
        $student->fisika = $request->fisika;
        $student->kimia = $request->kimia;
        $student->mtk = $request->mtk;
        $student->bindo = $request->bindo;
        $student->bing = $request->bing;
        $student->rata_rata = $rataRata;
        $student->save();

        return redirect()->route('dashboard')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('dashboard')->with('success', 'Data siswa berhasil dihapus!');
    }

}
