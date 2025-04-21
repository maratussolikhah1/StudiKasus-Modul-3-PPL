<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Note;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    public function testeditnote()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/login') // mengakses halaman login
                ->type('email', 'duskuser@example.com') // mengisi email
                ->type('password', 'password') // mengisi password
                ->press('LOG IN') // klik tombol login
                ->assertPathIs('/dashboard') // memastikan user sudah masuk ke halaman dashboard
                ->clickLink('Notes') // klik tombol notes
                ->clickLink('Edit') // tekan tombol edit
                ->assertPathBeginsWith('/edit-note-page/') // memastikan user sudah masuk ke halaman edit note
                ->type('title', 'Dusk Test Note Updated') // mengisi judul note
                ->type('description', 'Updated content by Dusk test.') // mengisi deskripsi note
                ->press('UPDATE') // klik tombol update
                ->assertPathIs('/notes') // redirect ke notes
                ->press('Dusk User') // menekan nama user
                ->clickLink('Log Out') // klik tombol logout
                ->assertPathIs('/'); // memastikan user sudah logout
        });
    }
}