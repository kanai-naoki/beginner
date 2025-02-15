@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('nav')
<nav class="header-nav">
  <ul class="header-nav-list">
    <li class="header-nav-item"><a href="/">ホーム</a></li>
    {{-- 日付一覧のリンク先が不明なので、保留 <li class="header-nav-item"> 
      <form class="form" action="/attendance/date_list" method="get">
        <button class="header-nav__button">日付一覧</button>
      </form>
    </li>--}}
    <li class="header-nav-item">
      <form class="form" action="{{ route('logout') }}" method="post">
      @csrf
      <button type="submit">ログアウト</button>
    </li>    
  </ul>
</nav>
@endsection

@section('content')
{{-- attendanceのUIを確認しながら作成 --}}
<div class="attendance_content">
  <div class="date_search">

  </div>
  <div class="search_result-table">
    @if (@isset($item))
    <table class="search_table_inner">
      <tr class="search_table_row">
        <th class="search_table_header">名前</th>
        <th class="search_table_header">勤務開始</th>
        <th class="search_table_header">勤務終了</th>
        <th class="search_table_header">休憩時間</th>
        <th class="search_table_header">勤務時間</th>
      </tr>
      <tr class="search_result-table_row">
        <td class="search_table">{{$item->name}}</td>
        <td class="search_table">{{$item->work_begin_time}}</td> 
        <td class="search_table">{{$item->work_end_time}}</td> 
        {{-- <td class="search_table">{{$item->休憩時間の合計を表す変数。全部の休憩時間を足す処理}}</td> --}}
        {{-- <td class="search_table">{{$item->勤務時間の合計を表す変数。休憩時間の合計を勤務時間からの合計から引く処理}}</td> --}}
      </tr>
    </table>
    @endif    
  </div> 
  <div class="pagenation_area">
    {{ $attendances->links() }}
    {{-- 5件ごと情報を得るページネーションを作成 --}}
  </div>         
</div>
@endsection