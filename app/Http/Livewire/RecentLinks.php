<?php

namespace App\Http\Livewire;

use App\ClientInterface;
use Livewire\Component;

class RecentLinks extends Component
{
    public string $title = 'Links recentes.';
    public string $description = 'Todos juntos criamos diariamente um base de conhecimento.';
    public array $links;
    private ClientInterface $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = resolve(ClientInterface::class);
        $this->links = $this->client->getRecentLinks()->all();
    }

    public function render()
    {
        return view('livewire.recent-links');
    }
}
