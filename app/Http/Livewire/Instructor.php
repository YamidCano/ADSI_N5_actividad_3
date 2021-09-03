<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\instructors;

class Instructor extends Component
{
    public $instructor, $name, $email, $cel, $instructor_id ;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 5;
    // public $queryString = ['search' => ['except' => '']];

    public $updateActivity = false;
    protected $listeners = ['destroyInstructor'];

    function rules() {
        return [
            'name' => 'required|min:3|max:256',
            'email' => 'required|min:3|max:50|email',
            'cel' => 'required|min:3|max:256',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $messages = [
    ];

    public function render()
    {
        $instructors = instructors::query()
        ->paginate($this->perPage);

        return view('livewire.instructor', compact('instructors'));
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->reset();
    }

    public function save(){
        $this->validate();
        instructors::create([
            'name' => $this->name,
            'email' => $this->email,
            'cel' => $this->cel,
        ]);
        $this->emit('Store');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'email', 'cel' ]);
        $this->emitTO( 'instructor','render');
        $this->emit('alert', 'Registro creada sastifactoriamente');
    }

    public function edit(instructors $instructor)
    {
        $this->instructor_id = $instructor->id;
        $this->name = $instructor->name;
        $this->email = $instructor->email;
        $this->cel = $instructor->cel;
    }

    public function update(){
        $this->validate();
        $instructor = instructors::find($this->instructor_id);
        $instructor->update([
            'name' => $this->name,
            'email' => $this->email,
            'cel' => $this->cel,
        ]);
        $this->emit('update');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('alert', 'Registro Actualizada sastifactoriamente');
    }

    public function destroyInstructor(instructors $instructor)
    {
        $instructor->delete();
    }

    public function view(instructors $instructor)
    {
        $this->instructor_id = $instructor->id;
        $this->name = $instructor->name;
        $this->email = $instructor->email;
        $this->cel = $instructor->cel;
    }

    public function cerrar(){
        $this->emit('update');
        $this->reset(['name', 'email', 'cel']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
