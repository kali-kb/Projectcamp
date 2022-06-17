<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'table:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get table data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
            foreach($tables as $table)
            {
                  echo var_dump($table);
            };
    }
}
