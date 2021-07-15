<?php 
include('application\views\menu.php');?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<?php include('application\views\head_html.php');?>
		<meta http-equiv="refresh" content="180" />
	</head>

	<body>
		<section class="home-section">
			<img src="assets/img/almacen.png" style="width:100%"/>
 
 			<div class="row">
        		<div class="container">
        		<br/>
            	<div class="text">Lista de pedidos</div><hr/>
            	<button id="refresh" type="button" class="btn btn-info" style="float:right"><i class="bi bi-arrow-clockwise">Actualizar</i></button>
            
            	<br/><br/><br/>
            	<table
              		id="table"
              		data-toggle="table"
              		data-pagination="true"
              		data-filter-control="true"
              		data-filter-show-clear="true">
              		
                	<thead class="thead-dark">
                        <tr>
                        <th scope="col" data-field="id" data-sortable="true" class="align-top">ID</th>
                        <th scope="col" data-field="date" data-sortable="true" class="align-top">Fecha del pedido</th>
                        <th scope="col" data-field="nombre" data-filter-control="input" class="align-top">Nombre y apellidos</th>
                        <th scope="col" class="align-top"><?php echo utf8_encode("Dirección"); ?></th>
                        <th scope="col" data-field="pais" data-filter-control="select" class="align-top"><?php echo utf8_encode("País"); ?></th>
                        <th scope="col" class="align-top">Productos</th>
                        <th scope="col" class="align-top" data-field="state" data-filter-control="select" data-filter-default="Pago aceptado">Estado</th>
                        <th scope="col" class="align-top">Acciones</th>
                        </tr>
                	</thead>
                	<tbody>
                	<?php foreach ($data['orders'] as $order):?>
                    	<tr>
                    		<th scope="row"><?php echo $order['id_order'] ?></th>
                    		<td><?php echo $order['date_add'] ?></td>
                    		<td><?php echo $order['firstname'] . ' ' . $order['lastname'] ?></td>
                    		<td><?php echo $order['address1'] . '<br/>' . $order['address2'] ?></td>
                     		<td><?php echo $order['country'] ?></td>
                   			<td><?php echo $order['products'] ?></td>                            
                     		<td><?php echo $order['name'] ?></td>
                      		<td style="text-align: center;" colspan="2">
                        		<button id="info_modal" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#orderModal" onclick="mostrarInfo(<?php echo $order['id_order']?>)"><i class="bi bi-eye"></i></button>
    							<button id="order_state" type="button" class="btn btn-info" data-toggle="modal" data-target="#stateModal" onclick="mostrarEstado(<?php echo $order['id_order']?>)"><i class="bi bi-stoplights"></i></button>
    						</td>
                    	</tr>
                   	<?php endforeach;?>
                	</tbody>
            	</table>
        		</div>
			</div>
	</section>

<script type="text/javascript" src="assets/js/script.js"></script>
<?php include('application\views\footer.php');?>

<!-- Modal información pedido -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orderModalLabel"><?php echo utf8_encode("Información del pedido");?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" onclick="cerrarModalOrder()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<b>ID: </b><label id="id_order" class="col-form-label"></label><br/>
      	<b>Fecha del pedido: </b><label id="date_add" class="col-form-label"></label><br/>
      	<b>Nombre y apellidos: </b><label id="clientname" class="col-form-label"></label><br/>
      	<b><?php echo utf8_encode("Dirección:")?> </b><label id="address" class="col-form-label"></label><br/>
      	<b><?php echo utf8_encode("País:")?> </b><label id="country" class="col-form-label"></label><br/>
      	<b>Productos: </b><label id="products" class="col-form-label"></label><br/>
      	<b>Estado: </b><label id="state" class="col-form-label"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarModalOrder()">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal estado pedido-->
<div class="modal fade" id="stateModal" tabindex="-1" role="dialog" aria-labelledby="stateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stateModalLabel">Modificar estado del pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" onclick="cerrarModalState()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="" method="POST" enctype="multipart/form-data"  method="POST" id="ModalForm">
       <div class="form-group">
      	<b>ID: </b><label id="id_order2" class="col-form-label"></label><br/>
      	<input type="hidden" id="id_order2" class="ident2" class="form-control"></input>
       </div>
      	<b>Estado:</b><mark><label id="state2" class="col-form-label"></label></mark>
      	<hr/>
      	<h5>Quiere notificar un nuevo estado del pedido?</h5><br/>
      	<b>Nuevo estado: </b>
			<div class="form-group">
              	<select id="estado1" class="form-control" aria-label="Estado">
                  <option selected>-</option>
                  <option value="1">Pago pendiente</option>
                  <option value="2">Pago aceptado</option>
                  <option value="3"><?php echo utf8_encode("Preparación en proceso");?></option>
                  <option value="4">Enviado</option>
                  <option value="5">Entregado</option>
                  <option value="6">Cancelado</option>
                  <option value="7">Reembolso</option>
                  <option value="8">Error en el pago</option>
                </select>
     		</div>
     	</form>
      <div class="modal-footer">
        <button type="button" id='btnChangeState' class="btn btn-primary" data-dismiss="modal" onclick="changeState(id_order2)">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarModalState()">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal confirmación cambio estado pedido -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel"><?php echo utf8_encode("Modificación hecha correctamente");?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Se ha cambiado el estado del pedido correctamente.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
    

</body>
</html>