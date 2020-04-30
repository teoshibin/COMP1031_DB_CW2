<?php 
    require "../../include/config.php";
    require "../../include/common.php";

    $statement=false;

    try{

        //#1 Open Connection
        $connection = new PDO ($dsn,$username,$password,$options);
        
        //#2 Prepare Sql QUery 
        $statement = $connection->prepare("SELECT   language_id, name FROM language");

       
        $statement->execute();
        $result = $statement->fetchAll();

    } catch (PDOException $error){

        echo "<br>".$error->getMessage();

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="../../css/insert.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/qpy2aGtSgsYPZzCoYWjcaBCo/recaptcha__en_gb.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer type="text/javascript" src="../../js/main.js"></script>
    <!-- <script type="text/javascript" src="insert.js"></script> -->
    <script type="text/javascript" src="film_valid.js"></script>
</head>

<div class="content">
    <h3 class="title">New Film</h3>
  
    <form name="myform" action="film_add.inc.php" onsubmit="return validateForm()" method="post">

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Title</h5>
                <input type="text" name="title" id="title" class="input">
            </div>
        </div>

                <textarea type="text" placeholder="Description"name="description" 
                id="description" class="input" cols="10" rows="5" maxlength="6000" style="margin-top:20px; margin-bottom:20px;"></textarea>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Release Year</h5>
                <input type="text" name="release_year" id="release_year" class="input">
                
            </div>
        </div>

                <select type="text" name="language_id" id="language_id" class="input">
                    <option value="-" selected> --Language-- </option>
                    <?php foreach($result as $language) { echo "<option value =$language[language_id]>$language[name]</option>";}?>
                </select>

                <select type="text" name="original_language_id" id="original_language_id" class="input">
                    <option value="NULL" selected> Original Language </option>
                    <?php foreach($result as $language) { echo "<option value =$language[language_id]>$language[name]</option>";}?>
                </select>


        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Rental Duration</h5>
                <input type="number" name="rental_duration" id="rental_duration" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Rental Rate</h5>
                <input type="text" name="rental_rate" id="rental_rate" step ="0.01" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Length</h5>
                <input type="number" name="length" id="length" class="input">
            </div>
        </div>

        <div class="input-div">
            <div class="i">
            </div>
            <div class="div">
                <h5>Replacement Cost</h5>
                <input type="text" name="replacement_cost" id="replacement_cost" step ="0.01" class="input">
            </div>
        </div>


                <select  type="text" name="rating" id="rating" class="input">
                    <option value="-" selected> --Rating-- </option>
                    <option value="G">G</option>
                    <option value="R">R</option>
                    <option value="PG">PG</option>
                    <option value="PG-13">PG-13</option>
                    <option value="NC-17">NC-17</option>
                </select>


            <!-- <div class="checkbox">
                <h5>Special Features</h5>
                <input type="checkbox" name="special_features" id="special_features" value="Behind the scenes" class="check" id="check" multiple>
                    <label for="check">Behind the scenes</label>
                <input type="checkbox" name="special_features" id="special_features" value="Trailers" class="check" id="check" multiple>
                    <label for="Trailers">Trailers</label>
                <input type="checkbox" name="special_features" id="special_features" value="Commentaries" class="check" id="check" multiple>
                    <label for="Commentaries">Commentaries</label>
                <input type="checkbox" name="special_features" id="special_features" value="Deleted scenes" class="check" id="check" multiple>
                    <label for="Deleted scenes">Deleted scenes</label>
                </input>
            </div> -->

                <h5 class="checkbox-title">Special Features</h5>
                    <div class="checkbox">
                    <input class="check" type="checkbox"  name="special_features" id="special_features1"/>
                    <label for="special_features1"></label>
                    </div>
                    <h5 class="checkbox-label">Behind the scenes</h5>
                    

                    <div class="checkbox">
                    <input class="check" type="checkbox"  name="special_features" id="special_features2"/>
                    <label for="special_features2"></label>
                    </div>
                    <h5 class="checkbox-label">Trailers</h5>

                    <div class="checkbox">
                    <input class="check" type="checkbox"  name="special_features" id="special_features3"/>
                    <label for="special_features3"></label>
                    </div>
                    <h5 class="checkbox-label">Commentaries</h5>
                    
                    <div class="checkbox">
                    <input class="check" type="checkbox"  name="special_features" id="special_features4"/>
                    <label for="special_features4"></label>
                    </div>
                    <h5 class="checkbox-label">Deleted scenes</h5>


        <input class="btn btn-primary" type="submit" name="submit" style="margin-top:30px">

        <br>

        <a href="film.php" class="btn-back" style="margin-bottom:100px;">BACK</a>
        
    </form>
</div>
</body>

</html>