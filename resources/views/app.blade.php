@extends('layouts.master')
@section('title'){{'Coding test | Yahaal'}}@endsection
@section('description'){{'Yahaal coding test'}}@endsection
@section('keywords'){{'yahaal, coding, test'}}@endsection
@section('og_url'){{url('/')}}@endsection
@section('og_sitename','Coding test | Yahaal')

@section('page-content')
    <router-view></router-view>
@endsection