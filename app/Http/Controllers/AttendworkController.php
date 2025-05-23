<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendworkController extends Controller
{
    function index(){
        return view('backend.attendwork.index');
    }

    public function verifyFace(Request $request)
    {
        $faceData = $request->input('faceData');

    
        $storedFaceDescriptors = [
            // [0.123, 0.456, 0.789, ...],
        ];

        // เปรียบเทียบใบหน้า
        $isMatched = $this->compareFace($faceData, $storedFaceDescriptors);

        if ($isMatched) {
            return response()->json(['status' => 'success', 'message' => 'ใบหน้าตรงกัน!']);
        }

        return response()->json(['status' => 'error', 'message' => 'ใบหน้าไม่ตรงกัน']);
    }

    private function compareFace($inputDescriptor, $storedDescriptors)
    {
        foreach ($storedDescriptors as $descriptor) {
            $distance = $this->calculateEuclideanDistance($inputDescriptor, $descriptor);
            if ($distance < 0.6) { // ระยะห่างต่ำกว่า 0.6 ถือว่าใบหน้าเหมือนกัน
                return true;
            }
        }
        return false;
    }

    private function calculateEuclideanDistance($a, $b)
    {
        return sqrt(array_sum(array_map(fn($val1, $val2) => pow($val1 - $val2, 2), $a, $b)));
    }
}
