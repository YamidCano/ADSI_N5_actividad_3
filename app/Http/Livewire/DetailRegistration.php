<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\registration;
use App\Models\apprentice;
use App\Models\ficha;
use App\Models\instructor;
use App\Models\working_day;

class DetailRegistration extends Component
{
    public $registration_id, $registration_m, $registration_fn, $registration_fc, $registration_d, $registration_i, $registration_j, $registration_s;
    public $registration_fid, $search;
    public $detailid;

    public function mount($detailid)
    {
      $this->detailid=$detailid;

      $Registration = registration::find($detailid);
      $this->registration_id = $Registration->id;
      $apprentice = apprentice::find($Registration->id_monitor);
      $this->registration_m = $apprentice->name;
      $ficha = ficha::find($Registration->id_monitor);
      $this->registration_fid = $ficha->id;
      $this->registration_fn = $ficha->name;
      $this->registration_fc = $ficha->code;
      $instructor = instructor::find($Registration->id_instructor);
      $this->registration_i = $instructor->name;
      $jornada = working_day::find($Registration->id_jornada);
      $this->registration_j = $jornada->name;
      $this->registration_d = $Registration->date;
      $this->registration_s = $Registration->status;
    }

    public function render()
    {
        $aprendices_f = apprentice::all()
        // ->where('name', 'like', "%{$this->search}%");
        ->where('id_ficha',  $this->registration_fid);

        $apprentices = apprentice::all();

        return view('livewire.detail-registration', compact('apprentices', 'aprendices_f'));
    }
}
