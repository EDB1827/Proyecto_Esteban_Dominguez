<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <form action="../controller/validar_tarea.php" method="post">
    <label>NIF o CIF</label> <input type="text" id="nif" name="nif"><br>
    <label>Nombre</label> <input type="text"  name="nom"><br><label> Apellidos</label> <input type="text" id="apl" name="apl"><br>
    <label>Teléfono de contacto</label> <input type="text"  name="tel"><br>
    <label>Descripción</label><br> <textarea  name="desc"></textarea><br>
    <label>Correo electrónico</label> <input type="text" name="email"><br>
    <label>Dirección</label> <input type="text" id="dir" name="dir"><br>
    <label>Población</label> <input type="text" id="pob" name="pob"><br>
    <label>Código postal</label> <input type="text" id="cp" name="cp"><br>
    <?= crearSelect('prov', PROV::listaSelect(), filter_input(INPUT_POST, 'prov')) ?><br><br>
    <select>
        <option value="b" selected>Estado</option>
        <option value="b">Esperando ser aprobada</option>
        <option value="p">Pendiente</option>
        <option value="r">Realizada</option>
        <option value="c">Cancelada</option>
    </select><br>
    <label>Fecha de creación</label> <input type="date" id="fech1" name="fech1"><br>
    <?= crearSelect('usuario', USER::listaSelect(), filter_input(INPUT_POST, 'usuario')) ?><br>
    <date>Fecha de realización</date> <input type="date" id="fech2" name="fech2"><br>
    <label>Anotaciones Anteriores</label><br><textarea id="aa" name="aa">Anotaciones Anteriores</textarea><br>
    <label>Anotaciones Anteriores</label><br><textarea id="ap" name="ap">Anotaciones Posteriores</textarea><br>
    <label>Fichero</label> <input type="file" id="fich" name="fich"><br>
    <label>Fotos del trabajo</label> <input type="text" id="foto" name="foto"><br>

    <button type="submit">Enviar</button>



    </form>

</body>
</html>