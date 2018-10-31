<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryController extends Controller
{
    public function setValues()
    {
        $cat = new Category;

        for ($i=0; $i<5 ; $i++)
       	{ 
	        $uniq_str = self::RandString(2);
	        $cat->name = 'Cat_' . $uniq_str;
	        $cat->parent_id = rand(0, $i);

	      	DB::update(" INSERT INTO category 
                            SET 
                            name='$cat->name',
                            parent_id='$cat->parent_id'");
      	}
/*
        $cat->id = DB::getPdo()->lastInsertId();
        return redirect("/$ad->id")->with('status', 'Ad created');
*/
        $cats = DB::select('SELECT * FROM category WHERE parent_id=0');
    	return view('main', ['cats'=>$cats]);
    }

    public function getValues()
    {
        $cats = Category::orderBy('id', 'desc');
        $cats = DB::select('SELECT * FROM category WHERE parent_id=0');

    	return view('main', ['cats'=>$cats]);
    }

    public function clearDb()
    {
    	DB::delete('DELETE FROM category');

       	Schema::dropIfExists('category');

    	Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id');
        });

    	$cats = DB::select('SELECT * FROM category');

    	return view('main', ['cats'=>$cats]);
    }


	/**********************************************************************
	  * @brief  Функция возвращает случайную строку.
	  * @param  length - длинна строки 
	  * @retval Собственно строка.
	   ********************************************************************/
	function RandString($length = 2)
	{
	    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';       // 0123456789
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}
