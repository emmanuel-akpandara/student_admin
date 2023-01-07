<?php
use App\Http\Controllers\homeController;
use App\Http\Controllers\coursesController;
?>
<x-student-layout>
    <x-slot name="description">This is my student Page</x-slot>
    <x-slot name="title">Student Administration Application</x-slot>
    <x-slot name="Title">Student Administration Application</x-slot>
    <p>We will do great things here!</p>
    @push('script')
        <script>
            console.log('Student Administration JavaScript works! 🙂')
        </script>
    @endpush
</x-student-layout>
