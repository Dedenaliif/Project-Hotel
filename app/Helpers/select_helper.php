<?php

function cmb_select2($name,$table,$field,$pk,$selected,$required)
{
	$ci = get_instance();
	$cmb = "<select id=\"".$name."\" name=\"".$name."\" class=\"select2_single form-control\" $required>";
	$cmb .= "\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option></option>";
	$ci->db->order_by($field,'ASC');
	$data = $ci->db->get($table)->result();
	foreach ($data as $d)
	{
		$cmb .="\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value='".$d->$pk."'";
		$cmb .= $selected==$d->$pk?" selected='selected'":'';
		$cmb .=">".$d->$field."</option>";
	}
	$cmb .="\n\t\t\t\t\t\t\t\t\t\t\t\t\t</select>\n";
	return $cmb;  
}
