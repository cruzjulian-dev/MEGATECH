<section>
<div class="container-fluid bg-light"> <!-- contenedor del fondo de pantalla gris -->
    <div class="container p-3 w-75"> <!-- contenedor del titulo y espaciado -->
        <h3 class="text-center">Consultas</h3>
        <hr>
    
    <div class="container text-center bg-white rounded p-3"> <!-- contenedor de fondo blanco -->
    <div>
        <?php if (session()->getFlashdata('Mensaje')) { ?>
            <div class='alert alert-success alert-dismissible fade show text-center mx-4 mt-4 pt-3 pb-3' role='alert' id='mensaje'>
                <?= session()->getFlashdata('Mensaje'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <table id="mytable" class="table table-bordred table-striped table-hover">
            <thead>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Asunto</th>
                <th>Consulta</th>
                <th>Estado</th>
                <th>Operacion</th>
            </thead>

            <tbody class="table-group-divider">
                <?php foreach($consulta as $row) { ?>
                <tr>
                    <td class="border-end "><?php echo $row['nombre']; ?></p></td>
                    <td class="border-end"><?php echo $row['mail']; ?></p></td>
                    <td class="border-end"><?php echo $row['asunto']; ?></p></td>
                    <td class="border-end"><?php echo $row['consulta']; ?></td>
                    <?php 
                        if($row['consulta_leido'] == 1) {?>
                            <td class="border-end mx-3"> Visto</td>

                        <?php } else { ?>
                            <td class="border-end mx-3">No visto</td>
                    <?php }?>
                    <?php 
                        if($row['consulta_leido'] == 1) {?>
                            <td><a class="btn btn-danger mx-3 p-0" href="<?php echo base_url('marcar_novisto/'.$row['id_consulta']);?>">Marcar no visto </a></td>

                        <?php } else { ?>
                            <td><a class="btn btn-success mx-3 p-0" href="<?php echo base_url('marcar_visto/'.$row['id_consulta']);?>">Marcar visto</a></td>
                    <?php }?>
                </tr>
                <?php } // fin foreach?>
            </tbody>
        </table>
    </div>
    </div>
</div>
</section>
