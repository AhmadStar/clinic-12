<?php
$m = isset($_GET['m'])?$_GET['m']:'';
$s = isset($_GET['s'])?$_GET['s']:'';
$p = isset($_GET['p'])?$_GET['p']:'';
$word = isset($_REQUEST['word'])?$_REQUEST['word']:'';
$rows = isset($_REQUEST['rows'])?$_REQUEST['rows']:'10';
$page = isset($_REQUEST['page'])?$_REQUEST['page']:'1';
$id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
$app = isset($_REQUEST['app'])?$_REQUEST['app']:'';

$where ='';
if($id)
	$where = ' WHERE id = ' .$id;

$offset = $rows * ($page -1);
$page= '';
if($p=='1')
	$page .=' LIMIT '.$rows.' OFFSET '.$offset;

//---------------------
//---  LOV : s = 15
//---------------------
if($s=='15'){

if($m=='1'){
	$sql = 'select * from lov ';
	if(isset($_REQUEST['listKey']) && $_REQUEST['listKey']!=''){
		$sql.=" Where listkey ='".$_REQUEST['listKey']."'";
	}
	$rs = mysql_query($sql);
	$result = array();
	while($row = mysql_fetch_object($rs)){
		array_push($result, $row);
	}
	echo json_encodePrint($result);
}
elseif($m=='2'){
	$listKey = $_REQUEST['listKey'];
	$key = $_REQUEST['key'];
	$label = $_REQUEST['label'];
	$description = $_REQUEST['description'];

	$sql = "insert into lov(listKey,`key`,`label`,description) values('$listKey','$key','$label','$description')";

	$result = mysql_query($sql);
	echo json_encodePrint(array(
		'id' => mysql_insert_id(),
		'listKey' => $listKey,
		'key' => $key,
		'label' => $label,
		'description' => $description
	));
}
elseif($m=='3'){
	$id = intval($_REQUEST['id']);
	$listKey = $_REQUEST['listKey'];
	$key = $_REQUEST['key'];
	$label = $_REQUEST['label'];
	$description = $_REQUEST['description'];

	$sql = "update lov set listKey = '$listKey' ,`key` = '$key',`label` = '$label' , description = '$description' where id = $id";

	$result = mysql_query($sql);
	echo json_encodePrint(array(
		'id' => mysql_insert_id(),
		'listKey' => $listKey,
		'key' => $key,
		'label' => $label,
		'description' => $description
	));
}
elseif($m=='4'){
	$id = intval($_REQUEST['id']);

	$sql = "delete from lov where id=$id";
	$result = mysql_query($sql);
	echo json_encodePrint(array('success'=>true));
}
}
///------------------
//---- End LOV
//---------------

function getPerm(){
	$perm='';
	if($_REQUEST['new']=='1')
		$perm .='1';
	else 
		$perm .='0';
	
	
	if($_REQUEST['edit']=='1')
		$perm .='1';
	else 
		$perm .='0';
	
	if($_REQUEST['delete']=='1')
		$perm .='1';
	else 
		$perm .='0';
	
	if($_REQUEST['read']=='1')
		$perm .='1';
	else 
		$perm .='0';
	
	if($_REQUEST['admin']=='1')
		$perm .='1';
	else 
		$perm .='0';
	
	return $perm;
}
function getItemById($table,$keyName,$itemId){
	$sql="select $table.* from $table where $keyName='$itemId'";
	$rs = mysql_query($sql);
	echo mysql_error();
	$row = mysql_fetch_object($rs);
	return $row->id;
}
function printResult($query,$id=0,$options=array()){
	global $m,$app;
	if($app=='1' && $m=='2'){
		if($id==0 || $id===false)
			echo json_encodePrint(array('code'=>'-11',"message"=>"Error Adding"));
		else
			echo json_encodePrint(array('code'=>'0',"message"=>"Add Successfully"));
		return;
	}
	$rs = mysql_query($query);
	$row = mysql_fetch_object($rs);
	if(@$options['message'])
		$row->msg =$options['message'];
	if(@$options['code'])
		$row->errorCode=$options['code'];
	
	if(@$options->msg)
		$row->errorMsg =$msg;
	if(@$options->errorcode)
		$row->errorCode=$errorcode;
	if(@$options->dbgmsg)
		$row->dbgMsg=$dbgmsg;
	echo json_encodePrint($row);
}
function json_encodePrint($arr){
	// IF not Print operation
	if(!isset($_REQUEST['print'])){
		//return stripslashes(json_encode($arr));
		return json_encode($arr);
	}
	//$arr = stripslashes_deep($arr);
	global $printData;
	$printData= $arr;
	return "";
}
function stripslashes_deep($value)
{
    $value = is_array($value) ?
                array_map('stripslashes_deep', $value) :
                stripslashes($value);

    return $value;
}
?>