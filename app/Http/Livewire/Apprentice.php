<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\apprentices;
use Livewire\WithPagination;

class Apprentice extends Component
{
    public $apprentice, $name, $email, $cel, $ndocumento, $apprentice_id ;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 5;
    // public $queryString = ['search' => ['except' => '']];

    public $updateActivity = false;
    protected $listeners = ['destroyApprentices'];

    function rules() {
        return [
            'name' => 'required|min:3|max:256',
            'email' => 'required|min:3|max:50|email',
            'cel' => 'required|min:3|max:256',
            'ndocumento' => 'required|min:3|max:256',
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
        $apprentices = apprentices::query()
        ->paginate($this->perPage);

        return view('livewire.apprentice', compact('apprentices'));
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
        apprentices::create([
            'name' => $this->name,
            'email' => $this->email,
            'cel' => $this->cel,
            'ndocumento' => $this->ndocumento,
        ]);
        $this->emit('Store');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'email', 'cel', 'ndocumento' ]);
        $this->emitTO( 'activity.live-activity-table','render');
        $this->emit('alert', 'Registro creada sastifactoriamente');
    }

    public function edit(apprentices $apprentice)
    {
        // $apprentice = apprentices::find($id);
        $this->apprentice_id = $apprentice->id;
        $this->name = $apprentice->name;
        $this->email = $apprentice->email;
        $this->cel = $apprentice->cel;
        $this->ndocumento = $apprentice->ndocumento;
    }

    public function update(){
        $this->validate();
        $apprentice = apprentices::find($this->apprentice_id);
        $apprentice->update([
            'name' => $this->name,
            'email' => $this->email,
            'cel' => $this->cel,
            'ndocumento' => $this->ndocumento,
        ]);
        $this->emit('update');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('alert', 'Registro Actualizada sastifactoriamente');
    }

    public function destroyApprentices(apprentices $apprentice)
    {
        $apprentice->delete();
    }

    public function view(apprentices $apprentice)
    {
        // $apprentice = apprentices::find($id);
        $this->apprentice_id = $apprentice->id;
        $this->name = $apprentice->name;
        $this->email = $apprentice->email;
        $this->cel = $apprentice->cel;
        $this->ndocumento = $apprentice->ndocumento;
    }

    public function cerrar(){
        $this->emit('updateApprentices');
        $this->reset(['name', 'email', 'cel', 'ndocumento' ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
