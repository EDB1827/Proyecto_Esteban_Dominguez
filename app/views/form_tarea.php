<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../Assets/css/estilo.css" rel="stylesheet">
    <title>Document</title>
    
</head>
<body>
    <form action="../controller/validar_tarea.php" method="post" class="row g-3 needs validation">
    <div class="col-md-3">
    <label class="form-label">NIF o CIF</label> <input class="form-control"  id="nif_cif" name="nif_cif" value="<?= valorRecibido('nif_cif') ?>">
    <span><?=verError('nif_cif')?></span>
    </div>
    
    <div class="col-md-3">
    <label class="form-label">Nombre</label> <input class="form-control" type="text"  name="nombre"  id="nombre" value="<?= valorRecibido('nombre') ?>">
    <span><?=verError('nombre')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label"> Apellidos</label> <input class="form-control" value="<?= valorRecibido('apellidos') ?>" type="text" id="apellidos" name="apellidos">
    <span><?=verError('apellidos')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Teléfono de contacto</label> <input class="form-control" type="text"  id="telefono" name="telefono" value="<?= valorRecibido('telefono') ?>">
    <span><?=verError('telefono')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Descripción</label><br>
    <textarea style="height: 100px"  name="descripcion" id="descripcion" value="<?= valorRecibido('descripcion') ?>"></textarea>
    <span><?=verError('descripcion')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Correo electrónico</label> <input class="form-control" type="text" id="correo" name="correo" value="<?= valorRecibido('correo') ?>">
    <span><?=verError('correo')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Dirección</label> <input class="form-control" type="text" id="direccion" name="direccion" value="<?= valorRecibido('direccion') ?>">
    <span><?=verError('direccion')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Población</label> <input class="form-control" type="text" id="nombre" name="poblacion">
    </span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Código postal</label> <input class="form-control" type="text" id="codigo_postal" name="codigo_postal" value="<?= valorRecibido('codigo_postal') ?>">
    <span><?=verError('codigo_postal')?>
    </span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Provincias</label><br>
    <?= crearSelect('provincias', PROV::listaSelect(), filter_input(INPUT_POST, 'provincias')) ?>
    </div>

    <div class="col-md-3">
    <label class="form-label">Estado</label><br>
    <select name="estado">
        <option value="b">Esperando ser aprobada</option>
        <option value="p">Pendiente</option>
        <option value="r">Realizada</option>
        <option value="c">Cancelada</option>
    </select>
    </div>
    

    <div class="col-md-3">
    <label class="form-label">Fecha de creación</label> <input class="form-control" readonly type="date" id="fecha_creacion" name="fecha_creacion" value="<?=$fecha?>">
    </div>

    <div class="col-md-3">
    <label class="form-label">Operarios</label><br>
    <?= crearSelect('operario_encargado', USER::listaSelect(), filter_input(INPUT_POST, 'operario_encargado')) ?>
    </div>
    <div class="col-md-3">
    <date>Fecha de realización</date> <input class="form-control" type="date" id="fecha_realizacion" name="fecha_realizacion" value="<?= valorRecibido('fecha_realizacion') ?>">
    </div>

    <div class="col-md-3">
    <label class="form-label">Anotaciones Anteriores</label><br>
    <textarea style="height: 100px" id="anotaciones_ant" name="anotaciones_ant" value="<?= valorRecibido('anotaciones_ant') ?>">Anotaciones Anteriores</textarea>
    <span><?=verError('anotaciones_ant')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Anotaciones Posteriores</label><br>
    <textarea style="height: 100px" id="anotaciones_pos" name="anotaciones_pos" value="<?= valorRecibido('anotaciones_pos') ?>">Anotaciones Posteriores</textarea>
    <span><?=verError('anotaciones_pos')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Fichero</label> <input class="form-control" type="file"value="<?= valorRecibido('fichero') ?>">
    <span><?=verError('fichero')?></span>
    </div>

    <div class="col-md-3">
    <label class="form-label">Fotos del trabajo</label> <input class="form-control" type="text"value="<?= valorRecibido('foto') ?>">
    </div>

    <button type="submit" class="btn btn-primary mb-3">Enviar</button>



    </form>

</body>
</html>