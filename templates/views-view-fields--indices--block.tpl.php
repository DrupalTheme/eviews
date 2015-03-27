<?php //dpm($variables); ?>

<table class="cotizaciones" height="84" width="100%">
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
		<tr>
			<td>
				Oficial</td>
			<td>
				<?php print $view->field['field_dolar_oficial']->advanced_render($row);?> </td>
			<td>
				| <?php print $view->field['field_dolar_oficial_anterior']->advanced_render($row); ?></td>
			<td class="indice i_equal">
				--</td>
		</tr>
		<tr>
			<td>
				Informal</td>
			<td>
				<?php print $view->field['field_dolar_informal']->advanced_render($row); ?></td>
			<td>
				| <?php print $view->field['field_dolar_informal_anterior']->advanced_render($row); ?></td>
			<td class="indice i_down">
				--</td>
		</tr>
		<tr>
			<td>
				Contado con liqui</td>
			<td>
				<?php print $view->field['field_contado_con_liqui']->advanced_render($row); ?></td>
			<td>
				| <?php print $view->field['field_contado_con_liqui_anterior']->advanced_render($row); ?></td>
			<td class="indice i_down">
				--</td>
		</tr>
	</tbody>
</table>
<table class="cotizaciones" height="84" width="100%">
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
			<td>
				<?php print $view->field['field_ipcnu']->advanced_render($row); ?></td>
			<td>
				|<?php print $view->field['field_ipcnu_anterior']->advanced_render($row); ?></td>
			<td class="indice i_down">
				--</td>
		</tr>
		<tr>
			<td>
				IPC Congreso</td>
			<td>
				<?php print $view->field['field_ipc_congreso']->advanced_render($row); ?></td>
			<td>
				| <?php print $view->field['field_ipc_congreso_anterior']->advanced_render($row); ?></td>
			<td class="indice i_up">
				--</td>
		</tr>
		<tr>
			<td>
				IPC Premise</td>
			<td>
				<?php print $view->field['field_ipc_premise']->advanced_render($row); ?></td>
			<td>
				|<?php print $view->field['field_ipc_premise_anterior']->advanced_render($row); ?>
			<td class="indice i_down">
				--</td>
		</tr>
	</tbody>
</table>
