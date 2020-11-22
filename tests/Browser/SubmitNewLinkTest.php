<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SubmitNewLinkTest extends DuskTestCase
{
    /** @test */
    public function submits_new_link_to_api()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/submit-link')
                ->type('#website', 'https://sapo.pt')
                ->type('#title', 'Serviço de Apontadores de Portugal')
                ->pause(200)
                ->type('#name', 'Artisan One')
                ->type('#email', 'artisan.one@laravel.pt')
                ->type('#description', 'O motor de busca, em português, para conveniência.')
//                ->pause(60 * 1000)
            ;
        });
    }

    /** @test */
    public function dont_see_stuff()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/submit-link')
                ->assertSee('Laravel');
        });
    }
}
