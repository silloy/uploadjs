<?php
/**
 * 补单脚本
 */

namespace App\Console\Commands;

use Helper\Library;
use App\Models\PayModel;
use Illuminate\Console\Command;

class IssueComsume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Issue:Comsume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '消费补单';

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
        $num = Library::osProcessNum($this->signature);
        if($num > 1) {
            return false;
        }
        echo date("Y-m-d H:i:s")." start\n";
        $nowstamp = time();
        $yestoday = $nowstamp - 86400;

        $this->retryConsume($yestoday);
        $this->retryConsume($nowstamp);
        echo date("Y-m-d H:i:s")." end\n";
    }

    /**
     *
     */
    public function retryConsume($stamp)
    {
        $payModel = new PayModel;
        $payModel->retryConsume($stamp);
    }
}