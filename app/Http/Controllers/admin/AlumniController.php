<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use DB;

class AlumniController extends Controller
{

	public function index()
	{
		return view('admin.alumni.index');
	}

	public function getReport(Request $request)
	{ 
		$data = array();
		$html = '';

		if ($request->departm != 'College' && $request->response != 'response' && $request->select_all != 'select_all') {

			$major = Alumni::where('major',$request->departm)->count();
			
			$data['major'][$request->departm] = $major;

		}
		else
		{
			
			// $major_Unspecified = Alumni::where('major','')->count();
			// $data['major']['Unspecified'] = $major_Unspecified;

			$major_chemical = Alumni::where('major','Chemical')->count();
			$data['major']['Chemical'] = $major_chemical;

			$major_Civil = Alumni::where('major','Civil')->count();
			$data['major']['Civil'] = $major_Civil;

			$major_Computer = Alumni::where('major','Computer')->count();
			$data['major']['Computer'] = $major_Computer;

			$major_Electrical = Alumni::where('major','Electrical')->count();
			$data['major']['Electrical'] = $major_Electrical;

			$major_Mechanical = Alumni::where('major','Mechanical')->count();
			$data['major']['Mechanical'] = $major_Mechanical;

			$major_Petroleum = Alumni::where('major','Petroleum')->count();
			$data['major']['Petroleum'] = $major_Petroleum;

			$major_Petroleum = Alumni::where('major','Petroleum')->count();
			$data['major']['Petroleum'] = $major_Petroleum;

			$major_Industrial = Alumni::where('major','Industrial & Management Systems')->count();
			$data['major']['Industrial & Management Systems'] = $major_Industrial;

		}

		if ($request->departm || $request->response == 'response' || $request->select_all == 'select_all')
		{
			$total_major = 0;
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Major</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['major'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_major = $total_major + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_major.'</td></tr>';

			$html .= '</table>';
		}




		if ($request->response == 'response' || $request->select_all == 'select_all') {
			$total_gender = 0;

			/* Total Gendar */
			$data['gender']['Male'] = Alumni::where('gender','Male')->count();
			$data['gender']['Female'] = Alumni::where('gender','Female')->count();
			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Gender</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['gender'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_gender = $total_gender + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_gender.'</td></tr>';

			$html .= '</table>';

		}


		if ($request->year || $request->response == 'response' || $request->select_all == 'select_all') {

			/* Total Year */
			$total_years = 0;
			if ($request->year != '' && $request->response != 'response' && $request->select_all != 'select_all') {
				$data['graduation'][$request->year] = Alumni::where('graduation',$request->year)->count();

			} else {

				$data['graduation']['2017-2018'] = Alumni::whereBetween('graduation',[2017, 2018])->count();
				$data['graduation']['2018-2019'] = Alumni::whereBetween('graduation',[2018, 2019])->count();
				$data['graduation']['2019-2020'] = Alumni::whereBetween('graduation',[2019, 2020])->count();
				$data['graduation']['2020-2021'] = Alumni::whereBetween('graduation',[2020, 2021])->count();
				$data['graduation']['2021-2022'] = Alumni::whereBetween('graduation',[2021, 2022])->count();
			}
			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Graduation Year</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['graduation'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_years = $total_years + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_years.'</td></tr>';

			$html .= '</table>';
		}


		if ($request->select_all == 'select_all' || $request->degrees == 'degrees') {

			/* Advanced Degrees */
			$total_degrees = 0;
			$data['degrees']['MSc'] = Alumni::where('degrees','MSc')->count();
			$data['degrees']['MBA'] = Alumni::where('degrees','MBA')->count();
			$data['degrees']['PhD'] = Alumni::where('degrees','PhD')->count();
			$data['degrees']['Others'] = Alumni::where('degrees','Others')->count();

			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Advanced Education</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['degrees'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_degrees = $total_degrees + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_degrees.'</td></tr>';

			$html .= '</table>';


			/* membership */
			$total_membership = 0;
			$data['membership']['Yes'] = Alumni::where('membership','!=','')->count();
			$data['membership']['No'] = Alumni::where('membership',null)->count();


				$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Professional Certification</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['membership'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_membership = $total_membership + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_membership.'</td></tr>';


		}



		if ($request->select_all == 'select_all' || $request->employment == 'employment') {

			/* job_title */
			$total_job_title = 0;
			$job_title = Alumni::where('job_title','!=', '')->get();
			foreach ($job_title as $keybt => $valuebt) {
				$data['job_title'][$valuebt->job_title] = Alumni::where('job_title',$valuebt->job_title)->count();
			}

			if (isset($data['job_title'])) {
				$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
					$html .= '<tr><th style="width:70%;">Job Title</th><th style="width:30%;">Total Responses</th></tr>';
					foreach ($data['job_title'] as $k1 => $v1) {
						$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
						$total_job_title = $total_job_title + $v1;
					}
					$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_job_title.'</td></tr>';

				$html .= '</table>';
			}

			/* Job Description */
			$total_job_description = 0;
			$job_description = Alumni::where('job_description','!=', '')->get();
			foreach ($job_description as $keyjd => $valuejd) {
				$data['job_description'][$valuejd->job_description] = Alumni::where('job_description',$valuejd->job_description)->count();
			}

			if (isset($data['job_description'])) {
				$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
					$html .= '<tr><th style="width:70%;">Job Responsibilities</th><th style="width:30%;">Total Responses</th></tr>';
					foreach ($data['job_description'] as $k1 => $v1) {
						$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
						$total_job_description = $total_job_description + $v1;
					}
					$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_job_description.'</td></tr>';

				$html .= '</table>';
			}


			/* Employment */
			$total_employment = 0;
			$data['employment']['Yes'] = Alumni::where('employment','!=', '')->count();
			$data['employment']['No'] = Alumni::where('employment','=', null)->count();
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Employment Honors</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['employment'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_employment = $total_employment + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_employment.'</td></tr>';

			$html .= '</table>';


		}


		if ($request->select_all == 'select_all' || $request->professional == 'professional') 
		{

			$total_conferences = 0;
			$data['professional']['Yes'] = Alumni::where('conferences',1)->count();
			$data['professional']['No'] = Alumni::where('conferences',0)->count();

			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Conferences Attended</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['professional'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_conferences = $total_conferences + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_conferences.'</td></tr>';

			$html .= '</table>';


			$total_education = 0;
			$data['professional']['Yes'] = Alumni::where('activities',1)->count();
			$data['professional']['No'] = Alumni::where('activities',0)->count();

			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Continuing Education</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['professional'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_education = $total_education + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_education.'</td></tr>';

			$html .= '</table>';

		}



		if ($request->select_all == 'select_all' || $request->overall == 'overall') {


			$total_connected = 0;
			$data['connected']['Very well connected'] = Alumni::where('connected','Very well connected')->count();
			$data['connected']['Well connected'] = Alumni::where('connected','Well connected')->count();
			$data['connected']['Little connected'] = Alumni::where('connected','Little connected')->count();
			$data['connected']['Not connected'] = Alumni::where('connected','Not connected')->count();

			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">How connected do you feel to Kuwait University and your engineering department?</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['connected'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_connected = $total_connected + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_connected.'</td></tr>';

			$html .= '</table>';

		}


		if ($request->select_all == 'select_all' || $request->importance == 'importance') {

			$imp_1 = array();
			$imp_1['opt_1'] = Alumni::where('importance_1',1)->count();
			$imp_1['opt_2'] = Alumni::where('importance_1',2)->count();
			$imp_1['opt_3'] = Alumni::where('importance_1',3)->count();
			$imp_1['opt_4'] = Alumni::where('importance_1',4)->count();
			$imp_1['opt_5'] = Alumni::where('importance_1',5)->count();
			$data['importance_1']['Contribution to company/workplace'] = $imp_1;


			$imp_2 = array();
			$imp_2['opt_1'] = Alumni::where('importance_2',1)->count();
			$imp_2['opt_2'] = Alumni::where('importance_2',2)->count();
			$imp_2['opt_3'] = Alumni::where('importance_2',3)->count();
			$imp_2['opt_4'] = Alumni::where('importance_2',4)->count();
			$imp_2['opt_5'] = Alumni::where('importance_2',5)->count();
			$data['importance_2']['Contribution to wellbeing of society'] = $imp_2;


			$imp_3 = array();
			$imp_3['opt_1'] = Alumni::where('importance_3',1)->count();
			$imp_3['opt_2'] = Alumni::where('importance_3',2)->count();
			$imp_3['opt_3'] = Alumni::where('importance_3',3)->count();
			$imp_3['opt_4'] = Alumni::where('importance_3',4)->count();
			$imp_3['opt_5'] = Alumni::where('importance_3',5)->count();
			$data['importance_3']['Career advancement'] = $imp_3;


			$imp_4 = array();
			$imp_4['opt_1'] = Alumni::where('importance_4',1)->count();
			$imp_4['opt_2'] = Alumni::where('importance_4',2)->count();
			$imp_4['opt_3'] = Alumni::where('importance_4',3)->count();
			$imp_4['opt_4'] = Alumni::where('importance_4',4)->count();
			$imp_4['opt_5'] = Alumni::where('importance_4',5)->count();
			$data['importance_4']['Degree advancement'] = $imp_4;

			$imp_5 = array();
			$imp_5['opt_1'] = Alumni::where('importance_5',1)->count();
			$imp_5['opt_2'] = Alumni::where('importance_5',2)->count();
			$imp_5['opt_3'] = Alumni::where('importance_5',3)->count();
			$imp_5['opt_4'] = Alumni::where('importance_5',4)->count();
			$imp_5['opt_5'] = Alumni::where('importance_5',5)->count();
			$data['importance_5']['Staying current in profession'] = $imp_5;

			$imp_6 = array();
			$imp_6['opt_1'] = Alumni::where('importance_6',1)->count();
			$imp_6['opt_2'] = Alumni::where('importance_6',2)->count();
			$imp_6['opt_3'] = Alumni::where('importance_6',3)->count();
			$imp_6['opt_4'] = Alumni::where('importance_6',4)->count();
			$imp_6['opt_5'] = Alumni::where('importance_6',5)->count();
			$data['importance_6']['Use of leadership capabilities'] = $imp_6;




			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Please evaluate educational objective as per importance to career</th><th>Eimp</th><th>Vimp</th><th>Imp</th><th>Simp</th><th>NSat</th><th>Average</th></tr>';

			 	for ($i=1; $i <7; $i++) { 
			 		$weight = 5; 
					$sum = 0;
					$multi_sum = 0;
					foreach ($data['importance_'.$i] as $key => $value) {
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


			/* attainment 1 */
			$imp_01 = array();
			$imp_01['year'] = '2017-2018';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_1',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_1',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_1',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_1',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_1',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2018-2019';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_1',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_1',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_1',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_1',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_1',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2019-2020';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_1',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_1',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_1',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_1',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_1',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2020-2021';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_1',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_1',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_1',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_1',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_1',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2021-2022';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_1',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_1',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_1',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_1',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_1',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_05;


			/* attainment 2 */
			$imp_01 = array();
			$imp_01['year'] = '2017-2018';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_2',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_2',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_2',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_2',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_2',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2018-2019';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_2',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_2',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_2',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_2',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_2',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2019-2020';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_2',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_2',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_2',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_2',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_2',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2020-2021';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_2',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_2',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_2',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_2',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_2',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2021-2022';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_2',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_2',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_2',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_2',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_2',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_05;

			/* attainment 3 */
			$imp_01 = array();
			$imp_01['year'] = '2017-2018';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_3',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_3',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_3',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_3',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_3',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2018-2019';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_3',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_3',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_3',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_3',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_3',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2019-2020';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_3',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_3',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_3',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_3',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_3',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2020-2021';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_3',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_3',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_3',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_3',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_3',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2021-2022';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_3',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_3',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_3',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_3',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_3',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_05;


			/* attainment 4 */
			$imp_01 = array();
			$imp_01['year'] = '2017-2018';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_4',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_4',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_4',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_4',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_4',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2018-2019';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_4',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_4',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_4',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_4',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_4',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2019-2020';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_4',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_4',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_4',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_4',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_4',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2020-2021';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_4',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_4',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_4',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_4',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_4',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2021-2022';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_4',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_4',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_4',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_4',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_4',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_05;


			/* attainment 5 */
			$imp_01 = array();
			$imp_01['year'] = '2017-2018';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_5',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_5',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_5',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_5',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_5',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2018-2019';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_5',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_5',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_5',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_5',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_5',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2019-2020';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_5',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_5',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_5',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_5',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_5',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2020-2021';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_5',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_5',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_5',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_5',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_5',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2021-2022';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_5',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_5',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_5',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_5',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_5',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_05;


			/* attainment 6 */
			$imp_01 = array();
			$imp_01['year'] = '2017-2018';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_6',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_6',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_6',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_6',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('importance_6',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2018-2019';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_6',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_6',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_6',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_6',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('importance_6',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2019-2020';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_6',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_6',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_6',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_6',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('importance_6',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2020-2021';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_6',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_6',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_6',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_6',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('importance_6',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2021-2022';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_6',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_6',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_6',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_6',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('importance_6',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_05;


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Please evaluate educational objective as per importance to career</th><th>Graduation Year</th><th>Eimp</th><th>Vimp</th><th>Imp</th><th>Simp</th><th>NSat</th><th>Average</th></tr>';

				for ($i=1; $i <7; $i++) { 

					foreach ($data['importance_year_'.$i] as $key => $value) {
						foreach ($value as $k1 => $v1) 
						{
							if ($k1 == 0) {
								$weight_1 = 5; 
								$sum_1 = 0;
								$multi_sum_1 = 0;
								$html .= '<tr><td rowspan="5" class="text-middle">'.$key.'</td>';
								foreach ($v1 as $k01 => $v01) {
									$html .= '<td class="tr_foo_1">'.$v01.'</td>';
									if ($k01 != 'year') {
										$sum_1 = ((int)$sum_1 + (int)$v01);
										$multi = ((int)$weight_1 * (int)$v01);
										$multi_sum_1 = $multi_sum_1 + $multi;
										$weight_1 --;
									}
								}
								if ($sum_1 != 0) {
									$avg_1 = $multi_sum_1 / $sum_1;
								} else {
									$avg_1 = 0;
								}
								$html .= '<td class="avg_footer">'.number_format((float)$avg_1, 2, '.', '').'</td>';
								$html .= '</tr>';
							} else {
								$weight_2 = 5; 
								$sum_2 = 0;
								$multi_sum_2 = 0;
								$html .= '<tr>';
								foreach ($v1 as $k01 => $v01) {
									$html .= '<td class="tr_foo_1">'.$v01.'</td>';
									$sum_2 = ((int)$sum_2 + (int)$v01);
									$multi = ((int)$weight_2 * (int)$v01);
									$multi_sum_2 = $multi_sum_2 + $multi;
									$weight_2 --;
								}
								if ($sum_2 != 0) {
									$avg_2 = $multi_sum_2 / $sum_2;
								} else {
									$avg_2 = 0;
								}
								$html .= '<td class="avg_footer">'.number_format((float)$avg_2, 2, '.', '').'</td>';
								$html .= '</tr>';
							}
						}
					}
				}

			$html .= '</table>';


		}


		if ($request->select_all == 'select_all' || $request->attainment == 'attainment') {

			$atta_1 = array();
			$atta_1['opt_1'] = Alumni::where('attainment_1',1)->count();
			$atta_1['opt_2'] = Alumni::where('attainment_1',2)->count();
			$atta_1['opt_3'] = Alumni::where('attainment_1',3)->count();
			$atta_1['opt_4'] = Alumni::where('attainment_1',4)->count();
			$data['attainment_1']['Contribution to company/workplace'] = $atta_1;


			$atta_2 = array();
			$atta_2['opt_1'] = Alumni::where('attainment_2',1)->count();
			$atta_2['opt_2'] = Alumni::where('attainment_2',2)->count();
			$atta_2['opt_3'] = Alumni::where('attainment_2',3)->count();
			$atta_2['opt_4'] = Alumni::where('attainment_2',4)->count();
			$data['attainment_2']['Contribution to wellbeing of society'] = $atta_2;


			$atta_3 = array();
			$atta_3['opt_1'] = Alumni::where('attainment_3',1)->count();
			$atta_3['opt_2'] = Alumni::where('attainment_3',2)->count();
			$atta_3['opt_3'] = Alumni::where('attainment_3',3)->count();
			$atta_3['opt_4'] = Alumni::where('attainment_3',4)->count();
			$data['attainment_3']['Career advancement'] = $atta_3;


			$atta_4 = array();
			$atta_4['opt_1'] = Alumni::where('attainment_4',1)->count();
			$atta_4['opt_2'] = Alumni::where('attainment_4',2)->count();
			$atta_4['opt_3'] = Alumni::where('attainment_4',3)->count();
			$atta_4['opt_4'] = Alumni::where('attainment_4',4)->count();
			$data['attainment_4']['Degree advancement'] = $atta_4;

			$atta_5 = array();
			$atta_5['opt_1'] = Alumni::where('attainment_5',1)->count();
			$atta_5['opt_2'] = Alumni::where('attainment_5',2)->count();
			$atta_5['opt_3'] = Alumni::where('attainment_5',3)->count();
			$atta_5['opt_4'] = Alumni::where('attainment_5',4)->count();
			$data['attainment_5']['Staying current in profession'] = $atta_5;

			$atta_6 = array();
			$atta_6['opt_1'] = Alumni::where('attainment_6',1)->count();
			$atta_6['opt_2'] = Alumni::where('attainment_6',2)->count();
			$atta_6['opt_3'] = Alumni::where('attainment_6',3)->count();
			$atta_6['opt_4'] = Alumni::where('attainment_6',4)->count();
			$data['attainment_6']['Use of leadership capabilities'] = $atta_6;




			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Please evaluate educational objectives according to your level of attainment</th><th>Sig</th><th>Sat</th><th>SSat</th><th>NSat</th><th>Average</th></tr>';

			 	for ($i=1; $i <7; $i++) { 
			 		$weight = 5; 
					$sum = 0;
					$multi_sum = 0;
					foreach ($data['attainment_'.$i] as $key => $value) {
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


			/* attainment 1 */
			$atta_01 = array();
			$atta_01['year'] = '2017-2018';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_1',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_1',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_1',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_1',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2018-2019';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_1',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_1',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_1',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_1',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2019-2020';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_1',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_1',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_1',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_1',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2020-2021';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_1',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_1',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_1',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_1',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2021-2022';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_1',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_1',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_1',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_1',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_05;



			/* attainment 2 */
			$atta_01 = array();
			$atta_01['year'] = '2017-2018';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_2',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_2',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_2',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_2',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2018-2019';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_2',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_2',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_2',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_2',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2019-2020';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_2',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_2',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_2',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_2',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2020-2021';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_2',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_2',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_2',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_2',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2021-2022';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_2',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_2',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_2',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_2',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_05;


			/* attainment 3 */
			$atta_01 = array();
			$atta_01['year'] = '2017-2018';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_3',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_3',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_3',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_3',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2018-2019';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_3',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_3',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_3',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_3',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2019-2020';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_3',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_3',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_3',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_3',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2020-2021';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_3',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_3',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_3',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_3',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2021-2022';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_3',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_3',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_3',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_3',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_05;


			/* attainment 4 */
			$atta_01 = array();
			$atta_01['year'] = '2017-2018';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_4',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_4',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_4',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_4',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2018-2019';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_4',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_4',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_4',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_4',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2019-2020';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_4',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_4',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_4',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_4',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2020-2021';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_4',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_4',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_4',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_4',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2021-2022';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_4',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_4',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_4',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_4',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_05;


			/* attainment 5 */
			$atta_01 = array();
			$atta_01['year'] = '2017-2018';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_5',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_5',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_5',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_5',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2018-2019';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_5',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_5',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_5',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_5',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2019-2020';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_5',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_5',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_5',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_5',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2020-2021';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_5',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_5',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_5',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_5',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2021-2022';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_5',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_5',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_5',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_5',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_05;



			/* attainment 6 */
			$atta_01 = array();
			$atta_01['year'] = '2017-2018';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_6',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_6',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_6',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('attainment_6',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2018-2019';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_6',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_6',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_6',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('attainment_6',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2019-2020';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_6',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_6',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_6',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('attainment_6',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2020-2021';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_6',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_6',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_6',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('attainment_6',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2021-2022';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_6',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_6',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_6',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('attainment_6',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_05;


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Please evaluate educational objectives according to your level of attainment</th><th>Graduation Year</th><th>Sig</th><th>Sat</th><th>SSat</th><th>NSat</th><th>Average</th></tr>';

			for ($i=1; $i <6; $i++) { 

					foreach ($data['attainment_year_'.$i] as $key => $value) {
						foreach ($value as $k1 => $v1) 
						{
							if ($k1 == 0) {
								$weight_1 = 5; 
								$sum_1 = 0;
								$multi_sum_1 = 0;
								$html .= '<tr><td rowspan="5" class="text-middle">'.$key.'</td>';
								foreach ($v1 as $k01 => $v01) {
									$html .= '<td class="tr_foo_1">'.$v01.'</td>';

									if ($k01 != 'year') {
										$sum_1 = ((int)$sum_1 + (int)$v01);
										$multi = ((int)$weight_1 * (int)$v01);
										$multi_sum_1 = $multi_sum_1 + $multi;
										$weight_1 --;
									}
								}
								if ($sum_1 != 0) {
									$avg_1 = $multi_sum_1 / $sum_1;
								} else {
									$avg_1 = 0;
								}
								$html .= '<td class="avg_footer">'.number_format((float)$avg_1, 2, '.', '').'</td>';
								$html .= '</tr>';
							} else {
								$weight_2 = 5; 
								$sum_2 = 0;
								$multi_sum_2 = 0;
								$html .= '<tr>';
								foreach ($v1 as $k01 => $v01) {
									$html .= '<td class="tr_foo_1">'.$v01.'</td>';
									if ($k01 != 'year') {
										$sum_2 = ((int)$sum_2 + (int)$v01);
										$multi = ((int)$weight_2 * (int)$v01);
										$multi_sum_2 = $multi_sum_2 + $multi;
										$weight_2 --;
									}
								}
								if ($sum_2 != 0) {
									$avg_2 = $multi_sum_2 / $sum_2;
								} else {
									$avg_2 = 0;
								}
								$html .= '<td class="avg_footer">'.number_format((float)$avg_2, 2, '.', '').'</td>';
								$html .= '</tr>';
							}
						}
					}
				}

			$html .= '</table>';

		}


		if ($request->select_all == 'select_all' || $request->overall == 'overall') 
		{
			$Q_ans_1 = array();
			$Q_ans_1['QO_1'] = Alumni::where('questions_1',1)->count();
			$Q_ans_1['QO_2'] = Alumni::where('questions_1',2)->count();
			$Q_ans_1['QO_3'] = Alumni::where('questions_1',3)->count();
			$Q_ans_1['QO_4'] = Alumni::where('questions_1',4)->count();
			$Q_ans_1['QO_5'] = Alumni::where('questions_1',5)->count();
			$Q_ans_1['QO_6'] = Alumni::where('questions_1',6)->count();
			$data['overall_1']['Be a technically competent engineer'] = $Q_ans_1;


			$Q_ans_2 = array();
			$Q_ans_2['QO_1'] = Alumni::where('questions_2',1)->count();
			$Q_ans_2['QO_2'] = Alumni::where('questions_2',2)->count();
			$Q_ans_2['QO_3'] = Alumni::where('questions_2',3)->count();
			$Q_ans_2['QO_4'] = Alumni::where('questions_2',4)->count();
			$Q_ans_2['QO_5'] = Alumni::where('questions_2',5)->count();
			$Q_ans_2['QO_6'] = Alumni::where('questions_2',6)->count();
			$data['overall_2']['Obtain your first job after graduation'] = $Q_ans_2;


			$Q_ans_3 = array();
			$Q_ans_3['QO_1'] = Alumni::where('questions_3',1)->count();
			$Q_ans_3['QO_2'] = Alumni::where('questions_3',2)->count();
			$Q_ans_3['QO_3'] = Alumni::where('questions_3',3)->count();
			$Q_ans_3['QO_4'] = Alumni::where('questions_3',4)->count();
			$Q_ans_3['QO_5'] = Alumni::where('questions_3',5)->count();
			$Q_ans_3['QO_6'] = Alumni::where('questions_3',6)->count();
			$data['overall_3']['Have the necessary professional skills to meet expectations of your job'] = $Q_ans_3;


			$Q_ans_4 = array();
			$Q_ans_4['QO_1'] = Alumni::where('questions_4',1)->count();
			$Q_ans_4['QO_2'] = Alumni::where('questions_4',2)->count();
			$Q_ans_4['QO_3'] = Alumni::where('questions_4',3)->count();
			$Q_ans_4['QO_4'] = Alumni::where('questions_4',4)->count();
			$Q_ans_4['QO_5'] = Alumni::where('questions_4',5)->count();
			$Q_ans_4['QO_6'] = Alumni::where('questions_4',6)->count();
			$data['overall_4']['Contribute to the society as an engineer'] = $Q_ans_4;


			$Q_ans_5 = array();
			$Q_ans_5['QO_1'] = Alumni::where('questions_5',1)->count();
			$Q_ans_5['QO_2'] = Alumni::where('questions_5',2)->count();
			$Q_ans_5['QO_3'] = Alumni::where('questions_5',3)->count();
			$Q_ans_5['QO_4'] = Alumni::where('questions_5',4)->count();
			$Q_ans_5['QO_5'] = Alumni::where('questions_5',5)->count();
			$Q_ans_5['QO_6'] = Alumni::where('questions_5',6)->count();
			$data['overall_5']['Be aware of your responsibility to consider sustainability in engineering solutions'] = $Q_ans_5;


			$Q_ans_6 = array();
			$Q_ans_6['QO_1'] = Alumni::where('questions_6',1)->count();
			$Q_ans_6['QO_2'] = Alumni::where('questions_6',2)->count();
			$Q_ans_6['QO_3'] = Alumni::where('questions_6',3)->count();
			$Q_ans_6['QO_4'] = Alumni::where('questions_6',4)->count();
			$Q_ans_6['QO_5'] = Alumni::where('questions_6',5)->count();
			$Q_ans_6['QO_6'] = Alumni::where('questions_6',6)->count();
			$data['overall_6']['Pursue advanced degree'] = $Q_ans_6;


			$Q_ans_7 = array();
			$Q_ans_7['QO_1'] = Alumni::where('questions_7',1)->count();
			$Q_ans_7['QO_2'] = Alumni::where('questions_7',2)->count();
			$Q_ans_7['QO_3'] = Alumni::where('questions_7',3)->count();
			$Q_ans_7['QO_4'] = Alumni::where('questions_7',4)->count();
			$Q_ans_7['QO_5'] = Alumni::where('questions_7',5)->count();
			$Q_ans_7['QO_6'] = Alumni::where('questions_7',6)->count();
			$data['overall_7']['Be an entrepreneur and start your own business'] = $Q_ans_7;


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th>Rate your overall preparation at Kuwait University</th><th>VWP</th><th>WP</th><th>P</th><th>SP</th><th>NP</th><th>CNE</th><th>Average</th></tr>';

				for ($i=1; $i <8; $i++) {
					$weight = 5; 
					$sum = 0;
					$multi_sum = 0;
					foreach ($data['overall_'.$i] as $key => $value) {
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


			/* Question 1 */
			$Q1_ans_01 = array();
			$Q1_ans_01['year'] = '2017-2018';
			$Q1_ans_01['QO1_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_1',1)->count();
			$Q1_ans_01['QO1_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_1',2)->count();
			$Q1_ans_01['QO1_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_1',3)->count();
			$Q1_ans_01['QO1_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_1',4)->count();
			$Q1_ans_01['QO1_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_1',5)->count();
			$Q1_ans_01['QO1_6'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_1',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_01;


			$Q1_ans_02 = array();
			$Q1_ans_02['year'] = '2018-2019';
			$Q1_ans_02['QO2_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_1',1)->count();
			$Q1_ans_02['QO2_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_1',2)->count();
			$Q1_ans_02['QO2_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_1',3)->count();
			$Q1_ans_02['QO2_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_1',4)->count();
			$Q1_ans_02['QO2_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_1',5)->count();
			$Q1_ans_02['QO2_6'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_1',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_02;


			$Q1_ans_03 = array();
			$Q1_ans_03['year'] = '2019-2020';
			$Q1_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_1',1)->count();
			$Q1_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_1',2)->count();
			$Q1_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_1',3)->count();
			$Q1_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_1',4)->count();
			$Q1_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_1',5)->count();
			$Q1_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_1',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_03;


			$Q1_ans_04 = array();
			$Q1_ans_04['year'] = '2020-2021';
			$Q1_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_1',1)->count();
			$Q1_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_1',2)->count();
			$Q1_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_1',3)->count();
			$Q1_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_1',4)->count();
			$Q1_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_1',5)->count();
			$Q1_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_1',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_04;


			$Q1_ans_05 = array();
			$Q1_ans_05['year'] = '2021-2022';
			$Q1_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_1',1)->count();
			$Q1_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_1',2)->count();
			$Q1_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_1',3)->count();
			$Q1_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_1',4)->count();
			$Q1_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_1',5)->count();
			$Q1_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_1',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_05;


			/* Question 2 */
			$Q2_ans_01 = array();
			$Q2_ans_01['year'] = '2017-2018';
			$Q2_ans_01['QO1_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_2',1)->count();
			$Q2_ans_01['QO1_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_2',2)->count();
			$Q2_ans_01['QO1_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_2',3)->count();
			$Q2_ans_01['QO1_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_2',4)->count();
			$Q2_ans_01['QO1_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_2',5)->count();
			$Q2_ans_01['QO1_6'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_2',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_01;


			$Q2_ans_02 = array();
			$Q2_ans_02['year'] = '2018-2019';
			$Q2_ans_02['QO2_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_2',1)->count();
			$Q2_ans_02['QO2_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_2',2)->count();
			$Q2_ans_02['QO2_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_2',3)->count();
			$Q2_ans_02['QO2_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_2',4)->count();
			$Q2_ans_02['QO2_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_2',5)->count();
			$Q2_ans_02['QO2_6'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_2',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_02;


			$Q2_ans_03 = array();
			$Q2_ans_03['year'] = '2019-2020';
			$Q2_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_2',1)->count();
			$Q2_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_2',2)->count();
			$Q2_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_2',3)->count();
			$Q2_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_2',4)->count();
			$Q2_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_2',5)->count();
			$Q2_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_2',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_03;


			$Q2_ans_04 = array();
			$Q2_ans_04['year'] = '2020-2021';
			$Q2_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_2',1)->count();
			$Q2_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_2',2)->count();
			$Q2_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_2',3)->count();
			$Q2_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_2',4)->count();
			$Q2_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_2',5)->count();
			$Q2_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_2',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_04;


			$Q2_ans_05 = array();
			$Q2_ans_05['year'] = '2021-2022';
			$Q2_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_2',1)->count();
			$Q2_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_2',2)->count();
			$Q2_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_2',3)->count();
			$Q2_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_2',4)->count();
			$Q2_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_2',5)->count();
			$Q2_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_2',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_05;



			/* Question 3 */
			$Q3_ans_01 = array();
			$Q3_ans_01['year'] = '2017-2018';
			$Q3_ans_01['QO1_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_3',1)->count();
			$Q3_ans_01['QO1_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_3',2)->count();
			$Q3_ans_01['QO1_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_3',3)->count();
			$Q3_ans_01['QO1_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_3',4)->count();
			$Q3_ans_01['QO1_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_3',5)->count();
			$Q3_ans_01['QO1_6'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_3',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_01;


			$Q3_ans_02 = array();
			$Q3_ans_02['year'] = '2018-2019';
			$Q3_ans_02['QO2_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_3',1)->count();
			$Q3_ans_02['QO2_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_3',2)->count();
			$Q3_ans_02['QO2_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_3',3)->count();
			$Q3_ans_02['QO2_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_3',4)->count();
			$Q3_ans_02['QO2_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_3',5)->count();
			$Q3_ans_02['QO2_6'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_3',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_02;


			$Q3_ans_03 = array();
			$Q3_ans_03['year'] = '2019-2020';
			$Q3_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_3',1)->count();
			$Q3_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_3',2)->count();
			$Q3_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_3',3)->count();
			$Q3_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_3',4)->count();
			$Q3_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_3',5)->count();
			$Q3_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_3',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_03;


			$Q3_ans_04 = array();
			$Q3_ans_04['year'] = '2020-2021';
			$Q3_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_3',1)->count();
			$Q3_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_3',2)->count();
			$Q3_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_3',3)->count();
			$Q3_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_3',4)->count();
			$Q3_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_3',5)->count();
			$Q3_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_3',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_04;


			$Q3_ans_05 = array();
			$Q3_ans_05['year'] = '2021-2022';
			$Q3_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_3',1)->count();
			$Q3_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_3',2)->count();
			$Q3_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_3',3)->count();
			$Q3_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_3',4)->count();
			$Q3_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_3',5)->count();
			$Q3_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_3',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_05;


			/* Question 4 */
			$Q4_ans_01 = array();
			$Q4_ans_01['year'] = '2017-2018';
			$Q4_ans_01['QO1_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_4',1)->count();
			$Q4_ans_01['QO1_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_4',2)->count();
			$Q4_ans_01['QO1_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_4',3)->count();
			$Q4_ans_01['QO1_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_4',4)->count();
			$Q4_ans_01['QO1_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_4',5)->count();
			$Q4_ans_01['QO1_6'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_4',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_01;


			$Q4_ans_02 = array();
			$Q4_ans_02['year'] = '2018-2019';
			$Q4_ans_02['QO2_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_4',1)->count();
			$Q4_ans_02['QO2_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_4',2)->count();
			$Q4_ans_02['QO2_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_4',3)->count();
			$Q4_ans_02['QO2_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_4',4)->count();
			$Q4_ans_02['QO2_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_4',5)->count();
			$Q4_ans_02['QO2_6'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_4',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_02;


			$Q4_ans_03 = array();
			$Q4_ans_03['year'] = '2019-2020';
			$Q4_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_4',1)->count();
			$Q4_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_4',2)->count();
			$Q4_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_4',3)->count();
			$Q4_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_4',4)->count();
			$Q4_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_4',5)->count();
			$Q4_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_4',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_03;


			$Q4_ans_04 = array();
			$Q4_ans_04['year'] = '2020-2021';
			$Q4_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_4',1)->count();
			$Q4_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_4',2)->count();
			$Q4_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_4',3)->count();
			$Q4_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_4',4)->count();
			$Q4_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_4',5)->count();
			$Q4_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_4',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_04;


			$Q4_ans_05 = array();
			$Q4_ans_05['year'] = '2021-2022';
			$Q4_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_4',1)->count();
			$Q4_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_4',2)->count();
			$Q4_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_4',3)->count();
			$Q4_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_4',4)->count();
			$Q4_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_4',5)->count();
			$Q4_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_4',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_04;



			/* Question 5 */
			$Q5_ans_01 = array();
			$Q5_ans_01['year'] = '2017-2018';
			$Q5_ans_01['QO1_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_5',1)->count();
			$Q5_ans_01['QO1_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_5',2)->count();
			$Q5_ans_01['QO1_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_5',3)->count();
			$Q5_ans_01['QO1_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_5',4)->count();
			$Q5_ans_01['QO1_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_5',5)->count();
			$Q5_ans_01['QO1_6'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_5',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_01;


			$Q5_ans_02 = array();
			$Q5_ans_02['year'] = '2018-2019';
			$Q5_ans_02['QO2_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_5',1)->count();
			$Q5_ans_02['QO2_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_5',2)->count();
			$Q5_ans_02['QO2_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_5',3)->count();
			$Q5_ans_02['QO2_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_5',4)->count();
			$Q5_ans_02['QO2_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_5',5)->count();
			$Q5_ans_02['QO2_6'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_5',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_02;


			$Q5_ans_03 = array();
			$Q5_ans_03['year'] = '2019-2020';
			$Q5_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_5',1)->count();
			$Q5_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_5',2)->count();
			$Q5_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_5',3)->count();
			$Q5_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_5',4)->count();
			$Q5_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_5',5)->count();
			$Q5_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_5',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_03;


			$Q5_ans_04 = array();
			$Q5_ans_04['year'] = '2020-2021';
			$Q5_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_5',1)->count();
			$Q5_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_5',2)->count();
			$Q5_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_5',3)->count();
			$Q5_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_5',4)->count();
			$Q5_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_5',5)->count();
			$Q5_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_5',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_04;


			$Q5_ans_05 = array();
			$Q5_ans_05['year'] = '2021-2022';
			$Q5_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_5',1)->count();
			$Q5_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_5',2)->count();
			$Q5_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_5',3)->count();
			$Q5_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_5',4)->count();
			$Q5_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_5',5)->count();
			$Q5_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_5',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_05;



			/* Question 6 */
			$Q6_ans_01 = array();
			$Q6_ans_01['year'] = '2017-2018';
			$Q6_ans_01['QO1_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_6',1)->count();
			$Q6_ans_01['QO1_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_6',2)->count();
			$Q6_ans_01['QO1_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_6',3)->count();
			$Q6_ans_01['QO1_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_6',4)->count();
			$Q6_ans_01['QO1_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_6',5)->count();
			$Q6_ans_01['QO1_6'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_6',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_01;


			$Q6_ans_02 = array();
			$Q6_ans_02['year'] = '2018-2019';
			$Q6_ans_02['QO2_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_6',1)->count();
			$Q6_ans_02['QO2_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_6',2)->count();
			$Q6_ans_02['QO2_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_6',3)->count();
			$Q6_ans_02['QO2_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_6',4)->count();
			$Q6_ans_02['QO2_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_6',5)->count();
			$Q6_ans_02['QO2_6'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_6',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_02;


			$Q6_ans_03 = array();
			$Q6_ans_03['year'] = '2019-2020';
			$Q6_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_6',1)->count();
			$Q6_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_6',2)->count();
			$Q6_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_6',3)->count();
			$Q6_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_6',4)->count();
			$Q6_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_6',5)->count();
			$Q6_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_6',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_03;


			$Q6_ans_04 = array();
			$Q6_ans_04['year'] = '2020-2021';
			$Q6_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_6',1)->count();
			$Q6_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_6',2)->count();
			$Q6_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_6',3)->count();
			$Q6_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_6',4)->count();
			$Q6_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_6',5)->count();
			$Q6_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_6',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_04;


			$Q6_ans_05 = array();
			$Q6_ans_05['year'] = '2021-2022';
			$Q6_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_6',1)->count();
			$Q6_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_6',2)->count();
			$Q6_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_6',3)->count();
			$Q6_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_6',4)->count();
			$Q6_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_6',5)->count();
			$Q6_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_6',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_05;



			/* Question 7 */
			$Q7_ans_01 = array();
			$Q7_ans_01['year'] = '2017-2018';
			$Q7_ans_01['QO1_1'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_7',1)->count();
			$Q7_ans_01['QO1_2'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_7',2)->count();
			$Q7_ans_01['QO1_3'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_7',3)->count();
			$Q7_ans_01['QO1_4'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_7',4)->count();
			$Q7_ans_01['QO1_5'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_7',5)->count();
			$Q7_ans_01['QO1_6'] = Alumni::whereBetween('graduation',[2017, 2018])->where('questions_7',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_01;


			$Q7_ans_02 = array();
			$Q7_ans_02['year'] = '2018-2019';
			$Q7_ans_02['QO2_1'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_7',1)->count();
			$Q7_ans_02['QO2_2'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_7',2)->count();
			$Q7_ans_02['QO2_3'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_7',3)->count();
			$Q7_ans_02['QO2_4'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_7',4)->count();
			$Q7_ans_02['QO2_5'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_7',5)->count();
			$Q7_ans_02['QO2_6'] = Alumni::whereBetween('graduation',[2018, 2019])->where('questions_7',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_02;


			$Q7_ans_03 = array();
			$Q7_ans_03['year'] = '2019-2020';
			$Q7_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_7',1)->count();
			$Q7_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_7',2)->count();
			$Q7_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_7',3)->count();
			$Q7_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_7',4)->count();
			$Q7_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_7',5)->count();
			$Q7_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2019, 2020])->where('questions_7',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_03;


			$Q7_ans_04 = array();
			$Q7_ans_04['year'] = '2020-2021';
			$Q7_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_7',1)->count();
			$Q7_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_7',2)->count();
			$Q7_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_7',3)->count();
			$Q7_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_7',4)->count();
			$Q7_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_7',5)->count();
			$Q7_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2020, 2021])->where('questions_7',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_04;


			$Q7_ans_05 = array();
			$Q7_ans_05['year'] = '2021-2022';
			$Q7_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_7',1)->count();
			$Q7_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_7',2)->count();
			$Q7_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_7',3)->count();
			$Q7_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_7',4)->count();
			$Q7_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_7',5)->count();
			$Q7_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2021, 2022])->where('questions_7',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_05;



			 $html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Rate your overall preparation at Kuwait University</th><th>Graduation Year</th><th>VWP</th><th>WP</th><th>P</th><th>SP</th><th>NP</th><th>CNE</th><th>Average</th></tr>';

				for ($i=1; $i <8; $i++) { 
					foreach ($data['overall_year_'.$i] as $key => $value) {

						foreach ($value as $k1 => $v1) 
						{

							if ($k1 == 0) {
								$html .= '<tr><td rowspan="5" class="text-middle">'.$key.'</td>';
								$weight_1 = 5; 
								$sum_1 = 0;
								$multi_sum_1 = 0;
								foreach ($v1 as $k01 => $v01) {
									$html .= '<td class="tr_foo_1">'.$v01.'</td>';

									if ($k01 != 'year') {
										$sum_1 = ((int)$sum_1 + (int)$v01);
										$multi = ((int)$weight_1 * (int)$v01);
										$multi_sum_1 = $multi_sum_1 + $multi;
										$weight_1 --;
									}

								}
								if ($sum_1 != 0) {
									$avg_1 = $multi_sum_1 / $sum_1;
								} else {
									$avg_1 = 0;
								}
								$html .= '<td class="avg_footer">'.number_format((float)$avg_1, 2, '.', '').'</td>';
								$html .= '</tr>';
							} else {
								$weight_2 = 5; 
								$sum_2 = 0;
								$multi_sum_2 = 0;
								$html .= '<tr class="tr_foo_1">';
								foreach ($v1 as $k01 => $v01) {


									$html .= '<td>'.$v01.'</td>';
									if ($k01 != 'year') {
										$sum_2 = ((int)$sum_2 + (int)$v01);
										$multi = ((int)$weight_2 * (int)$v01);
										$multi_sum_2 = $multi_sum_2 + $multi;
										$weight_2 --;
									}

								}
								if ($sum_2 != 0) {
									$avg_2 = $multi_sum_2 / $sum_2;
								} else {
									$avg_2 = 0;
								}
								$html .= '<td class="avg_footer">'.number_format((float)$avg_2, 2, '.', '').'</td>';
								$html .= '</tr>';
							}
						}
					}
				}

				
			$html .= '</table>';
		}



		if ($request->select_all == 'select_all' || $request->overall == 'overall')
		{
			$total_programs = 0;
			$data['programs']['Strongly recommend'] = Alumni::where('programs','Strongly recommend')->count();
			$data['programs']['Recommend'] = Alumni::where('programs','Recommend')->count();
			$data['programs']['Don’t recommend'] = Alumni::where('programs','Don’t recommend')->count();

			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Would you recommend Engineering programs of Kuwait University to a friend or a relative?</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['programs'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_programs = $total_programs + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_programs.'</td></tr>';

			$html .= '</table>';
		}

		if ($request->select_all == 'select_all' || $request->overall == 'overall')
		{

			$total_performance = 0;
			$data['performance']['Strongly agree'] = Alumni::where('performance','Strongly agree')->count();
			$data['performance']['Agree'] = Alumni::where('performance','Agree')->count();
			$data['performance']['Neutral'] = Alumni::where('performance','Neutral')->count();
			$data['performance']['Disagree'] = Alumni::where('performance','Disagree')->count();
			$data['performance']['Strongly Disagree'] = Alumni::where('performance','Strongly Disagree')->count();

			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">The performance of Kuwait University engineering graduates at your workplace is comparable to their peers from other institutions</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['performance'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_performance = $total_performance + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_performance.'</td></tr>';

			$html .= '</table>';


			$total_training_course = 0;
			$data['training_course']['Strongly agree'] = Alumni::where('training_course','Strongly agree')->count();
			$data['training_course']['Agree'] = Alumni::where('training_course','Agree')->count();
			$data['training_course']['Neutral'] = Alumni::where('training_course','Neutral')->count();
			$data['training_course']['Disagree'] = Alumni::where('training_course','Disagree')->count();
			$data['training_course']['Strongly Disagree'] = Alumni::where('training_course','Strongly Disagree')->count();

			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Taking the engineering training course during your studies at Kuwait University prepares you well in getting or succeeding in your first job</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['performance'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_training_course = $total_training_course + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_training_course.'</td></tr>';

			$html .= '</table>';


		}



		if ($request->select_all == 'select_all') {

			$data['question_5'] = Alumni::select('experience_1','experience_2','experience_3')->where('experience_1','!=',null)->get();

			$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:100%;"> In light of your professional experience, please list three of the most useful technical knowledge or professional skills that you acquired during your studies at Kuwait University</th></tr>';
				foreach ($data['question_5'] as $k1 => $v1) 
				{
					$html .= '<tr><td>'.$v1->experience_1.'<br>'.$v1->experience_2.'<br>'.$v1->experience_3.'</td></tr>';
				}

			$html .= '</table>';


			$data['question_6'] = Alumni::select('technical_1','technical_2','technical_3')->where('technical_1','!=',null)->get();

			$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:100%;"> Please list three technical knowledge or professional skills that you think should be taught in the engineering program that you attended at Kuwait University</th></tr>';
				foreach ($data['question_6'] as $k1 => $v1) 
				{
					$html .= '<tr><td>'.$v1->technical_1.'<br>'.$v1->technical_2.'<br>'.$v1->technical_3.'</td></tr>';
				}

			$html .= '</table>';


			$data['question_7'] = Alumni::select('improvements')->where('improvements','!=',null)->get();

			$html .= '<table class="table table-bordered table-striped" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:100%;"> Please list three technical knowledge or professional skills that you think should be taught in the engineering program that you attended at Kuwait University</th></tr>';
				foreach ($data['question_7'] as $k1 => $v1) 
				{
					$html .= '<tr><td>'.$v1->improvements.'</td></tr>';
				}

			$html .= '</table>';
		}

		return $html;

	}

}
