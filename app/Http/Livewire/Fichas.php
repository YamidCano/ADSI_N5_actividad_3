<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ficha;

class Fichas extends Component
{
    public $ficha, $name,  $code, $ficha_id, $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 5;
    public $queryString = ['search' => ['except' => '']];
    protected $listeners = ['destroyFichas'];

    function rules() {
        return [
            'name' => 'required|min:3|max:256',
            'code' => 'required|min:3|max:50',
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
        $fichas = ficha::query()
        ->where('name', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.fichas', compact('fichas'));
    }

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
        ficha::create([
            'name' => $this->name,
            'code' => $this->code,
        ]);
        $this->emit('Store');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'code']);
        $this->emit('alert', 'Registro creada sastifactoriamente');
    }

    public function edit(ficha $ficha)
    {
        $this->ficha_id = $ficha->id;
        $this->name = $ficha->name;
        $this->code = $ficha->code;
    }

    public function update(){
        $this->validate();
        $ficha = ficha::find($this->ficha_id);
        $ficha->update([
            'name' => $this->name,
            'code' => $this->code,
        ]);
        $this->reset(['name', 'code']);
        $this->emit('update');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('alert', 'Registro Actualizada sastifactoriamente');
    }

    public function destroyFichas(ficha $ficha)
    {
        $ficha->delete();
    }

    public function view(ficha $ficha)
    {
        $this->ficha_id = $ficha->id;
        $this->name = $ficha->name;
        $this->code = $ficha->code;
    }

    public function cerrar(){
        $this->emit('update');
        $this->reset(['name', 'code']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
