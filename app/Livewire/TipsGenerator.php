<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class TipsGenerator extends Component
{
    public $tip;

    public function render()
    {
        $this->tip = $this->generateTips();

        return view('livewire.tips-generator');
    }

    public function regenerateTip()
    {
        $this->tip = $this->generateTips();
    }

    private function generateTips()
    {
        $response = Http::get(config('custom.laravel_daily_api_url'));
        if ($response->successful()) {

            $response = $response->json();
            $response = $response['data'][0];

            // Convert image url to base64 for include image while generating screenshot.
            $response['original_image'] = $this->generateBase64Image($response['original_image']);

            return $response;

        } else {
            return [];
        }
    }

    private function generateBase64Image($url)
    {
        $url = $url ?: asset('images/placeholder.jpg');
        $type = pathinfo($url, PATHINFO_EXTENSION);
        $data = file_get_contents($url);
        $base64 = 'data:image/'.$type.';base64,'.base64_encode($data);

        return $base64;
    }
}
