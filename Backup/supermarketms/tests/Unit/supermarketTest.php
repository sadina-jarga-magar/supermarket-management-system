<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Product;
use App\ProductType;

class supermarketTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic unit test example.
     *@test
     * @return void
     */
    public function testLogin()
    {
    	

    	$response=$this->call("GET",'/login',[
    	'email'=>"david12@gmail.com",
    	'password'=>"12345",
    	]);

    	$this->assertEquals(200,$response->status());
       
    }

    public function testRegistration()
    {
    	

 	$response=$this->call("POST",'/register',[
    	'name'=>"david bacam",
    	'address'=>"london",
    	'phone_no'=>"9807645678",
    	'date_of_birth'=>"1992-23-02",
    	'email'=>"david12@gmail.com",
    	'password'=>"david12345@#$",
    	'confirm_password'=>"david12345@#$",
    	]);

    	$this->assertEquals(302,$response->status());
    }

    public function testAddproducttype()
    {
    	

        $response=$this->call("POST",'/insertpt',[
        'Ptype_name'=>"bakery",

        ]);
    	$this->assertEquals(302,$response->status());
    }


    public function testUpdateproducttype()
    {
    	

        $response=$this->call("PUT",'/insertpt/3',[
        	'Ptype_name'=>"bakery and bread",
        ]);
    	$this->assertEquals(302,$response->status());
    }
       public function testDeleteproducttype()
    {
    
        $response=$this->call('DELETE','/addproducttype/5');
    	$this->assertEquals(302,$response->status());
    }

    public function testAddProduct()
    {
    $prod=Product::create([
    	'P_name'=>"Rara",
    	'P_description'=>"very good for soup",
    	'P_img'=>'rara.jpg',
    	'P_mfdate'=>"2019-04-23",
    	'P_expdate'=>"2020=05-05",
    	'Rate'=>"30",
    	'Quantity'=>"40",
    	'Ptype_id'=>"5",
    ]);
    $this->assertEquals('Rara',$prod->P_name);	
    }

  public function testUpdateproduct()
    {
    	 $response=$this->call("PUT",'/updateproduct/5',[
        'P_name'=>"ramen",
    	'P_description'=>"Ramen is a japanese dish",
    	'P_img'=>"image",
    	'P_mfdate'=>"2019-04-05",
    	'P_mfdate'=>"2019-08-27",
        ]);
    	$this->assertEquals(302,$response->status());
    }
      public function testDeleteproduct()
    {
    
        $response=$this->call('DELETE','/insertpindex/2');
    	$this->assertEquals(302,$response->status());
    }

    public function testContact()
    {
    	

		$response=$this->call("POST",'/contactinfo',[
		'first_name'=>"david",
    	'last_name'=>"becam",
    	'message'=>"how can i get my order?",
			]);
		
    	$this->assertEquals(302,$response->status());
    }

    public function testInvalidUserLogin()
    {
    	$email="johnny01@gmail.com";
    	$password="johnnydon";

    	$response=$this->call("GET",'/login',[
    		'email'=>$email,
    		'password'=>$password,
    	]);

    	$this->assertEquals(200,$response->status());
    }

    public function testWelcome()
    {
    	$response=$this->get('/');
    	$response->assertSee("Home");
    }

}
