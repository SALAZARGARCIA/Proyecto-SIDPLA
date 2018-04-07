<html>

    <head>
        <?php
        include("llamadoestilos.php");
        include("../modelo/database.php");
        $con = database::conectar();
        ?>
    </head> 

    <body> 

        <header>
            <?php
            include("header.php");
            ?>
        </header>

        <br>

        <table class ="reg1">
            <tr>
                <td>
            <center>

                

                <h1 align="center"> <span class="icon-pin"></span>Opinion</h1>

                <br>
                <br>
            

                <form name="areat" action="../controlador/controler1.php" method="post">

                    <table class="hola" >


                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif">
                                <h4><span class="icon-pin"></span> Comenta</h4></td>

                            <td><input input-sm" type="text" name="comentario"  
                                       style="height:130px ""width:130px" placeholder="Da tu opinión aquí"required></td>
                        </tr>


                        <tr><td align="center" colspan="2"><input type="submit" name="comentar" value="comentar"></td></tr>


                    </table>
                </form>

            </center>

        </td>
    </tr>
</table>
<br>
<br>
<?php
                                include 'footer.php';
?>
</body>
</html>