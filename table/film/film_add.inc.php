<?php 

if(isset($_POST['submit'])){

    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("INSERT INTO film (title,description,release_year,language_id,original_language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features,last_update) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW()) ");

        $special_features = '';
        if(isset($_POST['special_features1'])){
            $special_features .= 'Trailers';
        }
        if(isset($_POST['special_features2'])){
            $special_features .= ',Commentaries';
        }
        if(isset($_POST['special_features3'])){
            $special_features .= ',Deleted Scenes';
        }
        if(isset($_POST['special_features4'])){
            $special_features .= ',Behind the Scenes';
        }

        if($_POST['original_language_id'] == 'hide'){
            $ori_lang = null;
        } else {
            $ori_lang = $_POST['original_language_id'];
        }

        $statement ->bindParam(1,$_POST['title'],PDO::PARAM_STR);
        $statement ->bindParam(2,$_POST['description'],PDO::PARAM_STR);
        $statement ->bindParam(3,$_POST['release_year'],PDO::PARAM_INT);
        $statement ->bindParam(4,$_POST['language_id'],PDO::PARAM_INT);
        $statement ->bindParam(5,$ori_lang,PDO::PARAM_INT);
        $statement ->bindParam(6,$_POST['rental_duration'],PDO::PARAM_STR);
        $statement ->bindParam(7,$_POST['rental_rate'],PDO::PARAM_STR);
        $statement ->bindParam(8,$_POST['length'],PDO::PARAM_INT);
        $statement ->bindParam(9,$_POST['replacement_cost'],PDO::PARAM_STR);
        $statement ->bindParam(10,$_POST['rating'],PDO::PARAM_STR);
        $statement ->bindParam(11,$special_features,PDO::PARAM_STR);

    
        //$statement = $connection->prepare($sql);
        $statement->execute();

    } catch (PDOException $error){

            echo "<br>".$error->getMessage();

    }

    if (isset($_POST['submit']) && $statement) {
        // echo '<p class="">Data successfully added</p>';
        header("Location: film.php");
        exit();
    } else {
        echo '<p style="color:white">Please fill in all the details correctly</p>';
    } 
}
// header("Location: customer_add.php")
?>
