<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function a_user_can_create_a_contact(): void
    {
        $this->post('/contacts', ['name' => 'qwerty', 'contact' => 123456789, 'email' => 'test@gmail.com'])->assertStatus(302);
        $this->assertDatabaseHas('contacts', ['name' => 'qwerty', 'contact' => 123456789, 'email' => 'test@gmail.com']);
    }

    /** @test */
    // public function a_user_cant_create_a_contact_with_invalid_contact()
    // {
    //     $this->post('/contacts', ['name' => 'Jafar', 'contact' => 123123678, 'email' => '123@gmail.com'])
    //     ->assertSessionHasErrors('name')
    //     ->assertStatus(302);

    //     $this->assertDatabaseMissing('contacts', ['name' => 'Jafar', 'contact' => 123123678, 'email' => '123@gmail.com']);
    // }

    /** @test 
     * @dataProvider invalidContacts*/
    public function invalid_contact($invalidData, $invalidFields): void
    {
        $this->post('/contacts', $invalidData)
            ->assertSessionHasErrors($invalidFields)
            ->assertStatus(302);

        $this->assertDatabaseCount('contacts', 1);
    }

    public function invalidContacts()
    {
        return [
            'The name is required' =>
            [
                ['contact' => 123456780, 'email' => '1@gmail.com'],
                //name required
                ['name']
            ],

            'The name should be at least 6 characters' =>
            [
                ['name' => 'jafss', 'contact' => 123456780, 'email' => '1@gmail.com'],
                //name should be at least 6 characters
                ['name']
            ],

            'The contact is required' =>
            [
                ['name' => 'qqqqqq', 'email' => '1@gmail.com'],
                //contact required
                ['contact']
            ],

            'The contact contact should be 9 digits' =>
            [
                ['name' => 'jafsss', 'contact' => 12345678, 'email' => '1@gmail.com'],
                //contact should be 9 digits
                ['contact']
            ],

            'The contact should be unique' =>
            [
                ['name' => 'jafsss', 'contact' => 123456789, 'email' => '1@gmail.com'],
                //contact should be unique
                ['contact']
            ],

            'The email is required' =>
            [
                ['name' => 'abcdef', 'contact' => 123456780],
                //email required
                ['email']
            ],

            'The email should be email' =>
            [
                ['name' => 'jafsss', 'contact' => 123456780, 'email' => 'sdfsdf'],
                //email should be email
                ['email']
            ],

            'The email should be unique' =>
            [
                ['name' => 'jafsss', 'contact' => 123456780, 'email' => 'test@gmail.com'],
                //email should be unique
                ['email']
            ],
        ];
    }


}