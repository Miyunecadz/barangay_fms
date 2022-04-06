<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileManager extends Component
{
    use WithFileUploads;

    public $current_directory = 'public';
    public $directories;
    public $files;
    public $previous_directory = '';

    public $directory_name;
    public $file;

    public $delete_name;
    public $delete_type;
    public $master_key;



    private function generateBack()
    {
        $path = explode('/', $this->current_directory);
        array_splice($path, count($path) - 1, 1);
        $newPath = implode("/", $path);
        $this->previous_directory = $newPath;
    }

    public function close($modalName)
    {
        $this->dispatchBrowserEvent('modalDismiss', ['modalName' => $modalName]);
        if($modalName == "modal-new-directory"){
            $this->reset('directory_name');
        }else{
            $this->file = '';
        }
    }

    public function updatingFile()
    {
        $this->validate([
            'file' => 'max:15360'
        ]);
    }

    public function saveFile()
    {
        $this->validate([
            'file' => 'required|max:15360'
        ],[
            'file.required' => 'Need to upload some file',
        ]);

        Storage::putFileAs($this->current_directory.'/', $this->file, $this->file->getClientOriginalName());
        $this->close('modal-upload-file');
        $this->mount();
    }


    public function onDeleteState($name, $type)
    {
        $this->delete_name = $name;
        $this->delete_type = $type;
    }

    public function delete()
    {
        $this->validate([
            'master_key' => 'required'
        ],[
            'master_key.required' => 'Master key is required!'
        ]);

        $fileContent = file_get_contents(Storage::path('master_key.txt'));
        if($this->master_key != trim($fileContent, "\n"))
        {
            $this->master_key = '';
            return $this->setErrorBag(['master_key' => 'Invalid Master Key']);
        }

        if($this->delete_type == "directory"){
            Storage::deleteDirectory($this->delete_name);
        }else{
            Storage::delete($this->delete_name);
        }
        $this->resetErrorBag();
        $this->reset('delete_name', 'delete_type', 'master_key');
        $this->close('modal-delete');
        $this->mount();
    }

    public function download($fileName)
    {
        return Storage::download($fileName);
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
            'directory_name' => 'required',
        ],[
            'directory_name.required' => 'Directory name is required!',
        ]);

        Storage::makeDirectory($this->current_directory.'/'.$this->directory_name);
        $this->close('modal-new-directory');
        $this->mount();
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
