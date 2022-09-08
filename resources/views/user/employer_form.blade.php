@include('user.layouts.header')


<div class="container pt-5 pb-5">
	<div class="form_box">
	<div class="row pt-3 pb-3">
		<div class="col-md-12">
			<h4>The College of Engineering and Petroleum at Kuwait University aims to improve the quality of its educational programs. As a major stakeholder in our college, we seek your assessment on how we have been serving your needs in terms of the quality of our graduates. Thank you for your cooperation and support. Please note that this survey is recommended to be completed online at <a href="http://www.eng.ku.edu.kw/oaa/employer/" target="_blank">http://www.eng.ku.edu.kw/oaa/employer/</a> , then can be printed for your records.</h4>
		</div>
	</div>

	<form id="employer_survey">


		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="name">Name:</label>
				    <input type="text" class="form-control" name="name" id="name" placeholder="Name..." required="">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="name">Company/Organization:</label>
				    <input type="text" class="form-control" name="company_organization" id="company_organization" placeholder="Company/Organization..." required="">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="name">Department/Division:</label>
				    <input type="text" class="form-control" name="department_division" id="department_division" placeholder="Department/Division..." required="">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="name">Position:</label>
				    <input type="text" class="form-control" name="position" id="position" placeholder="Position..." required="">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="name">Years in position:</label>
				    <input type="text" class="form-control" name="years_in_position" id="years_in_position" placeholder="Years in position..." required="">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="name">E-mail:</label>
				    <input type="text" class="form-control" name="email" id="email" placeholder="E-mail..." required="">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="name">Tel:</label>
				    <input type="text" class="form-control" name="tel" id="tel" placeholder="Tel..." required="">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group">
				    <label for="name">Fax:</label>
				    <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax..." required="">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Which ONE of the following best describes your organization as a whole?</label>
				<div class="form-group form-check">
				    <input type="radio" value="Government" name="organization" class="form-check-input" required="">
				    <label class="form-check-label" >Government</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Private Company" name="organization" class="form-check-input" required="">
				    <label class="form-check-label" >Private Company</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Other" name="organization" class="form-check-input" required="">
				    <label class="form-check-label" >Other (please specify</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Job nature of engineering staff (Choose all that apply):</label>
				<div class="form-group form-check">
				    <input type="radio" value="Design" name="staff" class="form-check-input" required="">
				    <label class="form-check-label" >Design</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Programming" name="staff" class="form-check-input" required="">
				    <label class="form-check-label" >Programming</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Maintenance" name="staff" class="form-check-input" required="">
				    <label class="form-check-label" >Maintenance</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Procurement" name="staff" class="form-check-input" required="">
				    <label class="form-check-label" >Procurement</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Administrative" name="staff" class="form-check-input" required="">
				    <label class="form-check-label" >Administrative</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Other" name="staff" class="form-check-input" required="">
				    <label class="form-check-label" >Other</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Majors of Engineers being evaluated (Choose all that apply):</label>
				<div class="form-group form-check">
				    <input type="radio" value="Design" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Civil</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Programming" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Chemical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Maintenance" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Computer</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Procurement" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Electrical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Administrative" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Petroleum</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Other" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Mechanical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Other" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Industrial & Management Systems</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Engineers to be evaluated are mainly from discipline (Choose 2 maximum).</label>
				<div class="form-group form-check">
				    <input type="radio" value="Design" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Civil</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Programming" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Chemical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Maintenance" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Computer</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Procurement" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Electrical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Administrative" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Petroleum</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Other" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Mechanical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Other" name="majors" class="form-check-input" required="">
				    <label class="form-check-label" >Industrial & Management Systems</label>
			    </div>
			</div>
		</div>


		<div class="row mb-3">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<label for="name">- &nbsp;Number of engineers employed in your company (if known):</label>
					</div>
					<div class="col-md-12">
						<input type="number" class="form-control" name="number_of_engineers" id="number_of_engineers" placeholder="Number of engineers..." required="">
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<label for="name">- &nbsp;Percentage of Kuwait University graduates (if known):</label>
					</div>
					<div class="col-md-12">
						<input type="number" class="form-control" name="percentage" id="percentage" placeholder="Percentage..." required="">
					</div>
				</div>
			</div>
		</div>


		<div class="row mb-5">
			<div class="col-md-12">
				<h4>Please:</h4>
			</div>
			<div class="col-md-12">
				<p><b>First:</b> Rate the following skills, abilities, and knowledge in terms of the level of preparedness of recent Kuwait University engineering graduates.</p>
			</div>
			<div class="col-md-12">
				<p><b>Second:</b> Rate each item according to its importance to your business and operations.</p>
			</div>
		</div>


		<div class="row mb-5">
			<div class="col-md-12">
				<table class="table table-bordered table-striped">
				  <thead class="text-center">
				    <tr>
				      <th scope="col" colspan="6" class="table_title">Assessment of Graduates</th>
				      <th colspan="10"></th>
				      <th scope="col" colspan="6" class="table_title">Importance to business</th>
				    </tr>
				  </thead>
				  <tbody class="text-center">
				    <tr>
				      <td class="vertical-align"><p class="rotate2">Very well prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Well prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Somewhat prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Not prepared</p></td>
				      <td class="vertical-align"><p class="rotate2">Cannot evaluate</p></td>

				      <td colspan="10" class="vertical_align table_title">Skills, abilities, and knowledge</td>

				      <td class="vertical-align"><p class="rotate2">Extremely important</p></td>
				      <td class="vertical-align"><p class="rotate2">Very important</p></td>
				      <td class="vertical-align"><p class="rotate2">Important</p></td>
				      <td class="vertical-align"><p class="rotate2">Somewhat important</p></td>
				      <td class="vertical-align"><p class="rotate2">Not important</p></td>
				      <td class="vertical-align"><p class="rotate2">Cannot evaluate</p></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_1"></td>

				      <td colspan="10" class="text-left">1. Apply mathematics, science and engineering knowledge</td>

				      <td><input class="form-check-input" type="radio" required="" name="important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="important_1"></td>
				    </tr>

				    <tr>
				      	<td><input class="form-check-input" type="radio" required="" name="prepared_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_2"></td>

				      	<td colspan="10" class="text-left">2. Identify, formulate, and solve engineering problems</td>

				      	<td><input class="form-check-input" type="radio" required="" name="important_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_2"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_2"></td>
				    </tr>

				    <tr>
				      	<td><input class="form-check-input" type="radio" required="" name="prepared_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_3"></td>

				      	<td colspan="10" class="text-left">3. Develop new or innovative ideas and work independently</td>

				      	<td><input class="form-check-input" type="radio" required="" name="important_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_3"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_3"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_4"></td>

				      <td colspan="10" class="text-left">4. Use techniques, skills, and modern engineering tools necessary for Engineering design and professional practice (Computer, Internet, Engineering software, etc)</td>

				      <td><input class="form-check-input" type="radio" required="" name="important_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_4"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_4"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_5"></td>

				      <td colspan="10" class="text-left">5. Design a system, component, or process to meet desired needs</td>

				      <td><input class="form-check-input" type="radio" required="" name="important_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_5"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_5"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_6"></td>

				      <td colspan="10" class="text-left">6. Communicate orally: informal and prepared talks</td>

				      <td><input class="form-check-input" type="radio" required="" name="important_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_6"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_6"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_7"></td>

				      <td colspan="10" class="text-left">7. Communicate in writing: letters, technical reports, etc</td>

				      <td><input class="form-check-input" type="radio" required="" name="important_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_7"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_7"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="prepared_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_8"></td>

				      <td colspan="10" class="text-left">8. Understand professional and ethical responsibility</td>

				      <td><input class="form-check-input" type="radio" required="" name="important_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_8"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_8"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="important_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_9"></td>

				      <td colspan="10" class="text-left">9. Understand impact of engineering solutions in a global/societal context</td>

				      <td><input class="form-check-input" type="radio" required="" name="prepared_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_9"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_9"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="important_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_10"></td>

				      <td colspan="10" class="text-left">10. Understand contemporary social, economic, and cultural issues</td>

				      <td><input class="form-check-input" type="radio" required="" name="prepared_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_10"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_10"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="important_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_11"></td>

				      <td colspan="10" class="text-left">11. Work in teams and develop leadership skills</td>

				      <td><input class="form-check-input" type="radio" required="" name="prepared_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_11"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_11"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="important_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_12"></td>

				      <td colspan="10" class="text-left">12. Function effectively in international and multicultural contexts</td>

				      <td><input class="form-check-input" type="radio" required="" name="prepared_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_12"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_12"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="important_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_13"></td>

				      <td colspan="10" class="text-left">13. Design and conduct experiments, analyze, and interpret data</td>

				      <td><input class="form-check-input" type="radio" required="" name="prepared_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_13"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_13"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="important_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_14"></td>

				      <td colspan="10" class="text-left">14. Learn new skills and stay current technically and professionally</td>

				      <td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="important_15"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_15"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_15"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_15"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_15"></td>
						<td><input class="form-check-input" type="radio" required="" name="important_15"></td>

				      <td colspan="10" class="text-left">15. Recognize the need to engage in lifelong learning</td>

				      <td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
						<td><input class="form-check-input" type="radio" required="" name="prepared_14"></td>
				    </tr>

				  </tbody>
				</table>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<p>Please evaluate/rate the following engineering programs objectives according to:</p>
				<ul class="dashed">
				  <li>How important they are to your company needs</li>
				  <li>The level of attainment of our graduates.</li>
				</ul>
			</div>
		</div>

		<div class="row mb-5">
			<div class="col-md-12">
				<table class="table table-bordered table-striped">
				  <thead class="text-center">
				    <tr>
				      <th scope="col" colspan="6" class="table_title">Level of Attainment</th>
				      <th colspan="8"></th>
				      <th scope="col" colspan="6" class="table_title">Importance to business</th>
				    </tr>
				  </thead>
				  <tbody class="text-center">
				    <tr>
				      <td class="vertical-align"><p class="rotate2">Significant</p></td>
				      <td class="vertical-align"><p class="rotate2">Satisfactory</p></td>
				      <td class="vertical-align"><p class="rotate2">Somewhat satisfactory</p></td>
				      <td class="vertical-align"><p class="rotate2">Not satisfactory</p></td>

				      <td colspan="10" class="vertical_align table_title">Objectives</td>

				      <td class="vertical-align"><p class="rotate2">Extremely important</p></td>
				      <td class="vertical-align"><p class="rotate2">Very important</p></td>
				      <td class="vertical-align"><p class="rotate2">Important</p></td>
				      <td class="vertical-align"><p class="rotate2">Somewhat important</p></td>
				      <td class="vertical-align"><p class="rotate2">Not important</p></td>
				      <td class="vertical-align"><p class="rotate2">Cannot evaluate</p></td>
				    </tr>

				    <tr>
				      <td><input class="form-check-input" type="radio" required="" name="significant_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_1"></td>

				      <td colspan="10" class="text-left">1. Contribution to company/workplace/institution (e.g., improve product/service quality, increase productivity, increase revenues, reduce expenses, improve customer satisfaction)</td>

				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_1"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_1"></td>
				    </tr>

				    <tr>
				      
				      <td><input class="form-check-input" type="radio" required="" name="significant_2"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_2"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_2"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_2"></td>

				      <td colspan="10" class="text-left">2. Contribution to wellbeing of society and the environment (e.g., safeguard the interest of society, improve economy, develop professional standards and best practices, safeguard and improve the environment)</td>

				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_2"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_2"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_2"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_2"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_2"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_2"></td>
				    </tr>

				    <tr>
				      
				      <td><input class="form-check-input" type="radio" required="" name="significant_3"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_3"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_3"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_3"></td>

				      <td colspan="10" class="text-left">3. Career advancement (e.g., promotion to higher ranks/positions, increased responsibilities)</td>

				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_3"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_3"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_3"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_3"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_3"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_3"></td>
				    </tr>

				    <tr>
				     
				      <td><input class="form-check-input" type="radio" required="" name="significant_4"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_4"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_4"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_4"></td>

				      <td colspan="10" class="text-left">4. Degree advancement and continuing education. (e.g., diplomas, formal course work, graduate courses, graduate degree, training, certificates and professional certification)</td>

				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_4"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_4"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_4"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_4"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_4"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_4"></td>
				    </tr>

				    <tr>
				      
				      <td><input class="form-check-input" type="radio" required="" name="significant_5"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_5"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_5"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_5"></td>

				      <td colspan="10" class="text-left">5. Staying current in profession (e.g., participation in seminars and conferences, professional development courses and activities, membership in professional societies)</td>

				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_5"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_5"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_5"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_5"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_5"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_5"></td>
				    </tr>

				    <tr>
				      
				      <td><input class="form-check-input" type="radio" required="" name="significant_6"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_6"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_6"></td>
				      <td><input class="form-check-input" type="radio" required="" name="significant_6"></td>

				      <td colspan="10" class="text-left">6. Use of leadership capabilities (e.g., promotion to leadership positions, ability to lead teams, supervisory skills and abilities)</td>

				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_6"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_6"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_6"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_6"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_6"></td>
				      <td><input class="form-check-input" type="radio" required="" name="objectives_important_6"></td>
				    </tr>

				  </tbody>
				</table>
			</div>
		</div>


		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Are there other skills, abilities, or knowledge you regard as being important when employing recent graduates? Please outline these below.</label>
				<textarea class="form-control" rows="5" required=""></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;How do Kuwait University graduates compare with graduates from other universities?</label>
			</div>
			<div class="col-md-12">
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="radio" name="compare[]" id="inlineCheckbox1" value="Strongly recommend" required="">
				    <label class="form-check-label" >Much better</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="radio" name="compare[]" id="inlineCheckbox1" value="Somewhat better" required="">
				    <label class="form-check-label" >Somewhat better</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="radio" name="compare[]" id="inlineCheckbox1" value="Not as good" required="">
				    <label class="form-check-label" >Not as good</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="radio" name="compare[]" id="inlineCheckbox1" value="Much worse" required="">
				    <label class="form-check-label" >Much worse</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="radio" name="compare[]" id="inlineCheckbox1" value="About the same" required="">
				    <label class="form-check-label" >About the same</label>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Have you find it necessary to provide training to the graduates of Kuwait University during the first year of their employment in your organization?</label>
			</div>
			<div class="col-md-12">
				<div class="form-group form-check">
				    <input type="radio" value="1" name="necessary" class="form-check-input" id="necessary" required="">
				    <label class="form-check-label" >Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="necessary" class="form-check-input" id="necessary" required="">
				    <label class="form-check-label" >No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;If yes, Please specify.</label>
				<textarea class="form-control" rows="5" required=""></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Is hiring a KU graduate your first preference?</label>
			</div>
			<div class="col-md-12">
				<div class="form-group form-check">
				    <input type="radio" value="1" name="hiring" class="form-check-input" id="hiring" required="">
				    <label class="form-check-label" >Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="hiring" class="form-check-input" id="hiring" required="">
				    <label class="form-check-label" >No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;What particular strengths do you perceive Kuwait University engineering graduates possess?</label>
				<textarea class="form-control" rows="5" required=""></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;In what areas should Kuwait University improve its preparation of engineering graduates for employment?</label>
				<textarea class="form-control" rows="5" required=""></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Would you be interested in receiving a summary report on the College of Engineering Employer Survey of 2022 – 2023?</label>
			</div>
			<div class="col-md-12">
				<div class="form-group form-check">
				    <input type="radio" value="1" name="summary_report" class="form-check-input" id="summary_report">
				    <label class="form-check-label"  required="">Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="summary_report" class="form-check-input" id="summary_report">
				    <label class="form-check-label"  required="">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Would you be interested in participating at a luncheon briefing with other employers and faculty staff on the results of the College of Engineering Employer Survey of 2022 – 2023?</label>
			</div>
			<div class="col-md-12">
				<div class="form-group form-check">
				    <input type="radio" value="1" name="participating" class="form-check-input" id="participating">
				    <label class="form-check-label"  required="">Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="participating" class="form-check-input" id="participating">
				    <label class="form-check-label"  required="">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3 mt-5">
			<div class="col-md-12 text-center">
				<h3>Thank you for completing this survey.<br>Your feedback will be used to improve the preparation of<br>Kuwait University Engineering graduates for employment.</h3>
			</div>
		</div>

		<div class="row pt-5">
			<div class="col-md-1"><button type="submit" class="btn btn-primary">Submit</button></div>
			<div class="col-md-11"></div>
		</div>

	</form>
	</div>
</div>

@include('user.layouts.footer')
