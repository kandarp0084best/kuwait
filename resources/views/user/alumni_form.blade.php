@include('user.layouts.header')

<div class="container pt-5 pb-5">

	<div class="form_box">
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
			    <label>Major:</label>
			  </div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-check">
				    <input type="checkbox" value="Chemical" name="major[]" class="form-check-input" id="Chemical">
				    <label class="form-check-label" >Chemical</label>
			  	</div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-check">
				    <input type="checkbox" value="Civil" name="major[]" class="form-check-input" id="Civil">
				    <label class="form-check-label" >Civil</label>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-check">
				    <input type="checkbox" value="Computer" name="major[]" class="form-check-input" id="Computer">
				    <label class="form-check-label" >Computer</label>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-check">
				    <input type="checkbox" value="Electrical" name="major[]" class="form-check-input" id="Electrical">
				    <label class="form-check-label">Electrical</label>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-check">
				    <input type="checkbox" name="major[]" value="Industrial & Management Systems" class="form-check-input" id="Industrial & Management Systems">
				    <label class="form-check-label" name="major[]" >Industrial & Management Systems</label>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-check">
				    <input type="checkbox" value="Mechanical" name="major[]" class="form-check-input" id="Mechanical">
				    <label class="form-check-label" >Mechanical</label>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-check">
				    <input type="checkbox" value="Petroleum" name="major[]" class="form-check-input" id="Petroleum">
				    <label class="form-check-label">Petroleum</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label >Name :</label>
				    <input type="text" class="form-control" name="name" id="name" placeholder="Name...">
				 </div>
			</div>
			<div class="col-md-12">
				<label >Gender: </label>
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
				    <label>Year of Graduation:</label>
				    <input type="text" class="form-control" name="graduation" id="graduation" placeholder="Year of Graduation...">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>Employer:</label>
				    <input type="text" class="form-control" name="employer" id="employer" placeholder="Employer....">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>Job Title:</label>
				    <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title....">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>Job Description:</label>
				    <textarea class="form-control" name="job_description" id="job_description" placeholder="Job Description...." rows="5"></textarea>
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>Mailing Address:</label>
				    <input type="text" class="form-control" name="mailing_address" id="mailing_address" placeholder="Mailing Address....">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>E-mail:</label>
				    <input type="text" class="form-control" name="email" id="email" placeholder="E-mail....">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>Advanced Degrees (M.Sc./PhD if any):</label>
				    <input type="text" class="form-control" name="degrees" id="degrees" placeholder="Advanced Degrees (M.Sc./PhD if any)....">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>University Honors/Recognitions (if any):</label>
				    <input type="text" class="form-control" name="university" id="university" placeholder="University Honors/Recognitions (if any)....">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>Employment Honors/Recognitions (if any)</label>
				    <input type="text" class="form-control" name="employment" id="employment" placeholder="Employment Honors/Recognitions (if any)....">
				 </div>
			</div>
			<div class="col-md-12 mb-3">
				<div class="form-group">
				    <label>Membership in Professional Societies (if any):</label>
				    <input type="text" class="form-control" name="membership" id="membership" placeholder="Membership in Professional Societies (if any)....">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label>Have you attended any professional/technical society conferences or meetings since graduation?</label>
				<div class="form-group form-check">
				    <input type="radio" value="1" name="conferences" class="form-check-input" >
				    <label class="form-check-label">Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="conferences" class="form-check-input" >
				    <label class="form-check-label">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label>Have you participated in continuing education activities e.g. (short courses, seminars, conferences)since graduation?</label>
				<div class="form-group form-check">
				    <input type="radio" value="1" name="activities" class="form-check-input"  id="activities">
				    <label class="form-check-label">Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="activities" class="form-check-input"  id="activities">
				    <label class="form-check-label">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label>How connected do you feel to Kuwait University and your engineering department?</label>
				<div class="form-group form-check">
				    <input type="radio" value="Very well connected" name="connected" class="form-check-input"  >
				    <label class="form-check-label">Very well connected</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Well connected" name="connected" class="form-check-input"  >
				    <label class="form-check-label">Well connected</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Little connected" name="connected" class="form-check-input"  >
				    <label class="form-check-label">Little connected</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Not connected" name="connected" class="form-check-input"  >
				    <label class="form-check-label">Not connected</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">

			<div class="col-md-12 mb-3">
				<label><b>Please evaluate/rate the following elements of program educational objectives according to:</b></label><br>
				<label class="form-check-label">a) How important there are to your career</label><br>
				<label class="form-check-label">b) The level of your attainment</label>
			</div>

			<div class="col-md-5">
				<h4>Element of Educational Objectives</h4>
			</div>
			<div class="col-md-4">
				<label class="mb-2"><b>Importance to employment</b></label>
				<div class="col-md-1">
				</div>

				<div class="row">
					<div class="col-md-2"><p class="rotate">Extremely important</p></div>
					<div class="col-md-2"><p class="rotate">Very important</p></div>
					<div class="col-md-2"><p class="rotate">important</p></div>
					<div class="col-md-2"><p class="rotate">Somewhat important</p></div>
					<div class="col-md-2"><p class="rotate">Not important</p></div>
				</div>
					
			</div>
			<div class="col-md-3">
				<label class="mb-2"><b>Level of attainment</b></label>
				<div class="row">
					<div class="col-md-2"><p class="rotate">Significant</p></div>
					<div class="col-md-2"><p class="rotate">Satisfactory</p></div>
					<div class="col-md-2"><p class="rotate">Somewhat Satisfactory</p></div>
					<div class="col-md-2"><p class="rotate">Not Satisfactory</p></div>
				</div>
			</div>

			
			<div class="row mb-3">
				<div class="col-md-5">
					<p>1. Contribution to company/workplace/institution (e.g., improve product/service quality, increase productivity, increase revenues, reduce expenses, improve customer satisfaction, etc.)
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_1" value="1"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_1" value="1" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_1" value="1" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_1" value="1" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_1" value="1" >
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_1" value="1"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_1" value="1" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_1" value="1" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_1" value="1" >
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-5">
					<p>2. Contribution to the well-being of society and the environment
						(e.g., safeguard the interest of society, improve economy, develop professional standards and best practices, safeguard and improve the environment, etc.)
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_2" value="2"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_2" value="2" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_2" value="2" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_2" value="2" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_2" value="2" >
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_2" value="2"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_2" value="2" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_2" value="2" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_2" value="2" >
							</div>
						</div>
					</div>
				</div>
			</div>
			

			<div class="row mb-3">
				<div class="col-md-5">
					<p>3. Career advancement (e.g., promotion to higher ranks/positions, increased responsibilities, etc.)
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_3" value="3"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_3" value="3" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_3" value="3" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_3" value="3" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_3" value="3" >
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_3" value="3"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_3" value="3" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_3" value="3" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_3" value="3" >
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="row mb-3">
				<div class="col-md-5">
					<p>4. Degree advancement and continuing education (e.g., diplomas, formal course work, graduate courses, graduate degree, training, certificates and professional certification, etc.)
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_4" value="4"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_4" value="4" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_4" value="4" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_4" value="4" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_4" value="4" >
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_4" value="4"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_4" value="4" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_4" value="4" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_4" value="4" >
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-5">
					<p>5. Staying current in the profession (e.g., participation in seminars and conferences, professional development courses and activities, membership in professional societies, etc.)
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_5" value="5"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_5" value="5" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_5" value="5" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_5" value="5" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_5" value="5" >
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_5" value="5"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_5" value="5" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_5" value="5" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_5" value="5" >
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mb-3">
				<div class="col-md-5">
					<p>6. Use of leadership capabilities (e.g., promotion to leadership positions, ability to lead teams, supervisory skills and abilities, etc.)
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_6" value="6"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_6" value="6" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_6" value="6" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_6" value="6" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="importance_6" value="6" >
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_6" value="6"  >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_6" value="6" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_6" value="6" >
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check form-check-inline custom-form-check">
						  		<input class="form-check-input"  type="radio" name="attainment_6" value="6" >
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<label><b>Please answer the following questions:</b></label><br>
				<p>1. Rate your overall preparation at Kuwait University with respect to the following:</p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2"><p class="rotate">Very well prepared</p></div>
					<div class="col-md-2"><p class="rotate">Well prepared</p></div>
					<div class="col-md-2"><p class="rotate">Prepared</p></div>
					<div class="col-md-2"><p class="rotate">Somewhat prepared</p></div>
					<div class="col-md-2"><p class="rotate">Not prepared</p></div>
					<div class="col-md-2"><p class="rotate">Can't Evaluate</p></div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-7">
				<p>a) Be a technically competent engineer</p>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_1" value="1"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_1" value="1" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_1" value="1" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_1" value="1" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_1" value="1" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_1" value="1" >
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-7">
				<p>b) Obtain your first job after graduation</p>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_2" value="2"   >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_2" value="2"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_2" value="2"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_2" value="2"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_2" value="2"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_2" value="2"  >
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-7">
				<p>c) Have the necessary professional skills to meet expectations of your job</p>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_3" value="3"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_3" value="3" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_3" value="3" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_3" value="3" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_3" value="3" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_3" value="3" >
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-7">
				<p>d) Contribute to the society as an engineer</p>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_4" value="4"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_4" value="4" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_4" value="4" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_4" value="4" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_4" value="4" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_4" value="4" >
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-7">
				<p>e) Be aware of your responsibility to consider sustainability in engineering solutions</p>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_5" value="5"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_5" value="5" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_5" value="5" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_5" value="5" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_5" value="5" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_5" value="5" >
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-7">
				<p>f) Pursue advanced degree</p>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_6" value="6"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_6" value="6" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_6" value="6" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_6" value="6" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_6" value="6" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_6" value="6" >
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-7">
				<p>g) Be an entrepreneur and start your own business</p>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_7" value="7"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_7" value="7" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_7" value="7" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_7" value="7" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_7" value="7" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-check form-check-inline custom-form-check">
					  		<input class="form-check-input"  type="radio" name="questions_7" value="7" >
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 mb-3">
				<p>2. Would you recommend Engineering programs of Kuwait University to a friend or a relative?</p>
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
				<p>3. The performance of Kuwait University engineering graduates at your workplace is comparable to their peers from other institutions.</p>
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
				<p>4. Taking the engineering training course during your studies at Kuwait University prepares you well in getting or succeeding in your first job.</p>
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
				<label>5. In light of your professional experience, please list three of the most useful technical knowledge or professional skills that you acquired during your studies at Kuwait University.</label>
				<textarea class="form-control" name="experience" id="experience" rows="5"></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label>6. Please list three technical knowledge or professional skills that you think should be taught in the engineering program that you attended at Kuwait University</label>
				<textarea class="form-control" name="technical" id="technical" rows="5"></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label>7. What improvements to facilities (classrooms, laboratories, library, computing resources, recreation etc.), faculty (science, social science, and engineering) or delivery mode (hands-on tutorials, video lectures, online lecturing etc.) are likely to enhance learning at Kuwait University?</label>
				<textarea class="form-control" name="improvements" id="improvements" rows="5"></textarea>
			</div>
		</div>


		<div class="row pt-5">
			<div class="col-md-1"><button type="submit" id="alumnisave" class="btn btn-primary">Submit</button></div>
			<div class="col-md-11"></div>
		</div>

	</form>
	</div>

</div>

@include('user.layouts.footer')
