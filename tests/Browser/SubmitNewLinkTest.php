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
            $browser->resize(1920, 1800);
            $title = 'Serviço de Apontadores de Portugal';
            $name = 'Artisan One';
            $email = 'artisan.one@laravel.pt';
            $description = 'O motor de busca, em português, para conveniência.';

            // Nicety for manually open dev Tools (cmd+opt+I or F12)
            //$browser->pause(60 * 1000);

            $browser
                ->visit('/submit-link')
                ->type('#website', 'https://sapo.pt')
                ->keys('#website', '{tab}')
                ->waitUntil('window.App.Events.photoGenerated')
                ->type('#title', $title)
                ->waitUntil("document.querySelector('#title').value == '{$title}'")
                ->type('#name', $name)
                ->waitUntil("document.querySelector('#name').value == '{$name}'")
                ->type('#email', $email)
                ->waitUntil("document.querySelector('#email').value == '{$email}'")
                ->type('#description', $description)
                ->waitUntil("document.querySelector('#description').value == '{$description}'")
                ->check('tags[1]')
                ->check('tags[2]')
                ->click('#submit')
                // @TODO assert for the feedback (success and/or false)

                // Nicety for manually check the form submission
                //->pause(60 * 1000)
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
