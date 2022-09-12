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

		if ($request->departm != 'College') {

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

			

		if ($request->departm)
		{
			$total_major = 0;
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Major</th><th style="width:30%;">Total Responses</th></tr>';
					// $html .= '<tr><td>Unspecified</td><td>0</td></tr>';
				foreach ($data['major'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_major = $total_major + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_major.'</td></tr>';

			$html .= '</table>';
		}



		if ($request->checkbox_f == 'select_all') {
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

		if ($request->year) {

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


		if ($request->checkbox_f == 'degrees') {

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

		}


		if ($request->checkbox_f == 'employment_status') {

			$total_employment_status = 0;
			$data['employment_status']['Unspecified'] = Alumni::where('employment_status',null)->count();
			$data['employment_status']['Employed'] = Alumni::where('employment_status','Employed')->count();
			$data['employment_status']['MSc/PhD Student'] = Alumni::where('employment_status','MSc/PhD Student')->count();
			$data['employment_status']['Self Employed'] = Alumni::where('employment_status','Self Employed')->count();
			$data['employment_status']['Unemployed not seeking job'] = Alumni::where('employment_status','Unemployed not seeking job')->count();
			$data['employment_status']['Unemployed seeking job'] = Alumni::where('employment_status','Unemployed seeking job')->count();
			$data['employment_status']['Others'] = Alumni::where('employment_status','Others')->count();

			
			$html .= '<table class="table table-bordered table-striped text-center" style="margin-bottom:20px;">';
				$html .= '<tr><th style="width:70%;">Employment Status</th><th style="width:30%;">Total Responses</th></tr>';
				foreach ($data['employment_status'] as $k1 => $v1) {
					$html .= '<tr><td>'.$k1.'</td><td>'.$v1.'</td></tr>';
					$total_employment_status = $total_employment_status + $v1;
				}
				$html .= '<tr class="tr_foo text-left"><td>Total</td><td>'.$total_employment_status.'</td></tr>';

			$html .= '</table>';

		}







		return $html;


	}

}
