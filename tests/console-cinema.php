<?php

/**
*
* Demo: list movie show time of given cinemas
*
*/
    require_once dirname(__FILE__)."/../api-allocine-helper.php";
    
    // Construct the object
    $allohelper = new AlloHelper;
    
    try
    {

        // $cinemas = "B0242,C0158";
        $cinemas = "C0150";

        $json = $allohelper->showtimesByCinemas($cinemas);
        // var_dump($json);

        // $jsonstr = json_encode($json);
        // echo "$jsonstr";

        // $string = file_get_contents("jso.json");
        // $json = json_decode($string, true);


        $theaterShowtimes = $json["feed"]["theaterShowtimes"];
        foreach ($theaterShowtimes as $idx => $theater) {
            $idCinema = $theater['place']['theater']['code'];
            $movieShowtimes = $theater['movieShowtimes'];
            foreach ($movieShowtimes as $filmidx => $movie) {
                $idfilm = $movie['onShow']['movie']['code'];
                $title = $movie['onShow']['movie']['title'];
                $runtime = $movie['onShow']['movie']['runtime'];
                
                //one type
                $oneType = $movie['onShow']['movie']['genre']['0']['$'];

                //all types
                $allTypes = "";
                foreach ($movie['onShow']['movie']['genre'] as $typeidx => $type) {
                    $allTypes .= $type['$'].",";
                }

                $allTypes = rtrim($allTypes,",");

                $ratingPeople = $movie['onShow']['movie']['statistics']['pressRating'];
                $ratingPeople = $movie['onShow']['movie']['statistics']['userRating'];
                $releaseDate = $movie['onShow']['movie']['release']['releaseDate'];

                $shows = $movie['scr'];
                foreach ($shows as $showidx => $show) {
                    $day = $show['d'];
                    $showtimes = $show['t'];

                    foreach ($showtimes as $time) {
                        $start = $time['$'];

                        //key
                        echo "$idCinema, $idfilm, $title, $day, $start \n";

                        //more
                        echo "$idCinema, $title, $allTypes, $runtime, $releaseDate, $ratingPeople, $ratingPeople \n";
                    }
                }

                
            }
        }


        // var_dump($json["feed"]["theaterShowtimes"][0]['movieShowtimes'][0]['onShow']['movie']['title']);
        // var_dump($json["feed"]["theaterShowtimes"][0]['movieShowtimes'][0]['onShow']['movie']['runtime']);
        // var_dump($json["feed"]["theaterShowtimes"][0]['movieShowtimes'][0]['onShow']['movie']['genre'][0]['$']);
        // var_dump($json["feed"]["theaterShowtimes"][0]['movieShowtimes'][0]['onShow']['movie']['statistics']['pressRating']);
        // var_dump($json["feed"]["theaterShowtimes"][0]['movieShowtimes'][0]['scr'][0]['d']);
        // var_dump($json["feed"]["theaterShowtimes"][0]['movieShowtimes'][0]['scr'][0]['t'][0]['$']);
    }
    // Error
    catch (ErrorException $e)
    {
        echo "Error " . $e->getCode() . ": " . $e->getMessage() . PHP_EOL;
    }
?>