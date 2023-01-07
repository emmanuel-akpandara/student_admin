{{--<x-slot name="title">Playground</x-slot>--}}

{{--<section class="my-4">--}}
{{--    <h2>Preloader</h2>--}}
{{--    <h2>Preloader</h2>--}}
{{--    <x-tmk.preloader class="px-0"/>--}}
{{--    <x-tmk.preloader class="bg-green-100 text-green-700 border border-green-700"/>--}}
{{--    <x-tmk.preloader class="bg-slate-600 text-white italic w-1/2">Loading records...</x-tmk.preloader>--}}
{{--</section>--}}

{{--<x-slot name="title">Playground</x-slot>--}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
<h2>Form</h2>
<form class="grid grid-cols-10 gap-4">
    {{-- text input --}}
    <div class="col-span-10 sm:col-span-5">
        <x-jet-label for="name" value="Name"/>
        <x-jet-input id="name" type="text" class="block mt-1 w-full" placeholder="Your name"/>
    </div>
    {{-- select --}}
    <div class="col-span-10 sm:col-span-5">
        <x-jet-label for="country" value="Select a country"/>
        <x-tmk.form.select id="country" type="text" class="block mt-1 w-full">
            <option value="Belgium">Belgium</option>
            <option value="France">France</option>
            <option value="Germany">Germany</option>
        </x-tmk.form.select>
    </div>
    {{-- select --}}
    <div class="col-span-10">
        <x-jet-label for="message" value="Message"/>
        <x-tmk.form.textarea id="message" class="block mt-1 w-full" rows="6" placeholder="Your message">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, corporis!
        </x-tmk.form.textarea>
    </div>
</form>

