<?php

namespace App\Jobs;

use App\Models\Resident;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class AgeModifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $year = trim(file_get_contents(Storage::path('date_modified.txt')), '\n');
        if($year != now()->format('Y'))
        {
            $residents = Resident::all();
            foreach($residents as $resident)
            {
                $resident->age = now()->format('Y') - Carbon::parse($resident->birth_date)->format('Y');
                $resident->save();
            }
        }
        file_put_contents(Storage::path('date_modified.txt'), now()->format('Y'));
    }
}
