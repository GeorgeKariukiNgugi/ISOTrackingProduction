<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use app\reportsGenerated;
class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Whenthis command is run, it will clean the DB table.';

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
        $reports = reportsGenerated::where('id','=',1)->get();

        foreach ($reports as $report) {
            # code...
            $report->delete();
        }
    }
}
