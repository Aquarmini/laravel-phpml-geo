<?php

namespace App\Console\Commands;

use App\PoiDistricts;
use Illuminate\Console\Command;
use Swoole\Runtime;

class PoiDistrictCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ml:districts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate samples and labels.';

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
        Runtime::enableCoroutine(false);

        $arrays = PoiDistricts::query()->where('level', 5)->get(['parent_oid', 'lon', 'lat']);

        $input = [];
        $result = [];
        foreach ($arrays as $item) {
            if (is_numeric($item['lon']) && is_numeric($item['lat'])) {
                $input[] = [
                    $item['lon'],
                    $item['lat']
                ];
                $result[] = $item['parent_oid'];
            }
        }

        file_put_contents(base_path('storage/samples'), serialize($input));
        file_put_contents(base_path('storage/labels'), serialize($result));
    }
}
