@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <p class="mb-0 text-white font-bold">Add New Cutter</p>
@stop
@section('content')
    @include('layouts.employe_form');
@stop
@section('css')
<style>
    .add_user_form label.error{
        color: red;
        margin: 8px 0px 0px 4px;
    }
</style>
@stop

@section('js')
@section('plugins.Sweetalert2', true)
@section('plugins.jqueryValidation', true)
@section('plugins.jqueryMaskPlugin', true)
<script src="{{asset('assets/js/gold_finger_custom.js')}}"></script>
    <script defer>
         var route= "{{ route('add.cutter') }}";
        var userRole = "cutter";
        add_new_user(route,userRole);
    </script>
@stop
