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

		if ($request->year || $request->response == 'response' || $request->select_all == 'select_all') {

			/* Total Year */
			$total_years = 0;
			if ($request->year != '' && $request->response != 'response' && $request->select_all != 'select_all') {
				$data['graduation'][$request->year] = Alumni::where('graduation',$request->year)->count();

			} else {

				$data['graduation']['Unspecified'] = Alumni::where('graduation','')->count();
				$data['graduation']['Other'] = Alumni::whereBetween('graduation',[2017, now()->year])->count();
				$data['graduation']['2015-2016'] = Alumni::whereBetween('graduation',[2015, 2016])->count();
				$data['graduation']['2014-2015'] = Alumni::whereBetween('graduation',[2014, 2015])->count();
				$data['graduation']['2013-2014'] = Alumni::whereBetween('graduation',[2013, 2014])->count();
				$data['graduation']['2012-2013'] = Alumni::whereBetween('graduation',[2012, 2013])->count();
				$data['graduation']['2011-2012'] = Alumni::whereBetween('graduation',[2011, 2012])->count();
				$data['graduation']['2010-2011'] = Alumni::whereBetween('graduation',[2010, 2011])->count();
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


		if ($request->degrees == 'degrees' || $request->select_all == 'select_all') {

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

		if ($request->employment == 'employment' || $request->select_all == 'select_all') {

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


		if ($request->professional == 'professional' || $request->select_all == 'select_all') 
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

		
		if ($request->overall == 'overall' || $request->select_all == 'select_all') {


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
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('questions_1',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('questions_1',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('questions_1',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('questions_1',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('questions_1',5)->count();
			$un_01['QO_6'] = Alumni::where('graduation',null)->where('questions_1',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $un_01;

			$Q1Other_ans_01 = array();
			$Q1Other_ans_01['year'] = 'Other';
			$Q1Other_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_1',1)->count();
			$Q1Other_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_1',2)->count();
			$Q1Other_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_1',3)->count();
			$Q1Other_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_1',4)->count();
			$Q1Other_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_1',5)->count();
			$Q1Other_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_1',6)->count();
			$data['overall_year_1']['Be a technically competent engineer'][] = $Q1Other_ans_01;

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
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('questions_2',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('questions_2',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('questions_2',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('questions_2',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('questions_2',5)->count();
			$un_01['QO_6'] = Alumni::where('graduation',null)->where('questions_2',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $un_01;

			$Q2Other_ans_01 = array();
			$Q2Other_ans_01['year'] = 'Other';
			$Q2Other_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_2',1)->count();
			$Q2Other_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_2',2)->count();
			$Q2Other_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_2',3)->count();
			$Q2Other_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_2',4)->count();
			$Q2Other_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_2',5)->count();
			$Q2Other_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_2',6)->count();
			$data['overall_year_2']['Obtain your first job after graduation'][] = $Q2Other_ans_01;

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
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('questions_3',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('questions_3',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('questions_3',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('questions_3',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('questions_3',5)->count();
			$un_01['QO_6'] = Alumni::where('graduation',null)->where('questions_3',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $un_01;

			$Q3Other_ans_01 = array();
			$Q3Other_ans_01['year'] = 'Other';
			$Q3Other_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_3',1)->count();
			$Q3Other_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_3',2)->count();
			$Q3Other_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_3',3)->count();
			$Q3Other_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_3',4)->count();
			$Q3Other_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_3',5)->count();
			$Q3Other_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_3',6)->count();
			$data['overall_year_3']['Have the necessary professional skills to meet expectations of your job'][] = $Q3Other_ans_01;

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
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('questions_4',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('questions_4',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('questions_4',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('questions_4',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('questions_4',5)->count();
			$un_01['QO_6'] = Alumni::where('graduation',null)->where('questions_4',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $un_01;

			$Q4Other_ans_01 = array();
			$Q4Other_ans_01['year'] = 'Other';
			$Q4Other_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_4',1)->count();
			$Q4Other_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_4',2)->count();
			$Q4Other_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_4',3)->count();
			$Q4Other_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_4',4)->count();
			$Q4Other_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_4',5)->count();
			$Q4Other_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_4',6)->count();
			$data['overall_year_4']['Contribute to the society as an engineer'][] = $Q4Other_ans_01;

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
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('questions_5',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('questions_5',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('questions_5',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('questions_5',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('questions_5',5)->count();
			$un_01['QO_6'] = Alumni::where('graduation',null)->where('questions_5',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $un_01;

			$Q5Other_ans_01 = array();
			$Q5Other_ans_01['year'] = 'Other';
			$Q5Other_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_5',1)->count();
			$Q5Other_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_5',2)->count();
			$Q5Other_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_5',3)->count();
			$Q5Other_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_5',4)->count();
			$Q5Other_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_5',5)->count();
			$Q5Other_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_5',6)->count();
			$data['overall_year_5']['Be aware of your responsibility to consider sustainability in engineering solutions'][] = $Q5Other_ans_01;

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
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('questions_6',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('questions_6',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('questions_6',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('questions_6',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('questions_6',5)->count();
			$un_01['QO_6'] = Alumni::where('graduation',null)->where('questions_6',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $un_01;

			$Q6Other_ans_01 = array();
			$Q6Other_ans_01['year'] = 'Other';
			$Q6Other_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_6',1)->count();
			$Q6Other_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_6',2)->count();
			$Q6Other_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_6',3)->count();
			$Q6Other_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_6',4)->count();
			$Q6Other_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_6',5)->count();
			$Q6Other_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_6',6)->count();
			$data['overall_year_6']['Pursue advanced degree'][] = $Q6Other_ans_01;


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
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('questions_7',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('questions_7',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('questions_7',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('questions_7',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('questions_7',5)->count();
			$un_01['QO_6'] = Alumni::where('graduation',null)->where('questions_7',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $un_01;

			$Q7Other_ans_01 = array();
			$Q7Other_ans_01['year'] = 'Other';
			$Q7Other_ans_01['QO_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_7',1)->count();
			$Q7Other_ans_01['QO_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_7',2)->count();
			$Q7Other_ans_01['QO_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_7',3)->count();
			$Q7Other_ans_01['QO_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_7',4)->count();
			$Q7Other_ans_01['QO_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_7',5)->count();
			$Q7Other_ans_01['QO_6'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('questions_7',6)->count();
			$data['overall_year_7']['Be an entrepreneur and start your own business'][] = $Q7Other_ans_01;


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
								$html .= '<tr><td rowspan="8" class="text-middle">'.$key.'</td>';
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


		if ($request->attainment == 'attainment'  || $request->select_all == 'select_all') {

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

					foreach ($data['attainment_'.$i] as $key => $value) {
						$html .= '<tr><td>'.$key.'</td>';
						foreach ($value as $k1 => $v1) {
							$html .= '<td>'.$v1.'</td>';
						}
						$html .= '</tr>';
					}
				}
				
			$html .= '</table>';


			/* attainment 1 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('attainment_1',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('attainment_1',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('attainment_1',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('attainment_1',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $un_01;

			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_1',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_1',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_1',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_1',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_other_01;

			$atta_01 = array();
			$atta_01['year'] = '2015-2016';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2014-2015';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2013-2014';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2012-2013';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2011-2012';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_05;


			$atta_06 = array();
			$atta_06['year'] = '2010-2011';
			$atta_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',1)->count();
			$atta_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',2)->count();
			$atta_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',3)->count();
			$atta_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',4)->count();
			$data['attainment_year_1']['Contribution to company/workplace'][] = $atta_06;



			/* attainment 2 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('attainment_2',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('attainment_2',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('attainment_2',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('attainment_2',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $un_01;

			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_2',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_2',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_2',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_2',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_other_01;


			$atta_01 = array();
			$atta_01['year'] = '2015-2016';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2014-2015';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2013-2014';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2012-2013';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2011-2012';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_05;


			$atta_06 = array();
			$atta_06['year'] = '2010-2011';
			$atta_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',1)->count();
			$atta_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',2)->count();
			$atta_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',3)->count();
			$atta_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',4)->count();
			$data['attainment_year_2']['Contribution to wellbeing of society'][] = $atta_06;


			/* attainment 3 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('attainment_3',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('attainment_3',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('attainment_3',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('attainment_3',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $un_01;

			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_3',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_3',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_3',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_3',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_other_01;


			$atta_01 = array();
			$atta_01['year'] = '2015-2016';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2014-2015';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2013-2014';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2012-2013';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2011-2012';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_05;


			$atta_06 = array();
			$atta_06['year'] = '2010-2011';
			$atta_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',1)->count();
			$atta_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',2)->count();
			$atta_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',3)->count();
			$atta_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',4)->count();
			$data['attainment_year_3']['Career advancement'][] = $atta_06;


			/* attainment 4 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('attainment_4',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('attainment_4',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('attainment_4',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('attainment_4',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $un_01;

			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_4',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_4',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_4',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_4',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_other_01;


			$atta_01 = array();
			$atta_01['year'] = '2015-2016';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2014-2015';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2013-2014';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2012-2013';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2011-2012';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_05;


			$atta_06 = array();
			$atta_06['year'] = '2010-2011';
			$atta_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',1)->count();
			$atta_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',2)->count();
			$atta_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',3)->count();
			$atta_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',4)->count();
			$data['attainment_year_4']['Degree advancement'][] = $atta_06;


			/* attainment 5 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('attainment_5',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('attainment_5',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('attainment_5',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('attainment_5',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $un_01;

			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_5',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_5',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_5',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_5',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_other_01;


			$atta_01 = array();
			$atta_01['year'] = '2015-2016';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2014-2015';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2013-2014';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2012-2013';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2011-2012';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_05;


			$atta_06 = array();
			$atta_06['year'] = '2010-2011';
			$atta_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',1)->count();
			$atta_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',2)->count();
			$atta_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',3)->count();
			$atta_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',4)->count();
			$data['attainment_year_5']['Staying current in profession'][] = $atta_06;



			/* attainment 6 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('attainment_6',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('attainment_6',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('attainment_6',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('attainment_6',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $un_01;


			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_6',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_6',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_6',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('attainment_6',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_other_01;


			$atta_01 = array();
			$atta_01['year'] = '2015-2016';
			$atta_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',1)->count();
			$atta_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',2)->count();
			$atta_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',3)->count();
			$atta_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('attainment_1',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_01;


			$atta_02 = array();
			$atta_02['year'] = '2014-2015';
			$atta_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',1)->count();
			$atta_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',2)->count();
			$atta_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',3)->count();
			$atta_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('attainment_2',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_02;


			$atta_03 = array();
			$atta_03['year'] = '2013-2014';
			$atta_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',1)->count();
			$atta_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',2)->count();
			$atta_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',3)->count();
			$atta_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('attainment_3',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_03;


			$atta_04 = array();
			$atta_04['year'] = '2012-2013';
			$atta_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',1)->count();
			$atta_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',2)->count();
			$atta_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',3)->count();
			$atta_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('attainment_4',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_04;


			$atta_05 = array();
			$atta_05['year'] = '2011-2012';
			$atta_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',1)->count();
			$atta_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',2)->count();
			$atta_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',3)->count();
			$atta_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_5',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_05;


			$atta_06 = array();
			$atta_06['year'] = '2010-2011';
			$atta_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',1)->count();
			$atta_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',2)->count();
			$atta_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',3)->count();
			$atta_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('attainment_6',4)->count();
			$data['attainment_year_6']['Use of leadership capabilities'][] = $atta_06;


			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Please evaluate educational objectives according to your level of attainment</th><th>Graduation Year</th><th>Sig</th><th>Sat</th><th>SSat</th><th>NSat</th><th>Average</th></tr>';

			for ($i=1; $i <7; $i++) { 

					foreach ($data['attainment_year_'.$i] as $key => $value) {
						foreach ($value as $k1 => $v1) 
						{
							if ($k1 == 0) {
								$html .= '<tr><td rowspan="8" class="text-middle">'.$key.'</td>';
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


		if ($request->importance == 'importance'  || $request->select_all == 'select_all') {

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

					foreach ($data['importance_'.$i] as $key => $value) {
						$html .= '<tr><td>'.$key.'</td>';
						foreach ($value as $k1 => $v1) {
							$html .= '<td>'.$v1.'</td>';
						}
						$html .= '</tr>';
					}
				}
				
			$html .= '</table>';


			/* attainment 1 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('importance_1',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('importance_1',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('importance_1',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('importance_1',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('importance_1',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $un_01;


			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_1',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_1',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_1',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_1',4)->count();
			$atta_other_01['opt_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_1',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $atta_other_01;

			$imp_01 = array();
			$imp_01['year'] = '2015-2016';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2014-2015';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2013-2014';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2012-2013';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2011-2012';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_05;


			$imp_06 = array();
			$imp_06['year'] = '2010-2011';
			$imp_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',1)->count();
			$imp_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',2)->count();
			$imp_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',3)->count();
			$imp_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',4)->count();
			$imp_06['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',5)->count();
			$data['importance_year_1']['Contribution to company/workplace'][] = $imp_06;


			/* attainment 2 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('importance_2',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('importance_2',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('importance_2',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('importance_2',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('importance_2',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $un_01;


			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_2',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_2',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_2',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_2',4)->count();
			$atta_other_01['opt_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_2',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $atta_other_01;

			$imp_01 = array();
			$imp_01['year'] = '2015-2016';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2014-2015';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2013-2014';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2012-2013';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2011-2012';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_05;


			$imp_06 = array();
			$imp_06['year'] = '2010-2011';
			$imp_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',1)->count();
			$imp_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',2)->count();
			$imp_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',3)->count();
			$imp_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',4)->count();
			$imp_06['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',5)->count();
			$data['importance_year_2']['Contribution to wellbeing of society'][] = $imp_06;


			/* attainment 3 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('importance_3',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('importance_3',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('importance_3',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('importance_3',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('importance_3',5)->count();
			$data['importance_year_3']['Career advancement'][] = $un_01;


			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_3',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_3',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_3',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_3',4)->count();
			$atta_other_01['opt_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_3',5)->count();
			$data['importance_year_3']['Career advancement'][] = $atta_other_01;

			$imp_01 = array();
			$imp_01['year'] = '2015-2016';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2014-2015';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2013-2014';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2012-2013';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2011-2012';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_05;


			$imp_06 = array();
			$imp_06['year'] = '2010-2011';
			$imp_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',1)->count();
			$imp_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',2)->count();
			$imp_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',3)->count();
			$imp_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',4)->count();
			$imp_06['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',5)->count();
			$data['importance_year_3']['Career advancement'][] = $imp_06;


			/* attainment 4 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('importance_4',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('importance_4',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('importance_4',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('importance_4',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('importance_4',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $un_01;


			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_4',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_4',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_4',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_4',4)->count();
			$atta_other_01['opt_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_4',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $atta_other_01;

			$imp_01 = array();
			$imp_01['year'] = '2015-2016';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2014-2015';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2013-2014';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2012-2013';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2011-2012';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_05;


			$imp_06 = array();
			$imp_06['year'] = '2010-2011';
			$imp_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',1)->count();
			$imp_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',2)->count();
			$imp_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',3)->count();
			$imp_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',4)->count();
			$imp_06['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',5)->count();
			$data['importance_year_4']['Degree advancement'][] = $imp_06;



			/* attainment 5 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('importance_5',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('importance_5',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('importance_5',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('importance_5',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('importance_5',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $un_01;


			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_5',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_5',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_5',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_5',4)->count();
			$atta_other_01['opt_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_5',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $atta_other_01;


			$imp_01 = array();
			$imp_01['year'] = '2015-2016';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2014-2015';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2013-2014';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2012-2013';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2011-2012';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_05;


			$imp_06 = array();
			$imp_06['year'] = '2010-2011';
			$imp_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',1)->count();
			$imp_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',2)->count();
			$imp_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',3)->count();
			$imp_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',4)->count();
			$imp_06['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',5)->count();
			$data['importance_year_5']['Staying current in profession'][] = $imp_06;



			/* attainment 6 */
			$un_01 = array();
			$un_01['year'] = 'Unspecified';
			$un_01['QO_1'] = Alumni::where('graduation',null)->where('importance_6',1)->count();
			$un_01['QO_2'] = Alumni::where('graduation',null)->where('importance_6',2)->count();
			$un_01['QO_3'] = Alumni::where('graduation',null)->where('importance_6',3)->count();
			$un_01['QO_4'] = Alumni::where('graduation',null)->where('importance_6',4)->count();
			$un_01['QO_5'] = Alumni::where('graduation',null)->where('importance_6',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $un_01;


			$atta_other_01 = array();
			$atta_other_01['year'] = 'Other';
			$atta_other_01['opt_1'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_6',1)->count();
			$atta_other_01['opt_2'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_6',2)->count();
			$atta_other_01['opt_3'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_6',3)->count();
			$atta_other_01['opt_4'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_6',4)->count();
			$atta_other_01['opt_5'] = Alumni::whereBetween('graduation',[2017, now()->year])->where('importance_6',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $atta_other_01;


			$imp_01 = array();
			$imp_01['year'] = '2015-2016';
			$imp_01['opt_1'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',1)->count();
			$imp_01['opt_2'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',2)->count();
			$imp_01['opt_3'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',3)->count();
			$imp_01['opt_4'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',4)->count();
			$imp_01['opt_5'] = Alumni::whereBetween('graduation',[2015, 2016])->where('importance_1',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_01;


			$imp_02 = array();
			$imp_02['year'] = '2014-2015';
			$imp_02['opt_1'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',1)->count();
			$imp_02['opt_2'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',2)->count();
			$imp_02['opt_3'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',3)->count();
			$imp_02['opt_4'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',4)->count();
			$imp_02['opt_5'] = Alumni::whereBetween('graduation',[2014, 2015])->where('importance_2',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_02;


			$imp_03 = array();
			$imp_03['year'] = '2013-2014';
			$imp_03['opt_1'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',1)->count();
			$imp_03['opt_2'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',2)->count();
			$imp_03['opt_3'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',3)->count();
			$imp_03['opt_4'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',4)->count();
			$imp_03['opt_5'] = Alumni::whereBetween('graduation',[2013, 2014])->where('importance_3',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_03;


			$imp_04 = array();
			$imp_04['year'] = '2012-2013';
			$imp_04['opt_1'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',1)->count();
			$imp_04['opt_2'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',2)->count();
			$imp_04['opt_3'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',3)->count();
			$imp_04['opt_4'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',4)->count();
			$imp_04['opt_5'] = Alumni::whereBetween('graduation',[2012, 2013])->where('importance_4',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_04;


			$imp_05 = array();
			$imp_05['year'] = '2011-2012';
			$imp_05['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',1)->count();
			$imp_05['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',2)->count();
			$imp_05['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',3)->count();
			$imp_05['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',4)->count();
			$imp_05['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_5',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_05;


			$imp_06 = array();
			$imp_06['year'] = '2010-2011';
			$imp_06['opt_1'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',1)->count();
			$imp_06['opt_2'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',2)->count();
			$imp_06['opt_3'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',3)->count();
			$imp_06['opt_4'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',4)->count();
			$imp_06['opt_5'] = Alumni::whereBetween('graduation',[2011, 2012])->where('importance_6',5)->count();
			$data['importance_year_6']['Use of leadership capabilities'][] = $imp_06;

			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
			 	$html .= '<tr><th>Please evaluate educational objective as per importance to career</th><th>Graduation Year</th><th>Eimp</th><th>Vimp</th><th>Imp</th><th>Simp</th><th>NSat</th><th>Average</th></tr>';

				for ($i=1; $i <7; $i++) { 

					foreach ($data['importance_year_'.$i] as $key => $value) {
						foreach ($value as $k1 => $v1) 
						{
							if ($k1 == 0) {
								$html .= '<tr><td rowspan="8" class="text-middle">'.$key.'</td>';
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


		if ($request->select_all == 'select_all') {

			$total_q5 = 0;
			$data['question_5']['Answer 1'] = Alumni::where('experience_1','!=',null)->count();
			$data['question_5']['Answer 2'] = Alumni::where('experience_2','!=',null)->count();
			$data['question_5']['Answer 3'] = Alumni::where('experience_3','!=',null)->count();

			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;"> In light of your professional experience, please list three of the most useful technical knowledge or professional skills that you acquired during your studies at Kuwait University</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['question_5'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_q5 = $total_q5 + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_q5.'</td></tr>';

			$html .= '</table>';


			$total_q6 = 0;
			$data['question_6']['Answer 1'] = Alumni::where('technical_1','!=',null)->count();
			$data['question_6']['Answer 2'] = Alumni::where('technical_2','!=',null)->count();
			$data['question_6']['Answer 3'] = Alumni::where('technical_3','!=',null)->count();

			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Please list three technical knowledge or professional skills that you think should be taught in the engineering program that you attended at Kuwait University</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['question_6'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_q6 = $total_q6 + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_q6.'</td></tr>';

			$html .= '</table>';


			$total_q7 = 0;
			$data['question_7']['What improvements to facilities'] = Alumni::where('improvements','!=',null)->count();

			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">What improvements to facilities (classrooms, laboratories, library, computing resources, recreation etc.), faculty (science, social science, and engineering) or delivery mode (hands-on tutorials, video lectures, online lecturing etc.) are likely to enhance learning at Kuwait University?</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['question_7'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_q7 = $total_q7 + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_q7.'</td></tr>';

			$html .= '</table>';

		}



		return $html;


	}

}
