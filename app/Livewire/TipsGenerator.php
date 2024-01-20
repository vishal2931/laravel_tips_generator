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

    private function generateTips()
    {
        return [
            "name" => "Controller groups",
            "description" => "Instead of using the controller in each route, consider using a route controller group. Added to Laravel since v8.80",
            "original_image" => "https://laraveldaily.com/storage/157/Screenshot-2022-11-04-at-07.54.00.png",
            "stream_image" => "https://laraveldaily.com/storage/157/conversions/Screenshot-2022-11-04-at-07.54.00-twitter_stream.jpg",
        ];
        $response = Http::get(config('custom.laravel_daily_api_url'));
        if ($response->successful()) {

            $response = $response->json();

            return $response['data'][0];

        } else {
            return [];
        }
    }
}
