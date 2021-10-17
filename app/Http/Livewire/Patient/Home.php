<?php

namespace App\Http\Livewire\Patient;

use Livewire\Component;
use App\Jobs\ExportPatientJob;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;

class Home extends Component
{
    public $batchId;
    public $exporting = false;
    public $exportFinished = false;

    public function render()
    {
        return view('livewire.patient.home')
        ->extends('layouts.base')
        ->section('content');
    }

    public function exportData(){
        $this->exporting = true;
        $this->exportFinished = false;
        
        $batch = Bus::dispatch(new ExportPatientJob());
        

        $this->batchId = $batch->id;
    }

    public function getExportBatchProperty()
    {
        if (!$this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function downloadExport()
    {
        return Storage::download('public/patients.csv');
    }

    public function updateExportProgress()
    {
        $this->exportFinished = $this->exportBatch->finished();

        if ($this->exportFinished) {
            $this->exporting = false;
        }
    }

}
