<?php

namespace App\Http\Controllers;

require '../../../vendor/autoload.php';
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
   public function index()
    {
        return view('index');
    }

    // 出勤時：日付・出勤時刻のカラムのみを追加する
    public function create(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $timestamp = [
            'date' => new Carbon('today'),
            'atttendance' => new Carbon('now')
        ];
        Attendance::create($form, $timestamp);
        

        return redirect('/');
    }

    // 編集して、退勤時刻のカラムのみを追加する
    public function update(Request $request)
    {
        // 疑問：①日付・時刻のデータのみを飛ばせているか、rest_afterが空の状態でもエラーが発生しないか
        $form = $request->all();
        unset($form['_token']);
        $timestamp = [
            'leaving' => new Carbon('now')
        ];
        Attendance::find($request->user_id, $request->date)->update($form,$timestamp);

        return redirect('/');
    }

    public function attendance()
    {
        // attendance,restモデルから情報を持ってくる処理
        $Attendances = Attendance::Paginate(5);
        return view('attendance', compact('attendance'));
    }
}
