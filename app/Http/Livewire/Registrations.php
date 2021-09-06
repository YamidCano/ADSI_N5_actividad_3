<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\registration;
use App\Models\apprentice;
use App\Models\ficha;
use App\Models\instructor;
use App\Models\working_day;

class Registrations extends Component
{
    public $registration, $monitor,  $ficha, $instructor,  $jornada, $fecha, $estado = 0, $registration_id, $search;
    public $fichas, $apprentices, $instructors, $workingdays;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 5;
    public $queryString = ['search' => ['except' => '']];
    // protected $listeners = ['destroyregistration'];

    function rules() {
        return [
            'monitor' => 'required',
            'ficha' => 'required',
            'instructor' => 'required',
            'fecha' => 'required',
            'jornada' => 'required',
        ];
    }

    public function mount()
    {
        $this->fichas = ficha::all();
        $this->apprentices = apprentice::all();
        $this->instructors = instructor::all();
        $this->workingdays = working_day::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $messages = [
    ];

    public function render()
    {
        $registrations = registration::query()
        ->where('id', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.registrations', compact('registrations'));
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
        $registration = registration::create([
            'id_monitor' => $this->monitor,
            'id_ficha' => $this->ficha,
            'id_instructor' => $this->instructor,
            'date' => $this->fecha,
            'id_jornada' => $this->jornada,
            'status' => $this->estado,
        ]);
        $this->emit('Store');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['monitor','ficha', 'instructor','fecha','jornada', 'estado']);
        $this->emit('alert', 'Registro creada sastifactoriamente');
        return redirect()->route('detail.registro', [$registration->id]);
    }

    public function edit(registration $registration)
    {
        $this->registration_id = $registration->id;
        $this->monitor = $registration->id_monitor;
        $this->ficha = $registration->id_ficha;
        $this->instructor = $registration->id_instructor;
        $this->fecha = $registration->date;
        $this->jornada = $registration->id_jornada;
    }

    public function update(){
        $this->validate();
        $registration = registration::find($this->registration_id);
        $registration->update([
            'id_monitor' => $this->monitor,
            'id_ficha' => $this->ficha,
            'id_instructor' => $this->instructor,
            'date' => $this->fecha,
            'id_jornada' => $this->jornada,
            'status' => $this->estado,
        ]);
        $this->reset(['monitor','ficha', 'instructor','fecha','jornada', 'estado']);
        $this->emit('update');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->emit('alert', 'Registro Actualizada sastifactoriamente');
    }

    public function cerrar(){
        $this->emit('update');
        $this->reset(['monitor','ficha', 'instructor','fecha','jornada', 'estado']);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
