<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Pay {
    public function getToken($url){
        try {
            $response = Http::post($url, [
                'consumer_key' => 'qkio1BGGYAXTu2JOfm7XSXNruoZsrqEW',
                'consumer_secret' => 'osGQ364R49cXKeOYSpaOnT++rHs='
            ]);

            if ($response->successful()) {
                return trim($response->json()['token']);
            }
            
            Log::error('Token request failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return null;
            
        } catch (\Exception $e) {
            Log::error('Token request exception: ' . $e->getMessage());
            return null;
        }
    }

    public function registerIpnUrl($getTokenUrl, $registerIpnUrl, $ipnUrl){
        try {
            $token = $this->getToken($getTokenUrl);
            
            if (!$token) {
                throw new \Exception('Failed to get token');
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->post($registerIpnUrl, [
                "url" => $ipnUrl,
                "ipn_notification_type" => "GET"
            ]);
            

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('IPN registration failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return null;
            
        } catch (\Exception $e) {
            Log::error('IPN registration exception: ' . $e->getMessage());
            return null;
        }
    }

    public function getIpnUrls($getTokenUrl, $getIpnUrl){
        try {
            $token = $this->getToken($getTokenUrl);
            
            if (!$token) {
                throw new \Exception('Failed to get token');
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->get($getIpnUrl);

            if ($response->successful()) {
                return $response;
            }

            // Log error if response not successful
            Log::error('Get IPN URLs failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return null;
            
        } catch (\Throwable $e) {  // Changed to \Throwable to catch all errors
            Log::error('Get IPN URLs exception: ' . $e->getMessage());
            return null;
        }
    }

    public function submitOrder($getTokenUrl, $orderUrl, array $orderData)
    {
        try {
            $token = $this->getToken($getTokenUrl);
            if (!$token) {
                throw new \Exception('Failed to get token');
            }

            $response = Http::withToken($token)
                ->acceptJson()
                ->timeout(30)
                ->post($orderUrl, $orderData);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Order submission failed', [
                'status' => $response->status(),
                'body' => $response->body(),
                'request_data' => $orderData
            ]);
            return null;
            
        } catch (\Throwable $e) {
            Log::error('Order submission exception: ' . $e->getMessage());
            return null;
        }
    }

     public function getTransactionStatus($getTokenUrl, $transactionStatusUrl, $orderId)
    {
        try {
            $token = $this->getToken($getTokenUrl);
            
            if (!$token) {
                throw new \Exception('Failed to get token');
            }

            $response = Http::withToken($token)
                ->acceptJson()
                ->timeout(20)
                ->get($transactionStatusUrl, [
                    "orderTrackingId" => "5a8b7fcb-09e0-45b9-87b9-db8a35f7e6b0",
                ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Get transaction status failed', [
                'status' => $response->status(),
                'body' => $response->body(),
                'order_id' => $orderId
            ]);
            return null;
            
        } catch (\Throwable $e) {
            Log::error('Get transaction status exception: ' . $e->getMessage());
            return null;
        }
    }
}