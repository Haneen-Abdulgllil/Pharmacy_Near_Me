<?php

namespace Tests\Unit;
use  App\Http\Controllers\Front\interfacesController;

use Illuminate\Http\Request;


use  Database\Factories\InterfaceFactory;
use  App\Models\User;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;

class userTest extends TestCase
{
  /**
   * A basic unit test example.
   *
   * @return void
   */


  // public function testApplication()
  // {

  //   $array=['name_Pharmacy'=> 'pahr'];
  //  // $array = new Request($array);
  //   // $query=new interfacesController();/pharmacies/search
  //   // $result=$query->searchPharmacies($array);
  //   // $result=$this->call('post', '/pharmacies/search',$array);
  //   $result=$this->call('post', 'http://127.0.0.1:8000/pharmacies/search',$array);

  //   // dd($result);
  //   //  dd($result[]);

  //   $user = User::where('id', 1)->first();
  //   // dd($result);
  //  // $this->assertViewHasAll($user);

  //    $this->assertEquals($user->id,$result->id);
  //   //$result->assertViewHasAll($user);
  //   // $result->assertOk();



  // }
  public function test_login_redirect_to_dashboard_admin()
  {
    $respones = $this->post('/login', [
      'email' => 'admin@gmail.com',
      'password' => 'admin'
    ]);
    $respones->assertStatus(302);
    $respones->assertRedirect('/_admin');
  }

  public function test_login_redirect_to_dashboard_user()
  {
    $respones = $this->post('/login', [
      'email' => 'client@gmail.com',
      'password' => 'client'
    ]);
    $respones->assertStatus(302);
    $respones->assertRedirect('/client');
  }

  public function test_login_redirect_to_dashboard_phar()
  {
    $respones = $this->post('/login', [
      'email' => 'phar@gmail.com',
      'password' => 'phar'
    ]);
    $respones->assertStatus(302);
    $respones->assertRedirect('/_pharmacy');
  }

  public function test_unath_user_connot_access_to_Pharmacy_dashboard()
  {
    // $respones=$this->post('/login',[
    //   'email'=>'phar@gmail.com',
    //   'password'=>'phar'
    // ]);
    $respones = $this->get('/_pharmacy');
    $respones->assertStatus(302);
    $respones->assertRedirect('/login');
  }

  public function test_unath_user_connot_access_to_admin_dashboard()
  {
    // $respones=$this->post('/login',[
    //   'email'=>'phar@gmail.com',
    //   'password'=>'phar'
    // ]);
    $respones = $this->get('/_admin');
    $respones->assertStatus(302);
    $respones->assertRedirect('/login');
  }

  public function test_unath_user_connot_access_to_client_dashboard()
  {
    // $respones=$this->post('/login',[
    //   'email'=>'phar@gmail.com',
    //   'password'=>'phar'
    // ]);
    $respones = $this->get('/client');
    $respones->assertStatus(302);
    $respones->assertRedirect('/login');
  }

}