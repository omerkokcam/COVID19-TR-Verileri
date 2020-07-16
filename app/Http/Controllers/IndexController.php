<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
//        // worldometer.com datas
//        $fgc1 = file_get_contents('https://www.worldometers.info/coronavirus/country/turkey');
/*        preg_match_all('@<div class="maincounter-number".*?>(.*?)</div>@si',$fgc1,$matches1);*/
//        $data1 = $matches1[1];
//        echo '<span>Vaka Sayısı'.strip_tags($data1[0]).'</span><br>';
//        echo '<span>Vaka Sayısı'.strip_tags($data1[1]).'</span><br>';
//        echo '<span>Vaka Sayısı'.strip_tags($data1[2]).'</span><br>';
//
//        // covid19.saglik.gov.tr.
//        $fgc2 = file_get_contents('https://covid19.saglik.gov.tr/');
//        preg_match_all('@<li class="d-flex justify-content-between baslik-k-2 .*?">(.*?)</li>@si',$fgc2,$matches2);
//        //dd($matches2);
//        $data2 =  $matches2[0] ;
//
//        echo "<span>".strip_tags($data2[0])."</span><br>";
//        echo "<span>".strip_tags($data2[1])."</span><br>";
//        echo "<span>".strip_tags($data2[2])."</span><br>";
//        echo "<span>".strip_tags($data2[3])."</span>";

        //api.apify.com/tugkan/covid-tr

//        $fgc3 = file_get_contents('https://api.apify.com/v2/key-value-stores/28ljlt47S5XEd1qIi/records/LATEST?disableRedirect=true');
//        $data3 = json_decode($fgc3,true);
//        //dd($data3);
//        echo "TOPLAMDA; <br>";
//        echo "Test Yapılan Kişi Sayısı : ".$data3['tested']."<br>" ;
//        echo "Enfekte Olan Kişi Sayısı : ".$data3['infected']."<br>" ;
//        echo "Vefat Eden Kişi Sayısı : ".$data3['deceased']."<br>" ;
//        echo "İyileşen Kişi Sayısı : ".$data3['recovered']."<br>" ;
//        echo "Son Güncellenme Tarihi : ".substr($data3['lastUpdatedAtApify'],0,10)."<br>";
//        echo "Kaynak : <a href=".$data3['sourceUrl'].">Sağlık Bakanlığı Web Sitesi</a><br>";


        //api.apify.com/tugkan/covid-tr

        $fgc4 = file_get_contents('https://api.apify.com/v2/datasets/LYeOfHQwsv7FsfdGV/items?format=json&clean=1');
        $data4 = json_decode($fgc4,true);
        //dd($data4);
        try{
            foreach ($data4 as $data)
            {
                echo "Tarih : ".substr($data['lastUpdatedAtApify'],0,10)."<br>";
                echo "Test Yapılan Kişi Sayısı : " .($data['tested'] ?? "-")."<br>" ;
                echo "Enfekte Olan Kişi Sayısı : ".($data['infected'] ?? "-")."<br>" ;
                echo "Vefat Eden Kişi Sayısı : ".($data['deceased'] ?? "-")."<br>" ;
                echo "İyileşen Kişi Sayısı : ".($data['recovered'] ?? "-")."<br>" ;
                echo "--------------------------------------------------------------------------------- <br>";
            }
        }
        catch(\Exception $exception){
            dd($exception);
        } ;




     }
}
