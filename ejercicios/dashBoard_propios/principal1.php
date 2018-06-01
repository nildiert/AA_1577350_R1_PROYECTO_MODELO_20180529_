<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" type="text/css" href="xxxx.css">-->
        <style type="text/css">
            body {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            body > * {
                width: 100%;
                border: 1px solid #000;
                border-bottom-width: 0;
                box-sizing: border-box;
                text-align: center;
            }

            body > *:last-child {
                border-bottom-width: 1px;
            }

            header,
            footer {
                min-height: 100px;
            }

            aside {
                width: 25%;
                border: 0 solid #000;
                border-right-width: 1px;
            }

            .container .body {
                width: 75%;
            }

            .container {
                display: flex;
                min-height: 300px;
            }

        </style>        
    </head>
    <body>
        <div>
            <header>Header</header>
            <div class="container">
                <aside>Aside</aside>
                <section class="body">Body</section>  
            </div>
            <footer>Footer</footer>
        </div>
    </body>
</html>