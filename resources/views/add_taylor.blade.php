@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <p class="mb-0 text-white font-bold">Add New Taylor</p>
@stop
@section('content')
<div class="relative min-h-screen flex justify-center py-6 px-2 sm:px-6 lg:px-8  items-center">
    <div class="absolute opacity-60 inset-0 z-0"></div>
    <div class=" w-full space-y-8 rounded-xl z-10">
        <div class="grid  gap-8 grid-cols-1">
            <div class="flex flex-col ">
                    <form class="add_user_form" enctype="multipart/form-data">
                        @csrf

                    @include('layouts.employ_form_basic_fields')
                        <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                            <button
                                class="mb-2 md:mb-0 bg-gold-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-gold-500 add_user_button">Click to Add</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
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
@section('plugins.Select2', true)

<script src="{{asset('assets/js/gold_finger_custom.js')}}" ></script>
    <script defer>
        $(document).ready(function() {

        var route= "{{ route('add.taylor') }}";
        var userRole = "taylor";
        add_new_user(route,userRole);
        });
    </script>
@stop
