<?php

namespace App\Console\Commands;

use App\product;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class saleproductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sale:update';

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
        $product=product::where('status',1)->get();
        foreach($product as $key => $item){
            
            if($item->startdate !=null){
                $date =  Carbon::now()->toDateString();
               
                if($item->startdate==$date){
                    $data=product::find($item->id);
                    $data->startsale=1;
                    $data->save();
                }
            }
            if($item->enddate !=null){
                $date =  Carbon::now()->toDateString();
                if($item->enddate==$date){
                    $data=product::find($item->id);
                    $data->startsale=0;
                    $data->save();
                }
                
            }

        }

       
        
    }
}
