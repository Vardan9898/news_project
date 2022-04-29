<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteUpvotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:reset-upvotes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will reset post upvotes count';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        DB::table('posts')->update(['upvotes' => 0]);
    }
}
