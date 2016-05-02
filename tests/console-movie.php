<?php
    require_once "../api-allocine-helper.php";
    
    // Construct the object
    $allohelper = new AlloHelper;
    
    // Get the movie code
    echo "Movie code: ";
    
    // Get the code
    // $code = (int) fgets(STDIN);
    $code = 224784;
    
    echo $code."\n";
    try
    {
        // Request
        $movie = $allohelper->movieInfo($code);
        
        echo 'Title : ' . $movie->title . PHP_EOL;
        echo 'Genere : ' . $movie->genere . PHP_EOL;
        echo 'runtime : ' . $movie->runtime . PHP_EOL;
        echo 'releaseDate : ' . $movie->releaseDate . PHP_EOL;
        echo 'nationality : ' . $movie->nationality . PHP_EOL;
        echo "\n";

         // $movie = json_encode($movie);
         // $movie
         // echo "$movie";
         // foreach ($movie as $key => $value) {
         //     echo "$key \n";
         // }
    }
    
    // Error
    catch (ErrorException $e)
    {
        echo "Error " . $e->getCode() . ": " . $e->getMessage() . PHP_EOL;
    }
?>