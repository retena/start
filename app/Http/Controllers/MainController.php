<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;


use Illuminate\Http\Request;

class MainController extends Controller
{

	public function all_links()
	{

        $url = "https://1000statei.ru/articles/holiday/";

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $links_count = $crawler->filter('a')->count();

        $all_links = [];

        if($links_count > 0){

            $links = $crawler->filter('a')->links();

            foreach ($links as $link) {

                $all_links[] = $link->getURI();

            }

            $all_links = array_unique($all_links);

            echo "Все ссылки на странице $url <pre>"; 
            print_r($all_links);
            echo "</pre>";

        } else {
            echo "No Links Found";
        }

        die;
    }

    public function testh1()
	{

        $url = "https://1000statei.ru/articles/holiday/";

        $client = new Client();

        $crawler = $client->request('GET', $url);

        $h1_count = $crawler->filter('h1')->count();

        if($h1_count > 0){

            $h1 = $crawler->filter('h1')->text();

            echo $h1; 
          
        } else {

            echo "No Links Found";

        }
        die;
    }

   
 	public function test()
	{

        $url = "https://medportal.ru/enc/neurology/";

        $client = new Client();

        $crawler = $client->request('GET', $url);
        $li = $crawler->filter('ul.hc2-nav-itemgroup>li');

        $li_count = $li->count();
 
  		//dump($li);

        $all_links = [];
        $all_titles = [];
        $arr = [];

        if($li_count > 0){

        //	$links = $crawler->filter('ul.hc2-nav-itemgroup>li>a')->links();
        	//$all_titles = $crawler->filter('ul.hc2-nav-itemgroup>li>a');

		$nodeValues = $crawler->filter('ul.hc2-nav-itemgroup>li>a')->each(function (Crawler $node, $i) {

		//	echo($node->text() . '<br>');
		//	echo($node->link()->getUri() . "<br>");

			$nodeValues[$node->text()] = $node->link()->getUri(); 
		    return $nodeValues;
		});
		dump($nodeValues);

            // echo "<pre>"; 
            // print_r($all_links);
            // echo "</pre>";


            // echo "<pre>"; 
            // print_r($arr);
            // echo "</pre>";

//             $title = $crawler->filter('ul.hc2-nav-itemgroup>li>a')->text();
//             $a = $crawler->filter('ul.hc2-nav-itemgroup>li>a')->first()->link()->getURI();
// dump($a);
//             echo $title . '-';  
//             echo $a;
          
        } else {
            echo "Not Found";
        }
        die;
    }

}
