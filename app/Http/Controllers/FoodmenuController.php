<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodmenuController extends Controller
{
    public function welcome(Request $request)
    {
        $query = Menu::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $menus = $query->get();

        return view('welcome', compact('menus'));
    }


    public function index()
    {
        $menus = Menu::where('user_id', auth()->user()->id)->get();
        return view('foodmenu.index', compact('menus'));
    }

    public function create()
    {
        return view('foodmenu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|image|max:2048',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'duration' => 'required|integer|in:1,2,3,4',
            'difficulty' => 'required|integer|in:1,2,3',
        ]);

        $path = $request->hasFile('file')
            ? $request->file('file')->store('menus', 'public')
            : null;

        Menu::create([
            'name' => $request->name,
            'image' => $path,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'duration' => $request->duration,
            'difficulty' => $request->difficulty,
            'user_id' => auth()->user()->id,
        ]);

        alert()->success('สำเร็จ', 'บันทึกเมนูเรียบร้อยแล้ว');
        return redirect()->route('foodmenu.index');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('foodmenu.edit', compact('menu'));
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('foodmenu.show', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'duration' => 'required|integer|in:1,2,3,4',
            'difficulty' => 'required|integer|in:1,2,3',
            'file' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }
            $menu->image = $request->file('file')->store('menus', 'public');
        }

        $menu->name = $request->name;
        $menu->ingredients = $request->ingredients;
        $menu->steps = $request->steps;
        $menu->duration = $request->duration;
        $menu->difficulty = $request->difficulty;
        $menu->save();

        alert()->success('สำเร็จ', 'อัปเดตเมนูเรียบร้อยแล้ว');
        return redirect()->route('foodmenu.index');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();

        alert()->success('สำเร็จ', 'ลบเมนูเรียบร้อยแล้ว');
        return redirect()->route('foodmenu.index');
    }
}
