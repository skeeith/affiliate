<?php

namespace App\Console\Commands;

use App\Imports\ArticlesImport;
use App\Imports\BrandsImport;
use App\Imports\CategoriesImport;
use Illuminate\Console\Command;

class ImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel excel importer';

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
        cache()->flush();
        $this->output->title('Starting import');
        //(new CategoriesImport)->withOutput($this->output)->import(storage_path('app/excel_imports/wayfair.xlsx'));
        //(new ArticlesImport)->withOutput($this->output)->import(storage_path('app/excel_imports/averdo.xlsx'));
        //(new CategoriesImport)->withOutput($this->output)->import(storage_path('app/excel_imports/moebel-ideal.xlsx'));
        $this->output->success('Import successful');
    }
}
