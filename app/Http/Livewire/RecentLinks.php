<?php

namespace App\Http\Livewire;

use App\Http\Clients\ApiClient;
use Livewire\Component;

class RecentLinks extends Component
{
    public string $title = 'Links recentes.';
    public string $description = 'Todos juntos criamos diariamente um base de conhecimento.';
    public array $links;
    private ApiClient $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = resolve(ApiClient::class);
        $this->links = $this->client->getRecentLinks()->all();
    }

    public function render()
    {
        return view('livewire.recent-links');
    }
}
