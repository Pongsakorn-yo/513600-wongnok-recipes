<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Rating;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function rate(Request $request, $id)
    {
        $request->validate([
            'score' => 'required|integer|min:1|max:5',
        ]);
        $menu = Menu::findOrFail($id);
        $rating = $menu->ratings()
                ->where('menu_id', $menu->id)
                ->where('user_id', auth()->id())
                ->first();
        if ($rating != null) {
            alert()->error('ไม่สำเร็จ', 'คุณได้ให้คะแนนเมนูนี้ไปแล้ว');
            return back();
        }
        Rating::updateOrCreate(
            [
                'user_id' => auth()->user()->id,
                'menu_id' => $id
            ],
            [
                'score' => $request->score
            ]
        );
        alert()->success('สำเร็จ', 'บันทึกคะแนนเรียบร้อยแล้ว');
        return back();
    }
}
