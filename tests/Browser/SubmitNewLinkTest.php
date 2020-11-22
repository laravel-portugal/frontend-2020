<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SubmitNewLinkTest extends DuskTestCase
{
    /** @test */
    public function see_stuff()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/submit-link')
                    ->assertSee('Laravel')
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
