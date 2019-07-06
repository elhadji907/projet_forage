<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Client;

class InstallApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drop:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commande pour supprimer les données de test de faker';

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
        $this->info("Suppression en cours...");
        $clients = Client::get();
        $bar = $this->output->createProgressBar($clients->count());
        foreach ($clients as $client) {
            $client->delete();
            $bar->advance();
        }
        $bar->finish();
        $this->info("Operation effectuee...");
    }
}
