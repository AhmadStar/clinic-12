<?php
$arr = getLocalization();
$lang = $arr['lang'];
$demoDir = $arr['demoDir'];
$langClass = $arr['langClass'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="nced">
	<meta name="description" content="nced,Kuwait">
	<title><?php trP('ListOfValues');?></title>
	<link href="/assets/css/admin/admin.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/admin/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/admin/bootstrap-responsive.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/themes/default/easyui.css">
	<?php
    	if($lang=='1')
    		echo '<link rel="stylesheet" type="text/css" href="assets/easyui-rtl.css">';
	?>
	<link rel="stylesheet" type="text/css" href="assets/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="assets/demo.css">
	<script type="text/javascript" src="assets/jquery.min.js"></script>
	<script type="text/javascript" src="assets/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="assets/jquery.edatagrid.js"></script>
	<!--script type="text/javascript" src="assets/easyui-rtl.js"></script-->
	<script type="text/javascript">
		$(function(){
			$('#dg').edatagrid({
				url: 'handler?s=15&m=1',
				saveUrl: 'handler?s=15&m=2',
				updateUrl: 'handler?s=15&m=3',
				destroyUrl: 'handler?s=15&m=4'
			});
		});
		function loadListVal(val){
			$('#dg').datagrid('load',{
				listKey: val
			});
		}
		function addListRow(){
			var val=$('#listKey').val();
			if(val==''){
				$.messager.alert('<?php trP("InfoMessage");?>','<?php trP("SelectListKey");?>');
				return false;
			}
			$('#dg').edatagrid('addRow',{
				row:{listKey:val}
			});
		}
		function doprint(){
			window.open('print.php?m=15&s=8','_blank');
		}var tableID = 8;
	</script>
<link rel="stylesheet" type="text/css" href="assets/css/main.css" media="" />
</head>
<body  dir="rtl" lang="ar" class="AR">
<div class="container">
	<div class="navbar">
	  <div class="navbar-inner">	      
           <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
          
          <div class="nav-collapse collapse">
            <ul class="nav">
                
                <li>            
                   <a href="/admin/logout">خروج</a>                                  
                </li>
				<li <?php if($this->uri->segment(2) == 'lov'){echo 'class="active"';}?>>
                  <a href="/lov">التعريفات</a>
                </li>
				<li <?php if($this->uri->segment(2) == 'dictionary'){echo 'class="active"';}?>>
                  <a href="/dictionary">القاموس</a>
                </li>
                <li <?php if($this->uri->segment(2) == 'sections'){echo 'class="active"';}?>>
                  <a href="/admin/sections">الاقسام</a>
                </li>
                <li <?php if($this->uri->segment(2) == 'screens'){echo 'class="active"';}?>>
                  <a href="/admin/screens">الشــاشـــات</a>
                </li>
                <li <?php if($this->uri->segment(2) == 'users'){echo 'class="active"';}?>>
                  <a href="/admin/users">المســـتخدمين</a>
                </li>                                
	        </ul>
        </div>
	    </div>
	  </div>
</div>	
	<div style="margin-bottom:10px;margin-right: 14%;margin-left: 14%">
		<label><?php trP('SelectListKey');?></label>
        <select name="listKey" id="listKey" style="  min-width: 100px;" onchange="loadListVal(this.value)">
        	<option value=''></option>
            <?php echo getLOVKeys();?>
        </select>  
    </div>  
	<table id="dg" title="<?php trP('LOV');?>" style="width:80%;height:450px"
			toolbar="#toolbar" pagination="true" idField="id"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="listKey" width="100" editor="{type:'validatebox',options:{required:false}}"><?php trP('listKey');?></th>
				<th field="key" width="100" editor="{type:'validatebox',options:{required:true}}"><?php trP('key');?></th>
				<th field="label" width="255" editor="{type:'validatebox'}" ><?php trP('label');?></th>
				<th field="description" width="255" editor="{type:'validatebox'}" ><?php trP('description');?></th>
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:addListRow()"><?php trP('new');?></a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')"><?php trP('delete');?></a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')"><?php trP('save');?></a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')"><?php trP('cancel');?></a>s
	</div>
	<div id="win1" style='display:none;'><iframe name='opFrame' id='opFrame' width='98%' height='98%' scrolling="no" border='0' style='overflow:hidden'></div>
</body>
</html>