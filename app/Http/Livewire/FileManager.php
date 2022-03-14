<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class FileManager extends Component
{
    public $current_directory = 'public';
    public $directories;
    public $files;
    public $previous_directory = '';

    public $directory_name;

    private function generateBack()
    {
        $path = explode('/', $this->current_directory);
        array_splice($path, count($path) - 1, 1);
        $newPath = implode("/", $path);
        $this->previous_directory = $newPath;
    }

    public function goBack()
    {
        if($this->previous_directory == '')
        {
            $this->setDirectory($this->current_directory);
        }else{
            $this->setDirectory($this->previous_directory);
        }
    }

    public function createDirectory()
    {
        $this->validate([
            'directory_name' => 'required'
        ]);

        Storage::makeDirectory($this->current_directory.'/'.$this->directory_name);
    }

    public function setDirectory($directory)
    {
        $this->current_directory = $directory;
        $this->directories = Storage::directories($this->current_directory);
        $this->files = Storage::files($this->current_directory);
        $this->generateBack();
    }

    public function mount()
    {
        $this->directories = Storage::directories($this->current_directory);
        $this->files = Storage::files($this->current_directory);
    }

    public function render()
    {
        return view('livewire.file-manager')
                ->extends('layouts.app');
    }
}
