<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    public function testuserlogout()
    {
        $this->browse(function (Browser $browser) { 
            $browser 
            ->visit('/login') // mengakses halaman login
            ->type('email', 'duskuser@example.com') // mengisi email
            ->type('password', 'password') // mengisi password
            ->press('LOG IN') // menekan tombol login
            ->assertPathIs('/dashboard') // memastikan sudah masuk ke halaman dashboard
            ->press('Dusk User') // menekan nama user
            ->clickLink('Log Out'); // menekan tombol logout
            });
    }
}