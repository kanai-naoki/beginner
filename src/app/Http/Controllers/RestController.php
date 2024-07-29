<?php

namespace App\Http\Controllers;

require '../../../vendor/autoload.php';
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Rest;

class RestController extends Controller
{
    // 休憩時：休憩時刻のカラムのみを追加する
    public function create(Request $request)
    {
        // 疑問：①時刻のデータのみを飛ばせているか、rest_afterが空の状態でもエラーが発生しないか
        $form = $request->all();
        unset($form['_token']);
        $timestamp = [
            'rest_begin' => new Carbon('now')
        ];
        Rest::create($form,$timestamp);
        
        return redirect('/');
    }

    // 休憩終了時：終了時刻のカラムのみを追加する
    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $timestamp = [
            'rest_after' => new Carbon('now')
        ];
        Rest::find($request->attendance_id)->update($form,$timestamp);

        return redirect('/');
    }
}
