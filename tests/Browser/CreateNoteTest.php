<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class CreateNoteTest extends DuskTestCase
{
    public function testcreatenotes()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/login') // mengakses halaman login
                ->type('email', 'duskuser@example.com') // mengisi email
                ->type('password', 'password') // mengisi password
                ->press('LOG IN') // tekan tombol login
                ->assertPathIs('/dashboard') // memastikan user masuk ke halaman dashboard
                ->clickLink('Notes') // klik tombol notes
                ->clickLink('Create Note') // klik tombol create note
                ->assertPathIs('/create-note') // memastikan user masuk ke halaman create note
                ->type('title', 'Dusk Test Note') // mengisi judul notes
                ->type('description', 'This is a note created by Laravel Dusk test.') // mengisi deskripsi notes
                ->press('CREATE') // klik tombol create untuk membuat note
                ->assertSee('Dusk Test Note') // memastikan title ada di halaman notes
                ->press('Dusk User') // klik nama user
                ->clickLink('Log Out') // klik tombol logout
                ->assertPathIs('/'); // memastikan user sudah logout
        });
    }
}