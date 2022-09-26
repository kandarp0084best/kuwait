@include('user.layouts.header')

<div class="container pt-5 pb-5">

	<div class="form_box">

	<div class="row">
		<div class="col-md-3">
			<div class="navbar-header">
		      <a class="navbar-brand" href="/"><img src="{{asset('public/assets/images/logo.png')}}" width="100%" height="185"></a>
		    </div>
		</div>
		<div class="col-md-6 text-center header-title mb-3">
			<h3>Kuwait University<br>
				College of Engineering & Petroleum<br>
				Office of Academic Assessment<br>
				ALUMNI SURVEY<br>2022 (for graduates of 2017 to 2022)</h3>
		</div>
		<div class="col-md-3">
		</div>
			
		<div class="col-md-4 text-center small-text">
			P.O. Box 5969, Safat 13060, Kuwait
		</div>
		<div class="col-md-4 text-center small-text">
			<a href="http://www.eng.ku.edu" target="_blank">http://www.eng.ku.edu/</a>
		</div>
		<div class="col-md-4 text-center small-text">
			Tel.: <a href="tel:+965 24983331/7706">+965 24983331/7706</a> 
		</div>
	</div>		

	<div class="row pt-3 pb-3">
		<div class="col-md-12">
			<h4>The College of Engineering and Petroleum at Kuwait University is dedicated to the continuous improvement of its undergraduate programs. Information you provide through this survey will be very helpful in this process and is much appreciated. All information will be confidential and your input/comments will be combined with those of other alumni for an anonymous analysis as a group. Thank you for your cooperation and support. Please note that this survey can be completed online at <a href="http:// www.eng.ku.edu.kw/oaa/alumni" target="_blank">http:// www.eng.ku.edu.kw/oaa/alumni</a>  </h4>
		</div>
	</div>

	<form id="alumni" name="alumni" method="post" onsubmit="return false;">

		{{ csrf_field() }}

		<div class="row mb-3">
			<div class="col-md-12">
			  <div class="form-group">
			    <label>1. Engineering Major:</label>
			    <select class="form-control" name="major">
			    	<option  selected="" disabled="">-- Select Engineering Major --</option>
			    	<option value="Chemical">Chemical</option>
			    	<option value="Civil">Civil</option>
			    	<option value="Computer">Computer</option>
			    	<option value="Electrical">Electrical</option>
			    	<option value="Mechanical">Mechanical</option>
			    	<option value="Petroleum">Petroleum</option>
			    	<option value="Industrial & Management Systems">Industrial & Management Systems</option>
			    </select>
			  </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label >2. Name :</label>
				    <input type="text" class="form-control" name="name" id="name" placeholder="Name...">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<label >3. Gender: </label>
				<div class="form-check form-check-inline">
				  <input class="form-check-input"  type="radio" name="gender" value="Female">
				  <label class="form-check-label" >Female</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input"  type="radio" name="gender" value="Male">
				  <label class="form-check-label" >Male</label>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>4. E-mail:</label>
				    <input type="text" class="form-control" name="email" id="email" placeholder="E-mail....">
				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>5. Contact Number:</label>
				    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Contact Number....">
				 </div>
			</div>
		
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>6. Year of Graduation:</label>
				    <!-- <input type="text" class="form-control" name="graduation" id="graduation" placeholder="Year of Graduation..."> -->
				    <select class="form-control" name="graduation">
					    <option selected="" value="" disabled="">-- Year of Graduation --</option>
				    	<option value="2017-2018">2017 - 2018</option>
				    	<option value="2018-2019">2018 - 2019</option>
				    	<option value="2019-2020">2019 - 2020</option>
				    	<option value="2020-2021">2020 - 2021</option>
				    	<option value="2021-2022">2021 - 2022</option>
				    </select>
				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>7. Advanced Degrees (M.Sc./PhD if any):</label><br>
				    <!-- <input type="text" class="form-control" name="degrees" id="degrees" placeholder="Advanced Degrees (M.Sc./PhD if any)...."> -->
				    <div class="form-group form-check-inline">
					    <input type="radio" value="MSc" name="degrees" class="form-check-input"  >
					    <label class="form-check-label">MSc</label>
				    </div>
				    <div class="form-group form-check-inline">
					    <input type="radio" value="MBA" name="degrees" class="form-check-input"  >
					    <label class="form-check-label">MBA</label>
				    </div>
				    <div class="form-group form-check-inline">
					    <input type="radio" value="PhD" name="degrees" class="form-check-input"  >
					    <label class="form-check-label">PhD</label>
				    </div>
				    <div class="form-group form-check-inline">
					    <input type="radio" value="Others" name="degrees" class="form-check-input"  >
					    <label class="form-check-label">Others</label>
				    </div>

				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>8. University Honors/Recognitions (if none, then don’t answer):</label>
				    <input type="text" class="form-control" name="university" id="university" placeholder="University Honors/Recognitions (if none, then don’t answer)....">
				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>9. Membership in Professional Societies (if none, then don’t answer):</label>
				    <input type="text" class="form-control" name="membership" id="membership" placeholder="Membership in Professional Societies (if none, then don’t answer)....">
				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group mb-3">
				    <label>10. Employment Status:</label><br>
				    <!-- <input type="text" class="form-control" name="employment_status" id="employment_status" placeholder="Employment Status...."> -->
				    <div class="form-group form-check-inline">
					    <input type="radio" value="Employed" name="employment_status" class="form-check-input"  >
					    <label class="form-check-label">Employed</label>
				    </div>
				    <div class="form-group form-check-inline">
					    <input type="radio" value="MSc/PhD Student" name="employment_status" class="form-check-input"  >
					    <label class="form-check-label">MSc/PhD Student</label>
				    </div>
				    <div class="form-group form-check-inline">
					    <input type="radio" value="Self Employed" name="employment_status" class="form-check-input"  >
					    <label class="form-check-label">Self Employed</label>
				    </div>
				    <div class="form-group form-check-inline">
					    <input type="radio" value="Unemployed not seeking job" name="employment_status" class="form-check-input"  >
					    <label class="form-check-label">Unemployed not seeking job</label>
				    </div>
				    <div class="form-group form-check-inline">
					    <input type="radio" value="Unemployed seeking job" name="employment_status" class="form-check-input"  >
					    <label class="form-check-label">Unemployed seeking job</label>
				    </div>
				    <div class="form-group form-check-inline">
					    <input type="radio" value="Others" name="employment_status" class="form-check-input"  >
					    <label class="form-check-label">Others</label>
				    </div>
				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>11. Employer:</label>
				    <input type="text" class="form-control" name="employer" id="employer" placeholder="Employer....">
				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>12. Employer Classification:</label><br>
				    <!-- <input type="text" class="form-control" name="employer_classification" id="employer_classification" placeholder="Employer Classification...."> -->
				    <select class="form-control" name="employer_classification">
				    	<option selected="" value="" disabled="">-- Select Employer Classification --</option>
				    	<option value="Ministry/Government">Ministry/Government</option>
				    	<option value="Research/Academic">Research/Academic</option>
				    	<option value="Plants (Power/Water)">Plants (Power/Water)</option>
				    	<option value="Oil Production/Exploration">Oil Production/Exploration</option>
				    	<option value="Oil Refinery/Petrochemicals">Oil Refinery/Petrochemicals</option>
				    	<option value="Investment (Company/Bank)">Investment (Company/Bank)</option>
				    	<option value="Construction">Construction</option>
				    	<option value="Manufacturing">Manufacturing</option>
				    	<option value="Consultation">Consultation</option>
				    	<option value="IT">IT</option>
				    	<option value="Telecommunications">Telecommunications</option>
				    	<option value="Others">Others</option>
				    </select>
				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>13. Job Title:</label>
				    <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title....">
				 </div>
			</div>

			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>14. Job Responsibilities:</label><br>
				    <!-- <textarea class="form-control" name="job_description" id="job_description" placeholder="Job Description...." rows="5"></textarea> -->
				    <select class="form-control" name="job_description">
				    	<option selected="" value="" disabled="">-- Select Job Responsibilities --</option>
				    	<option value="Management">Management</option>
				    	<option value="Project Management">Project Management</option>
				    	<option value="Design">Design</option>
				    	<option value="Maintenanve">Maintenanve</option>
				    	<option value="Programming">Programming</option>
				    	<option value="Product/Process Development">Product/Process Development</option>
				    	<option value="Teaching">Teaching</option>
				    	<option value="Auditing/Review">Auditing/Review</option>
				    	<option value="Planning">Planning</option>
				    	<option value="Operation/Inspection">Operation/Inspection</option>
				    	<option value="Research">Research</option>
				    	<option value="Others">Others</option>
				    </select>

				 </div>
			</div>
			
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>15. Employment Honors/Recognition (if none, then don’t answer):</label>
				    <input type="text" class="form-control" name="employment" id="employment" placeholder="Employment Honors/Recognition (if none, then don’t answer)....">
				 </div>
			</div>
			
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<label>16. Have you attended any professional/technical society conferences or meetings since graduation?</label>
				<br>
				<div class="form-group form-check-inline">
				    <input type="radio" value="1" name="conferences" class="form-check-input" >
				    <label class="form-check-label">Yes</label>
			    </div>
			    <div class="form-group form-check-inline">
				    <input type="radio" value="0" name="conferences" class="form-check-input" >
				    <label class="form-check-label">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<label>17. Have you participated in continuing education activities e.g. (short courses, seminars, conferences)since graduation?</label><br>
				<div class="form-group form-check-inline">
				    <input type="radio" value="1" name="activities" class="form-check-input"  id="activities">
				    <label class="form-check-label">Yes</label>
			    </div>
			    <div class="form-group form-check-inline">
				    <input type="radio" value="0" name="activities" class="form-check-input"  id="activities">
				    <label class="form-check-label">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<label>18. How connect do you feel to Kuwait University and your engineering department after graduating from Kuwait University?</label><br>
				<div class="form-group form-check-inline">
				    <input type="radio" value="Very well connected" name="connected" class="form-check-input">
				    <label class="form-check-label">Very well connected</label>
			    </div>
			    <div class="form-group form-check-inline">
				    <input type="radio" value="Well connected" name="connected" class="form-check-input">
				    <label class="form-check-label">Well connected</label>
			    </div>
			    <div class="form-group form-check-inline">
				    <input type="radio" value="Little connected" name="connected" class="form-check-input">
				    <label class="form-check-label">Little connected</label>
			    </div>
			    <div class="form-group form-check-inline">
				    <input type="radio" value="Not connected" name="connected" class="form-check-input">
				    <label class="form-check-label">Not connected</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">

			<div class="col-md-12 mb-3">
				<label>19. <b>Please evaluate/rate the following elements of Program Educational Objectives according to:</b></label><br>
				<label class="form-check-label">a) How important there are to your career</label><br>
				<label class="form-check-label">b) The level of your attainment</label>
			</div>



			<table class="table table-bordered table-striped">
				  <thead class="text-center">
				    <tr>
				      <th scope="col" colspan="6" class="table_title">Importance to employment</th>
				      <th colspan="9"></th>
				      <th scope="col" colspan="4" class="table_title">Level of attainment</th>
				    </tr>
				  </thead>
				  <tbody class="text-center">

				  	<tr>
				      <td class="vertical-align"><p class="rotate2">Extremely important</p></td>
				      <td class="vertical-align"><p class="rotate2">Very important</p></td>
				      <td class="vertical-align"><p class="rotate2">important</p></td>
				      <td class="vertical-align"><p class="rotate2">Somewhat important</p></td>
				      <td class="vertical-align"><p class="rotate2">Not important</p></td>

				      <td colspan="10" class="vertical_align table_title">Element of Program Educational Objectives</td>

				      <td class="vertical-align"><p class="rotate2">Significant</p></td>
				      <td class="vertical-align"><p class="rotate2">Satisfactory</p></td>
				      <td class="vertical-align"><p class="rotate2">Somewhat Satisfactory</p></td>
				      <td class="vertical-align"><p class="rotate2">Not Satisfactory</p></td>
				    </tr>


				    <tr>

				  		<td><input class="form-check-input"  type="radio" name="importance_1" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_1" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_1" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_1" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_1" value="5"></td>

				      	<td colspan="10" class="text-left">1. Contribution to company/workplace/institution (e.g., improve product/service quality, increase productivity, increase revenues, reduce expenses, improve customer satisfaction, etc.)</td>

				  		<td><input class="form-check-input"  type="radio" name="attainment_1" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_1" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_1" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_1" value="4"></td>

				    </tr>

				    <tr>
				    	
				  		<td><input class="form-check-input"  type="radio" name="importance_2" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_2" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_2" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_2" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_2" value="5"></td>

				      	<td colspan="10" class="text-left">2. Contribution to the well-being of society and the environment (e.g., safeguard the interest of society, improve economy, develop professional standards and best practices, safeguard and improve the environment, etc.)</td>

				  		<td><input class="form-check-input"  type="radio" name="attainment_2" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_2" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_2" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_2" value="4"></td>

				    </tr>

				    <tr>
				    	
				  		<td><input class="form-check-input"  type="radio" name="importance_3" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_3" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_3" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_3" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_3" value="5"></td>

				      	<td colspan="10" class="text-left">3. Career advancement (e.g., promotion to higher ranks/positions, increased responsibilities, etc.)</td>

				  		<td><input class="form-check-input"  type="radio" name="attainment_3" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_3" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_3" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_3" value="4"></td>

				    </tr>

				    <tr>
				    	
				  		<td><input class="form-check-input"  type="radio" name="importance_4" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_4" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_4" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_4" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_4" value="5"></td>

				      	<td colspan="10" class="text-left">4. Degree advancement and continuing education (e.g., diplomas, formal course work, graduate courses, graduate degree, training, certificates and professional certification, etc.)</td>

				  		<td><input class="form-check-input"  type="radio" name="attainment_4" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_4" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_4" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_4" value="4"></td>

				    </tr>

				    <tr>
				    	
				  		<td><input class="form-check-input"  type="radio" name="importance_5" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_5" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_5" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_5" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_5" value="5"></td>

				      	<td colspan="10" class="text-left">5. Staying current in the profession (e.g., participation in seminars and conferences, professional development courses and activities, membership in professional societies, etc.)</td>

				  		<td><input class="form-check-input"  type="radio" name="attainment_5" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_5" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_5" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_5" value="4"></td>

				    </tr>

				    <tr>
				    	
				  		<td><input class="form-check-input"  type="radio" name="importance_6" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_6" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_6" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_6" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="importance_6" value="5"></td>

				      	<td colspan="10" class="text-left">6. Use of leadership capabilities (e.g., promotion to leadership positions, ability to lead teams, supervisory skills and abilities, etc.)</td>

				  		<td><input class="form-check-input"  type="radio" name="attainment_6" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_6" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_6" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="attainment_6" value="4"></td>

				    </tr>

				  </tbody>
			</table>


		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<label>20. <b>Please answer the following questions:</b></label><br>
				<p>1. Rate your overall preparation at Kuwait University with respect to the following:</p>
			</div>
		</div>

		<table class="table table-bordered table-striped">
				  
				  <tbody class="text-center">

				  	<tr>
				      <td colspan="10"></td>
				      <td class="vertical-align"><p class="rotate2">Very well prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Well prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Somewhat prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Not prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Can't Evaluate</p></td>

				    </tr>


				    <tr>

				      	<td colspan="10" class="text-left">a) Be a technically competent engineer</td>
				  		<td><input class="form-check-input"  type="radio" name="questions_1" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_1" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_1" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_1" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_1" value="5"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_1" value="6"></td>

				    </tr>

				    <tr>

				      	<td colspan="10" class="text-left">b) Obtain your first job after graduation</td>
				  		<td><input class="form-check-input"  type="radio" name="questions_2" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_2" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_2" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_2" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_2" value="5"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_2" value="6"></td>

				    </tr>

				    <tr>

				      	<td colspan="10" class="text-left">c) Have the necessary professional skills to meet expectations of your job</td>
				  		<td><input class="form-check-input"  type="radio" name="questions_3" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_3" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_3" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_3" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_3" value="5"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_3" value="6"></td>

				    </tr>

				    <tr>

				      	<td colspan="10" class="text-left">d) Contribute to the society as an engineer</td>
				  		<td><input class="form-check-input"  type="radio" name="questions_4" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_4" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_4" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_4" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_4" value="5"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_4" value="6"></td>

				    </tr>

				    <tr>

				      	<td colspan="10" class="text-left">e) Be aware of your responsibility to consider sustainability in engineering solutions</td>
				  		<td><input class="form-check-input"  type="radio" name="questions_5" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_5" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_5" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_5" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_5" value="5"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_5" value="6"></td>

				    </tr>

				    <tr>

				      	<td colspan="10" class="text-left">f) Pursue advanced degree</td>
				  		<td><input class="form-check-input"  type="radio" name="questions_6" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_6" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_6" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_6" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_6" value="5"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_6" value="6"></td>

				    </tr>

				    <tr>

				      	<td colspan="10" class="text-left">g) Be an entrepreneur and start your own business</td>
				  		<td><input class="form-check-input"  type="radio" name="questions_7" value="1"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_7" value="2"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_7" value="3"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_7" value="4"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_7" value="5"></td>
				  		<td><input class="form-check-input"  type="radio" name="questions_7" value="6"></td>

				    </tr>


				  </tbody>
			</table>

		

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<label>21. Would you recommend Engineering programs of Kuwait University to a friend or a relative?</label><br>
				
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="programs"   value="Strongly recommend">
				    <label class="form-check-label">Strongly recommend</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="programs"  value="Recommend">
				    <label class="form-check-label">Recommend</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="programs"  value="Don’t recommend">
				    <label class="form-check-label">Don’t recommend</label>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<label>22. The performance of Kuwait University engineering graduates at your workplace is comparable to their peers from other institutions.</label><br>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="performance"   value="Strongly agree">
				    <label class="form-check-label">Strongly agree</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="performance"  value="Agree">
				    <label class="form-check-label">Agree</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="performance"  value="Neutral">
				    <label class="form-check-label">Neutral</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="performance"  value="Disagree">
				    <label class="form-check-label">Disagree</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="performance"  value="Strongly Disagree">
				    <label class="form-check-label">Strongly Disagree</label>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<label>23. Taking the engineering training course during your studies at Kuwait University prepares you well in getting or succeeding in your first job.</label><br>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="training_course"   value="Strongly agree">
				    <label class="form-check-label">Strongly agree</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="training_course"  value="Agree">
				    <label class="form-check-label">Agree</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="training_course"  value="Neutral">
				    <label class="form-check-label">Neutral</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="training_course"  value="Disagree">
				    <label class="form-check-label">Disagree</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input"  type="radio" name="training_course"  value="Strongly Disagree">
				    <label class="form-check-label">Strongly Disagree</label>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label>24. In light of your professional experience, please list three of the most useful technical knowledge or professional skills that you acquired during your studies at Kuwait University.</label>
				<!-- <textarea class="form-control" name="experience" id="experience" rows="5"></textarea> -->
			</div>
			<div class="col-md-12 mb-1">
				<input type="text" name="experience_1" class="form-control" placeholder="1. Answer">
			</div>
			<div class="col-md-12 mb-1">
				<input type="text" name="experience_2" class="form-control" placeholder="2. Answer">
			</div>
			<div class="col-md-12 mb-1">
				<input type="text" name="experience_3" class="form-control" placeholder="3. Answer">
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label>25. Please list three technical knowledge or professional skills that you think should be taught in the engineering program that you attended at Kuwait University</label>
				<!-- <textarea class="form-control" name="technical" id="technical" rows="5"></textarea> -->
			</div>
			<div class="col-md-12 mb-1">
				<input type="text" name="technical_1" class="form-control" placeholder="1. Answer">
			</div>
			<div class="col-md-12 mb-1">
				<input type="text" name="technical_2" class="form-control" placeholder="2. Answer">
			</div>
			<div class="col-md-12 mb-1">
				<input type="text" name="technical_3" class="form-control" placeholder="3. Answer">
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label>26. What improvements to facilities (classrooms, laboratories, library, computing resources, recreation etc.), faculty (science, social science, and engineering) or delivery mode (hands-on tutorials, video lectures, online lecturing etc.) are likely to enhance learning at Kuwait University?</label>
				<!-- <textarea class="form-control" name="improvements" id="improvements" rows="5"></textarea> -->
				<div class="col-md-12 mb-1">
					<input type="text" name="improvements_1" class="form-control" placeholder="1. Answer">
				</div>
				<div class="col-md-12 mb-1">
					<input type="text" name="improvements_2" class="form-control" placeholder="2. Answer">
				</div>
				<div class="col-md-12 mb-1">
					<input type="text" name="improvements_3" class="form-control" placeholder="3. Answer">
				</div>
			</div>
			
		</div>


		<div class="row pt-5">
			<div class="col-md-3"><button type="submit" id="alumnisave" class="btn btn-primary">Submit</button></div>
			<div class="col-md-9"></div>
		</div>

	</form>

	<div class="row thank-you-text">
		<div class="row mb-3">
			<div class="col-md-12 text-center">
				<h3>Thank you for completing this survey.<br>Your feedback will be used to improve the preparation of<br>College of Engineering and Petroleum graduates.</h3>
			</div>
		</div>
	</div>
	
	</div>

</div>

@include('user.layouts.footer')
