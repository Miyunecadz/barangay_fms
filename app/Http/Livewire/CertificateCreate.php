<?php

namespace App\Http\Livewire;

use App\Models\Certificate;
use Livewire\Component;

class CertificateCreate extends Component
{
    public $name;
    public $orNumber;

    protected $rules =[
        'name' => 'required',
        'orNumber' => 'required'
    ];

    public function createNewRecord()
    {
        $this->validate();

        Certificate::create([
            'name' => $this->name,
            'or_number' => $this->orNumber
        ]);

        $this->dispatchBrowserEvent('modalDismiss', ['modalName' => 'modal-new-record']);
        // dd($this->emit('refreshCertificateTable'));
        $this->reset('name');
    }

    public function render()
    {
        return view('livewire.certificate-create');
    }
}
