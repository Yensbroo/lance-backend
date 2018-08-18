<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the project at given end date';

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
        $now = Carbon::now();
        $projects = Project::where('project_end', '=', $now)->delete();
    }
}
