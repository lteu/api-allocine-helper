API Allociné Helper PHP
=======================

[Italian version](#Italian)

L'API Allociné Helper permette d'utilizzare il più semplice l'API d'[AlloCiné](http://www.allocine.fr/).
La classe **AlloHelper** permette di trovare le informazioni su  film, stars, articoli, orari e critiche.
È possibile manipolare i dati recuperati dalla classe **AlloData** (opzionale).
La classe **AlloImage** permette di manipolare facilmente  de manipuler facilement la dimensione dei  poster e immagini memorizzati nel Allociné.

### Installazione

`require_once "./api-allocine-helper.php";`

### Utilizzo

L'utilizzazione è molto semplice, tuttivia, si consiglia foremente di usare la programmazione orientata ad oggetti e sapere usare i blocchi `try{} catch(){}`.

Un esempio per recuperare informazioni di un film

```
<?php
    // Inclure le script
    require_once "./api-allocine-helper.php";
    
    // Créer l'objet
    $helper = new AlloHelper;
    
```

Pour plus de clareté, on définit les paramètres à l'avance: le code du film, et la quantité d'informations à récupérer.

```
    $code = 27061;
    $profile = 'small';
    
```

Ensuite, il est conseillé d'effectuer des requêtes dans un bloc `try{} catch(){}` pour gérer les erreurs.

```
    try
    {
        // invocare la richiesta
        $movie = $helper->movie( $code, $profile );
        
        // mostra il titolo
        echo "Titre du film: ", $movie->title, PHP_EOL;
        
        // mostra tutti i dati
        print_r($movie->getArray());
        
    }
    catch( ErrorException $error )
    {
        // In caso di errore
        echo "Erreur n°", $error->getCode(), ": ", $error->getMessage(), PHP_EOL;
    }
?>
```


English
-------

API Allociné Helper is a support for using the API of [AlloCiné](http://www.allocine.fr/).
Find a lot of information about movies, people, tv series, etc, with the class **AlloHelper**.
It is possible to manipulate the received data with the class **AlloData** (optional).
And as a bonus, you can simply modify posters and photos from the Allociné server just by changing the URL with the class **AlloImage**.


### Installation

This is just a script, you put it in your favorite directory and you do a `require_once "./api-allocine-helper.php";` in your code.

### Usage

Usage is very simple, however it is strongly advisable to know OOP, and the `try{} catch(){}` block.

First, create an `AlloHelper` object:

```
<?php
    // Include the script
    require_once "./api-allocine-helper.php";
    
    // Creat the object
    $helper = new AlloHelper;
    
```

For more clarity, we should define parameters before: the movie's code, and the quantity of information to get.

```
    $code = 27061;
    $profile = 'small';
    
```

Next, it's advisable to do requests in an `try{} catch(){}` block for handling errors.

```
    try
    {
        // Request sending
        $movie = $helper->movie( $code, $profile );
        
        // Print the title
        echo "Title: ", $movie->title, PHP_EOL;
        
        // Print all data
        print_r($movie->getArray());
        
    }
    catch( ErrorException $error )
    {
        // Error
        echo "Error ", $error->getCode(), ": ", $error->getMessage(), PHP_EOL;
    }
?>
```

