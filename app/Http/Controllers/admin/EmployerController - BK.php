<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use DB;


class EmployerController extends Controller
{
    public function index()
	{
		return view('admin.employer.index');
	}

	public function getReport(Request $request)
	{
		$data = array();
		$html = '';

		/* Company/Organization */
		$total_company_organization = 0;
		$data['company_organization']['Yes'] = Employer::where('years_in_position',$request->year)->where('company_organization','!=', '')->count();
		$data['company_organization']['No'] = Employer::where('years_in_position',$request->year)->where('company_organization','=', null)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Company/Organization</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['company_organization'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_company_organization = $total_company_organization + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_company_organization.'</td></tr>';

		$html .= '</table>';



		/* Department/Division */
		$total_department_division = 0;
		$data['department_division']['Yes'] = Employer::where('years_in_position',$request->year)->where('department_division','!=', '')->count();
		$data['department_division']['No'] = Employer::where('years_in_position',$request->year)->where('department_division','=', null)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Department/Division</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['department_division'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_department_division = $total_department_division + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_department_division.'</td></tr>';

		$html .= '</table>';


		/* Position */
		$total_position = 0;
		$data['position']['Yes'] = Employer::where('years_in_position',$request->year)->where('position','!=', '')->count();
		$data['position']['No'] = Employer::where('years_in_position',$request->year)->where('position','=', null)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Position</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['position'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_position = $total_position + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_position.'</td></tr>';

		$html .= '</table>';

		/* Years In Position */
		$total_years_in_position = 0;
		$data['years_in_position'][$request->year] = Employer::where('years_in_position','=', $request->year)->count();
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Years in position</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['years_in_position'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_years_in_position = $total_years_in_position + $v1;

			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_years_in_position.'</td></tr>';
		$html .= '</table>';


		/* Organization */
		$total_organization = 0;
		$data['organization']['Government'] = Employer::where('years_in_position',$request->year)->where('organization','Government')->count();
		$data['organization']['Private Company'] = Employer::where('years_in_position',$request->year)->where('organization','Private Company')->count();
		$data['organization']['Others'] = Employer::where('years_in_position',$request->year)->where('organization','Others')->count();

		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Which ONE of the following best describes your organization as a whole</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['organization'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_organization = $total_organization + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_organization.'</td></tr>';

		$html .= '</table>';


		/* Staff */
		$staff_design = Employer::where('years_in_position',$request->year)->where('staff', 'like', '%Design%')->count();
		$data['staff']['Design'] = $staff_design;

		$staff_programming = Employer::where('years_in_position',$request->year)->where('staff','like','%Programming%')->count();
		$data['staff']['Programming'] = $staff_programming;

		$staff_maintenance = Employer::where('years_in_position',$request->year)->where('staff','like','%Maintenance%')->count();
		$data['staff']['Maintenance'] = $staff_maintenance;

		$staff_procurement = Employer::where('years_in_position',$request->year)->where('staff','like','%Procurement%')->count();
		$data['staff']['Procurement'] = $staff_procurement;

		$staff_administrative = Employer::where('years_in_position',$request->year)->where('staff','like','%Administrative%')->count();
		$data['staff']['Administrative'] = $staff_administrative;

		$staff_other = Employer::where('years_in_position',$request->year)->where('staff','like','%Other%')->count();
		$data['staff']['Other'] = $staff_other;

		$total_staff = 0;
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Job nature of engineering staff</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['staff'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_staff = $total_staff + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_staff.'</td></tr>';

		$html .= '</table>';



		/* major */
		$major_Civil = Employer::where('years_in_position',$request->year)->where('majors', 'like', '%Civil%')->count();
		$data['majors']['Civil'] = $major_Civil;

		$majors_Chemical = Employer::where('years_in_position',$request->year)->where('majors','like','%Chemical%')->count();
		$data['majors']['Chemical'] = $majors_Chemical;

		$majors_Computer = Employer::where('years_in_position',$request->year)->where('majors','like','%Computer%')->count();
		$data['majors']['Computer'] = $majors_Computer;

		$majors_Electrical = Employer::where('years_in_position',$request->year)->where('majors','like','%Electrical%')->count();
		$data['majors']['Electrical'] = $majors_Electrical;

		$majors_Petroleum = Employer::where('years_in_position',$request->year)->where('majors','like','%Petroleum%')->count();
		$data['majors']['Petroleum'] = $majors_Petroleum;

		$majors_Mechanical = Employer::where('years_in_position',$request->year)->where('majors','like','%Mechanical%')->count();
		$data['majors']['Mechanical'] = $majors_Mechanical;

		$majors_Industrial_Management_Systems = Employer::where('years_in_position',$request->year)->where('majors','like','%Industrial & Management Systems%')->count();
		$data['majors']['Industrial & Management Systems'] = $majors_Industrial_Management_Systems;

		

		$total_majors = 0;
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Majors of Engineers being evaluated</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['majors'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_majors = $total_majors + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_majors.'</td></tr>';

		$html .= '</table>';



		/* evaluated */
		$evaluated_Civil = Employer::where('years_in_position',$request->year)->where('evaluated', 'like', '%Civil%')->count();
		$data['evaluated']['Civil'] = $evaluated_Civil;

		$evaluated_Chemical = Employer::where('years_in_position',$request->year)->where('evaluated','like','%Chemical%')->count();
		$data['evaluated']['Chemical'] = $evaluated_Chemical;

		$evaluated_Computer = Employer::where('years_in_position',$request->year)->where('evaluated','like','%Computer%')->count();
		$data['evaluated']['Computer'] = $evaluated_Computer;

		$evaluated_Electrical = Employer::where('years_in_position',$request->year)->where('evaluated','like','%Electrical%')->count();
		$data['evaluated']['Electrical'] = $evaluated_Electrical;

		$evaluated_Petroleum = Employer::where('years_in_position',$request->year)->where('evaluated','like','%Petroleum%')->count();
		$data['evaluated']['Petroleum'] = $evaluated_Petroleum;

		$evaluated_Mechanical = Employer::where('years_in_position',$request->year)->where('evaluated','like','%Mechanical%')->count();
		$data['evaluated']['Mechanical'] = $evaluated_Mechanical;

		$evaluated_Industrial_Management_Systems = Employer::where('years_in_position',$request->year)->where('evaluated','like','%Industrial & Management Systems%')->count();
		$data['evaluated']['Industrial & Management Systems'] = $evaluated_Industrial_Management_Systems;

		

		$total_evaluated = 0;
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Engineers to be evaluated are mainly from discipline</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['evaluated'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_evaluated = $total_evaluated + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_evaluated.'</td></tr>';

		$html .= '</table>';


		
		$total_number_of_engineers = 0;
		$data['number_of_engineers']['Yes'] = Employer::where('years_in_position',$request->year)->where('number_of_engineers','!=', '')->count();
		$data['number_of_engineers']['No'] = Employer::where('years_in_position',$request->year)->where('number_of_engineers','=', null)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Number of engineers employed in your company</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['number_of_engineers'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_number_of_engineers = $total_number_of_engineers + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_number_of_engineers.'</td></tr>';

		$html .= '</table>';


		$total_percentage = 0;
		$data['percentage']['Yes'] = Employer::where('years_in_position',$request->year)->where('percentage','!=', '')->count();
		$data['percentage']['No'] = Employer::where('years_in_position',$request->year)->where('percentage','=', null)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Percentage of Kuwait University graduates</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['percentage'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_percentage = $total_percentage + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_percentage.'</td></tr>';

		$html .= '</table>';


		/* prepared */
		$prep_1 = array();
		$prep_1['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_1',1)->count();
		$prep_1['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_1',2)->count();
		$prep_1['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_1',3)->count();
		$prep_1['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_1',4)->count();
		$prep_1['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_1',5)->count();
		$prep_1['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_1',6)->count();
		$data['prepared_1']['Apply mathematics, science and engineering knowledge'] = $prep_1;

		$prep_2 = array();
		$prep_2['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_2',1)->count();
		$prep_2['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_2',2)->count();
		$prep_2['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_2',3)->count();
		$prep_2['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_2',4)->count();
		$prep_2['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_2',5)->count();
		$prep_2['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_2',6)->count();
		$data['prepared_2']['Identify, formulate, and solve engineering problems'] = $prep_2;

		$prep_3 = array();
		$prep_3['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_3',1)->count();
		$prep_3['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_3',2)->count();
		$prep_3['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_3',3)->count();
		$prep_3['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_3',4)->count();
		$prep_3['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_3',5)->count();
		$prep_3['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_3',6)->count();
		$data['prepared_3']['Develop new or innovative ideas and work independently'] = $prep_3;

		$prep_4 = array();
		$prep_4['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_4',1)->count();
		$prep_4['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_4',2)->count();
		$prep_4['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_4',3)->count();
		$prep_4['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_4',4)->count();
		$prep_4['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_4',5)->count();
		$prep_4['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_4',6)->count();
		$data['prepared_4']['Use techniques, skills, and modern engineering tools necessary for Engineering design and professional practice (Computer, Internet, Engineering software, etc)'] = $prep_4;

		$prep_5 = array();
		$prep_5['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_5',1)->count();
		$prep_5['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_5',2)->count();
		$prep_5['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_5',3)->count();
		$prep_5['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_5',4)->count();
		$prep_5['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_5',5)->count();
		$prep_5['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_5',6)->count();
		$data['prepared_5']['Design a system, component, or process to meet desired needs'] = $prep_5;

		$prep_6 = array();
		$prep_6['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_6',1)->count();
		$prep_6['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_6',2)->count();
		$prep_6['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_6',3)->count();
		$prep_6['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_6',4)->count();
		$prep_6['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_6',5)->count();
		$prep_6['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_6',6)->count();
		$data['prepared_6']['Communicate orally: informal and prepared talks'] = $prep_6;

		$prep_7 = array();
		$prep_7['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_7',1)->count();
		$prep_7['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_7',2)->count();
		$prep_7['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_7',3)->count();
		$prep_7['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_7',4)->count();
		$prep_7['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_7',5)->count();
		$prep_7['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_7',6)->count();
		$data['prepared_7']['Communicate in writing: letters, technical reports, etc'] = $prep_7;


		$prep_8 = array();
		$prep_8['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_8',1)->count();
		$prep_8['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_8',2)->count();
		$prep_8['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_8',3)->count();
		$prep_8['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_8',4)->count();
		$prep_8['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_8',5)->count();
		$prep_8['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_8',6)->count();
		$data['prepared_8']['Understand professional and ethical responsibility'] = $prep_8;


		$prep_9 = array();
		$prep_9['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_9',1)->count();
		$prep_9['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_9',2)->count();
		$prep_9['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_9',3)->count();
		$prep_9['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_9',4)->count();
		$prep_9['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_9',5)->count();
		$prep_9['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_9',6)->count();
		$data['prepared_9']['Understand impact of engineering solutions in a global/societal context'] = $prep_9;


		$prep_10 = array();
		$prep_10['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_10',1)->count();
		$prep_10['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_10',2)->count();
		$prep_10['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_10',3)->count();
		$prep_10['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_10',4)->count();
		$prep_10['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_10',5)->count();
		$prep_10['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_10',6)->count();
		$data['prepared_10']['Understand contemporary social, economic, and cultural issues'] = $prep_10;


		$prep_11 = array();
		$prep_11['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_11',1)->count();
		$prep_11['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_11',2)->count();
		$prep_11['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_11',3)->count();
		$prep_11['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_11',4)->count();
		$prep_11['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_11',5)->count();
		$prep_11['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_11',6)->count();
		$data['prepared_11']['Work in teams and develop leadership skills'] = $prep_11;


		$prep_12 = array();
		$prep_12['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_12',1)->count();
		$prep_12['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_12',2)->count();
		$prep_12['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_12',3)->count();
		$prep_12['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_12',4)->count();
		$prep_12['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_12',5)->count();
		$prep_12['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_12',6)->count();
		$data['prepared_12']['Function effectively in international and multicultural contexts'] = $prep_12;

		$prep_13 = array();
		$prep_13['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_13',1)->count();
		$prep_13['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_13',2)->count();
		$prep_13['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_13',3)->count();
		$prep_13['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_13',4)->count();
		$prep_13['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_13',5)->count();
		$prep_13['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_13',6)->count();
		$data['prepared_13']['Design and conduct experiments, analyze, and interpret data'] = $prep_13;

		$prep_14 = array();
		$prep_14['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_14',1)->count();
		$prep_14['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_14',2)->count();
		$prep_14['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_14',3)->count();
		$prep_14['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_14',4)->count();
		$prep_14['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_14',5)->count();
		$prep_14['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_14',6)->count();
		$data['prepared_14']['Learn new skills and stay current technically and professionally'] = $prep_14;

		$prep_15 = array();
		$prep_15['opt_1'] = Employer::where('years_in_position',$request->year)->where('prepared_15',1)->count();
		$prep_15['opt_2'] = Employer::where('years_in_position',$request->year)->where('prepared_15',2)->count();
		$prep_15['opt_3'] = Employer::where('years_in_position',$request->year)->where('prepared_15',3)->count();
		$prep_15['opt_4'] = Employer::where('years_in_position',$request->year)->where('prepared_15',4)->count();
		$prep_15['opt_5'] = Employer::where('years_in_position',$request->year)->where('prepared_15',5)->count();
		$prep_15['opt_6'] = Employer::where('years_in_position',$request->year)->where('prepared_15',6)->count();
		$data['prepared_15']['Recognize the need to engage in lifelong learning'] = $prep_15;


		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
		 	$html .= '<tr><th>Rate the following skills, abilities, and knowledge in terms of the level of preparedness of recent Kuwait University engineering graduates</th><th>VWP</th><th>WP</th><th>P</th><th>SP</th><th>NP</th><th>CNE</th><th>Average</th></tr>';

		 	for ($i=1; $i <16; $i++) { 
		 		$weight = 5; 
				$sum = 0;
				$multi_sum = 0;
				foreach ($data['prepared_'.$i] as $key => $value) {
					$html .= '<tr><td>'.$key.'</td>';
					foreach ($value as $k1 => $v1) {
						$html .= '<td>'.$v1.'</td>';
						$sum = $sum + $v1;
						$multi = $weight * $v1;
						$multi_sum = $multi_sum + $multi;
						$weight --;
					}
					if ($sum != 0) {
						$avg = $multi_sum / $sum;
					} else {
						$avg = 0;
					}
					$html .= '<td class="avg_footer">'.number_format((float)$avg, 2, '.', '').'</td>';
					$html .= '</tr>';
				}
			}
		$html .= '</table>';



		/* important */
		$prep_1 = array();
		$prep_1['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_1',1)->count();
		$prep_1['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_1',2)->count();
		$prep_1['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_1',3)->count();
		$prep_1['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_1',4)->count();
		$prep_1['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_1',5)->count();
		$prep_1['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_1',6)->count();
		$data['important_1']['Apply mathematics, science and engineering knowledge'] = $prep_1;

		$prep_2 = array();
		$prep_2['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_2',1)->count();
		$prep_2['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_2',2)->count();
		$prep_2['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_2',3)->count();
		$prep_2['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_2',4)->count();
		$prep_2['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_2',5)->count();
		$prep_2['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_2',6)->count();
		$data['important_2']['Identify, formulate, and solve engineering problems'] = $prep_2;

		$prep_3 = array();
		$prep_3['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_3',1)->count();
		$prep_3['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_3',2)->count();
		$prep_3['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_3',3)->count();
		$prep_3['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_3',4)->count();
		$prep_3['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_3',5)->count();
		$prep_3['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_3',6)->count();
		$data['important_3']['Develop new or innovative ideas and work independently'] = $prep_3;

		$prep_4 = array();
		$prep_4['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_4',1)->count();
		$prep_4['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_4',2)->count();
		$prep_4['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_4',3)->count();
		$prep_4['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_4',4)->count();
		$prep_4['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_4',5)->count();
		$prep_4['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_4',6)->count();
		$data['important_4']['Use techniques, skills, and modern engineering tools necessary for Engineering design and professional practice (Computer, Internet, Engineering software, etc)'] = $prep_4;

		$prep_5 = array();
		$prep_5['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_5',1)->count();
		$prep_5['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_5',2)->count();
		$prep_5['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_5',3)->count();
		$prep_5['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_5',4)->count();
		$prep_5['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_5',5)->count();
		$prep_5['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_5',6)->count();
		$data['important_5']['Design a system, component, or process to meet desired needs'] = $prep_5;

		$prep_6 = array();
		$prep_6['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_6',1)->count();
		$prep_6['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_6',2)->count();
		$prep_6['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_6',3)->count();
		$prep_6['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_6',4)->count();
		$prep_6['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_6',5)->count();
		$prep_6['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_6',6)->count();
		$data['important_6']['Communicate orally: informal and prepared talks'] = $prep_6;

		$prep_7 = array();
		$prep_7['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_7',1)->count();
		$prep_7['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_7',2)->count();
		$prep_7['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_7',3)->count();
		$prep_7['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_7',4)->count();
		$prep_7['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_7',5)->count();
		$prep_7['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_7',6)->count();
		$data['important_7']['Communicate in writing: letters, technical reports, etc'] = $prep_7;


		$prep_8 = array();
		$prep_8['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_8',1)->count();
		$prep_8['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_8',2)->count();
		$prep_8['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_8',3)->count();
		$prep_8['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_8',4)->count();
		$prep_8['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_8',5)->count();
		$prep_8['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_8',6)->count();
		$data['important_8']['Understand professional and ethical responsibility'] = $prep_8;


		$prep_9 = array();
		$prep_9['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_9',1)->count();
		$prep_9['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_9',2)->count();
		$prep_9['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_9',3)->count();
		$prep_9['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_9',4)->count();
		$prep_9['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_9',5)->count();
		$prep_9['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_9',6)->count();
		$data['important_9']['Understand impact of engineering solutions in a global/societal context'] = $prep_9;


		$prep_10 = array();
		$prep_10['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_10',1)->count();
		$prep_10['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_10',2)->count();
		$prep_10['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_10',3)->count();
		$prep_10['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_10',4)->count();
		$prep_10['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_10',5)->count();
		$prep_10['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_10',6)->count();
		$data['important_10']['Understand contemporary social, economic, and cultural issues'] = $prep_10;


		$prep_11 = array();
		$prep_11['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_11',1)->count();
		$prep_11['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_11',2)->count();
		$prep_11['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_11',3)->count();
		$prep_11['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_11',4)->count();
		$prep_11['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_11',5)->count();
		$prep_11['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_11',6)->count();
		$data['important_11']['Work in teams and develop leadership skills'] = $prep_11;


		$prep_12 = array();
		$prep_12['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_12',1)->count();
		$prep_12['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_12',2)->count();
		$prep_12['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_12',3)->count();
		$prep_12['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_12',4)->count();
		$prep_12['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_12',5)->count();
		$prep_12['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_12',6)->count();
		$data['important_12']['Function effectively in international and multicultural contexts'] = $prep_12;

		$prep_13 = array();
		$prep_13['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_13',1)->count();
		$prep_13['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_13',2)->count();
		$prep_13['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_13',3)->count();
		$prep_13['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_13',4)->count();
		$prep_13['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_13',5)->count();
		$prep_13['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_13',6)->count();
		$data['important_13']['Design and conduct experiments, analyze, and interpret data'] = $prep_13;

		$prep_14 = array();
		$prep_14['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_14',1)->count();
		$prep_14['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_14',2)->count();
		$prep_14['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_14',3)->count();
		$prep_14['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_14',4)->count();
		$prep_14['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_14',5)->count();
		$prep_14['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_14',6)->count();
		$data['important_14']['Learn new skills and stay current technically and professionally'] = $prep_14;

		$prep_15 = array();
		$prep_15['opt_1'] = Employer::where('years_in_position',$request->year)->where('important_15',1)->count();
		$prep_15['opt_2'] = Employer::where('years_in_position',$request->year)->where('important_15',2)->count();
		$prep_15['opt_3'] = Employer::where('years_in_position',$request->year)->where('important_15',3)->count();
		$prep_15['opt_4'] = Employer::where('years_in_position',$request->year)->where('important_15',4)->count();
		$prep_15['opt_5'] = Employer::where('years_in_position',$request->year)->where('important_15',5)->count();
		$prep_15['opt_6'] = Employer::where('years_in_position',$request->year)->where('important_15',6)->count();
		$data['important_15']['Recognize the need to engage in lifelong learning'] = $prep_15;


		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
		 	$html .= '<tr><th>Rate each item according to its importance to your business and operations</th><th>VWP</th><th>WP</th><th>P</th><th>SP</th><th>NP</th><th>CNE</th><th>Average</th></tr>';

		 	for ($i=1; $i <16; $i++) { 
		 		$weight = 5; 
				$sum = 0;
				$multi_sum = 0;
				foreach ($data['important_'.$i] as $key => $value) {
					$html .= '<tr><td>'.$key.'</td>';
					foreach ($value as $k1 => $v1) {
						$html .= '<td>'.$v1.'</td>';
						$sum = $sum + $v1;
						$multi = $weight * $v1;
						$multi_sum = $multi_sum + $multi;
						$weight --;
					}
					if ($sum != 0) {
						$avg = $multi_sum / $sum;
					} else {
						$avg = 0;
					}
					$html .= '<td class="avg_footer">'.number_format((float)$avg, 2, '.', '').'</td>';
					$html .= '</tr>';
				}
			}
		$html .= '</table>';


		/* significant */
		$prep_1 = array();
		$prep_1['opt_1'] = Employer::where('years_in_position',$request->year)->where('significant_1',1)->count();
		$prep_1['opt_2'] = Employer::where('years_in_position',$request->year)->where('significant_1',2)->count();
		$prep_1['opt_3'] = Employer::where('years_in_position',$request->year)->where('significant_1',3)->count();
		$prep_1['opt_4'] = Employer::where('years_in_position',$request->year)->where('significant_1',4)->count();
		$data['significant_1']['Contribution to company/workplace/institution (e.g., improve product/service quality, increase productivity, increase revenues, reduce expenses, improve customer satisfaction)'] = $prep_1;

		$prep_2 = array();
		$prep_2['opt_1'] = Employer::where('years_in_position',$request->year)->where('significant_2',1)->count();
		$prep_2['opt_2'] = Employer::where('years_in_position',$request->year)->where('significant_2',2)->count();
		$prep_2['opt_3'] = Employer::where('years_in_position',$request->year)->where('significant_2',3)->count();
		$prep_2['opt_4'] = Employer::where('years_in_position',$request->year)->where('significant_2',4)->count();
		$data['significant_2']['Contribution to wellbeing of society and the environment (e.g., safeguard the interest of society, improve economy, develop professional standards and best practices, safeguard and improve the environment)'] = $prep_2;

		$prep_3 = array();
		$prep_3['opt_1'] = Employer::where('years_in_position',$request->year)->where('significant_3',1)->count();
		$prep_3['opt_2'] = Employer::where('years_in_position',$request->year)->where('significant_3',2)->count();
		$prep_3['opt_3'] = Employer::where('years_in_position',$request->year)->where('significant_3',3)->count();
		$prep_3['opt_4'] = Employer::where('years_in_position',$request->year)->where('significant_3',4)->count();
		$data['significant_3']['Career advancement (e.g., promotion to higher ranks/positions, increased responsibilities)'] = $prep_3;

		$prep_4 = array();
		$prep_4['opt_1'] = Employer::where('years_in_position',$request->year)->where('significant_4',1)->count();
		$prep_4['opt_2'] = Employer::where('years_in_position',$request->year)->where('significant_4',2)->count();
		$prep_4['opt_3'] = Employer::where('years_in_position',$request->year)->where('significant_4',3)->count();
		$prep_4['opt_4'] = Employer::where('years_in_position',$request->year)->where('significant_4',4)->count();
		$data['significant_4']['Degree advancement and continuing education. (e.g., diplomas, formal course work, graduate courses, graduate degree, training, certificates and professional certification)'] = $prep_4;

		$prep_5 = array();
		$prep_5['opt_1'] = Employer::where('years_in_position',$request->year)->where('significant_5',1)->count();
		$prep_5['opt_2'] = Employer::where('years_in_position',$request->year)->where('significant_5',2)->count();
		$prep_5['opt_3'] = Employer::where('years_in_position',$request->year)->where('significant_5',3)->count();
		$prep_5['opt_4'] = Employer::where('years_in_position',$request->year)->where('significant_5',4)->count();
		$data['significant_5']['Staying current in profession (e.g., participation in seminars and conferences, professional development courses and activities, membership in professional societies)'] = $prep_5;

		$prep_6 = array();
		$prep_6['opt_1'] = Employer::where('years_in_position',$request->year)->where('significant_6',1)->count();
		$prep_6['opt_2'] = Employer::where('years_in_position',$request->year)->where('significant_6',2)->count();
		$prep_6['opt_3'] = Employer::where('years_in_position',$request->year)->where('significant_6',3)->count();
		$prep_6['opt_4'] = Employer::where('years_in_position',$request->year)->where('significant_6',4)->count();
		$data['significant_6']['Use of leadership capabilities (e.g., promotion to leadership positions, ability to lead teams, supervisory skills and abilities)'] = $prep_6;


		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
		 	$html .= '<tr><th>How important they are to your company needs</th><th>Sig</th><th>Sat</th><th>SSat</th><th>NSat</th><th>Average</th></tr>';

		 	for ($i=1; $i <7; $i++) { 
		 		$weight = 5; 
				$sum = 0;
				$multi_sum = 0;
				foreach ($data['significant_'.$i] as $key => $value) {
					$html .= '<tr><td>'.$key.'</td>';
					foreach ($value as $k1 => $v1) {
						$html .= '<td>'.$v1.'</td>';
						$sum = $sum + $v1;
						$multi = $weight * $v1;
						$multi_sum = $multi_sum + $multi;
						$weight --;
					}
					if ($sum != 0) {
						$avg = $multi_sum / $sum;
					} else {
						$avg = 0;
					}
					$html .= '<td class="avg_footer">'.number_format((float)$avg, 2, '.', '').'</td>';
					$html .= '</tr>';
				}
			}
		$html .= '</table>';



		/* objectives important */
		$prep_1 = array();
		$prep_1['opt_1'] = Employer::where('years_in_position',$request->year)->where('objectives_important_1',1)->count();
		$prep_1['opt_2'] = Employer::where('years_in_position',$request->year)->where('objectives_important_1',2)->count();
		$prep_1['opt_3'] = Employer::where('years_in_position',$request->year)->where('objectives_important_1',3)->count();
		$prep_1['opt_4'] = Employer::where('years_in_position',$request->year)->where('objectives_important_1',4)->count();
		$prep_1['opt_5'] = Employer::where('years_in_position',$request->year)->where('objectives_important_1',5)->count();
		$prep_1['opt_6'] = Employer::where('years_in_position',$request->year)->where('objectives_important_1',6)->count();
		$data['objectives_important_1']['Contribution to company/workplace/institution (e.g., improve product/service quality, increase productivity, increase revenues, reduce expenses, improve customer satisfaction)'] = $prep_1;

		$prep_2 = array();
		$prep_2['opt_1'] = Employer::where('years_in_position',$request->year)->where('objectives_important_2',1)->count();
		$prep_2['opt_2'] = Employer::where('years_in_position',$request->year)->where('objectives_important_2',2)->count();
		$prep_2['opt_3'] = Employer::where('years_in_position',$request->year)->where('objectives_important_2',3)->count();
		$prep_2['opt_4'] = Employer::where('years_in_position',$request->year)->where('objectives_important_2',4)->count();
		$prep_2['opt_5'] = Employer::where('years_in_position',$request->year)->where('objectives_important_2',5)->count();
		$prep_2['opt_6'] = Employer::where('years_in_position',$request->year)->where('objectives_important_2',6)->count();
		$data['objectives_important_2']['Contribution to wellbeing of society and the environment (e.g., safeguard the interest of society, improve economy, develop professional standards and best practices, safeguard and improve the environment)'] = $prep_2;

		$prep_3 = array();
		$prep_3['opt_1'] = Employer::where('years_in_position',$request->year)->where('objectives_important_3',1)->count();
		$prep_3['opt_2'] = Employer::where('years_in_position',$request->year)->where('objectives_important_3',2)->count();
		$prep_3['opt_3'] = Employer::where('years_in_position',$request->year)->where('objectives_important_3',3)->count();
		$prep_3['opt_4'] = Employer::where('years_in_position',$request->year)->where('objectives_important_3',4)->count();
		$prep_3['opt_5'] = Employer::where('years_in_position',$request->year)->where('objectives_important_3',5)->count();
		$prep_3['opt_6'] = Employer::where('years_in_position',$request->year)->where('objectives_important_3',6)->count();
		$data['objectives_important_3']['Career advancement (e.g., promotion to higher ranks/positions, increased responsibilities)'] = $prep_3;

		$prep_4 = array();
		$prep_4['opt_1'] = Employer::where('years_in_position',$request->year)->where('objectives_important_4',1)->count();
		$prep_4['opt_2'] = Employer::where('years_in_position',$request->year)->where('objectives_important_4',2)->count();
		$prep_4['opt_3'] = Employer::where('years_in_position',$request->year)->where('objectives_important_4',3)->count();
		$prep_4['opt_4'] = Employer::where('years_in_position',$request->year)->where('objectives_important_4',4)->count();
		$prep_4['opt_5'] = Employer::where('years_in_position',$request->year)->where('objectives_important_4',5)->count();
		$prep_4['opt_6'] = Employer::where('years_in_position',$request->year)->where('objectives_important_4',6)->count();
		$data['objectives_important_4']['Degree advancement and continuing education. (e.g., diplomas, formal course work, graduate courses, graduate degree, training, certificates and professional certification)'] = $prep_4;

		$prep_5 = array();
		$prep_5['opt_1'] = Employer::where('years_in_position',$request->year)->where('objectives_important_5',1)->count();
		$prep_5['opt_2'] = Employer::where('years_in_position',$request->year)->where('objectives_important_5',2)->count();
		$prep_5['opt_3'] = Employer::where('years_in_position',$request->year)->where('objectives_important_5',3)->count();
		$prep_5['opt_4'] = Employer::where('years_in_position',$request->year)->where('objectives_important_5',4)->count();
		$prep_5['opt_5'] = Employer::where('years_in_position',$request->year)->where('objectives_important_5',5)->count();
		$prep_5['opt_6'] = Employer::where('years_in_position',$request->year)->where('objectives_important_5',6)->count();
		$data['objectives_important_5']['Staying current in profession (e.g., participation in seminars and conferences, professional development courses and activities, membership in professional societies)'] = $prep_5;

		$prep_6 = array();
		$prep_6['opt_1'] = Employer::where('years_in_position',$request->year)->where('objectives_important_6',1)->count();
		$prep_6['opt_2'] = Employer::where('years_in_position',$request->year)->where('objectives_important_6',2)->count();
		$prep_6['opt_3'] = Employer::where('years_in_position',$request->year)->where('objectives_important_6',3)->count();
		$prep_6['opt_4'] = Employer::where('years_in_position',$request->year)->where('objectives_important_6',4)->count();
		$prep_6['opt_5'] = Employer::where('years_in_position',$request->year)->where('objectives_important_6',5)->count();
		$prep_6['opt_6'] = Employer::where('years_in_position',$request->year)->where('objectives_important_6',6)->count();
		$data['objectives_important_6']['Use of leadership capabilities (e.g., promotion to leadership positions, ability to lead teams, supervisory skills and abilities)'] = $prep_6;


		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
		 	$html .= '<tr><th>The level of attainment of our graduates</th><th>VWP</th><th>WP</th><th>P</th><th>SP</th><th>NP</th><th>CNE</th><th>Average</th></tr>';

		 	for ($i=1; $i <7; $i++) { 
		 		$weight = 5; 
				$sum = 0;
				$multi_sum = 0;
				foreach ($data['objectives_important_'.$i] as $key => $value) {
					$html .= '<tr><td>'.$key.'</td>';
					foreach ($value as $k1 => $v1) {
						$html .= '<td>'.$v1.'</td>';
						$sum = $sum + $v1;
						$multi = $weight * $v1;
						$multi_sum = $multi_sum + $multi;
						$weight --;
					}
					if ($sum != 0) {
						$avg = $multi_sum / $sum;
					} else {
						$avg = 0;
					}
					$html .= '<td class="avg_footer">'.number_format((float)$avg, 2, '.', '').'</td>';
					$html .= '</tr>';
				}
			}
		$html .= '</table>';



		$data['abilities_knowledge'] = Employer::select('abilities_knowledge')->where('years_in_position',$request->year)->where('abilities_knowledge','!=',null)->get();

		$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:100%;"> Please list three technical knowledge or professional skills that you think should be taught in the engineering program that you attended at Kuwait University</th></tr>';
			foreach ($data['abilities_knowledge'] as $k1 => $v1) 
			{
				$html .= '<tr><td>'.$v1->abilities_knowledge.'</td></tr>';
			}
		$html .= '</table>';




		/* compare */
		$data['compare']['Strongly recommend'] = Employer::where('years_in_position',$request->year)->where('compare','Strongly recommend')->count();
		$data['compare']['Somewhat better'] = Employer::where('years_in_position',$request->year)->where('compare','Somewhat better')->count();
		$data['compare']['Not as good'] = Employer::where('years_in_position',$request->year)->where('compare','Not as good')->count();
		$data['compare']['Much worse'] = Employer::where('years_in_position',$request->year)->where('compare','Much worse')->count();
		$data['compare']['About the same'] = Employer::where('years_in_position',$request->year)->where('compare','About the same')->count();



		$total_compare = 0;
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">How do Kuwait University graduates compare with graduates from other universities?</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['compare'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_compare = $total_compare + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_compare.'</td></tr>';

		$html .= '</table>';


		$total_necessary = 0;
		$data['necessary']['Yes'] = Employer::where('years_in_position',$request->year)->where('necessary', '=', 1)->count();
		$data['necessary']['No'] = Employer::where('years_in_position',$request->year)->where('necessary', '=', 0)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Have you find it necessary to provide training to the graduates of Kuwait University during the first year of their employment in your organization?</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['necessary'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_necessary = $total_necessary + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_necessary.'</td></tr>';

		$html .= '</table>';


		$total_hiring = 0;
		$data['hiring']['Yes'] = Employer::where('years_in_position',$request->year)->where('hiring', '=', 1)->count();
		$data['hiring']['No'] = Employer::where('years_in_position',$request->year)->where('hiring', '=', 0)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Is hiring a KU graduate your first preference?</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['hiring'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_hiring = $total_hiring + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_hiring.'</td></tr>';

		$html .= '</table>';


		$data['particular_strengths'] = Employer::select('particular_strengths')->where('years_in_position',$request->year)->where('particular_strengths','!=',null)->get();

		$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:100%;"> What particular strengths do you perceive Kuwait University engineering graduates possess?</th></tr>';
			foreach ($data['particular_strengths'] as $k1 => $v1) 
			{
				$html .= '<tr><td>'.$v1->particular_strengths.'</td></tr>';
			}
		$html .= '</table>';



		$data['preparation'] = Employer::select('preparation')->where('years_in_position',$request->year)->where('preparation','!=',null)->get();

		$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:100%;"> What particular strengths do you perceive Kuwait University engineering graduates possess?</th></tr>';
			foreach ($data['preparation'] as $k1 => $v1) 
			{
				$html .= '<tr><td>'.$v1->preparation.'</td></tr>';
			}
		$html .= '</table>';


		$total_summary_report = 0;
		$data['summary_report']['Yes'] = Employer::where('years_in_position',$request->year)->where('summary_report', '=', 1)->count();
		$data['summary_report']['No'] = Employer::where('years_in_position',$request->year)->where('summary_report', '=', 0)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Would you be interested in receiving a summary report on the College of Engineering Employer Survey of 2022 ??? 2023?</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['summary_report'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_summary_report = $total_summary_report + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_summary_report.'</td></tr>';

		$html .= '</table>';



		$total_participating = 0;
		$data['participating']['Yes'] = Employer::where('years_in_position',$request->year)->where('participating', '=', 1)->count();
		$data['participating']['No'] = Employer::where('years_in_position',$request->year)->where('participating', '=', 0)->count();
		
		$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			$html .= '<tr><th style="width:70%;">Would you be interested in participating at a luncheon briefing with other employers and faculty staff on the results of the College of Engineering Employer Survey of 2022 ??? 2023?</th><th style="width:30%;">Total Responses</th></tr>';
			foreach ($data['participating'] as $k1 => $v1) {
				$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
				$total_participating = $total_participating + $v1;
			}
			$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_participating.'</td></tr>';

		$html .= '</table>';



		return $html;
	}
}
