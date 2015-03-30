<?php //dpm($variables); ?>
<?php


drupal_add_js("jQuery(document).ready(function () 
{ 


// Lectura Dolar Oficial
var dolarOficial = jQuery('#oficial').text();
var dolarOficialAnterior = jQuery('#oficial_anterior').text();

var diffOficial = dolarOficial - dolarOficialAnterior;
//alert('diff oficial:' + diffOficial);

// Comparacion y seteo variacion dolar oficial
if (diffOficial > 0) {
//	alert('oficial:' + dolarOficial + 'oficial anterior:' + dolarOficialAnterior + 'Diferencia:' );
	jQuery('#dolar_oficial_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffOficial < 0) {
//	alert('oficial:' + dolarOficial + 'oficial anterior:' + dolarOficialAnterior + 'Diferencia:' );
	jQuery('#dolar_oficial_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
//	alert(diffOficial);
	jQuery('#dolar_oficial_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}

// Lectura dolar informal
var dolarInformal = jQuery('#informal').text();
var dolarInformalAnterior = jQuery('#informal_anterior').text();

// alert('dolarinformal: ' + dolarInformal );
// alert('dolarInformalAnterior: ' + dolarInformalAnterior);

// comparacion variacion dolar informal
var diffInformal = dolarInformal - dolarInformalAnterior;

// seteo clase indice de acuerdo a la variacion dolar informal
// alert(diffInformal);
if (diffInformal > 0) {
//	alert(dolarInformal + 'mayor:' + dolarInformlAnterior );
	jQuery('#dolar_informal_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffInformal < 0) {
//	alert('menor');
	jQuery('#dolar_informal_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
//	alert('igual');
	jQuery('#dolar_informal_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}


// Lectura ccl
var ccl = jQuery('#ccl').text();
var cclAnterior = jQuery('#ccl_anterior').text();

// comparacion variacion ccl
var diffCcl = ccl - cclAnterior;

// seteo clase indice de acuerdo a variacion ccl
if (diffCcl > 0) {
// 	alert(ccl + 'mayor:' + cclAnterior );
	jQuery('#ccl_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffCcl < 0) {
//	alert('menor' );
	jQuery('#ccl_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#ccl_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}


// lectura de ipcnu
var ipcnu = jQuery('#ipcnu').text();
var ipcnuAnterior = jQuery('#ipcnu_anterior').text();

// comparacion variacion ipcnu
var diffipcnu = ipcnu - ipcnuAnterior;

// seteo clase indice de acuerdo a la variacion ipcnu
if (diffipcnu > 0) {
// 	alert(ipcnu + 'mayor:' + ipcnuAnterior );
	jQuery('#ipcnu_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffipcnu < 0) {
//	alert('menor' );
	jQuery('#ipcnu_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#ipcnu_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}

// lectura ipc congreso
var ipc_congreso = jQuery('#ipc_congreso').text();
var ipc_congresoAnterior = jQuery('#ipc_congreso_anterior').text();

//comparacion variacion ipc congreso
var diffipc_congreso = ipc_congreso - ipc_congresoAnterior;

// seteo clase indicie de acuerdo a la variacion ipc congreso
if (diffipc_congreso > 0) {
// 	alert(ipc_congreso + 'mayor:' + ipc_congresoAnterior );
	jQuery('#ipc_congreso_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffipc_congreso < 0) {
//	alert('menor' );
	jQuery('#ipc_congreso_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#ipc_congreso_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}


// lectura ipc premise
var ipc_premise = jQuery('#ipc_premise').text();
var ipc_premiseAnterior = jQuery('#ipc_premise_anterior').text();

// comparacion variacion ipc premise
var diffipc_premise = ipc_premise - ipc_premiseAnterior;

// seteo clase indice de acuerdo a la variacion del ipc premise
if (diffipc_premise > 0) {
// 	alert(ipc_premise + 'mayor:' + ipc_premiseAnterior );
	jQuery('#ipc_premise_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffipc_premise < 0) {
//	alert('menor' );
	jQuery('#ipc_premise_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#ipc_premise_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}



});", array(
  'type' => 'inline',
  'scope' => 'footer',
  'group' => JS_THEME,
  'weight' => 5,
));
?>

<table class="cotizaciones" id="dolar" height="84" width="100%">
	<tbody>
		<tr class="naranja">
			<td width="50%">
				Dolar</td>
			<td width="20%">
				<?php echo date('d-M');?></td>
			<td width="20%">
				a/a</td>
			<td width="10%">
				&nbsp;</td>
		</tr>
		<tr id=tr_dolar_oficial">
			<td>
				Oficial</td>
			<td id="oficial">
				<?php print $view->field['field_dolar_oficial']->advanced_render($row);?> </td>
			<td id="oficial_anterior">
				 <?php print $view->field['field_dolar_oficial_anterior']->advanced_render($row); ?></td>
			<td  id="dolar_oficial_indice" class="indice ">
				--</td>
		</tr>
		<tr>
			<td>
				Informal</td>
			<td id="informal">
				<?php print $view->field['field_dolar_informal']->advanced_render($row); ?></td>
			<td id="informal_anterior">
				 <?php print $view->field['field_dolar_informal_anterior']->advanced_render($row); ?></td>
			<td id="dolar_informal_indice" class="indice i_equal">
				--</td>
		</tr>
		<tr>
			<td>
				Contado con liqui</td>
			<td id="ccl">
				<?php print $view->field['field_contado_con_liqui']->advanced_render($row); ?></td>
			<td id="ccl_anterior">
				 <?php print $view->field['field_contado_con_liqui_anterior']->advanced_render($row); ?></td>
			<td id="ccl_indice" class="indice i_down">
				--</td>
		</tr>
	</tbody>
</table>
<table class="cotizaciones" id="indices"   height="84" width="100%">
	<tbody>
		<tr class="naranja">
			<td width="50%">
				Inflación&nbsp;&nbsp;</td>
			<td width="20%">
				m/m</td>
			<td width="20%">
				a/a</td>
			<td width="10%">
				&nbsp;</td>
		</tr>
		<tr>
			<td>
				IPCnu</td>
			<td id="ipcnu">
				<?php print $view->field['field_ipcnu']->advanced_render($row); ?></td>
			<td id="ipcnu_anterior">
				<?php print $view->field['field_ipcnu_anterior']->advanced_render($row); ?></td>
			<td id="ipcnu_indice" class="indice i_equal">
				--</td>
		</tr>
		<tr>
			<td>
				IPC Congreso</td>
			<td id="ipc_congreso">
				<?php print $view->field['field_ipc_congreso']->advanced_render($row); ?></td>
			<td id="ipc_congreso_anterior">
				 <?php print $view->field['field_ipc_congreso_anterior']->advanced_render($row); ?></td>
			<td id="ipc_congreso_indice" class="indice i_up">
				--</td>
		</tr>
		<tr>
			<td>
				IPC Premise</td>
			<td id="ipc_premise">
				<?php print $view->field['field_ipc_premise']->advanced_render($row); ?></td>
			<td id="ipc_premise_anterior">
				<?php print $view->field['field_ipc_premise_anterior']->advanced_render($row); ?>
			<td id="ipc_premise_indice"  class="indice i_down">
				--</td>
		</tr>
	</tbody>
</table>
