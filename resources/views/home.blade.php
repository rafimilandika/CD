
@extends('layouts.nav')

@section('contentuser')
<h1 style="color: white; margin: 25%; text-align: center; font-family: nunito, sans-serif"><b>Selamat Datang {{ Auth::user()->name }}</b></h1>


@endsection
