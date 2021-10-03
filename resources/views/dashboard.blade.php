{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('adminlte::page', ['iFrameEnabled' => true])

@section('title', 'Dashboard')

@section('content_header')
    <p class="mb-0 text-white font-bold">Dashboard</p>
@stop
@section('content')
{{-- Minimal with title, text and icon --}}

<div class="grid md:grid-cols-3 grid-cols-1 gap-3 mt-4">
<x-adminlte-small-box title="Title" text="some text" icon="fas fa-star"/>

{{-- Loading --}}
<x-adminlte-small-box title="Loading" text="Loading data..." icon="fas fa-chart-bar"
    theme="info" url="#" url-text="More info" loading/>

{{-- Themes --}}
<x-adminlte-small-box title="424" text="Views" icon="fas fa-eye text-dark"
    theme="teal" url="#" url-text="View details"/>

<x-adminlte-small-box title="Downloads" text="1205" icon="fas fa-download text-white"
    theme="purple"/>

<x-adminlte-small-box title="528" text="User Registrations" icon="fas fa-user-plus text-teal"
    theme="primary" url="#" url-text="View all users"/>

{{-- Updatable --}}
<x-adminlte-small-box title="0" text="Reputation" icon="fas fa-medal text-dark"
    theme="danger" url="#" url-text="Reputation history" id="sbUpdatable"/>
</div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script>  $(document).ready(function() {

        let sBox = new _AdminLTE_SmallBox('sbUpdatable');

        let updateBox = () =>
        {
            // Stop loading animation.
            sBox.toggleLoading();

            // Update data.
            let rep = Math.floor(1000 * Math.random());
            let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
            let text = 'Reputation - ' + ['Basic', 'Silver', 'Gold'][idx];
            let icon = 'fas fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
            let url = ['url1', 'url2', 'url3'][idx];

            let data = {text, title: rep, icon, url};
            sBox.update(data);
        };

        let startUpdateProcedure = () =>
        {
            // Simulate loading procedure.
            sBox.toggleLoading();

            // Wait and update the data.
            setTimeout(updateBox, 2000);
        };

        setInterval(startUpdateProcedure, 10000);
    })
    </script>
@stop
