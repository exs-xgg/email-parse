<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SuccessfulEmails;

class ParseEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command that runs every hour to parse email records that are not parsed yet';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('[Running Email Parser]');
        $this->info('Retrieving Email Records');

        $i = 0;
        foreach(SuccessfulEmails::whereNull('raw_text')->cursor() as $email_record){ # I use lazy because specifically designed to handle large datasets efficiently.

            $email_record->raw_text = parse_email($email_record->email);
            $email_record->save();
            $i++;

        }


        $this->info('Done Parsing. Total Parsed: ' . $i);

        return 0;
    }
}
