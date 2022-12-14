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

		
		if ($request->major != '') 
		{

			/* Company/Organization */
			$total_company_organization = 0;

			if ($request->major == 'College') {
				$company_organization = Employer::all();
			} else {
				$company_organization = Employer::where('majors', 'like', '%'.$request->major.'%')->get();
			}

			foreach ($company_organization as $keybt => $valuebt) 
			{	
				if ($request->major == 'College') {

					$data['company_organization'][$valuebt->company_organization] = Employer::where('company_organization',$valuebt->company_organization)->count();

				} else {

					$data['company_organization'][$valuebt->company_organization] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('company_organization',$valuebt->company_organization)->count();
				}
			}

			if ($data) {
				$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
					$html .= '<tr><th style="width:70%;">Company/Organization</th><th style="width:30%;">Total Responses</th></tr>';
					foreach ($data['company_organization'] as $k1 => $v1) {
						$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
						$total_company_organization = $total_company_organization + $v1;
					}
					$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_company_organization.'</td></tr>';

				$html .= '</table>';
			}


			/* Department/Division */
			$total_department_division = 0;
			if ($request->major == 'College') {
				$department_division = Employer::where('department_division','!=', '')->get();
			} else {
				$department_division = Employer::where('department_division','!=', '')->where('majors', 'like', '%'.$request->major.'%')->get();
			}

			foreach ($department_division as $keybt => $valuebt) {

				if ($request->major == 'College') {

					$data['department_division'][$valuebt->department_division] = Employer::where('department_division',$valuebt->department_division)->count();

				} else {

					$data['department_division'][$valuebt->department_division] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('department_division',$valuebt->department_division)->count();

				}

			}
			
			if ($data) 
			{
				$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
					$html .= '<tr><th style="width:70%;">Department/Division</th><th style="width:30%;">Total Responses</th></tr>';
					foreach ($data['department_division'] as $k1 => $v1) {
						$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
						$total_department_division = $total_department_division + $v1;
					}
					$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_department_division.'</td></tr>';

				$html .= '</table>';
			}


			/* Position */
			$total_position = 0;
			if ($request->major == 'College') {
				$position = Employer::where('position','!=', '')->get();
			} else {
				$position = Employer::where('position','!=', '')->where('majors', 'like', '%'.$request->major.'%')->get();
			}

			foreach ($position as $keybt => $valuebt) {

				if ($request->major == 'College') {
					$data['position'][$valuebt->position] = Employer::where('position',$valuebt->position)->count();
				} else {
					$data['position'][$valuebt->position] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('position',$valuebt->position)->count();
				}

			}
			
			if ($data) 
			{
				$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
					$html .= '<tr><th style="width:70%;">Position</th><th style="width:30%;">Total Responses</th></tr>';
					foreach ($data['position'] as $k1 => $v1) {
						$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
						$total_position = $total_position + $v1;
					}
					$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_position.'</td></tr>';

				$html .= '</table>';
			}

			/* Years In Position */
			/*$total_years_in_position = 0;
			$data['years_in_position']['< 20'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('years_in_position','<',20)->count();

			$data['years_in_position']['20 - 50'] = Employer::where('majors', 'like', '%'.$request->major.'%')->whereBetween('years_in_position',[20,50])->count();

			$data['years_in_position']['50 - 100'] = Employer::where('majors', 'like', '%'.$request->major.'%')->whereBetween('years_in_position',[50,100])->count();

			$data['years_in_position']['100 >'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('years_in_position','>',100)->count();

			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Years in position</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['years_in_position'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_years_in_position = $total_years_in_position + $v1;

				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_years_in_position.'</td></tr>';
			$html .= '</table>';*/


			/* Organization */
			$total_organization = 0;

			if ($request->major == 'College') {

				$data['organization']['Government'] = Employer::where('organization','Government')->count();
				$data['organization']['Private Company'] = Employer::where('organization','Private Company')->count();
				$data['organization']['Others'] = Employer::where('organization','Others')->count();

			} else {
				$data['organization']['Government'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('organization','Government')->count();
				$data['organization']['Private Company'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('organization','Private Company')->count();
				$data['organization']['Others'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('organization','Others')->count();
			}


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Which ONE of the following best describes your organization as a whole?</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['organization'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_organization = $total_organization + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_organization.'</td></tr>';

			$html .= '</table>';


			/* Staff */
			if ($request->major == 'College') {

				$staff_design = Employer::where('staff', 'like', '%Design%')->count();
				$data['staff']['Design'] = $staff_design;

				$staff_programming = Employer::where('staff','like','%Programming%')->count();
				$data['staff']['Programming'] = $staff_programming;

				$staff_maintenance = Employer::where('staff','like','%Maintenance%')->count();
				$data['staff']['Maintenance'] = $staff_maintenance;

				$staff_procurement = Employer::where('staff','like','%Procurement%')->count();
				$data['staff']['Procurement'] = $staff_procurement;

				$staff_administrative = Employer::where('staff','like','%Administrative%')->count();
				$data['staff']['Administrative'] = $staff_administrative;

				$staff_other = Employer::where('staff','like','%Other%')->count();
				$data['staff']['Other'] = $staff_other;

			} else {

				$staff_design = Employer::where('majors', 'like', '%'.$request->major.'%')->where('staff', 'like', '%Design%')->count();
				$data['staff']['Design'] = $staff_design;

				$staff_programming = Employer::where('majors', 'like', '%'.$request->major.'%')->where('staff','like','%Programming%')->count();
				$data['staff']['Programming'] = $staff_programming;

				$staff_maintenance = Employer::where('majors', 'like', '%'.$request->major.'%')->where('staff','like','%Maintenance%')->count();
				$data['staff']['Maintenance'] = $staff_maintenance;

				$staff_procurement = Employer::where('majors', 'like', '%'.$request->major.'%')->where('staff','like','%Procurement%')->count();
				$data['staff']['Procurement'] = $staff_procurement;

				$staff_administrative = Employer::where('majors', 'like', '%'.$request->major.'%')->where('staff','like','%Administrative%')->count();
				$data['staff']['Administrative'] = $staff_administrative;

				$staff_other = Employer::where('majors', 'like', '%'.$request->major.'%')->where('staff','like','%Other%')->count();
				$data['staff']['Other'] = $staff_other;

			}	

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
			if ($request->major == 'College') {
				$major_Civil = Employer::where('majors', 'like', '%Civil%')->count();
				$data['majors']['Civil'] = $major_Civil;

				$majors_Chemical = Employer::where('majors','like','%Chemical%')->count();
				$data['majors']['Chemical'] = $majors_Chemical;

				$majors_Computer = Employer::where('majors','like','%Computer%')->count();
				$data['majors']['Computer'] = $majors_Computer;

				$majors_Electrical = Employer::where('majors','like','%Electrical%')->count();
				$data['majors']['Electrical'] = $majors_Electrical;

				$majors_Petroleum = Employer::where('majors','like','%Petroleum%')->count();
				$data['majors']['Petroleum'] = $majors_Petroleum;

				$majors_Mechanical = Employer::where('majors','like','%Mechanical%')->count();
				$data['majors']['Mechanical'] = $majors_Mechanical;

				$majors_Industrial_Management_Systems = Employer::where('majors','like','%Industrial & Management Systems%')->count();
				$data['majors']['Industrial & Management Systems'] = $majors_Industrial_Management_Systems;

			} else {

				$major_Civil = Employer::where('majors', 'like', '%'.$request->major.'%')->where('majors', 'like', '%Civil%')->count();
				$data['majors']['Civil'] = $major_Civil;

				$majors_Chemical = Employer::where('majors', 'like', '%'.$request->major.'%')->where('majors','like','%Chemical%')->count();
				$data['majors']['Chemical'] = $majors_Chemical;

				$majors_Computer = Employer::where('majors', 'like', '%'.$request->major.'%')->where('majors','like','%Computer%')->count();
				$data['majors']['Computer'] = $majors_Computer;

				$majors_Electrical = Employer::where('majors', 'like', '%'.$request->major.'%')->where('majors','like','%Electrical%')->count();
				$data['majors']['Electrical'] = $majors_Electrical;

				$majors_Petroleum = Employer::where('majors', 'like', '%'.$request->major.'%')->where('majors','like','%Petroleum%')->count();
				$data['majors']['Petroleum'] = $majors_Petroleum;

				$majors_Mechanical = Employer::where('majors', 'like', '%'.$request->major.'%')->where('majors','like','%Mechanical%')->count();
				$data['majors']['Mechanical'] = $majors_Mechanical;

				$majors_Industrial_Management_Systems = Employer::where('majors', 'like', '%'.$request->major.'%')->where('majors','like','%Industrial & Management Systems%')->count();
				$data['majors']['Industrial & Management Systems'] = $majors_Industrial_Management_Systems;

			}

			

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
			/*$evaluated_Civil = Employer::where('majors', 'like', '%'.$request->major.'%')->where('evaluated', 'like', '%Civil%')->count();
			$data['evaluated']['Civil'] = $evaluated_Civil;

			$evaluated_Chemical = Employer::where('majors', 'like', '%'.$request->major.'%')->where('evaluated','like','%Chemical%')->count();
			$data['evaluated']['Chemical'] = $evaluated_Chemical;

			$evaluated_Computer = Employer::where('majors', 'like', '%'.$request->major.'%')->where('evaluated','like','%Computer%')->count();
			$data['evaluated']['Computer'] = $evaluated_Computer;

			$evaluated_Electrical = Employer::where('majors', 'like', '%'.$request->major.'%')->where('evaluated','like','%Electrical%')->count();
			$data['evaluated']['Electrical'] = $evaluated_Electrical;

			$evaluated_Petroleum = Employer::where('majors', 'like', '%'.$request->major.'%')->where('evaluated','like','%Petroleum%')->count();
			$data['evaluated']['Petroleum'] = $evaluated_Petroleum;

			$evaluated_Mechanical = Employer::where('majors', 'like', '%'.$request->major.'%')->where('evaluated','like','%Mechanical%')->count();
			$data['evaluated']['Mechanical'] = $evaluated_Mechanical;

			$evaluated_Industrial_Management_Systems = Employer::where('majors', 'like', '%'.$request->major.'%')->where('evaluated','like','%Industrial & Management Systems%')->count();
			$data['evaluated']['Industrial & Management Systems'] = $evaluated_Industrial_Management_Systems;

			

			$total_evaluated = 0;
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Engineers to be evaluated are mainly from discipline</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['evaluated'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_evaluated = $total_evaluated + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_evaluated.'</td></tr>';

			$html .= '</table>';*/




			$total_number_of_engineers = 0;

			if ($request->major == 'College') {

				$data['number_of_engineers']['< 20'] = Employer::where('number_of_engineers','<20')->count();

				$data['number_of_engineers']['20 - 50'] = Employer::where('number_of_engineers','20-50')->count();

				$data['number_of_engineers']['50 - 100'] = Employer::where('number_of_engineers','50-100')->count();

				$data['number_of_engineers']['> 100'] = Employer::where('number_of_engineers','>100')->count();


			} else {

				$data['number_of_engineers']['< 20'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('number_of_engineers','<20')->count();

				$data['number_of_engineers']['20 - 50'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('number_of_engineers','20-50')->count();

				$data['number_of_engineers']['50 - 100'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('number_of_engineers','50-100')->count();

				$data['number_of_engineers']['> 100'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('number_of_engineers','>100')->count();
			}
			
			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Number of engineers employed in your company</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['number_of_engineers'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_number_of_engineers = $total_number_of_engineers + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_number_of_engineers.'</td></tr>';

			$html .= '</table>';


			$total_percentage = 0;
			if ($request->major == 'College') {
				
				$data['percentage']['< 10%'] = Employer::where('percentage','<10%')->count();

				$data['percentage']['10 - 25%'] = Employer::where('percentage','10-25')->count();

				$data['percentage']['25 - 50%'] = Employer::where('percentage','25-50')->count();

				$data['percentage']['50 %'] = Employer::where('percentage','>50')->count();

			} else {

				$data['percentage']['< 10%'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('percentage','<10%')->count();

				$data['percentage']['10 - 25%'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('percentage','10-25')->count();

				$data['percentage']['25 - 50%'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('percentage','25-50')->count();

				$data['percentage']['50 %'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('percentage','>50')->count();

			}
			
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
			$prep_1['opt_1'] = Employer::where('prepared_1',1);
			if ($request->major != 'College') {
				$prep_1['opt_1'] = $prep_1['opt_1']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_1['opt_1'] = $prep_1['opt_1']->count();


			$prep_1['opt_2'] = Employer::where('prepared_1',2);
			if ($request->major != 'College') {
				$prep_1['opt_2'] = $prep_1['opt_2']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_1['opt_2'] = $prep_1['opt_2']->count();

			$prep_1['opt_3'] = Employer::where('prepared_1',3);
			if ($request->major != 'College') {
				$prep_1['opt_3'] = $prep_1['opt_3']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_1['opt_3'] = $prep_1['opt_3']->count();


			$prep_1['opt_4'] = Employer::where('prepared_1',4);
			if ($request->major != 'College') {
				$prep_1['opt_4'] = $prep_1['opt_4']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_1['opt_4'] = $prep_1['opt_4']->count();

			$prep_1['opt_5'] = Employer::where('prepared_1',5);
			if ($request->major != 'College') {
				$prep_1['opt_5'] = $prep_1['opt_5']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_1['opt_5'] = $prep_1['opt_5']->count();

			/*$prep_1['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_1',2)->count();
			$prep_1['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_1',3)->count();
			$prep_1['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_1',4)->count();
			$prep_1['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_1',5)->count();*/

			$data['prepared_1_1']['Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.'] = $prep_1;

			$prep_2 = array();
			/*$prep_2['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_2',1)->count();
			$prep_2['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_2',2)->count();
			$prep_2['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_2',3)->count();
			$prep_2['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_2',4)->count();
			$prep_2['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_2',5)->count();*/

			$prep_2['opt_1'] = Employer::where('prepared_2',1);
			if ($request->major != 'College') {
				$prep_2['opt_1'] = $prep_2['opt_1']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_2['opt_1'] = $prep_2['opt_1']->count();


			$prep_2['opt_2'] = Employer::where('prepared_2',2);
			if ($request->major != 'College') {
				$prep_2['opt_2'] = $prep_2['opt_2']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_2['opt_2'] = $prep_2['opt_2']->count();


			$prep_2['opt_3'] = Employer::where('prepared_2',3);
			if ($request->major != 'College') {
				$prep_2['opt_3'] = $prep_2['opt_3']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_2['opt_3'] = $prep_2['opt_3']->count();

			$prep_2['opt_4'] = Employer::where('prepared_2',4);
			if ($request->major != 'College') {
				$prep_2['opt_4'] = $prep_2['opt_4']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_2['opt_4'] = $prep_2['opt_4']->count();

			$prep_2['opt_5'] = Employer::where('prepared_2',5);
			if ($request->major != 'College') {
				$prep_2['opt_5'] = $prep_2['opt_5']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_2['opt_5'] = $prep_2['opt_5']->count();

			$data['prepared_1_2']['Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.'] = $prep_2;

			$prep_3 = array();
			/*$prep_3['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_3',1)->count();
			$prep_3['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_3',2)->count();
			$prep_3['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_3',3)->count();
			$prep_3['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_3',4)->count();
			$prep_3['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_3',5)->count();*/

			$prep_3['opt_1'] = Employer::where('prepared_3',1);
			if ($request->major != 'College') {
				$prep_3['opt_1'] = $prep_3['opt_1']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_3['opt_1'] = $prep_3['opt_1']->count();

			$prep_3['opt_2'] = Employer::where('prepared_3',2);
			if ($request->major != 'College') {
				$prep_3['opt_2'] = $prep_3['opt_2']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_3['opt_2'] = $prep_3['opt_2']->count();

			$prep_3['opt_3'] = Employer::where('prepared_3',3);
			if ($request->major != 'College') {
				$prep_3['opt_3'] = $prep_3['opt_3']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_3['opt_3'] = $prep_3['opt_3']->count();

			$prep_3['opt_4'] = Employer::where('prepared_3',4);
			if ($request->major != 'College') {
				$prep_3['opt_4'] = $prep_3['opt_4']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_3['opt_4'] = $prep_3['opt_4']->count();

			$prep_3['opt_5'] = Employer::where('prepared_3',5);
			if ($request->major != 'College') {
				$prep_3['opt_5'] = $prep_3['opt_5']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_3['opt_5'] = $prep_3['opt_5']->count();

			$data['prepared_1_3']['Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.'] = $prep_3;


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Rate the following skills, abilities, and knowledge in terms of the level of preparedness of recent Kuwait University engineering graduates</th><th>VWP</th><th>WP</th><th>P</th><th>SP</th><th>NP</th><th>Average</th></tr>';


			$html .= '<tr><td>Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <4; $i++) 
 			{
				foreach ($data['prepared_1_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 30;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 50;
							} 
							if ($i == 3) {
								$vwp = $vwp + $v * 20;
							} 
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 30;
							}
							if ($i == 2) {
								$wp = $wp + $v * 50;
							} 
							if ($i == 3) {
								$wp = $wp + $v * 20;
							} 
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 30;
							}
							if ($i == 2) {
								$p = $p + $v * 50;
							} 
							if ($i == 3) {
								$p = $p + $v * 20;
							}
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 30;
							}
							if ($i == 2) {
								$sp = $sp + $v * 50;
							} 
							if ($i == 3) {
								$sp = $sp + $v * 20;
							}
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 30;
							}
							if ($i == 2) {
								$np = $np + $v * 50;
							} 
							if ($i == 3) {
								$np = $np + $v * 20;
							}
						}
					}
				}
			}

			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';

			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;

			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';


			$prep_4 = array();
			/*$prep_4['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_4',1)->count();
			$prep_4['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_4',2)->count();
			$prep_4['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_4',3)->count();
			$prep_4['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_4',4)->count();
			$prep_4['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_4',5)->count();*/

			$prep_4['opt_1'] = Employer::where('prepared_4',1);
			if ($request->major != 'College') {
				$prep_4['opt_1'] = $prep_4['opt_1']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_4['opt_1'] = $prep_4['opt_1']->count();


			$prep_4['opt_2'] = Employer::where('prepared_4',2);
			if ($request->major != 'College') {
				$prep_4['opt_2'] = $prep_4['opt_2']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_4['opt_2'] = $prep_4['opt_2']->count();

			$prep_4['opt_3'] = Employer::where('prepared_4',3);
			if ($request->major != 'College') {
				$prep_4['opt_3'] = $prep_4['opt_3']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_4['opt_3'] = $prep_4['opt_3']->count();

			$prep_4['opt_4'] = Employer::where('prepared_4',4);
			if ($request->major != 'College') {
				$prep_4['opt_4'] = $prep_4['opt_4']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_4['opt_4'] = $prep_4['opt_4']->count();

			$prep_4['opt_5'] = Employer::where('prepared_4',5);
			if ($request->major != 'College') {
				$prep_4['opt_5'] = $prep_4['opt_5']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_4['opt_5'] = $prep_4['opt_5']->count();

			$data['prepared_2_1']['Use techniques, skills, and modern engineering tools necessary for Engineering design and professional practice (Computer, Internet, Engineering software, etc)'] = $prep_4;

			$prep_5 = array();
			/*$prep_5['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_5',1)->count();
			$prep_5['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_5',2)->count();
			$prep_5['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_5',3)->count();
			$prep_5['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_5',4)->count();
			$prep_5['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_5',5)->count();*/

			$prep_5['opt_1'] = Employer::where('prepared_5',1);
			if ($request->major != 'College') {
				$prep_5['opt_1'] = $prep_5['opt_1']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_5['opt_1'] = $prep_5['opt_1']->count();


			$prep_5['opt_2'] = Employer::where('prepared_5',2);
			if ($request->major != 'College') {
				$prep_5['opt_2'] = $prep_5['opt_2']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_5['opt_2'] = $prep_5['opt_2']->count();

			$prep_5['opt_3'] = Employer::where('prepared_5',3);
			if ($request->major != 'College') {
				$prep_5['opt_3'] = $prep_5['opt_3']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_5['opt_3'] = $prep_5['opt_3']->count();

			$prep_5['opt_4'] = Employer::where('prepared_5',4);
			if ($request->major != 'College') {
				$prep_5['opt_4'] = $prep_5['opt_4']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_5['opt_4'] = $prep_5['opt_4']->count();

			$prep_5['opt_5'] = Employer::where('prepared_5',5);
			if ($request->major != 'College') {
				$prep_5['opt_5'] = $prep_5['opt_5']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_5['opt_5'] = $prep_5['opt_5']->count();

			$data['prepared_2_2']['Design a system, component, or process to meet desired needs'] = $prep_5;


			$html .= '<tr><td>Apply engineering design to produce solutions that meet specified needs with consideration of public health, safety, and welfare, as well as global, cultural, social, environmental, and economic factors.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <3; $i++) 
 			{
				foreach ($data['prepared_2_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 40;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 60;
							} 
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 40;
							}
							if ($i == 2) {
								$wp = $wp + $v * 60;
							} 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 40;
							}
							if ($i == 2) {
								$p = $p + $v * 60;
							} 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 40;
							}
							if ($i == 2) {
								$sp = $sp + $v * 60;
							} 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 40;
							}
							if ($i == 2) {
								$np = $np + $v * 60;
							} 
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';

			
			$prep_6 = array();
			/*$prep_6['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_6',1)->count();
			$prep_6['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_6',2)->count();
			$prep_6['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_6',3)->count();
			$prep_6['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_6',4)->count();
			$prep_6['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_6',5)->count();*/

			$prep_6['opt_1'] = Employer::where('prepared_6',1);
			if ($request->major != 'College') {
				$prep_6['opt_1'] = $prep_6['opt_1']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_6['opt_1'] = $prep_6['opt_1']->count();


			$prep_6['opt_2'] = Employer::where('prepared_6',2);
			if ($request->major != 'College') {
				$prep_6['opt_2'] = $prep_6['opt_2']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_6['opt_2'] = $prep_6['opt_2']->count();

			$prep_6['opt_3'] = Employer::where('prepared_6',3);
			if ($request->major != 'College') {
				$prep_6['opt_3'] = $prep_6['opt_3']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_6['opt_3'] = $prep_6['opt_3']->count();

			$prep_6['opt_4'] = Employer::where('prepared_6',4);
			if ($request->major != 'College') {
				$prep_6['opt_4'] = $prep_6['opt_4']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_6['opt_4'] = $prep_6['opt_4']->count();

			$prep_6['opt_5'] = Employer::where('prepared_6',5);
			if ($request->major != 'College') {
				$prep_6['opt_5'] = $prep_6['opt_5']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_6['opt_5'] = $prep_6['opt_5']->count();

			$data['prepared_3_1']['Communicate orally: informal and prepared talks'] = $prep_6;

			$prep_7 = array();
			/*$prep_7['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_7',1)->count();
			$prep_7['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_7',2)->count();
			$prep_7['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_7',3)->count();
			$prep_7['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_7',4)->count();
			$prep_7['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_7',5)->count();*/

			$prep_7['opt_1'] = Employer::where('prepared_7',1);
			if ($request->major != 'College') {
				$prep_7['opt_1'] = $prep_7['opt_1']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_7['opt_1'] = $prep_7['opt_1']->count();


			$prep_7['opt_2'] = Employer::where('prepared_7',2);
			if ($request->major != 'College') {
				$prep_7['opt_2'] = $prep_7['opt_2']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_7['opt_2'] = $prep_7['opt_2']->count();

			$prep_7['opt_3'] = Employer::where('prepared_7',3);
			if ($request->major != 'College') {
				$prep_7['opt_3'] = $prep_7['opt_3']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_7['opt_3'] = $prep_7['opt_3']->count();

			$prep_7['opt_4'] = Employer::where('prepared_7',4);
			if ($request->major != 'College') {
				$prep_7['opt_4'] = $prep_7['opt_4']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_7['opt_4'] = $prep_7['opt_4']->count();

			$prep_7['opt_5'] = Employer::where('prepared_7',5);
			if ($request->major != 'College') {
				$prep_7['opt_5'] = $prep_7['opt_5']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_7['opt_5'] = $prep_7['opt_5']->count();

			$data['prepared_3_2']['Communicate in writing: letters, technical reports, etc'] = $prep_7;


			$html .= '<tr><td>Communicate effectively with a range of audiences.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <3; $i++) 
 			{
				foreach ($data['prepared_3_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 50;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 50;
							} 
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 50;
							}
							if ($i == 2) {
								$wp = $wp + $v * 50;
							} 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 50;
							}
							if ($i == 2) {
								$p = $p + $v * 50;
							} 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 50;
							}
							if ($i == 2) {
								$sp = $sp + $v * 50;
							} 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 50;
							}
							if ($i == 2) {
								$np = $np + $v * 50;
							} 
							
						}
						if ($k == 'opt_6') {
							if ($i == 1) {
								$cne = $cne + $v * 50;
							}
							if ($i == 2) {
								$cne = $cne + $v * 50;
							} 
							
						}
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';


			$prep_8 = array();
			/*$prep_8['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_8',1)->count();
			$prep_8['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_8',2)->count();
			$prep_8['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_8',3)->count();
			$prep_8['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_8',4)->count();
			$prep_8['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_8',5)->count();*/

			$prep_8['opt_1'] = Employer::where('prepared_8',1);
			if ($request->major != 'College') {
				$prep_8['opt_1'] = $prep_8['opt_1']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_8['opt_1'] = $prep_8['opt_1']->count();


			$prep_8['opt_2'] = Employer::where('prepared_8',2);
			if ($request->major != 'College') {
				$prep_8['opt_2'] = $prep_8['opt_2']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_8['opt_2'] = $prep_8['opt_2']->count();

			$prep_8['opt_3'] = Employer::where('prepared_8',3);
			if ($request->major != 'College') {
				$prep_8['opt_3'] = $prep_8['opt_3']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_8['opt_3'] = $prep_8['opt_3']->count();

			$prep_8['opt_4'] = Employer::where('prepared_8',4);
			if ($request->major != 'College') {
				$prep_8['opt_4'] = $prep_8['opt_4']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_8['opt_4'] = $prep_8['opt_4']->count();

			$prep_8['opt_5'] = Employer::where('prepared_8',5);
			if ($request->major != 'College') {
				$prep_8['opt_5'] = $prep_8['opt_5']->where('majors', 'like', '%'.$request->major.'%');
			}
			$prep_8['opt_5'] = $prep_8['opt_5']->count();

			$data['prepared_4_1']['Recognize ethical and professional responsibilities in engineering situations and make informed judgments, which must consider the impact of engineering solutions in global, economic, environmental, and societal contexts.'] = $prep_8;


			$prep_9 = array();
			$prep_9['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_9',1)->count();
			$prep_9['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_9',2)->count();
			$prep_9['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_9',3)->count();
			$prep_9['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_9',4)->count();
			$prep_9['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_9',5)->count();
			$data['prepared_4_2']['Recognize ethical and professional responsibilities in engineering situations and make informed judgments, which must consider the impact of engineering solutions in global, economic, environmental, and societal contexts.'] = $prep_9;


			$prep_10 = array();
			$prep_10['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_10',1)->count();
			$prep_10['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_10',2)->count();
			$prep_10['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_10',3)->count();
			$prep_10['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_10',4)->count();
			$prep_10['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_10',5)->count();
			$data['prepared_4_3']['Recognize ethical and professional responsibilities in engineering situations and make informed judgments, which must consider the impact of engineering solutions in global, economic, environmental, and societal contexts.'] = $prep_10;


			$html .= '<tr><td>Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <4; $i++) 
 			{
				foreach ($data['prepared_4_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 40;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 40;
							} 
							if ($i == 3) {
								$vwp = $vwp + $v * 20;
							} 
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 40;
							}
							if ($i == 2) {
								$wp = $wp + $v * 40;
							} 
							if ($i == 3) {
								$wp = $wp + $v * 20;
							} 
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 40;
							}
							if ($i == 2) {
								$p = $p + $v * 40;
							} 
							if ($i == 3) {
								$p = $p + $v * 20;
							}
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 40;
							}
							if ($i == 2) {
								$sp = $sp + $v * 40;
							} 
							if ($i == 3) {
								$sp = $sp + $v * 20;
							}
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 40;
							}
							if ($i == 2) {
								$np = $np + $v * 40;
							} 
							if ($i == 3) {
								$np = $np + $v * 20;
							}
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';

			
			$prep_11 = array();
			$prep_11['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_11',1)->count();
			$prep_11['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_11',2)->count();
			$prep_11['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_11',3)->count();
			$prep_11['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_11',4)->count();
			$prep_11['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_11',5)->count();
			$data['prepared_5_1']['Function effectively on a team whose members together provide leadership, create a collaborative and inclusive environment, establish goals, plan tasks, and meet objectives.'] = $prep_11;


			$prep_12 = array();
			$prep_12['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_12',1)->count();
			$prep_12['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_12',2)->count();
			$prep_12['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_12',3)->count();
			$prep_12['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_12',4)->count();
			$prep_12['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_12',5)->count();
			$data['prepared_5_2']['Function effectively on a team whose members together provide leadership, create a collaborative and inclusive environment, establish goals, plan tasks, and meet objectives.'] = $prep_12;


			$html .= '<tr><td>Function effectively on a team whose members together provide leadership, create a collaborative and inclusive environment, establish goals, plan tasks, and meet objectives.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <3; $i++) 
 			{
				foreach ($data['prepared_5_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 80;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 20;
							} 
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 80;
							}
							if ($i == 2) {
								$wp = $wp + $v * 20;
							} 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 80;
							}
							if ($i == 2) {
								$p = $p + $v * 20;
							} 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 80;
							}
							if ($i == 2) {
								$sp = $sp + $v * 20;
							} 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 80;
							}
							if ($i == 2) {
								$np = $np + $v * 20;
							} 
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';

			$prep_13 = array();
			$prep_13['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_13',1)->count();
			$prep_13['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_13',2)->count();
			$prep_13['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_13',3)->count();
			$prep_13['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_13',4)->count();
			$prep_13['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_13',5)->count();
			$data['prepared_6_1']['Develop and conduct appropriate experimentation, analyze and interpret data, and use engineering judgment to draw conclusions.'] = $prep_13;

			$html .= '<tr><td>Develop and conduct appropriate experimentation, analyze and interpret data, and use engineering judgment to draw conclusions.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;  $cne = 0;
			for ($i=1; $i <2; $i++) 
 			{
				foreach ($data['prepared_6_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 100;
							}
							
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 100;
							}
							 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 100;
							}
							 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 100;
							}
							 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 100;
							}
							
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';

			$prep_14 = array();
			$prep_14['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_14',1)->count();
			$prep_14['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_14',2)->count();
			$prep_14['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_14',3)->count();
			$prep_14['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_14',4)->count();
			$prep_14['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_14',5)->count();
			$data['prepared_7_1']['Acquire and apply new knowledge as needed, using appropriate learning strategies.'] = $prep_14;

			$prep_15 = array();
			$prep_15['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_15',1)->count();
			$prep_15['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_15',2)->count();
			$prep_15['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_15',3)->count();
			$prep_15['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_15',4)->count();
			$prep_15['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('prepared_15',5)->count();
			$data['prepared_7_2']['Acquire and apply new knowledge as needed, using appropriate learning strategies.'] = $prep_15;


			$html .= '<tr><td>Acquire and apply new knowledge as needed, using appropriate learning strategies.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <3; $i++) 
 			{
				foreach ($data['prepared_7_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 70;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 30;
							} 
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 70;
							}
							if ($i == 2) {
								$wp = $wp + $v * 30;
							} 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 70;
							}
							if ($i == 2) {
								$p = $p + $v * 30;
							} 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 70;
							}
							if ($i == 2) {
								$sp = $sp + $v * 30;
							} 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 70;
							}
							if ($i == 2) {
								$np = $np + $v * 30;
							} 
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';


			 	/*for ($i=1; $i <2; $i++) 
			 	{

			 		$weight = 5; 
					$sum = 0;
					$multi_sum = 0;
					foreach ($data['prepared_'.$i] as $key => $value) {
						$html .= '<tr><td rowspan="3">'.$key.'</td>';
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
				}*/
			$html .= '</table>';




			/* important */
			/*$prep_1 = array();
			$prep_1['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',1)->count();
			$prep_1['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',2)->count();
			$prep_1['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',3)->count();
			$prep_1['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',4)->count();
			$prep_1['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',5)->count();
			$prep_1['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',6)->count();
			$data['important_1']['Apply mathematics, science and engineering knowledge'] = $prep_1;

			$prep_2 = array();
			$prep_2['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',1)->count();
			$prep_2['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',2)->count();
			$prep_2['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',3)->count();
			$prep_2['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',4)->count();
			$prep_2['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',5)->count();
			$prep_2['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',6)->count();
			$data['important_2']['Identify, formulate, and solve engineering problems'] = $prep_2;

			$prep_3 = array();
			$prep_3['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',1)->count();
			$prep_3['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',2)->count();
			$prep_3['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',3)->count();
			$prep_3['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',4)->count();
			$prep_3['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',5)->count();
			$prep_3['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',6)->count();
			$data['important_3']['Develop new or innovative ideas and work independently'] = $prep_3;

			$prep_4 = array();
			$prep_4['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',1)->count();
			$prep_4['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',2)->count();
			$prep_4['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',3)->count();
			$prep_4['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',4)->count();
			$prep_4['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',5)->count();
			$prep_4['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',6)->count();
			$data['important_4']['Use techniques, skills, and modern engineering tools necessary for Engineering design and professional practice (Computer, Internet, Engineering software, etc)'] = $prep_4;

			$prep_5 = array();
			$prep_5['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',1)->count();
			$prep_5['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',2)->count();
			$prep_5['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',3)->count();
			$prep_5['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',4)->count();
			$prep_5['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',5)->count();
			$prep_5['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',6)->count();
			$data['important_5']['Design a system, component, or process to meet desired needs'] = $prep_5;

			$prep_6 = array();
			$prep_6['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',1)->count();
			$prep_6['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',2)->count();
			$prep_6['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',3)->count();
			$prep_6['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',4)->count();
			$prep_6['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',5)->count();
			$prep_6['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',6)->count();
			$data['important_6']['Communicate orally: informal and prepared talks'] = $prep_6;

			$prep_7 = array();
			$prep_7['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',1)->count();
			$prep_7['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',2)->count();
			$prep_7['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',3)->count();
			$prep_7['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',4)->count();
			$prep_7['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',5)->count();
			$prep_7['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',6)->count();
			$data['important_7']['Communicate in writing: letters, technical reports, etc'] = $prep_7;


			$prep_8 = array();
			$prep_8['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',1)->count();
			$prep_8['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',2)->count();
			$prep_8['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',3)->count();
			$prep_8['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',4)->count();
			$prep_8['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',5)->count();
			$prep_8['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',6)->count();
			$data['important_8']['Understand professional and ethical responsibility'] = $prep_8;


			$prep_9 = array();
			$prep_9['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',1)->count();
			$prep_9['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',2)->count();
			$prep_9['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',3)->count();
			$prep_9['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',4)->count();
			$prep_9['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',5)->count();
			$prep_9['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',6)->count();
			$data['important_9']['Understand impact of engineering solutions in a global/societal context'] = $prep_9;


			$prep_10 = array();
			$prep_10['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',1)->count();
			$prep_10['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',2)->count();
			$prep_10['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',3)->count();
			$prep_10['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',4)->count();
			$prep_10['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',5)->count();
			$prep_10['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',6)->count();
			$data['important_10']['Understand contemporary social, economic, and cultural issues'] = $prep_10;


			$prep_11 = array();
			$prep_11['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',1)->count();
			$prep_11['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',2)->count();
			$prep_11['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',3)->count();
			$prep_11['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',4)->count();
			$prep_11['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',5)->count();
			$prep_11['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',6)->count();
			$data['important_11']['Work in teams and develop leadership skills'] = $prep_11;


			$prep_12 = array();
			$prep_12['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',1)->count();
			$prep_12['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',2)->count();
			$prep_12['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',3)->count();
			$prep_12['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',4)->count();
			$prep_12['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',5)->count();
			$prep_12['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',6)->count();
			$data['important_12']['Function effectively in international and multicultural contexts'] = $prep_12;

			$prep_13 = array();
			$prep_13['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',1)->count();
			$prep_13['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',2)->count();
			$prep_13['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',3)->count();
			$prep_13['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',4)->count();
			$prep_13['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',5)->count();
			$prep_13['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',6)->count();
			$data['important_13']['Design and conduct experiments, analyze, and interpret data'] = $prep_13;

			$prep_14 = array();
			$prep_14['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',1)->count();
			$prep_14['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',2)->count();
			$prep_14['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',3)->count();
			$prep_14['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',4)->count();
			$prep_14['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',5)->count();
			$prep_14['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',6)->count();
			$data['important_14']['Learn new skills and stay current technically and professionally'] = $prep_14;

			$prep_15 = array();
			$prep_15['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',1)->count();
			$prep_15['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',2)->count();
			$prep_15['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',3)->count();
			$prep_15['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',4)->count();
			$prep_15['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',5)->count();
			$prep_15['opt_6'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',6)->count();
			$data['important_15']['Recognize the need to engage in lifelong learning'] = $prep_15;


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Rate each item according to its importance to your business and operations</th><th>EI</th><th>VI</th><th>I</th><th>SI</th><th>NI</th><th>CNE</th><th>Average</th></tr>';

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
			$html .= '</table>';*/


			/* prepared */
			$impot_1 = array();
			$impot_1['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',1)->count();
			$impot_1['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',2)->count();
			$impot_1['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',3)->count();
			$impot_1['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',4)->count();
			$impot_1['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_1',5)->count();
			$data['important_1_1']['Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.'] = $impot_1;

			$impot_2 = array();
			$impot_2['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',1)->count();
			$impot_2['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',2)->count();
			$impot_2['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',3)->count();
			$impot_2['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',4)->count();
			$impot_2['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_2',5)->count();
			$data['important_1_2']['Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.'] = $impot_2;

			$impot_3 = array();
			$impot_3['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',1)->count();
			$impot_3['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',2)->count();
			$impot_3['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',3)->count();
			$impot_3['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',4)->count();
			$impot_3['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_3',5)->count();
			$data['important_1_3']['Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.'] = $impot_3;


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Rate the following skills, abilities, and knowledge in terms of the level of preparedness of recent Kuwait University engineering graduates</th><th>VWP</th><th>WP</th><th>P</th><th>SP</th><th>NP</th><th>Average</th></tr>';


			$html .= '<tr><td>Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <4; $i++) 
 			{
				foreach ($data['important_1_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 30;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 50;
							} 
							if ($i == 3) {
								$vwp = $vwp + $v * 20;
							} 
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 30;
							}
							if ($i == 2) {
								$wp = $wp + $v * 50;
							} 
							if ($i == 3) {
								$wp = $wp + $v * 20;
							} 
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 30;
							}
							if ($i == 2) {
								$p = $p + $v * 50;
							} 
							if ($i == 3) {
								$p = $p + $v * 20;
							}
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 30;
							}
							if ($i == 2) {
								$sp = $sp + $v * 50;
							} 
							if ($i == 3) {
								$sp = $sp + $v * 20;
							}
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 30;
							}
							if ($i == 2) {
								$np = $np + $v * 50;
							} 
							if ($i == 3) {
								$np = $np + $v * 20;
							}
						}
						
					}
				}
			}

			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';

			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';


			$prep_4 = array();
			$prep_4['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',1)->count();
			$prep_4['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',2)->count();
			$prep_4['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',3)->count();
			$prep_4['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',4)->count();
			$prep_4['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_4',5)->count();
			$data['important_2_1']['Use techniques, skills, and modern engineering tools necessary for Engineering design and professional practice (Computer, Internet, Engineering software, etc)'] = $prep_4;

			$prep_5 = array();
			$prep_5['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',1)->count();
			$prep_5['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',2)->count();
			$prep_5['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',3)->count();
			$prep_5['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',4)->count();
			$prep_5['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_5',5)->count();
			$data['important_2_2']['Design a system, component, or process to meet desired needs'] = $prep_5;


			$html .= '<tr><td>Apply engineering design to produce solutions that meet specified needs with consideration of public health, safety, and welfare, as well as global, cultural, social, environmental, and economic factors.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <3; $i++) 
 			{
				foreach ($data['important_2_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 40;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 60;
							} 
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 40;
							}
							if ($i == 2) {
								$wp = $wp + $v * 60;
							} 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 40;
							}
							if ($i == 2) {
								$p = $p + $v * 60;
							} 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 40;
							}
							if ($i == 2) {
								$sp = $sp + $v * 60;
							} 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 40;
							}
							if ($i == 2) {
								$np = $np + $v * 60;
							} 
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';

			
			$prep_6 = array();
			$prep_6['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',1)->count();
			$prep_6['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',2)->count();
			$prep_6['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',3)->count();
			$prep_6['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',4)->count();
			$prep_6['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_6',5)->count();
			$data['important_3_1']['Communicate orally: informal and prepared talks'] = $prep_6;

			$prep_7 = array();
			$prep_7['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',1)->count();
			$prep_7['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',2)->count();
			$prep_7['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',3)->count();
			$prep_7['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',4)->count();
			$prep_7['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_7',5)->count();
			$data['important_3_2']['Communicate in writing: letters, technical reports, etc'] = $prep_7;


			$html .= '<tr><td>Communicate effectively with a range of audiences.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <3; $i++) 
 			{
				foreach ($data['important_3_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 50;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 50;
							} 
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 50;
							}
							if ($i == 2) {
								$wp = $wp + $v * 50;
							} 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 50;
							}
							if ($i == 2) {
								$p = $p + $v * 50;
							} 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 50;
							}
							if ($i == 2) {
								$sp = $sp + $v * 50;
							} 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 50;
							}
							if ($i == 2) {
								$np = $np + $v * 50;
							} 
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';


			$prep_8 = array();
			$prep_8['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',1)->count();
			$prep_8['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',2)->count();
			$prep_8['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',3)->count();
			$prep_8['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',4)->count();
			$prep_8['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_8',5)->count();
			$data['important_4_1']['Recognize ethical and professional responsibilities in engineering situations and make informed judgments, which must consider the impact of engineering solutions in global, economic, environmental, and societal contexts.'] = $prep_8;


			$prep_9 = array();
			$prep_9['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',1)->count();
			$prep_9['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',2)->count();
			$prep_9['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',3)->count();
			$prep_9['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',4)->count();
			$prep_9['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_9',5)->count();
			$data['important_4_2']['Recognize ethical and professional responsibilities in engineering situations and make informed judgments, which must consider the impact of engineering solutions in global, economic, environmental, and societal contexts.'] = $prep_9;


			$prep_10 = array();
			$prep_10['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',1)->count();
			$prep_10['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',2)->count();
			$prep_10['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',3)->count();
			$prep_10['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',4)->count();
			$prep_10['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_10',5)->count();
			$data['important_4_3']['Recognize ethical and professional responsibilities in engineering situations and make informed judgments, which must consider the impact of engineering solutions in global, economic, environmental, and societal contexts.'] = $prep_10;


			$html .= '<tr><td>Identify, formulate, and solve complex engineering problems by applying principles of engineering, science, and mathematics.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <4; $i++) 
 			{
				foreach ($data['important_4_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 40;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 40;
							} 
							if ($i == 3) {
								$vwp = $vwp + $v * 20;
							} 
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 40;
							}
							if ($i == 2) {
								$wp = $wp + $v * 40;
							} 
							if ($i == 3) {
								$wp = $wp + $v * 20;
							} 
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 40;
							}
							if ($i == 2) {
								$p = $p + $v * 40;
							} 
							if ($i == 3) {
								$p = $p + $v * 20;
							}
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 40;
							}
							if ($i == 2) {
								$sp = $sp + $v * 40;
							} 
							if ($i == 3) {
								$sp = $sp + $v * 20;
							}
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 40;
							}
							if ($i == 2) {
								$np = $np + $v * 40;
							} 
							if ($i == 3) {
								$np = $np + $v * 20;
							}
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';

			
			$prep_11 = array();
			$prep_11['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',1)->count();
			$prep_11['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',2)->count();
			$prep_11['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',3)->count();
			$prep_11['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',4)->count();
			$prep_11['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_11',5)->count();
			$data['important_5_1']['Function effectively on a team whose members together provide leadership, create a collaborative and inclusive environment, establish goals, plan tasks, and meet objectives.'] = $prep_11;


			$prep_12 = array();
			$prep_12['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',1)->count();
			$prep_12['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',2)->count();
			$prep_12['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',3)->count();
			$prep_12['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',4)->count();
			$prep_12['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_12',5)->count();
			$data['important_5_2']['Function effectively on a team whose members together provide leadership, create a collaborative and inclusive environment, establish goals, plan tasks, and meet objectives.'] = $prep_12;


			$html .= '<tr><td>Function effectively on a team whose members together provide leadership, create a collaborative and inclusive environment, establish goals, plan tasks, and meet objectives.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0;
			for ($i=1; $i <3; $i++) 
 			{
				foreach ($data['important_5_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 80;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 20;
							} 
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 80;
							}
							if ($i == 2) {
								$wp = $wp + $v * 20;
							} 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 80;
							}
							if ($i == 2) {
								$p = $p + $v * 20;
							} 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 80;
							}
							if ($i == 2) {
								$sp = $sp + $v * 20;
							} 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 80;
							}
							if ($i == 2) {
								$np = $np + $v * 20;
							} 
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';

			$prep_13 = array();
			$prep_13['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',1)->count();
			$prep_13['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',2)->count();
			$prep_13['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',3)->count();
			$prep_13['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',4)->count();
			$prep_13['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_13',5)->count();
			$data['important_6_1']['Develop and conduct appropriate experimentation, analyze and interpret data, and use engineering judgment to draw conclusions.'] = $prep_13;

			$html .= '<tr><td>Develop and conduct appropriate experimentation, analyze and interpret data, and use engineering judgment to draw conclusions.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0; 
			for ($i=1; $i <2; $i++) 
 			{
				foreach ($data['important_6_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 100;
							}
							
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 100;
							}
							 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 100;
							}
							 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 100;
							}
							 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 100;
							}
							
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';

			$prep_14 = array();
			$prep_14['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',1)->count();
			$prep_14['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',2)->count();
			$prep_14['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',3)->count();
			$prep_14['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',4)->count();
			$prep_14['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_14',5)->count();
			$data['important_7_1']['Acquire and apply new knowledge as needed, using appropriate learning strategies.'] = $prep_14;

			$prep_15 = array();
			$prep_15['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',1)->count();
			$prep_15['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',2)->count();
			$prep_15['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',3)->count();
			$prep_15['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',4)->count();
			$prep_15['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('important_15',5)->count();
			$data['important_7_2']['Acquire and apply new knowledge as needed, using appropriate learning strategies.'] = $prep_15;


			$html .= '<tr><td>Acquire and apply new knowledge as needed, using appropriate learning strategies.</td>';
			$vwp = 0;  $wp = 0;  $p = 0;  $sp = 0; $np = 0; 
			for ($i=1; $i <3; $i++) 
 			{
				foreach ($data['important_7_'.$i] as $key => $value) {
					foreach ($value as $k => $v) 
					{
						if ($k == 'opt_1') {

							if ($i == 1) {
								$vwp = $vwp + $v * 70;
							}
							if ($i == 2) {
								$vwp = $vwp + $v * 30;
							} 
							
						}
						if ($k == 'opt_2') {
							if ($i == 1) {
								$wp = $wp + $v * 70;
							}
							if ($i == 2) {
								$wp = $wp + $v * 30;
							} 
							
						}
						if ($k == 'opt_3') {
							if ($i == 1) {
								$p = $p + $v * 70;
							}
							if ($i == 2) {
								$p = $p + $v * 30;
							} 
							
						}
						if ($k == 'opt_4') {
							if ($i == 1) {
								$sp = $sp + $v * 70;
							}
							if ($i == 2) {
								$sp = $sp + $v * 30;
							} 
							
						}
						if ($k == 'opt_5') {
							if ($i == 1) {
								$np = $np + $v * 70;
							}
							if ($i == 2) {
								$np = $np + $v * 30;
							} 
							
						}
						
					}
				}
			}
			$html .= '<td>'.$vwp.'%</td>';
			$html .= '<td>'.$wp.'%</td>';
			$html .= '<td>'.$p.'%</td>';
			$html .= '<td>'.$sp.'%</td>';
			$html .= '<td>'.$np.'%</td>';
			
			$total = $vwp + $wp + $p + $sp + $np;
			$vwp_multi =  $vwp * 5;
			$wp_multi =  $wp * 4;
			$p_multi =  $p * 3;
			$sp_multi =  $sp * 2;
			$np_multi =  $np * 1;

			$multi_sum = $vwp_multi + $wp_multi + $p_multi + $sp_multi + $np_multi;
			if ($total != 0) {
			$avg = $multi_sum / $total;
			} else {
				$avg = 0;
			}
			$html .= '<td>'.number_format((float)$avg, 2, '.', '').'</td></tr>';


			 	/*for ($i=1; $i <2; $i++) 
			 	{

			 		$weight = 5; 
					$sum = 0;
					$multi_sum = 0;
					foreach ($data['prepared_'.$i] as $key => $value) {
						$html .= '<tr><td rowspan="3">'.$key.'</td>';
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
				}*/
			$html .= '</table>';

			/* significant */
			$prep_1 = array();
			$prep_1['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_1',1)->count();
			$prep_1['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_1',2)->count();
			$prep_1['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_1',3)->count();
			$prep_1['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_1',4)->count();
			$data['significant_1']['Contribution to company/workplace/institution (e.g., improve product/service quality, increase productivity, increase revenues, reduce expenses, improve customer satisfaction)'] = $prep_1;

			$prep_2 = array();
			$prep_2['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_2',1)->count();
			$prep_2['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_2',2)->count();
			$prep_2['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_2',3)->count();
			$prep_2['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_2',4)->count();
			$data['significant_2']['Contribution to wellbeing of society and the environment (e.g., safeguard the interest of society, improve economy, develop professional standards and best practices, safeguard and improve the environment)'] = $prep_2;

			$prep_3 = array();
			$prep_3['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_3',1)->count();
			$prep_3['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_3',2)->count();
			$prep_3['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_3',3)->count();
			$prep_3['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_3',4)->count();
			$data['significant_3']['Career advancement (e.g., promotion to higher ranks/positions, increased responsibilities)'] = $prep_3;

			$prep_4 = array();
			$prep_4['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_4',1)->count();
			$prep_4['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_4',2)->count();
			$prep_4['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_4',3)->count();
			$prep_4['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_4',4)->count();
			$data['significant_4']['Degree advancement and continuing education. (e.g., diplomas, formal course work, graduate courses, graduate degree, training, certificates and professional certification)'] = $prep_4;

			$prep_5 = array();
			$prep_5['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_5',1)->count();
			$prep_5['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_5',2)->count();
			$prep_5['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_5',3)->count();
			$prep_5['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_5',4)->count();
			$data['significant_5']['Staying current in profession (e.g., participation in seminars and conferences, professional development courses and activities, membership in professional societies)'] = $prep_5;

			$prep_6 = array();
			$prep_6['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_6',1)->count();
			$prep_6['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_6',2)->count();
			$prep_6['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_6',3)->count();
			$prep_6['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('significant_6',4)->count();
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
			$prep_1['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_1',1)->count();
			$prep_1['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_1',2)->count();
			$prep_1['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_1',3)->count();
			$prep_1['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_1',4)->count();
			$prep_1['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_1',5)->count();
			$data['objectives_important_1']['Contribution to company/workplace/institution (e.g., improve product/service quality, increase productivity, increase revenues, reduce expenses, improve customer satisfaction)'] = $prep_1;

			$prep_2 = array();
			$prep_2['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_2',1)->count();
			$prep_2['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_2',2)->count();
			$prep_2['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_2',3)->count();
			$prep_2['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_2',4)->count();
			$prep_2['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_2',5)->count();
			$data['objectives_important_2']['Contribution to wellbeing of society and the environment (e.g., safeguard the interest of society, improve economy, develop professional standards and best practices, safeguard and improve the environment)'] = $prep_2;

			$prep_3 = array();
			$prep_3['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_3',1)->count();
			$prep_3['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_3',2)->count();
			$prep_3['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_3',3)->count();
			$prep_3['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_3',4)->count();
			$prep_3['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_3',5)->count();
			$data['objectives_important_3']['Career advancement (e.g., promotion to higher ranks/positions, increased responsibilities)'] = $prep_3;

			$prep_4 = array();
			$prep_4['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_4',1)->count();
			$prep_4['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_4',2)->count();
			$prep_4['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_4',3)->count();
			$prep_4['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_4',4)->count();
			$prep_4['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_4',5)->count();
			$data['objectives_important_4']['Degree advancement and continuing education. (e.g., diplomas, formal course work, graduate courses, graduate degree, training, certificates and professional certification)'] = $prep_4;

			$prep_5 = array();
			$prep_5['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_5',1)->count();
			$prep_5['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_5',2)->count();
			$prep_5['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_5',3)->count();
			$prep_5['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_5',4)->count();
			$prep_5['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_5',5)->count();
			$data['objectives_important_5']['Staying current in profession (e.g., participation in seminars and conferences, professional development courses and activities, membership in professional societies)'] = $prep_5;

			$prep_6 = array();
			$prep_6['opt_1'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_6',1)->count();
			$prep_6['opt_2'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_6',2)->count();
			$prep_6['opt_3'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_6',3)->count();
			$prep_6['opt_4'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_6',4)->count();
			$prep_6['opt_5'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('objectives_important_6',5)->count();
			$data['objectives_important_6']['Use of leadership capabilities (e.g., promotion to leadership positions, ability to lead teams, supervisory skills and abilities)'] = $prep_6;


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>The level of attainment of our graduates</th><th>EI</th><th>VI</th><th>I</th><th>SI</th><th>NI</th><th>Average</th></tr>';

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


			/* Question  */
			// $total_abilities_knowledge = 0;
			$data['abilities_knowledge'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('abilities_knowledge','!=', null)->get();
			

			$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;"> Are there other skills, abilities, or knowledge you regard as being important when employing recent graduates? Please outline these below</th></tr>';
				foreach ($data['abilities_knowledge'] as $k1 => $v1) 
				{
					$html .= '<tr><td>'.$v1->abilities_knowledge.'</td></tr>';
					// $total_abilities_knowledge = $total_abilities_knowledge + $v1;

				}
				// $html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_abilities_knowledge.'</td></tr>';
			$html .= '</table>';



			/* compare_a */
			$data['compare_a']['Strongly recommend'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_a','Strongly recommend')->count();
			$data['compare_a']['Somewhat better'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_a','Somewhat better')->count();
			$data['compare_a']['Not as good'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_a','Not as good')->count();
			$data['compare_a']['Much worse'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_a','Much worse')->count();
			$data['compare_a']['About the same'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_a','About the same')->count();



			$total_compare = 0;
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">in terms of technical knowledge and skills</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['compare_a'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_compare = $total_compare + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_compare.'</td></tr>';

			$html .= '</table>';


			/* compare_b */
			$data['compare_b']['Strongly recommend'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_b','Strongly recommend')->count();
			$data['compare_b']['Somewhat better'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_b','Somewhat better')->count();
			$data['compare_b']['Not as good'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_b','Not as good')->count();
			$data['compare_b']['Much worse'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_b','Much worse')->count();
			$data['compare_b']['About the same'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('compare_b','About the same')->count();

			$total_compare = 0;
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">in terms of communication, teamwork and leadership qualities</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['compare_b'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_compare = $total_compare + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_compare.'</td></tr>';

			$html .= '</table>';


			/* necessary */
			$total_necessary = 0;
			$data['necessary']['Yes'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('necessary', '=', 1)->count();
			$data['necessary']['No'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('necessary', '=', 0)->count();
			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Have you find it necessary to provide training to the graduates of Kuwait University during the first year of their employment in your organization?</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['necessary'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_necessary = $total_necessary + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_necessary.'</td></tr>';

			$html .= '</table>';


			/* hiring */
			$total_hiring = 0;
			$data['hiring']['Yes'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('hiring', '=', 1)->count();
			$data['hiring']['No'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('hiring', '=', 0)->count();
			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Is hiring a Kuwait University graduate your first preference?</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['hiring'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_hiring = $total_hiring + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_hiring.'</td></tr>';

			$html .= '</table>';

			/* particular */
			// $particular_strengths = 0;
			$data['particular_strengths'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('particular_strengths_1','!=', null)->get();

			$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;"> What particular strengths do you perceive Kuwait University engineering graduates possess?</th></tr>';
				foreach ($data['particular_strengths'] as $k1 => $v1) 
				{
					// $html .= '<tr><td>'.$v1->particular_strengths_1.'</td></tr>';
					$html .= '<tr><td>'.$v1->particular_strengths_1.'<br>'.$v1->particular_strengths_2.'<br>'.$v1->particular_strengths_3.'</td></tr>';

					// $particular_strengths = $particular_strengths + $v1;

				}
			$html .= '</table>';



			/* participating */
			// $preparation = 0;
			$data['preparation'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('preparation_1','!=', null)->get();

			$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">In what areas should Kuwait University improve its preparation of engineering graduates for employment?</th></tr>';
				foreach ($data['preparation'] as $k1 => $v1) 
				{
					// $html .= '<tr><td>'.$v1->preparation.'</td></tr>';
					$html .= '<tr><td>'.$v1->preparation_1.'<br>'.$v1->preparation_2.'<br>'.$v1->preparation_3.'</td></tr>';


				}
			$html .= '</table>';


			/* summary_report */
			$total_summary_report = 0;
			$data['summary_report']['Yes'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('summary_report', '=', 1)->count();
			$data['summary_report']['No'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('summary_report', '=', 0)->count();
			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Would you be interested in receiving a summary report on the College of Engineering Employer Survey of 2022 ??? 2023?</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['summary_report'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_summary_report = $total_summary_report + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_summary_report.'</td></tr>';

			$html .= '</table>';


			/* participating  */
			$total_participating = 0;
			$data['participating']['Yes'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('participating', '=', 1)->count();
			$data['participating']['No'] = Employer::where('majors', 'like', '%'.$request->major.'%')->where('participating', '=', 0)->count();
			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Would you be interested in participating at a luncheon briefing with other employers and faculty staff on the results of the College of Engineering Employer Survey of 2022 ??? 2023?</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['participating'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_participating = $total_participating + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_participating.'</td></tr>';

			$html .= '</table>';


		}



		return $html;
	}
}
