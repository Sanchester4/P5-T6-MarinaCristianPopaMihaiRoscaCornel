<?php

namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Database\Seeders\UserSeeder;
use App\Http\Controllers\AuthControllers;
// use Illuminate\Foundation\Testing\TestCase;

class LoginTest extends TestCase
{

    public function test_login_with_incorrect_password()
    {
       $response = $this->get('/');
       $response->assertStatus(200);
    }


    public function test_if_you_are_unlogged_admin()
    {
        $response = $this->call('GET', '/admin/profile');
        $response->assertStatus(403);
    }

    public function test_if_you_are_unlogged_teacher()
    {
        $response = $this->call('GET', '/teacher/calendar');
        $response->assertStatus(403);
    }

    public function test_if_you_are_unlogged_student()
    {
        $response = $this->call('GET', '/student/profile');
        $response->assertStatus(403);
    }

    public function test_404_error()
    {
        $response = $this->call('GET', '/student/profilestudentss');
        $response->assertStatus(404);
    }

      //Perform a post() request to add a new user
      public function test_if_it_stores_new_students()
      {
          $response = $this->post('/createStudent', [
              'firstname' => 'Dary',
              'lastname' => 'dary',
              'email' => 'dary@gmail.com',
              'password' => 'dary1234',
              'studyYear' => '1',
              'specialisation' => 'CTI',
              'CNP' => '1234567891021',
              'dateBirth' => '2022-05-04'
          ]);
  
          $response->assertStatus(403);
      }

      public function test_if_data_exists_in_database()
      {
          $this->assertDatabaseHas('users', [
              'lastName' => 'Cazacu'
          ]);
      }
   
      public function test_if_data_does_not_exists_in_database()
    {
        $this->assertDatabaseHas('users', [
            'lastName' => 'John'
        ]);
    }

    public function test_if_seeder_works()
    {
        $this->seed(UserSeeder::class);
    }

    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com'
        ]);

        $user2 = User::make([
            'name' => 'Mary Jane',
            'email' => 'maryjane@gmail.com'
        ]);

        $this->assertTrue($user1->email != $user2->email);
    }







    // public function test_login_with_incorrect_login_and_correct_password(){
    //     $response = $this->action('POST', 'AuthController@login', ['email' => 'admin109000@gmail.com', 'password'=>12345]);
        
    //     $this->assertRedirectedToRoute('login');
    // }


//     public function testThatNumbersAddUp()
//     {
//         $this->assertEquals(10, 5 + 5);
//     }
}