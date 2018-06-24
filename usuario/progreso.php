
<?php 
$id=$_SESSION['id'];

 ?>
<script type="text/javascript" src="../js/graficoPeticion.js"></script>
<div class="container-fluid" id="cuerpo">
    <div class="row">
       <input type="hidden" name="id" id="dniPro" value="<?php echo $id; ?>" >
	   <canvas id="grafico"></canvas>
	   
	</div>
</form>
       
<div  class='d-flex justify-content-center m-3'><span id="errorP" class='btn btn-outline-danger text-center'><span></div>
</div>   