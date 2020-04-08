<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Admin;
use Cerbero\CommandValidator\ValidatesInput;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\InputArgument;




class CreateAdminCommand extends Command
{

    use ValidatesInput;
//=======validation to check that the email format is right========
    public function rules()
    {
        return [
            'email' => 'email|unique:admins|required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'min:6|required'
        ];
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//==========The command create:admin has two required parameters: email & password======
    protected $signature = 'create:admin {email} {password} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    
    protected $description = 'Create a new admin using command line and it has 2 mandatory parameters "email" "password" & 1 optional parameter "name"
    Ex with the optional parameter: 
    php artisan create:admin mayar@gmail.com 123456 --name="Mayar Elabbasy"
    Ex without the optional parameter:
    php artisan create:admin mayarElabbasy@gmail.com 123456';

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
        if($this->confirm('Are you sure you want to create a new admin?')){
            $this->info('welcome');
            $this->info('Your Email: '.$this->argument('email'));
            $this->info('Your Password: '.$this->argument('password'));
            
            if($this->confirm('Do you confirm that the email and password are correct?')){
                $admin= new Admin;
                $admin->name=$this->option('name');
                $admin->email=$this->argument('email');
                $admin->password=Hash::make($this->argument('password'));
                $admin->save();
                $this->info('Admin created successfully ^_^ You can login now'); 
            }
        }   
    }
}
