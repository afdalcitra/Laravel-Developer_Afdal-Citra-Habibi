<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function countCharacters(Request $request)
    {
        $input1 = strtoupper($request->input('input1'));
        $input2 = strtoupper($request->input('input2'));

        $panjangInput1 = strlen($input1);
        $splitInput1 = str_split($input1);
        $splitInput2 = str_split($input2);
        $uniqueInput1 = array_unique($splitInput1);
        $uniqueInput2 = array_unique($splitInput2);

        $matchCount = 0;

        foreach ($uniqueInput1 as $char) {
            foreach ($uniqueInput2 as $charInput2) {
                if ($char == $charInput2) {
                    $matchCount++;
                }
            }
        }

        $percentage = ($matchCount / $panjangInput1) * 100;

        return back()->with('result', 'Kecocokan: ' . number_format($percentage, 2) . '%');

    }
}
