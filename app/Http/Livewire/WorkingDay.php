<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\working_day;

class WorkingDay extends Component
{
    public $workingday, $name, $workingday_id, $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 5;
    public $queryString = ['search' => ['except' => '']];
    protected $listeners = ['destroyWorkingday'];

    function rules() {
        return [
            'name' => 'required|min:3|max:256',
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
        $workingdays = working_day::query()
        ->where('name', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.working-day', compact('workingdays'));
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
        working_day::create([
            'name' => $this->name,
        ]);
        $this->emit('Store');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name']);
        $this->emitTO( 'working-day','render');
        $this->emit('alert', 'Registro creada sastifactoriamente');
    }

    public function edit(working_day $workingday)
    {
        $this->workingday_id = $workingday->id;
        $this->name = $workingday->name;
    }

    public function update(){
        $this->validate();
        $workingday = working_day::find($this->workingday_id);
        $workingday->update([
            'name' => $this->name,
        ]);
        $this->emit('update');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('alert', 'Registro Actualizada sastifactoriamente');
    }

    public function destroyWorkingday(working_day $workingday)
    {
        $workingday->delete();
    }

    public function view(working_day $workingday)
    {
        $this->workingday_id = $workingday->id;
        $this->name = $workingday->name;
    }

    public function cerrar(){
        $this->emit('update');
        $this->reset(['name']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
