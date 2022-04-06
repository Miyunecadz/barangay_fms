<?php

namespace App\Http\Livewire;

use App\Models\Resident;
use Carbon\Carbon;
use Livewire\Component;

class ResidentCreate extends Component
{
    public $genders;
    public $puroks;

    public $firstname;
    public $middlename;
    public $lastname;
    public $suffix;
    public $birth_date;
    public $gender;
    public $purok;

    public $isSaving = false;

    protected $rules =[
        'firstname' => 'required',
        'lastname' => 'required',
        'birth_date' => 'required|date',
        'gender' => 'required',
        'purok' => 'required'
    ];

    protected $messages = [
        'firstname.required' => 'First name field is required!',
        'lastname.required' => 'Last name field is required!',
        'birth_date.required' => 'Birth Date field is required!',
        'birth_date.date' => 'Birth Date field should be date!',
        'gender.required' => 'Gender field is required!',
        'purok.required' => 'Purok field is required!'
    ];

    public function store()
    {
        $this->validate();
        $age = now()->format('Y') - Carbon::parse($this->birth_date)->format('Y');
        $this->isSaving = true;
        Resident::create([
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'suffix' => $this->suffix,
            'age' => $age,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'purok' => $this->purok,
        ]);
        $this->isSaving = false;
        $this->dispatchBrowserEvent('store');
        $this->reset('firstname', 'middlename', 'lastname', 'suffix', 'birth_date', 'gender', 'purok');
    }

    public function render()
    {
        return view('livewire.resident-create');
    }
}
