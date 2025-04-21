<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    

    public function test_user_can_register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register') //masuk ke halaman regis
                ->type('name', 'Dusk User') //menulis nama pengguna
                ->type('email', 'duskuser@example.com') //menulis email
                ->type('password', 'password') //menulis password
                ->type('password_confirmation', 'password') //me konfirmasi password
                ->press('REGISTER') //klik tombol register
                ->assertPathIs('/dashboard') //memastikan user masuk ke halaman dashboard
                ->press('Dusk User') //klik nama user
                ->clickLink('Log Out'); //klik tombol logout
        });
    }
}