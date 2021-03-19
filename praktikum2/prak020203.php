<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Basic PHP</title>
</head>
<body>
    <header class="container-fluid" style="background-color: black;height:100px;display:flex;align-items:center;flex-direction:column;justify-content:center;">
        <h1 style="color:green;font-size:calc(10px+2vmin);">Learning Basic PHP</h1>
    </header>
    <?php
        $baris = 4;
        $kolom = 5;
        $counter = 1;
        echo("<table border=1>");
        for ($i=0; $i < $baris; $i++) { 
            echo("<tr>");
            for ($j=0; $j < $kolom; $j++) { 
                if ($counter % 2 == 0){
                    echo("<td style=color:white;background-color:red;>${counter}</td>");
                }
                else{
                    echo("<td style=color:red;background-color:white;>${counter}</td>");
                }
                $counter++;
            }
            echo("</tr>");
        }
        echo("</table>")
 	?>
</body>
</html>