@props(['title'=>''])

<x-base-layout :$title>
    @include('components.layouts.header')
    {{ $slot }}
   
    </x-base-layout>
