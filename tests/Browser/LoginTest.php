<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function testlogin()
    {
        $this->browse(function (Browser $browser) {
                $browser 
                ->visit('/login') // masuk ke halaman login
                ->type('email', 'duskuser@example.com') // mengisi email
                ->type('password', 'password') // mengisi password
                ->press('LOG IN') // klik login
                ->assertPathIs('/dashboard') // memastikan user masuk ke halaman dashboard
                ->press('Dusk User') // klik nama user
                ->clickLink('Log Out'); // klik button logout

                });
    }
}