<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class CepServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('cep-service', function () {
            return new class {
                public function search(string $cep): array
                {
                    $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

                    if ($response->failed() || isset($response->json()['erro'])) {
                        throw new \Exception("CEP not found");
                    }

                    return $response->json();
                }
            };
        });
    }
}