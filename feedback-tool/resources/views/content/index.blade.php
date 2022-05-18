{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<x-app-layout>
{{--    @can('user_create')--}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User {{Auth::user()->name}} with id = {{Auth::id()}} Is logged in.
        </h2>
    </x-slot>
{{--    @endcan--}}
    @if($forms)
        @foreach($forms as $form)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{$form->title}}
                </div>
            </div>
        </div>
    </div>
        @endforeach
    @endif()
</x-app-layout>
{{--@endsection--}}
