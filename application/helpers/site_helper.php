<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('tr'))
{
	
	function getKeysList(){
		$keysList = array('SectionType','SectionName','AddNew','UserType','UserStatus','PatientName','Status','BookingWay','OrderNumber','BookingTime',
                  'Sections','Bind_user_to_section','UserName','Name','Title','Image','SaveChanges','cancel','BindSectionToScreen',
                 'AddAdvertise','Section','Screen','AdvertiseName','AdvertiseText','AdvertisePause','Users','ViewAndEdit','Advertises',
                 'OldPassword','NewPassword','AddScreen','GoodWork','CompletedSucsesfully','AddNewUser','Eoror',
                 'NotCompletedSucsesfully','AddUserToSection','UserSections','AddNewSection','UpdateScreen','UpdateUserInfo'
                         ,'ProfileInfo','Password','SectionStatus','appointments','Screens','AppointmentStatus'
                         ,'AddNewAppointment','OrderNumber','BookingDate','BookingWay','BookingState','BookingTime',
                         'UpdateAppointment','LoginErorr','ClinicId','MainScreen','users','add','screens','add_advertise',
                         'bind_section_to_screen','add_user_to_section','update','screen_sections','screen_advertises',
                         'sections','section_users','doctor','profile','secretary','clinicname','users','RegisterUser','groups','CreateGroup','Patients','WaitingList','RegisterPatient','Drugs','RegisterNewDrug','AddDrugs','ReturnDrugs','Laboratory','RegisterNewTest','X-rays','RegisterNewX-ray','Consume','Incomes','IncomeList','Docotors','NewIncomes','NewDoctor','DoctorsList','ConsumeList','NewConsume','Register','PatientInformation','FirstName','LastName','FatherName','Male','Female','Phone','Age', 'Email', 'Address','DoctorName','Memo','PatientList','ID','G','Accounts','AddNewUser','EditProfile','UsersList','GroupsList','AddNewGroup','Home','UserInformation','ConfirmPassword','Position','GroupName','Description','Role','Members','Bug','AccountSettings','AdditionalInformation','PersonalInformation','PasswordNeverExpires','Active','Enable','EditUserInformationfor','ArabicName','EnglishName','UnitPrice','TestNameArabic','TestNameEnglish','category','Price','TestInformation','Areyousure','uwdelete','Delete','XRayInformation','XRayNameen','XRayNamear','GroupID','GroupInformation','DrugInformation','CreatedDate','DoctorInformation','DoctorName','IncomeInformation','IncomeType','Date','amount','Count','ConsumeName','ConsumeInformation','DoctorIncomeList','StaticIncome','NormalIncome','AllIncome','NormalPureIncome','AllPureIncome','CenterIncome','TestsList','Login','EditUser','DeleteGroup','EditGroup','UnauthorizedAccess','DrugSearch','EditConsume','EditDoctor','DoctorIncomeList','EditDrug','EditIncome','PatientTicket','PatientPanel','EditPatient','TestSearch','EditTest','XraySearch','EditXray','No','Yes','HasBeenDeleted','Successfuly','Doctor','Drug','Test','User','Group','Income','Patient','Xray','Consumes','cancel','Add','X-RayInformation','PurchasedDrugInformation','ReturnedDrugInformation','Return','ReportaBug','Subject','description','Gender','Age','Phone','submit','URL','subject','WYCommentAP','YAAOC','Quantity','TotalCost','Pay','VScomments','Paid','Unpaid','Total','AssignAnXray','AssignATest','AssignAnDrug','Assign','DrugNotFound','SearchDrug','SearchXray','SearchTest','TestNotFound','XrayNotFound','Diagnoses','DiagnoseList','NewDiagnose','DiagnoseInformation','EditDiagnose','diagnose_name_en','diagnose_name_ar','Nurses','NursesList','NewNurse','NurseName','NurseInformation','EditNurse','NewNurseSchedule','NurseSceduleList','WorkHours','HourPrice','NewNurseIncentive','IncentiveAmount','NewNurseIncentive','NurseIncetivesList','Allincentives','IncentiveInformation','ScheduleInformation','spressur','ppressur','hrate','heate','oxidation','nbreathing','comment','patient','DailyIncomeList','dailyIncomes','NewdailyIncome','hasbeenupdated','successfuly','DailyIncomeInformation','cannotbedeleted','isalreadyassignedtoapatient','Datamismatch','InvalidData','hasbeenregistered','newDailyIncome','newschedule','nurseScheduleInformations','nurseIncentiveInformations','newIncentive','HasBeenAdded','result','xresult','DoctorFilter','Filter','Reset','SearchForPatient','PatientFilter','IncomeFilter','Diagnose','DailyIncome','NewDailyIncome','pressToAddDate','groupsList','Listofallconsumes','Addnewconsume','RegisterNewXraytoDatabase','ListofAllXrays','Registernewpatient','AddPurchasedDrugstoDatabase','RegisterNewDrugstoDatabase','ListofAllDrugs','Nurseslist','Addnewnurse','RegisterNewTesttoDatabase','ListofAllTests','Addnewincome','Incomeslist','Addnewdoctor','Doctorslist','Waitinglist','ListofallPatients','Addnewdiagnose','Diagnoseslist','DailyIncomeslist','Addnewdailyincome','Youhave','availableinthestock','Purchased','Returned','Sold','NumberOfItems','DrugName','AddNurseSceduleList','minute','pressur','created_date','Workdate','Logout','Profile','remember_me','Username','PassWord','AssignDate','Xresult','AssignDate','AssignDescription','AssignDate','DiagnoseResult','AssignADiagnose','SearchDiagnose','SelectImage','Birth_Date','GoToPatient','ReturnToPatient','PatientControlPanel','Change','Removetheselectedpicture','GoTOConsumes','ReturnToConsumes','EditConsume','DeleteConsume','MinimumDate:','MaximumDate:', 'DeleteIncome', 'ReturnToIncomes', 'GoToIncomes', 'ReturnToDoctors', 'GoToDoctors', 'Number','DeleteDoctor', 'CheckIncome', 'GoToNurses', 'ReturnToNurses', 'GoToIncentiveNurses', 'GotoSchedules', 'DeleteNurse', 'NurseHoursWork','NurseIncentives', 'EditSchedule', 'DeleteDiagnose', 'GotoDiagnose', 'GotoDrugs', 'ReturnToDrugs', 'PurchaseDate','DeleteDrug', 'DrugInformations', 'GotoXray','ReturnToXray', 'ReturnToLab', 'GoToLab', 'GotoDailyIncoms', 'ReturnToDailyIncome', 'ItemshavebeenaddedtoDBsuccessfuly', 'Itemshavebeenreturnedsuccessfuly', 'DoctorIncome', 'consumesCountDuringSpecificDate', 'IncomesCountDuringSpecificDate', 'DayFare', 'allhourworks', 'NurseFilter', 'allnurseincome', 'DailyIncomesCountDuringSpecificDate', 'DeleteDailyIncome', 'EditIncentive','DiagnoseNotFound','HourWorkFilter','IncentiveFilter');
		return $keysList;
	}
	
    
	function getLocalization(){
		return array("lang"=>"1" , "dirr"=>"rtl","demoDir"=>"demo-rtl","langClass"=>"AR");
	}
	
	function tr($key){
		global $dictArray,$lang;
		$lang = "1";
		if($dictArray == null){
			$string_data = file_get_contents("dictionary.txt");
			$dictArray = unserialize($string_data);
		}
		if(!isset($dictArray[$key]))
			return $key;
		if($lang=='1')
			return @$dictArray[$key][1];
		else
			return @$dictArray[$key][2];
	}
	function trP($key){
		echo tr($key);
	}

	function getParam($key,$def=''){
		if(isset($_REQUEST[$key]) && $_REQUEST[$key]!=='')
			return $_REQUEST[$key];
		return $def;
	}
	function getLOVKeys(){
		$sql = 'select distinct listKey from lov order by listKey';
		$rs = mysql_query($sql);
		$result = "";
		
		while($row = mysql_fetch_object($rs)){
			$result .=" <option value='".$row->listKey."'>".$row->listKey."</option>";
		}
		return $result;
	}
	function PLOVOpts($key){
		$ci =& get_instance();
        $ci->load->database();
		$ci->db->select('id,`key`,`label`');
		$ci->db->from('lov');
		$ci->db->where("listKey ='".$key."' ORDER BY `label`");
		
		$query = $ci->db->get();
		$rows =  $query->result_array(); 
		
		$result = "";
		foreach($rows as $row){
			$result .=" <option value='".$row['key']."'>".tr($row['label'])."</option>";
		}
		return $result;
	}
	function getAsOptionList($table,$key,$value,$selected=false,$where=" 1=1 ",$order="id"){
		$sql = "select distinct `$key`,`$value` from $table WHERE $where ORDER BY $order ";
		$rs = mysql_query($sql);
		$result = "";
		while($row = mysql_fetch_object($rs)){
			$result .=" <option value='".$row->$key."' ".($selected==$row->$key?' selected ':'').">".tr($row->$value)."</option>";
		}
		return $result;
	}
    
    function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }

	function isMobile(){
		require_once('Mobile_Detect.php'); 
		$detect = new Mobile_Detect;
		if( $detect->isMobile() && !$detect->isTablet() )
			return true;
		else
			return false;
	}
}