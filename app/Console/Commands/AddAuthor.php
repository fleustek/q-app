<?php

namespace App\Console\Commands;

use App\Utils\Apis\SymfonySkeleton;
use Illuminate\Console\Command;

class AddAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'authors:add {email} {password} {--F|first_name=} {--L|last_name=} {--B|birthday=} {--O|biography=} {--G|gender=} {--P|place_of_birth=}';

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
     * @return int
     */
    public function handle()
    {
        SymfonySkeleton::addAuthor($this->arguments(), $this->options());
        
        return 0;
    }
}
