<div>
	<div class="row nomargin">
		<div class="col-md-9 col-ms-12 col-xs-12" align="left" style="padding: 8px">
<?php echo ' '.$this->funciones->fecha().' '.date('H:i:s');?>
		<strong style="color: #000">(<?php echo ' '.$this->session->userdata('usuario');?>.)</strong>
	<a href=<?php echo base_url().'sistema';?> style="padding: 0px 10px"><span class="glyphicon glyphicon-home" style="color: #7D6F2E"></span></a>
	<a href=<?php echo base_url().'sistema/salir';?>><span class="glyphicon glyphicon-off" style="color: #7D6F2E"></span></a>
			</div>





