<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UserService;
use Validator;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:user {id} {comments}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Update User's comment attribute";

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
        $data = [
            'id' => $this->argument('id'),
            'comments' => $this->argument('comments'),
            'password' => "720DF6C2482218518FA20FDC52D4DED7ECC043AB",
        ];
        
        $this->info("Checking command parameters");

        $validator = Validator::make($data,[
            'id' => 'required|numeric',
            'password' => 'required',
            'comments' => 'required'
        ]);

        if($validator->fails()){
            $this->info("Invalid parameters: ".$validator->messages()->toJson());

            return 0;
        }

        if((new UserService)->updateUser($data))
        {
            $this->info("Command executed successfully");
            return 1;
        }
        
        $this->info("Command executed unsuccessfully");
        return 0;
    }
}
