<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\apprentice;
use Livewire\WithPagination;
use App\Models\ficha;

class Apprentices extends Component
{
    public $apprentice, $name, $email, $cel, $ndocumento, $apprentice_id, $search, $fichas, $ficha, $fichaname, $fichacode;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 5;
    public $queryString = ['search' => ['except' => '']];
    protected $listeners = ['destroyApprentices'];

    function rules() {
        return [
            'name' => 'required|min:3|max:256',
            'email' => 'required|min:3|max:50|email',
            'cel' => 'required|min:3|max:11',
            'ndocumento' => 'required|min:3|max:256',
            'ficha' => 'required',
        ];
    }

    public function mount()
    {
        $this->fichas = ficha::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $messages = [
    ];

    public function render()
    {



        $apprentices = apprentice::query()
        ->where('name', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.apprentices', compact('apprentices'));
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
        apprentice::create([
            'name' => $this->name,
            'email' => $this->email,
            'cel' => $this->cel,
            'ndocumento' => $this->ndocumento,
            'id_ficha' => intVal($this->ficha),
        ]);
        $this->emit('Store');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'email', 'cel', 'ndocumento', 'ficha' ]);
        $this->emitTO( 'apprentice','render');
        $this->emit('alert', 'Registro creada sastifactoriamente');
    }

    public function edit(apprentice $apprentice)
    {
        $this->apprentice_id = $apprentice->id;
        $this->name = $apprentice->name;
        $this->email = $apprentice->email;
        $this->cel = $apprentice->cel;
        $this->ndocumento = $apprentice->ndocumento;
        $this->ficha = $apprentice->id_ficha;


    }

    public function update(){
        $this->validate();
        $apprentice = apprentice::find($this->apprentice_id);
        $apprentice->update([
            'name' => $this->name,
            'email' => $this->email,
            'cel' => $this->cel,
            'ndocumento' => $this->ndocumento,
            'id_ficha' => intVal($this->ficha),
        ]);
        $this->emit('update');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('alert', 'Registro Actualizada sastifactoriamente');
    }

    public function destroyApprentices(apprentice $apprentice)
    {
        $apprentice->delete();
    }

    public function view(apprentice $apprentice)
    {
        $this->apprentice_id = $apprentice->id;
        $this->name = $apprentice->name;
        $this->email = $apprentice->email;
        $this->cel = $apprentice->cel;
        $this->ndocumento = $apprentice->ndocumento;
        $this->ficha = $apprentice->id_ficha;

        $ficha = ficha::find($apprentice->id_ficha);
        $this->fichaname = $ficha->name;
        $this->fichacode = $ficha->code;
    }

    public function cerrar(){
        $this->emit('update');
        $this->reset(['name', 'email', 'cel', 'ndocumento', 'ficha' ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
