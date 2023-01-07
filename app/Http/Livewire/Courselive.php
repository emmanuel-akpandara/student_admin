<?php

namespace App\Http\Livewire;

use App\Models\courses;
use App\Models\programme;
use Livewire\Component;
use Livewire\WithPagination;

class Courselive extends Component
{
    use WithPagination;

    public $name;
    public $programme = '%';
    public $description;
    public $perPage = 6;
    public $showModal = false;

    public $loading = 'Please wait...';
    public $selectedcourse;


    public function showStudents(courses $course)
    {

        $this->selectedcourse = $course;
        $this->showModal = true;
//        dump($this->selectedcourse->name);
    }




    public function updated($propertyName, $propertyValue)
    {
        // dump($propertyName, $propertyValue);
        if (in_array($propertyName, ['perPage', 'name', 'programme','description']))
            $this->resetPage();
    }

    public function render()
    {
        $allProgrammes = programme::orderBy('name')->get();
        $courses = courses::orderBy('name')->orderBy('description')
            ->where([
                ['name', 'like', "%{$this->name}%"]
            ])
            ->where('programme_id', 'like', $this->programme)
            ->paginate($this->perPage);
    return view('livewire.courselive', compact('courses', 'allProgrammes'))
        ->layout('layouts.student', [
            'description' => 'Courses',
            'title' => 'Courses'
        ]);
    }
}
