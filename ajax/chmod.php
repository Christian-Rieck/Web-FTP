<?php
require_once("../includes/config.php");
$oldchmod = substr($_GET['chmod'], 1);
?>
<script type="text/javascript"> 
function Oct(r,w,x) 
{
	i=0;
	if (r) { i+=4 };
	if (w) { i+=2 };
	if (x) { i+=1 };
	return i;
}

</script> 

<form name="chmodform_<?php echo $_GET['num']; ?>" action='javascript:ajaxfade("ajax/showdirectory.php?chmod="+document.chmodform_<?php echo $_GET['num']; ?>.newchmod.value+"&tochmod=<?php echo $_GET['tochmod']; ?>&dir=<?php echo $_GET['dir']; ?>", "#slider", "<?php echo $_GET['num']; ?>")'>
	<div style="text-align: center; padding: 15px 20px">
		<table align="center" cellspacing="4"> 
			<tr> 
				<td align="left" width="33%">
					<b><?php echo LANG_CHMOD_OWNER; ?></b>
				</td> 
				<td align="left" width="33%">
					<b><?php echo LANG_CHMOD_GROUP; ?></b>
				</td> 
				<td align="left" width="33%">
					<b><?php echo LANG_CHMOD_ALL; ?></b>
				</td> 
			</tr> 
	
			<tr> 
				<td align="left">
					<input type="checkbox" name="or" id="or_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" /> 
					<label for="or_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_READ; ?></label>
				</td> 
				<td align="left">
					<input type="checkbox" name="gr" id="gr_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" />
					<label for="gr_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_READ; ?></label>
				</td>
				<td align="left">
					<input type="checkbox" name="ar" id="ar_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" />
					<label for="ar_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_READ; ?></label>
				</td> 
			</tr> 
			
			<tr> 
				<td align="left">
					<input type="checkbox" name="ow" id="ow_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" /> 
					<label for="ow_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_WRITE; ?></label>
				</td> 
				<td align="left">
					<input type="checkbox" name="gw" id="gw_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" />
					<label for="gw_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_WRITE; ?></label>
				</td>
				<td align="left">
					<input type="checkbox" name="aw" id="aw_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" />
					<label for="aw_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_WRITE; ?></label>
				</td> 
			</tr> 
			
			<tr> 
				<td align="left">
					<input type="checkbox" name="ox" id="ox_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" /> 
					<label for="ox_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_EXECUTE; ?></label>
				</td> 
				<td align="left">
					<input type="checkbox" name="gx" id="gx_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" />
					<label for="gx_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_EXECUTE; ?></label>
				</td>
				<td align="left">
					<input type="checkbox" name="ax" id="ax_<?php echo $_GET['num']; ?>" onclick="Rechte(<?php echo $_GET['num']; ?>)" />
					<label for="ax_<?php echo $_GET['num']; ?>"><?php echo LANG_CHMOD_EXECUTE; ?></label>
				</td> 
			</tr> 
		</table>

		<center>
			<input 
				type="text" 
				name="newchmod" 
				value="<?php echo $oldchmod; ?>" 
				onkeyup="chmodcheckbox(<?php echo $_GET['num']; ?>)" 
				size="2" />
			<input 
				type="button" 
				value="<?php echo LANG_CHMOD_BUTTON_CHMOD; ?>"
				onclick='ajaxfade("ajax/showdirectory.php?chmod="+document.chmodform_<?php echo $_GET['num']; ?>.newchmod.value+"&tochmod=<?php echo $_GET['tochmod']; ?>&dir=<?php echo $_GET['dir']; ?>", "#slider", "<?php echo $_GET['num']; ?>")' />
		</center>
	</div>
</form>

<script>
$(document).ready(function() {
	chmodcheckbox(<?php echo $_GET['num']; ?>);
});
</script>