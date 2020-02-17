<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\aprilNotification;
use App\Mail\januaryNotification;
use App\Mail\julyNotification;
// use App\Mail\octoberNotification;
use App\AssesorPerProgram;
class OctoberNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:october';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $assesors = AssesorPerProgram::all();
        foreach ($assesors as $assesor) {
            # code...
            Mail::to($assesor)->send(new julyNotification());
        }
    }
}
