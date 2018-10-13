<?php
$arr = getLocalization();
$lang = $arr['lang'];
$demoDir = $arr['demoDir'];
$langClass = $arr['langClass'];

$csrf = array(
    'name' => $this->security->get_csrf_token_name(),
    'hash' => $this->security->get_csrf_hash()
    );

$keysList = getKeysList();

if(isset($_POST['mode'])){
	
	for($i=0;$i<count($keysList);$i++){
		$dictArray[$keysList[$i]]=array($keysList[$i],$_POST[$keysList[$i]],$_POST['en'.$keysList[$i]]);
	}
	$string_data = serialize($dictArray);
	file_put_contents("dictionary.txt", $string_data);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<form name='dictform' method='POST' style='text-align:center;'>
     <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

	<table id="dg" style="margin-right:200px;">
			<tr>
				<th >المفتاح</th>
				<th >الوصف القديم</th>
				<th >الوصف العربي</th>
				<th >الوصف الانكليزي</th>
			</tr>
			<?php
				$string_data = file_get_contents("dictionary.txt");
				$dictArray2 = unserialize($string_data);
				
				for($i=0;$i<count($keysList);$i++){
					$row = $dictArray2[$keysList[$i]];
					echo "<tr>";
					echo "<td>".$keysList[$i]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td><input type='text' name='".$keysList[$i]."' value='".$row[1]."' ></td>";
					echo "<td><input type='text' name='en".$keysList[$i]."' value='".$row[2]."' ></td>";
					echo "</tr>";
				}
			?>
				<tr><td colspan='3'><input type='submit' value='Save'></td></tr>
			</thead>
	</table>
	<input type='hidden' name='mode' value='<?php trP('save');?>'>
</from>
