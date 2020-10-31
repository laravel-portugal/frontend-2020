<?php

namespace App\Http\Clients;

use App\Http\Clients\Domains\LinksFakeClient;
use App\Http\Clients\Domains\TagsFakeClient;

class FakeClient extends ApiClient
{
    use TagsFakeClient;
    use LinksFakeClient;
}
