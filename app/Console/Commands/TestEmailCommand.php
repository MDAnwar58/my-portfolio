<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-email {--to= : Email address to send test email to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test email to verify email configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $to = $this->option('to') ?? config('mail.from.address');

        if (!$to) {
            $this->error('Please provide an email address using --to option or set MAIL_FROM_ADDRESS in your .env file.');
            return 1;
        }

        $this->info('Sending test email to: ' . $to);

        try {
            // Send a test email
            Mail::raw('This is a test email to verify your email configuration.', function ($message) use ($to) {
                $message->to($to)
                    ->subject('Test Email from Laravel Portfolio')
                    ->from(config('mail.from.address'), config('mail.from.name'));
            });

            if (Mail::failures()) {
                $this->error('Failed to send email.');
                return 1;
            } else {
                $this->info('Test email sent successfully to: ' . $to);

                // Also test the ContactReceived email
                $this->info('Testing ContactReceived email...');

                // Create a mock contact for testing
                $mockContact = (object) [
                    'f_name' => 'Test',
                    'l_name' => 'User',
                    'email' => $to,
                    'subject' => 'Test Subject',
                    'message' => 'This is a test message from the email test command.',
                    'created_at' => now(),
                ];

                Mail::to($to)->send(new \App\Mail\ContactReceived($mockContact));

                if (Mail::failures()) {
                    $this->error('Failed to send ContactReceived email.');
                    return 1;
                } else {
                    $this->info('ContactReceived email sent successfully to: ' . $to);
                }

                return 0;
            }
        } catch (\Exception $e) {
            $this->error('Error sending email: ' . $e->getMessage());
            Log::error('Email test command failed: ' . $e->getMessage());
            return 1;
        }
    }
}
