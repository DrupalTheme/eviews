<?php //dpm($variables); ?>
<?php
/*

drupal_add_js("jQuery(document).ready(function () 
{


var dolarOficial = jQuery('#oficial').text();
var dolarOficialAnterior = jQuery('#oficial_anterior').text();

var diffOficial = dolarOficial - dolarOficialAnterior;

if (diffOficial > 0) {
	jQuery('#dolar_oficial_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffOficial < 0) {
	jQuery('#dolar_oficial_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#dolar_oficial_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}
var dolarInformal = jQuery('#informal').text();
var dolarInformalAnterior = jQuery('#informal_anterior').text();
var diffInformal = dolarInformal - dolarInformalAnterior;
if (diffInformal > 0) {
	jQuery('#dolar_informal_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffInformal < 0) {
	jQuery('#dolar_informal_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#dolar_informal_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}

var ccl = jQuery('#ccl').text();
var cclAnterior = jQuery('#ccl_anterior').text();

var diffCcl = ccl - cclAnterior;

if (diffCcl > 0) {
	jQuery('#ccl_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffCcl < 0) {
	jQuery('#ccl_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#ccl_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}
var ipcnu = jQuery('#ipcnu').text();
var ipcnuAnterior = jQuery('#ipcnu_anterior').text();
var diffipcnu = ipcnu - ipcnuAnterior;
if (diffipcnu > 0) {
	jQuery('#ipcnu_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffipcnu < 0) {
	jQuery('#ipcnu_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#ipcnu_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}
var ipc_congreso = jQuery('#ipc_congreso').text();
var ipc_congresoAnterior = jQuery('#ipc_congreso_anterior').text();
var diffipc_congreso = ipc_congreso - ipc_congresoAnterior;
if (diffipc_congreso > 0) {
	jQuery('#ipc_congreso_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffipc_congreso < 0) {
	jQuery('#ipc_congreso_indice').removeClass('i_equal').removeClass('i_up').addClass('i_down');
} else {
	jQuery('#ipc_congreso_indice').removeClass('i_down').removeClass('i_up').addClass('i_equal');
}
var ipc_premise = jQuery('#ipc_premise').text();
var ipc_premiseAnterior = jQuery('#ipc_premise_anterior').text();
var diffipc_premise = ipc_premise - ipc_premiseAnterior;
if (diffipc_premise > 0) {
	jQuery('#ipc_premise_indice').removeClass('i_equal').removeClass('i_down').addClass('i_up');
} else if (diffipc_premise < 0) {
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
* 
* */
?>


<table class="cotizaciones" id="dolar" height="84" width="100%">
	<tbody>
		<tr class="naranja">
			<td width="50%">
				<?php print t('Exchange rate');?></td>
			<td width="25%">
				<?php echo date('d-') . t(date('M'));?></td>
			<td width="25%">
				<?php //print $view->field['field_fecha_anterior']->advanced_render($row);
				print t('y/y');
				?></td>

		</tr>
		<tr id=tr_dolar_oficial">
			<td>
				<?php print t('Official');?></td>
			<td id="oficial">
				<?php print $view->field['field_dolar_oficial']->advanced_render($row);?> </td>
			<td id="oficial_anterior">
				 <?php print $view->field['field_dolar_oficial_anterior']->advanced_render($row); ?>%</td>

		</tr>
		<tr>
			<td>
				<?php print t('Parallel');?></td>
			<td id="informal">
				<?php print $view->field['field_dolar_informal']->advanced_render($row); ?></td>
			<td id="informal_anterior">
				 <?php print $view->field['field_dolar_informal_anterior']->advanced_render($row); ?>%</td>

		</tr>
		<tr>
			<td>
				<?php print t('Blue chip');?></td>
			<td id="ccl">
				<?php print $view->field['field_contado_con_liqui']->advanced_render($row); ?></td>
			<td id="ccl_anterior">
				 <?php print $view->field['field_contado_con_liqui_anterior']->advanced_render($row); ?>%</td>
			
		</tr>
				<tr>
			<td>
				<?php print t('Real');?></td>
			<td id="real">
				<?php // print $view->field['field_btc']->advanced_render($row);
				print $view->field['field_real']->advanced_render($row);				?></td>
			<td id="real_anterior"> <?php print $view->field['field_real_anterior']->advanced_render($row); ?>%</td>
				</td>
			
		</tr>
	</tbody>
</table>


<table class="cotizaciones" id="indices"   height="84" width="100%">
	<tbody>
		<tr class="naranja">
			<td width="50%">
				<?php print t('Inflation');?></td>
			<td width="25%">
				<?php print t('m/m');?></td>
			<td width="25%">
				<?php print t('y/y');?></td>
		<tr>
			<td>
				<?php print t('CPInu');?></td>
			<td id="ipcnu">
				<?php print $view->field['field_ipcnu']->advanced_render($row); ?>%</td>
			<td id="ipcnu_anterior">
				<?php print $view->field['field_ipcnu_anterior']->advanced_render($row); ?>%</td>
			
		</tr>
		<tr>
			<td>
				<?php print t('Congress CPI');?></td>
			<td id="ipc_congreso">
				<?php print $view->field['field_ipc_congreso']->advanced_render($row); ?>%</td>
			<td id="ipc_congreso_anterior">
				 <?php print $view->field['field_ipc_congreso_anterior']->advanced_render($row); ?>%</td>
			
		</tr>
		<tr>
			<td>
				<?php print t('Premise CPI');?></td>
			<td id="ipc_premise">
				<?php print $view->field['field_ipc_premise']->advanced_render($row); ?>%</td>
			<td id="ipc_premise_anterior">
				<?php print $view->field['field_ipc_premise_anterior']->advanced_render($row); ?>%</td>

				
		</tr>
	</tbody>
</table>
<p ><span align="right" style="float:right;font-size: x-small ! important;">
<a href="http://coinmonitor.info"  target="_blank">coinmonitor.info</a> &nbsp;&nbsp;</span>
</p>
