<div class="form-group">
		<label>Tipo justificacion</label>
		<select class="form-control" name="j_justificaciontype">
		<?php
			foreach ($db->query('SELECT * from justificacion where state_just=1') as $row)
			{
				echo '<option value="' . $row['justificaciontype'] . '">' . $row['justificaciontype'] . '</option>';;
			}
		?>
		</select>

</div>