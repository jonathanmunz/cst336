<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
        <style>
            div, span {
                border: 1px solid black;
            }
            
            div.column {
                display: inline-block;
                margin-bottom: 10px
            }
            
            div.column > span {
                display: block;
            }

            div.column > div {
                display: inline;
            }
        </style>
    </head>
    <body>
        
        <div class="column">
            <div>Jason</div>
            <div>Henderson</div>
        </div>

        <div class="column">
            <span>Oscar</span>
            <span>Wilde</span>
        </div>
    </body>
</html>