<?php
$TxtNombre="";
$Rdglenguaje="";
$chkphp="";
$chkhtml="";
$chkcss="";
$LisAnime="";
if($_POST){
    //Captura los valores que son enviados desde el formulario para poder usarlos
    $TxtNombre=(isset($_POST['TxtNombre']))?$_POST['TxtNombre']:""; 
    $Rdglenguaje=(isset($_POST['lenguaje']))?$_POST['lenguaje']:"";

    $chkphp=(isset($_POST['chkphp'])=="si")?"checked":"";
    $chkhtml=(isset($_POST['chkhtml'])=="si")?"checked":"";
    $chkcss=(isset($_POST['chkcss'])=="si")?"checked":"";

    $LisAnime=(isset($_POST['LisAnime']))?$_POST['LisAnime']:""; 
    $TxtComentario=(isset($_POST['TxtComentario']))?$_POST['TxtComentario']:""; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <?php if($_POST){ ?>
    <strong> Hola </strong>: <?php echo $TxtNombre; ?></br>                <! <- Codigo enbebido de php en el html>
    <strong> Su lenguaje es</strong>:  <?php echo $Rdglenguaje; ?></br>
    <strong> Estas aprendiendo </strong>:  </br>
    -<?php echo ($chkphp=="checked")?"PHP":""; ?></br>
    -<?php echo ($chkhtml=="checked")?"HTML":""; ?> </br>
    -<?php echo ($chkcss=="checked")?"CSS":""; ?> </br>
    <strong> Su Anime seleccionado es</strong>:  <?php echo $LisAnime; ?></br>    
    <strong> Tu mensaje es</strong>:  <?php echo $TxtComentario; ?></br>    
    <?php } ?>

    <form action="ValoresInput.php" method="post">
        Nombre:</br>
        <input values="<?php echo $TxtNombre; ?>" type="text" name="TxtNombre" id="">    <! <- Envia el valor de la caja de texto>
        </br>

    </br>¿Te gusta?
    </br>php: <input type="radio" <?php echo($Rdglenguaje=="php")?"checked":""; ?> name="lenguaje" value="php" id=""> <! <- Envia el valor de la caja de los radiobutton>
    </br>html: <input type="radio" <?php echo($Rdglenguaje=="html")?"checked":""; ?> name="lenguaje" value="html" id="">
    </br>css: <input type="radio" <?php echo($Rdglenguaje=="css")?"checked":""; ?> name="lenguaje" value="css" id=""></br>
    
    </br>Estas aprendiendo...
    </br>Php: <input type="checkbox" <?php echo $chkphp; ?> name="chkphp" value="si" id="">  <! <- Envia el valor de los checkbuttom>
    </br>Html: <input type="checkbox" <?php echo $chkhtml; ?> name="chkhtml" value="si" id="">
    </br>Css: <input type="checkbox" <?php echo $chkcss; ?> name="chkcss" value="si" id=""></br>
    
    </br>¿Que anime te gusta?...
    </br><select name="LisAnime" id="">
    <option value="">[Ninguna Serie]</option>
    <option value="Bleach"<?php echo($LisAnime=="Bleach")?"selected":""; ?> >Bleach</option>
    <option value="Naruto"<?php echo($LisAnime=="Naruto")?"selected":""; ?> >Naruto</option>
    <option value="DragonBall"<?php echo($LisAnime=="DragonBall")?"selected":""; ?> >Dragon Ball</option>
    </select></br>

    </br>¿Tienes alguna duda?</br>
    <textarea name="TxtComentario" id="" cols="30" rows="10">
        <?php echo $TxtComentario; ?>
    </textarea>

    </br><input type="submit" value="Enviar Informacion">
    </form>
</body>
</html>