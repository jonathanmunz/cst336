<?php
    //Doesn't go horizontal, it's your turn part 3
    $backgroundImage = "./img/sea.jpg";
        
    if(isset($_GET['keyword'])){
        include './api/pixabayAPI.php';
        $keyword = $_GET['keyword'];
        $imageURLs = getImageURLs($keyword);
        $imageURLs = getImageURLs( $_GET['keyword'], $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
 ?>        
        
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("./css/styles.css"); 
            body{
                background-image: url('<?=$backgroundImage?>');
            }
        </style>
    </head>
    <body>
        
        <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            
            <input type="radio" id = "lhorizontal" name = "layout" value = "horizontal">
            <label for = "horizontal"></label><label for="lhorizontal"> horizontal </label>
            <input type = "radio" id = "lvertical" name = "layout" value = "vertical">
            <label for = "vertical"></label><label for= "lvertical"> vertical </label>
            <select name = "category">
                <option value ="">Select One</option>
                <option value="ocean">Sea</option>
                <option value="keyword">Forest</option>
                <option value="keyword">Mountain</option>
                <option value="keyword">Snow</option>
                <option value="keyword">Sky</option>
                <option value="keyword">Otters</option>
            </select>
            <input type="submit" value="Search"/>
        </form>
        
        <br> 
        <?php
        
            if(horizonal == null && vertical == null && placeholder == "keyword"){
                break; 
                }
    
            if(!isset($imageURLs)){ //form has not been submitted
                echo"<h2> Type a keyword to display a slideshow with random image from Pixabay.com </h2>";
            } else { //form was submitted
               //print_r($imageURLs);   //checking that $imageURLs is not null
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++){
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? "class='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        } while(!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class= "item ';
                        echo ($i == 0) ? "active" : "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <?php
            }//endElse
        ?>
        <br>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>