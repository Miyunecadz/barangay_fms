<?php

namespace App\Http\Livewire;

use App\Models\Certificate;
use Carbon\Carbon;
use Livewire\Component;

class CertificateEdit extends Component
{
    public Certificate $certificate;
    public $name;
    public $orNumber;
    public $issued_date;
    public $issued_time;


    public function mount()
    {
        $this->name = $this->certificate->name;
        $this->orNumber = $this->certificate->or_number;
        // $this->issued_date = Carbon::createFromFormat('Y-m-d H:i:s', $this->certificate->created_at)->format('Y-m-d');
        $this->issued_date = $this->certificate->issued_date;
        $this->issued_time = $this->certificate->issued_time;
        // $this->issued_time = Carbon::createFromFormat('Y-m-d H:i:s', $this->certificate->created_at)->format('H:i:s');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'or_number' => 'required',
            'issued_date' => 'required',
            'issued_time' => 'required'
        ]);
        $this->certificate->update([
            'name' => $this->name,
            'or_number' => $this->orNumber,
            'issued_date' => $this->issued_date,
            'issued_time' => $this->issued_time
        ]);
        $this->dispatchBrowserEvent('update');
    }

    public function render()
    {
        return view('livewire.certificate-edit');
    }
}
