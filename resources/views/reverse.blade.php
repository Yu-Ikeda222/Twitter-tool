@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/twitter.css') }}">
@endsection
@section('content')


<!-- <nav>
    <ul>
      <li>スクリーンネームからユーザーID→csv</li>
    </ul>
</nav> -->

<form method="post" action="{{route('twitter.store')}}">
@if(empty($users_data))
 @include('layouts.form')
@else
@endif
{{--検索した元データ表示--}}
<div class="input-container">
  <div class="input-data">
    @if(isset($first_data->errors))
    @elseif(empty($first_data))
    @else
    <div class="container">
      <img src = "{{$first_data->profile_image_url}}">
      <div class="origin">{{$first_data->name}}</div>
      <a href = "https://twitter.com/{{$first_data->screen_name}}">
      <img src = "{{asset('img/Twitter_Logo_Blue.png')}}" class ="logo">
      </a>
    </div>
    <div class="origin-screen-name">
    ＠{{$first_data->screen_name}}
    </div>
    @endif
  </div>

  <div class="input-data2">
    <div class="container">
      @if(isset($second_data->errors))
      @elseif(empty($second_data))
      @else
      <img src = "{{$second_data->profile_image_url}}">
      <div class="origin">{{$second_data->name}}</div>
      <a href = "https://twitter.com/{{$second_data->screen_name}}">
        <img src = "{{asset('img/Twitter_Logo_Blue.png')}}" class ="logo">
      </a>
    </div>
    <div class="origin-screen-name">
    ＠{{$second_data->screen_name}}
    </div>
    @endif
  </div>

  <div class="input-data3">
    @if(isset($third_data->errors))
    @elseif(empty($third_data))
    @else
    <div class="container">
      <img src = "{{$third_data->profile_image_url}}">
      <div class="origin">{{$third_data->name}}</div>
      <a href = "https://twitter.com/{{$third_data->screen_name}}">
        <img src = "{{asset('img/Twitter_Logo_Blue.png')}}" class ="logo">
      </a>
    </div>
    <div class="origin-screen-name">
    ＠{{$third_data->screen_name}}
    </div>
    @endif
  </div>
</div>

@if(empty($users_data))
  @else
  {{-- <h2>検索結果は<?php $data_number = count($users_data);
  echo $data_number;?>人です</h2> --}}

  {{--データの表示--}}
  <div class="display-container">
  @foreach($users_data as $user_data)
          <span>{{$user_data}},</span>
  @endforeach
  </div>
@endif
@endsection
