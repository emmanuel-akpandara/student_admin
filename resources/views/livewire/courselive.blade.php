<div>

    {{-- filter section: artist or title, genre, max price and records per page --}}
    <div class="grid grid-cols-10 gap-4">
        <div class="col-span-10 md:col-span-5 lg:col-span-3">
            <x-jet-label for="name" value="Filter"/>
            <div
                x-data="{ name: @entangle('name') }"
                class="relative">
                <x-jet-input id="name" type="text"
                             x-model.debounce.500ms="name"
{{--                             wire:model.debounce.500ms="name"--}}
                             class="block mt-1 w-full"
                             placeholder="Filter on course name or description"/>
                <div
                    x-show="name"
                    @click="name = '';"
                    class="w-5 absolute right-4 top-3 cursor-pointer">
                    <x-phosphor-x-duotone/>
                </div>
            </div>
        </div>
        <div class="col-span-5 md:col-span-2 lg:col-span-2">
            <x-jet-label for="programme" value="Programme"/>
            <x-tmk.form.select id="programme"
                               wire:model.debounce.500ms="programme"
                               class="block mt-1 w-full">
                <option value="%">All Programmes</option>
                @foreach($allProgrammes as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->name }}
                    </option>
                @endforeach
            </x-tmk.form.select>
        </div>
        <div class="col-span-5 md:col-span-3 lg:col-span-2">
            <x-jet-label for="perPage" value="Course per page"/>
            <x-tmk.form.select id="perPage"
                               wire:model="perPage"
                               class="block mt-1 w-full">
                <option value="3">3</option>
                <option value="6">6</option>
                <option value="9">9</option>
                <option value="12">12</option>
                <option value="15">15</option>
                <option value="18">18</option>
                <option value="24">24</option>
            </x-tmk.form.select>
        </div>

    </div>



    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse"
         wire:loading>
        <x-tmk.preloader class="bg-lime-700/60 text-white border border-lime-700 shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>

<div class="my-4">{{ $courses->links() }}</div>


    {{-- No records found --}}
    @if($courses->isEmpty())
        <x-tmk.alert type="danger" class="w-full">
            Can't find any course or description with <b>'{{ $name }}'</b> for this programme
        </x-tmk.alert>
    @endif


<div class="container mx-auto px-4 grid grid-cols-3 gap-4">
    @foreach ($courses as $course)
        <div
            wire:key="{{ $course->id }}"
            class="bg-white rounded shadow-lg flex flex-col"
        >

            <div class="basis-full flex justify-center items-center font-bold my-4 px-4">{{ $course->programme_name }}</div>
            <hr>
            <div class="text-xl font-extrabold basis-full my-4  px-4">{{ $course->name }}</div>
            <div class="basis-full my-4 px-4">{{ $course->description }}</div>
            <hr>
            <div class="basis-full my-4 flex justify-center items-center px-4">
                <button class="bg-blue-500 py-2 px-4 rounded text-white font-bold w-full h-full"
                        wire:click="showStudents({{$course->id}})">
                    Manage Students
                </button>
            </div>


        </div>

@endforeach
</div>
    {{-- Detail section --}}
    <div

        x-data="{ open: @entangle('showModal') }"
        x-cloak
        x-show="open"
        x-transition.duration.500ms

        class="fixed z-40 inset-0 p-8 grid h-screen place-items-center backdrop-blur-sm backdrop-grayscale-[.7] bg-slate-100/70">
        <div

            @click.away="open = false;"
            @keyup.enter.window="open = false;"
            @keyup.esc.window="open = false;"
            class="bg-white p-4 border border-gray-300 max-w-2xl">
            <div
                class="flex justify-between space-x-4 pb-2 border-b border-gray-300">
                <h3 class="font-medium">
                    {{$selectedcourse->name ??  'Title' }}<br/>
                    <br/>

                    <span class="font-light">{{$selectedcourse->description ?? 'Description' }}</span>
                    <br>
                    <hr>
                    <br>
{{--                    @isset($selectedcourse->student_courses)--}}
{{--                        @foreach($selectedcourse->student_courses as $eachstudent)--}}
{{--                            <p>{{dump($eachstudent)}}</p>--}}
{{--                          <p>  {{$eachstudent->student["first_name"]}} {{$eachstudent->student["last_name"]}}  </p>--}}
{{--                        @endforeach--}}
{{--                    @endisset--}}
{{--                    <span class="font-light">{{$selectedcourse->id->student_courses->student_id}}</span>--}}


                </h3>

            </div>

        </div>
    </div>





</div>

