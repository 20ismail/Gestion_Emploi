<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Professeur;
use Illuminate\Support\Facades\Hash;

class HashPasswords extends Command
{
    protected $signature = 'hash:passwords';
    protected $description = 'Hash existing passwords for professors';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $professeurs = Professeur::all();

        foreach ($professeurs as $prof) {
            if (!Hash::needsRehash($prof->password)) {
                continue; // Skip already hashed passwords
            }

            $prof->password = Hash::make($prof->password);
            $prof->save();

            $this->info("Password hashed for professor ID: {$prof->id}");
        }

        $this->info('All passwords have been hashed.');
        return 0;
    }
}

