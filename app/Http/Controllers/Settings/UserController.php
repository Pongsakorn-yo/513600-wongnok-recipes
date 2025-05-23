<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
  {
      if(!request('status') || request('status') == 1){
        $status = 1;
      }else{
        $status = 0;
      }
      $users = User::where('status',$status)->get();
      $permissions = Permission::orderBy('note')->get();
      $roles = Role::orderBy('note')->get();

      return view('settings.user.index', compact('users','permissions','roles'));
  }

  public function success()
  {
      $users = User::where('status',1)->get();
      return view('user.success', compact('users'));
  }

  public function edit_success(User $user)
  {
      $branchs = Branch::where('main_storefront',1)->get();
      return view('user.edit_main', compact('user','branchs'));
  }
  
  public function update_success(User $user)
  {
    $user->update(request()->all());
    alert()->success('ทำรายการ', 'สำเร็จ')->persistent('ตกลง');
    return redirect('/admin/success/users');
  }
  
  public function edit(User $user)
  {
      $permissions = Permission::orderBy('note')->get();
      $roles = Role::orderBy('note')->get();
      $branchs = Branch::get();
      return view('user.edit', compact('user','permissions','roles','branchs'));
  }

  public function show()
  {

    $today = Carbon::today();
    $from = request('from') ?: $today->format('Y-m-01');
    $to = request('to') ?: $today->format('Y-m-d');

      $gets = file_get_contents('https://mytcg.net/get/users');
      $objs = json_decode($gets);
      $user = auth()->user();
      $points = $user->points()->orderBy('id','desc')->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d H:i:s', $from . ' 00:00:00'), Carbon::createFromFormat('Y-m-d H:i:s', $to . ' 23:59:59')])->get();
       if($user->match){
        $match_get = file_get_contents('https://mytcg.net/get/user/find/' . $user->match->match_id);
        $matchget = json_decode($match_get);
       }else{
        $matchget = Null;
       }
       
       $cancel_receipts =  CancelReceipt::with('user','owner_user')->whereNotIn('status',[1])
       ->where('user_id',auth()->user()->id)
       ->whereBetween('created_at', [Carbon::createFromFormat('Y-m-d H:i:s', $from . ' 00:00:00'), Carbon::createFromFormat('Y-m-d H:i:s', $to . ' 23:59:59')])
       ->get();

       $totalPointsEarned = $points->filter(function ($point) {
          return $point->point >= 0;
      })->sum('point');

      $totalPointsDeducted = $points->filter(function ($point) {
          return $point->point < 0;
      })->sum('point');

      return view('user.show', compact('user','points','objs','matchget','from','to','cancel_receipts','totalPointsEarned','totalPointsDeducted'));
  }

  
  public function point()
  {
    $users = User::with('branch')->where('status',1)->get();
    return view('user.point', compact('users'));
  }
  
  public function store()
  {

      if(User::where('email',request('email'))->first()){
        alert()->error('มีคนใช้ Email นี้แล้ว', 'ผิดพลาด')->persistent('ตกลง');
        return back();
      }

      if(request('photo')){
        $photo = Storage::disk('spaces')->putFile('nd2568/user', request('photo'), 'public');
      }else{
        $photo = Null;
      }

      $user = User::create([
        'name'=>request('name'),
        'email'=>request('email'),
        'password'=>Hash::make(request('password')),
        'status'=>request('status'),
        'image'=>$photo,
        'point'=>0,
      ]);

      if(request('roles')){
        foreach (request('roles') as $requestrole) {
          $role = Role::find($requestrole);
          $user->assignRole($role);
        }
      }

      if(request('permissions')){
        foreach (request('permissions') as $id) {
          $permission = Permission::find($id);
          $user->givePermissionTo($permission);
        }
      }

      alert()->success('เพิ่มรายการ', 'สำเร็จ')->autoClose(3000);
      return back();
  }

  public function auth_update(User $user)
  {
      if(request('password')){
        $password = Hash::make(request('password'));
      }else{
        $password = $user->password;
      }

      if(request('photo')){
        $photo = Storage::disk('spaces')->putFile('mygold/user', request('photo'), 'public');
      }else{
        $photo = $user->photo;
      }

      $user->update(array_merge(request()->all(),['password'=>$password,'photo'=>$photo]));

      alert()->success('แก้ไข', 'สำเร็จ')->persistent('ตกลง');
      return back();
  }


  public function update(User $user)
  {
      if(request('password')){
        $password = Hash::make(request('password'));
      }else{
        $password = $user->password;
      }

      if(request('photo')){
        $photo = Storage::disk('spaces')->putFile('mygold/user', request('photo'), 'public');
      }else{
        $photo = $user->photo;
      }

      $user->update(array_merge(request()->all(),['password'=>$password,'photo'=>$photo]));

      if($user->roles){
        foreach ($user->roles as $removerole) {
          $user->removeRole($removerole);
        }
      }
      if($user->permissions){
        foreach ($user->permissions as $removeperm) {
          $user->revokePermissionTo($removeperm);
        }
      }

      if(request('roles')){
        foreach (request('roles') as $requestrole) {
          $role = Role::find($requestrole);
          $user->assignRole($role);
        }
      }

      if(request('permissions')){
        foreach (request('permissions') as $id) {
          $permission = Permission::find($id);
          $user->givePermissionTo($permission);
        }
      }

      alert()->success('แก้ไข', 'สำเร็จ')->persistent('ตกลง');
      return redirect('/admin/users');
  }

  public function confirm()
  {
      auth()->user()->update([
        'confirm_price'=>0
      ]);

      alert()->success('รับทราบราคา', 'สำเร็จ');
      return back();
  }

  public function getUser()
  {
    return response()->json(User::where('status', 1)->where('branch_id', auth()->user()->branch_id)->get());
  }

  public function check_in($branch_id)
  {
    auth()->user()->update([
      'branch_id'=>$branch_id,
    ]);
    return back();
  }

  public function notification()
  {
    if(auth()->user()->system_notification == 1){
      auth()->user()->update([
        'system_notification'=>0
      ]);
      alert()->success('สำเร็จ', 'ปิดการแจ้งเตือนแล้ว');
    }else{
      alert()->success('สำเร็จ', 'เปิดการแจ้งเตือนแล้ว');
      auth()->user()->update([
        'system_notification'=>1
      ]);
    }
    return back();
  }
}
