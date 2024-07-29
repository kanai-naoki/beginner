@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('nav')
<nav class="header-nav">
  <ul class="header-nav-list">
    <li class="header-nav-item"><a href="/">ホーム</a></li>
    <li class="header-nav-item"><a href="/attendance">日付一覧</a></li>
    {{-- ログアウトのリンク先を検討する --}}
    <li class="header-nav-item"><a href="/logout">ログアウト</a></li>    
  </ul>
</nav>
@endsection

@section('content')
<div class="timestamp_content">
  <div class="timestamp_header">
    {{-- <h2>{{ $timestamp['name'] }}さんお疲れ様です！</h2> --}}
  </div>
  <div class="timestamp_form_area">
    <form class="form" action="/attendance/add" method="post">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <input type="hidden" name="user_id" >
      <input class="form_button" type="submit" name="attendance" value="勤務開始">
    </form>
    <form class="form" action="/attendance/edit" method="post">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <input class="form_button" type="submit" name="leaving" value="勤務修了">
    </form>
    <form class="form" action="/rest/add">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <input type="hidden" name="attendance_id">
      <input class="form_button" type="submit" name="rest_begin" value="休憩開始">
    </form>
    <form class="form" action="/rest/edit">
      @csrf
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      <input class="form_button" type="submit" name="rest_after" value="休憩終了">
    </form>
  </div>
</div>
@endsection