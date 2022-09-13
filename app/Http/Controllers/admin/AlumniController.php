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

		if ($request->departm != 'College' && $request->response != 'response') {

			$major = Alumni::where('major',$request->departm)->count();
			
			$data['major'][$request->departm] = $major;

		}
		else
		{
			
			$major_Unspecified = Alumni::where('major','')->count();
			$data['major']['Unspecified'] = $major_Unspecified;

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

			
		if ($request->departm || $request->response == 'response')
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



		if ($request->response == 'response') {
			$total_gender = 0;

			/* Total Gendar */
			$data['gender']['Unspecified'] = Alumni::where('gender','')->count();
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

		if ($request->year || $request->response == 'response') {

			/* Total Year */
			$total_years = 0;
			$data['graduation']['Unspecified'] = Alumni::where('graduation','')->count();
			$data['graduation']['Other'] = Alumni::whereBetween('graduation',[2017, now()->year])->count();
			$data['graduation']['2015-2016'] = Alumni::whereBetween('graduation',[2015, 2016])->count();
			$data['graduation']['2014-2015'] = Alumni::whereBetween('graduation',[2014, 2015])->count();
			$data['graduation']['2013-2014'] = Alumni::whereBetween('graduation',[2013, 2014])->count();
			$data['graduation']['2012-2013'] = Alumni::whereBetween('graduation',[2012, 2013])->count();
			$data['graduation']['2011-2012'] = Alumni::whereBetween('graduation',[2011, 2012])->count();
			$data['graduation']['2010-2011'] = Alumni::whereBetween('graduation',[2010, 2011])->count();
			// $data['graduation']['Female'] = Alumni::where('graduation','Female')->count();
			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Graduation Year</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['graduation'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_years = $total_years + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_years.'</td></tr>';

			$html .= '</table>';
		}


		if ($request->degrees == 'degrees') {

			/* Advanced Degrees */
			$total_degrees = 0;
			$data['degrees']['Unspecified'] = Alumni::where('degrees',null)->count();
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


			/* Advanced Degrees */
			$total_membership = 0;
			$data['membership']['Unspecified'] = Alumni::where('membership',null)->count();
			$data['membership']['Professional Certification'] = Alumni::where('membership','!=','')->count();


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Professional Certification</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['membership'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_membership = $total_membership + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_membership.'</td></tr>';

			$html .= '</table>';



		}

		if ($request->employment == 'employment') {

			/* Employment */
			$total_employment = 0;
			$data['employment']['Unspecified'] = Alumni::where('employment',null)->count();
			$employment = Alumni::where('employment','!=', '')->get();
			foreach ($employment as $keyemp => $valueemp) {
				$data['employment'][$valueemp->employment] = Alumni::where('employment',$valueemp->employment)->count();
			}
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Employment Honors</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['employment'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_employment = $total_employment + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_employment.'</td></tr>';

			$html .= '</table>';


			/* job_title */
			$total_job_title = 0;
			$job_title = Alumni::where('job_title','!=', '')->get();
			foreach ($job_title as $keybt => $valuebt) {
				$data['job_title'][$valuebt->job_title] = Alumni::where('job_title',$valuebt->job_title)->count();
			}
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Job Title</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['job_title'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_job_title = $total_job_title + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_job_title.'</td></tr>';

			$html .= '</table>';


			/* Job Description */
			$total_job_description = 0;
			$job_description = Alumni::where('job_description','!=', '')->get();
			foreach ($job_description as $keyjd => $valuejd) {
				$data['job_description'][$valuejd->job_description] = Alumni::where('job_description',$valuejd->job_description)->count();
			}
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Job Responsibilities</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['job_description'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_job_description = $total_job_description + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_job_description.'</td></tr>';

			$html .= '</table>';





		}


		if ($request->professional == 'professional') 
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

		
		if ($request->overall == 'overall') {

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

					foreach ($data['overall_'.$i] as $key => $value) {
						$html .= '<tr><td>'.$key.'</td>';
						foreach ($value as $k1 => $v1) {
							$html .= '<td>'.$v1.'</td>';
						}
						$html .= '</tr>';
					}
				}

				
			$html .= '</table>';


			/* Question 1 */
			$Q1_ans_01 = array();
			$Q1_ans_01['year'] = '2015-2016';
			$Q1_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',1)->count();
			$Q1_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',2)->count();
			$Q1_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',3)->count();
			$Q1_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',4)->count();
			$Q1_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',5)->count();
			$Q1_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_01;


			$Q1_ans_02 = array();
			$Q1_ans_02['year'] = '2014-2015';
			$Q1_ans_02['QO_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',1)->count();
			$Q1_ans_02['QO_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',2)->count();
			$Q1_ans_02['QO_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',3)->count();
			$Q1_ans_02['QO_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',4)->count();
			$Q1_ans_02['QO_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',5)->count();
			$Q1_ans_02['QO_6'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_02;


			$Q1_ans_03 = array();
			$Q1_ans_03['year'] = '2013-2014';
			$Q1_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',1)->count();
			$Q1_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',2)->count();
			$Q1_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',3)->count();
			$Q1_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',4)->count();
			$Q1_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',5)->count();
			$Q1_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_03;


			$Q1_ans_04 = array();
			$Q1_ans_04['year'] = '2012-2013';
			$Q1_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',1)->count();
			$Q1_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',2)->count();
			$Q1_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',3)->count();
			$Q1_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',4)->count();
			$Q1_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',5)->count();
			$Q1_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_04;


			$Q1_ans_05 = array();
			$Q1_ans_05['year'] = '2011-2012';
			$Q1_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',1)->count();
			$Q1_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',2)->count();
			$Q1_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',3)->count();
			$Q1_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',4)->count();
			$Q1_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',5)->count();
			$Q1_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_05;


			$Q1_ans_06 = array();
			$Q1_ans_06['year'] = '2010-2011';
			$Q1_ans_06['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',1)->count();
			$Q1_ans_06['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',2)->count();
			$Q1_ans_06['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',3)->count();
			$Q1_ans_06['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',4)->count();
			$Q1_ans_06['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',5)->count();
			$Q1_ans_06['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1_ans_06;


			/* Question 2 */
			$Q2_ans_01 = array();
			$Q2_ans_01['year'] = '2015-2016';
			$Q2_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',1)->count();
			$Q2_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',2)->count();
			$Q2_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',3)->count();
			$Q2_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',4)->count();
			$Q2_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',5)->count();
			$Q2_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_01;


			$Q2_ans_02 = array();
			$Q2_ans_02['year'] = '2014-2015';
			$Q2_ans_02['QO_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',1)->count();
			$Q2_ans_02['QO_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',2)->count();
			$Q2_ans_02['QO_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',3)->count();
			$Q2_ans_02['QO_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',4)->count();
			$Q2_ans_02['QO_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',5)->count();
			$Q2_ans_02['QO_6'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_02;


			$Q2_ans_03 = array();
			$Q2_ans_03['year'] = '2013-2014';
			$Q2_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',1)->count();
			$Q2_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',2)->count();
			$Q2_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',3)->count();
			$Q2_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',4)->count();
			$Q2_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',5)->count();
			$Q2_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_03;


			$Q2_ans_04 = array();
			$Q2_ans_04['year'] = '2012-2013';
			$Q2_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',1)->count();
			$Q2_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',2)->count();
			$Q2_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',3)->count();
			$Q2_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',4)->count();
			$Q2_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',5)->count();
			$Q2_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_04;


			$Q2_ans_05 = array();
			$Q2_ans_05['year'] = '2011-2012';
			$Q2_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',1)->count();
			$Q2_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',2)->count();
			$Q2_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',3)->count();
			$Q2_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',4)->count();
			$Q2_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',5)->count();
			$Q2_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_05;


			$Q2_ans_06 = array();
			$Q2_ans_06['year'] = '2010-2011';
			$Q2_ans_06['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',1)->count();
			$Q2_ans_06['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',2)->count();
			$Q2_ans_06['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',3)->count();
			$Q2_ans_06['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',4)->count();
			$Q2_ans_06['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',5)->count();
			$Q2_ans_06['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2_ans_06;


			/* Question 3 */
			$Q3_ans_01 = array();
			$Q3_ans_01['year'] = '2015-2016';
			$Q3_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',1)->count();
			$Q3_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',2)->count();
			$Q3_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',3)->count();
			$Q3_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',4)->count();
			$Q3_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',5)->count();
			$Q3_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_01;


			$Q3_ans_02 = array();
			$Q3_ans_02['year'] = '2014-2015';
			$Q3_ans_02['QO_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',1)->count();
			$Q3_ans_02['QO_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',2)->count();
			$Q3_ans_02['QO_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',3)->count();
			$Q3_ans_02['QO_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',4)->count();
			$Q3_ans_02['QO_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',5)->count();
			$Q3_ans_02['QO_6'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_02;


			$Q3_ans_03 = array();
			$Q3_ans_03['year'] = '2013-2014';
			$Q3_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',1)->count();
			$Q3_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',2)->count();
			$Q3_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',3)->count();
			$Q3_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',4)->count();
			$Q3_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',5)->count();
			$Q3_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_03;


			$Q3_ans_04 = array();
			$Q3_ans_04['year'] = '2012-2013';
			$Q3_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',1)->count();
			$Q3_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',2)->count();
			$Q3_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',3)->count();
			$Q3_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',4)->count();
			$Q3_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',5)->count();
			$Q3_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_04;


			$Q3_ans_05 = array();
			$Q3_ans_05['year'] = '2011-2012';
			$Q3_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',1)->count();
			$Q3_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',2)->count();
			$Q3_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',3)->count();
			$Q3_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',4)->count();
			$Q3_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',5)->count();
			$Q3_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_05;


			$Q3_ans_06 = array();
			$Q3_ans_06['year'] = '2010-2011';
			$Q3_ans_06['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',1)->count();
			$Q3_ans_06['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',2)->count();
			$Q3_ans_06['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',3)->count();
			$Q3_ans_06['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',4)->count();
			$Q3_ans_06['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',5)->count();
			$Q3_ans_06['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3_ans_06;


			/* Question 4 */
			$Q4_ans_01 = array();
			$Q4_ans_01['year'] = '2015-2016';
			$Q4_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',1)->count();
			$Q4_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',2)->count();
			$Q4_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',3)->count();
			$Q4_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',4)->count();
			$Q4_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',5)->count();
			$Q4_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_01;


			$Q4_ans_02 = array();
			$Q4_ans_02['year'] = '2014-2015';
			$Q4_ans_02['QO_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',1)->count();
			$Q4_ans_02['QO_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',2)->count();
			$Q4_ans_02['QO_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',3)->count();
			$Q4_ans_02['QO_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',4)->count();
			$Q4_ans_02['QO_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',5)->count();
			$Q4_ans_02['QO_6'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_02;


			$Q4_ans_03 = array();
			$Q4_ans_03['year'] = '2013-2014';
			$Q4_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',1)->count();
			$Q4_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',2)->count();
			$Q4_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',3)->count();
			$Q4_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',4)->count();
			$Q4_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',5)->count();
			$Q4_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_03;


			$Q4_ans_04 = array();
			$Q4_ans_04['year'] = '2012-2013';
			$Q4_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',1)->count();
			$Q4_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',2)->count();
			$Q4_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',3)->count();
			$Q4_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',4)->count();
			$Q4_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',5)->count();
			$Q4_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_04;


			$Q4_ans_05 = array();
			$Q4_ans_05['year'] = '2011-2012';
			$Q4_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',1)->count();
			$Q4_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',2)->count();
			$Q4_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',3)->count();
			$Q4_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',4)->count();
			$Q4_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',5)->count();
			$Q4_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_05;


			$Q4_ans_06 = array();
			$Q4_ans_06['year'] = '2010-2011';
			$Q4_ans_06['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',1)->count();
			$Q4_ans_06['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',2)->count();
			$Q4_ans_06['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',3)->count();
			$Q4_ans_06['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',4)->count();
			$Q4_ans_06['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',5)->count();
			$Q4_ans_06['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4_ans_06;


			/* Question 5 */
			$Q5_ans_01 = array();
			$Q5_ans_01['year'] = '2015-2016';
			$Q5_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',1)->count();
			$Q5_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',2)->count();
			$Q5_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',3)->count();
			$Q5_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',4)->count();
			$Q5_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',5)->count();
			$Q5_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_01;


			$Q5_ans_02 = array();
			$Q5_ans_02['year'] = '2014-2015';
			$Q5_ans_02['QO_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',1)->count();
			$Q5_ans_02['QO_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',2)->count();
			$Q5_ans_02['QO_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',3)->count();
			$Q5_ans_02['QO_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',4)->count();
			$Q5_ans_02['QO_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',5)->count();
			$Q5_ans_02['QO_6'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_02;


			$Q5_ans_03 = array();
			$Q5_ans_03['year'] = '2013-2014';
			$Q5_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',1)->count();
			$Q5_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',2)->count();
			$Q5_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',3)->count();
			$Q5_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',4)->count();
			$Q5_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',5)->count();
			$Q5_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_03;


			$Q5_ans_04 = array();
			$Q5_ans_04['year'] = '2012-2013';
			$Q5_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',1)->count();
			$Q5_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',2)->count();
			$Q5_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',3)->count();
			$Q5_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',4)->count();
			$Q5_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',5)->count();
			$Q5_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_04;


			$Q5_ans_05 = array();
			$Q5_ans_05['year'] = '2011-2012';
			$Q5_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',1)->count();
			$Q5_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',2)->count();
			$Q5_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',3)->count();
			$Q5_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',4)->count();
			$Q5_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',5)->count();
			$Q5_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_05;


			$Q5_ans_06 = array();
			$Q5_ans_06['year'] = '2010-2011';
			$Q5_ans_06['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',1)->count();
			$Q5_ans_06['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',2)->count();
			$Q5_ans_06['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',3)->count();
			$Q5_ans_06['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',4)->count();
			$Q5_ans_06['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',5)->count();
			$Q5_ans_06['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5_ans_06;



			/* Question 6 */
			$Q6_ans_01 = array();
			$Q6_ans_01['year'] = '2015-2016';
			$Q6_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',1)->count();
			$Q6_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',2)->count();
			$Q6_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',3)->count();
			$Q6_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',4)->count();
			$Q6_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',5)->count();
			$Q6_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_01;


			$Q6_ans_02 = array();
			$Q6_ans_02['year'] = '2014-2015';
			$Q6_ans_02['QO_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',1)->count();
			$Q6_ans_02['QO_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',2)->count();
			$Q6_ans_02['QO_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',3)->count();
			$Q6_ans_02['QO_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',4)->count();
			$Q6_ans_02['QO_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',5)->count();
			$Q6_ans_02['QO_6'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_02;


			$Q6_ans_03 = array();
			$Q6_ans_03['year'] = '2013-2014';
			$Q6_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',1)->count();
			$Q6_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',2)->count();
			$Q6_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',3)->count();
			$Q6_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',4)->count();
			$Q6_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',5)->count();
			$Q6_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_03;


			$Q6_ans_04 = array();
			$Q6_ans_04['year'] = '2012-2013';
			$Q6_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',1)->count();
			$Q6_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',2)->count();
			$Q6_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',3)->count();
			$Q6_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',4)->count();
			$Q6_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',5)->count();
			$Q6_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_04;


			$Q6_ans_05 = array();
			$Q6_ans_05['year'] = '2011-2012';
			$Q6_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',1)->count();
			$Q6_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',2)->count();
			$Q6_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',3)->count();
			$Q6_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',4)->count();
			$Q6_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',5)->count();
			$Q6_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_05;


			$Q6_ans_06 = array();
			$Q6_ans_06['year'] = '2010-2011';
			$Q6_ans_06['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',1)->count();
			$Q6_ans_06['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',2)->count();
			$Q6_ans_06['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',3)->count();
			$Q6_ans_06['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',4)->count();
			$Q6_ans_06['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',5)->count();
			$Q6_ans_06['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6_ans_06;


			/* Question 7 */
			$Q7_ans_01 = array();
			$Q7_ans_01['year'] = '2015-2016';
			$Q7_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',1)->count();
			$Q7_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',2)->count();
			$Q7_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',3)->count();
			$Q7_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',4)->count();
			$Q7_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',5)->count();
			$Q7_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2015, 2016])->where('questions_1',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_01;


			$Q7_ans_02 = array();
			$Q7_ans_02['year'] = '2014-2015';
			$Q7_ans_02['QO_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',1)->count();
			$Q7_ans_02['QO_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',2)->count();
			$Q7_ans_02['QO_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',3)->count();
			$Q7_ans_02['QO_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',4)->count();
			$Q7_ans_02['QO_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',5)->count();
			$Q7_ans_02['QO_6'] = Alumni::whereBetween('graduation',[2014, 2015])->where('questions_2',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_02;


			$Q7_ans_03 = array();
			$Q7_ans_03['year'] = '2013-2014';
			$Q7_ans_03['QO_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',1)->count();
			$Q7_ans_03['QO_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',2)->count();
			$Q7_ans_03['QO_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',3)->count();
			$Q7_ans_03['QO_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',4)->count();
			$Q7_ans_03['QO_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',5)->count();
			$Q7_ans_03['QO_6'] = Alumni::whereBetween('graduation',[2013, 2014])->where('questions_3',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_03;


			$Q7_ans_04 = array();
			$Q7_ans_04['year'] = '2012-2013';
			$Q7_ans_04['QO_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',1)->count();
			$Q7_ans_04['QO_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',2)->count();
			$Q7_ans_04['QO_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',3)->count();
			$Q7_ans_04['QO_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',4)->count();
			$Q7_ans_04['QO_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',5)->count();
			$Q7_ans_04['QO_6'] = Alumni::whereBetween('graduation',[2012, 2013])->where('questions_4',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_04;


			$Q7_ans_05 = array();
			$Q7_ans_05['year'] = '2011-2012';
			$Q7_ans_05['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',1)->count();
			$Q7_ans_05['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',2)->count();
			$Q7_ans_05['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',3)->count();
			$Q7_ans_05['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',4)->count();
			$Q7_ans_05['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',5)->count();
			$Q7_ans_05['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_5',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_05;


			$Q7_ans_06 = array();
			$Q7_ans_06['year'] = '2010-2011';
			$Q7_ans_06['QO_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',1)->count();
			$Q7_ans_06['QO_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',2)->count();
			$Q7_ans_06['QO_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',3)->count();
			$Q7_ans_06['QO_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',4)->count();
			$Q7_ans_06['QO_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',5)->count();
			$Q7_ans_06['QO_6'] = Alumni::whereBetween('graduation',[2011, 2012])->where('questions_6',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7_ans_06;


			


			 $html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Rate your overall preparation at Kuwait University</th><th>Graduation Year</th><th>VWP</th><th>WP</th><th>P</th><th>SP</th><th>NP</th><th>CNE</th><th>Average</th></tr>';

				for ($i=1; $i <8; $i++) { 

					foreach ($data['overall_year_'.$i] as $key => $value) {
						foreach ($value as $k1 => $v1) 
						{
							if ($k1 == 0) {
								$html .= '<tr><td rowspan="6">'.$key.'</td>';
								foreach ($v1 as $k01 => $v01) {
									$html .= '<td>'.$v01.'</td>';
								}
								$html .= '</tr>';
							} else {
								$html .= '<tr>';
								foreach ($v1 as $k01 => $v01) {
									$html .= '<td>'.$v01.'</td>';
								}
								$html .= '</tr>';
							}
						}
					}
				}

				
			$html .= '</table>';


		}







		return $html;


	}

}
