<html>

    <head>
        <?php
        include("llamadoestilos.php");
        include("../../modelo/database.php");
        $con = database::conectar();
        ?>
    </head> 

    <body> 

        <header>
            <?php
            include("header.php");
            ?>
        </header>

        <br><br><br>

        <table class ="reg1">
            <tr>
                <td>
            <center>

                <h1 align="center">Opinion</h1>
                <br>
                <br>


                <form name="areat" action="../../controlador/controler2.php" method="post">

                    <table class="hola" >


                        <tr><td align="center" style="font-family:Tahoma, Geneva, sans-serif"><h4>Comenta</h4></td><td>
                                <input input-sm" type="text" name="comentario"  style="height:130px ""width:130px" placeholder="Da tu opinión aquí"required></td></tr>

                        <tr><td style="padding:2px"></td></tr>
                        <tr><td align="center" colspan="2"><input type="submit" name="comentar" value="comentar"></td></tr>
                        <tr><td style="padding:4px"></td></tr>
                        </section>
                        </div>

                    </table>
                </form>

            </center>

        </td>
    </tr>
</table>


</body>
</html>