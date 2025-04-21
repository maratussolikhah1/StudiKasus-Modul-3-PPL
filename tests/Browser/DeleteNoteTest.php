<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * A Dusk test for deleting a note.
     */
    public function testDeletenotes(): void
    {
        $this->browse(function (Browser $browser) {
             $browser
            ->visit('/login') // mengakases halaman login
            ->type('email', 'duskuser@example.com') // mengisi email
            ->type('password', 'password') // mengisi password
            ->press('LOG IN') // menekan tombol login
            ->assertPathIs('/dashboard') // memastikan sudah masuk ke halaman dashboard
            ->clickLink('Notes') // menekan tombol notes
            ->pause(1000) // menunggu proses loading
            ->click('#delete-5') // langsung klik tombol dengan ID 
            ->assertPathIs('/notes') // memastikan diarahkan kembali ke halaman notes
            ->assertSee('Note has been deleted') // memastikan pesan berhasil muncul
            ->press('Dusk User') // menekan nama user
            ->clickLink('Log Out') // menekan tombol logout
            ->assertPathIs('/'); // memastikan sudah logout
        });
    }
}