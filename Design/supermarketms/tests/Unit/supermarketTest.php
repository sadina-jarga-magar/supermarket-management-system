<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class supermarketTest extends TestCase
{
    /**
     * A basic unit test example.
     *@test
     * @return void
     */
    public function testLogin()
    {
    	$email="david12@gmail.com";
    	$password="12345";

    	$response=$this->call("GET","/login/$email/$password");

    	$this->assertEquals(404,$response->status());
       
    }

    public function testRegistration()
    {
    	$name="david";
    	$address="london";
    	$phone_no="9810414515";
    	$email="david12@gmail.com";
    	$password="12345";
    	$confirm_password="12345";

    	$response=$this->call("POST","/register/$name/$address/$phone_no/$email/$password/$confirm_password");
    	$this->assertEquals(404,$response->status());
    }

    public function testAddproducttype()
    {
    	$Ptype_name="bakery";

        $response=$this->call("POST","/insertpt/$Ptype_name");
    	$this->assertEquals(404,$response->status());
    }


    public function testUpdateproducttype()
    {
    	$Ptype_name="vegetables & fruits";

        $response=$this->call("PUT","/producttype/$Ptype_name");
    	$this->assertEquals(404,$response->status());
    }

    public function testProduct()
    {
    	$P_name="lays";
    	$P_description="very tasty";
    	$P_img="image";
    	$P_mfdate="2019-3-4";


        $response=$this->call("POST","/product/$P_name/$P_description/$P_img/$P_mfdate");
    	$this->assertEquals(404,$response->status());
    }

  public function testUpdateproduct()
    {
    	$P_name="beer";
    	$P_description="very tasty";
    	$P_img="image";
    	$P_mfdate="2019-6-7";


        $response=$this->call("PUT","/updateproduct/$P_name/$P_description/$P_img/$P_mfdate");
    	$this->assertEquals(404,$response->status());
    }
      public function testDeleteproduct()
    {
    	$P_name="beer";
    	$P_description="very tasty";
    	$P_img="image";
    	$P_mfdate="2019-6-7";


        $response=$this->call("DELETE","/insertpindex/$P_name/$P_description/$P_img/$P_mfdate");
    	$this->assertEquals(404,$response->status());
    }

    public function testContact()
    {
    	$first_name="david";
    	$last_name="becam";
    	$message="how can i get my order?";

		$response=$this->call("GET","/contactinfo/$first_name/$last_name/$message");
    	$this->assertEquals(404,$response->status());
    }

    public function testInvalidUserLogin()
    {
    	$email="johnny01@gmail.com";
    	$password="johnnydon";

    	$response=$this->call("GET","/login/$email/$password");

    	$this->assertEquals(404,$response->status());
    }

}
