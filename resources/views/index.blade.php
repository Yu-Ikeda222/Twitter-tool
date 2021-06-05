@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@endsection

@section('content')

    <ul >
      <li><a href="{{route('twitter.show')}}">入力したスクリーンネームをuser_idをcsvに</a></li>
      <li><a href="{{route('check')}}">制限の残りをかせす（余裕があれば回復までの時間を返す）</a></li>
      <li><a href="{{route('twitter.show')}}">user_idからスクリーンネームを出す</a></li>
      <li><a href="{{route('twitter.show')}}">Twitter</a></li>
    </ul>


@endsection


