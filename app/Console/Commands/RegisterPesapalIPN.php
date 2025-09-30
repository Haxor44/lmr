<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Nyawach\LaravelPesapal\LaravelPesapal;

class RegisterPesapalIPN extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pesapal:register-ipn {--check : Check existing IPN registrations}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register IPN (Instant Payment Notification) URL with Pesapal';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $pesapal = new LaravelPesapal();

            if ($this->option('check')) {
                $this->info('Checking existing IPN registrations...');
                $registeredIpns = $pesapal->getRegisteredIpn();
                
                if (empty($registeredIpns)) {
                    $this->warn('No IPN URLs are currently registered.');
                } else {
                    $this->info('Registered IPN URLs:');
                    foreach ($registeredIpns as $ipn) {
                        $this->line("ID: {$ipn->ipn_id} - URL: {$ipn->url} - Status: {$ipn->status}");
                    }
                }
                return 0;
            }

            $ipnUrl = config('pesapal.ipn_url');
            $notificationUrl = config('pesapal.notification_url');
            
            if (empty($ipnUrl)) {
                $this->error('IPN URL not configured. Please set PESAPAL_IPN_URL in your .env file.');
                return 1;
            }

            $this->info("Registering IPN URL: {$ipnUrl}");
            
            $postData = [
                'url' => $ipnUrl,
                'ipn_notification_type' => 'POST'
            ];

            $response = $pesapal->registerIpn($postData);
            
            if (isset($response->ipn_id)) {
                $this->info("IPN URL registered successfully!");
                $this->line("IPN ID: {$response->ipn_id}");
                $this->line("URL: {$response->url}");
                $this->line("Status: {$response->status}");
                
                $this->warn("\nIMPORTANT: Add the following to your .env file:");
                $this->line("PESAPAL_IPN_ID={$response->ipn_id}");
                
                // Also show notification URL if different
                if ($notificationUrl && $notificationUrl !== $ipnUrl) {
                    $this->info("\nYou may also want to register your notification URL: {$notificationUrl}");
                }
                
            } else {
                $this->error('Failed to register IPN URL.');
                $this->line('Response: ' . json_encode($response, JSON_PRETTY_PRINT));
                return 1;
            }
            
        } catch (\Exception $e) {
            $this->error('Error registering IPN: ' . $e->getMessage());
            return 1;
        }
        
        return 0;
    }
}
