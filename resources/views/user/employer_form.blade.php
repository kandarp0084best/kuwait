@include('user.layouts.header')


<div class="container pt-5 pb-5">
	<form id="employer_survey">


		<div class="row mb-3">
			<div class="col-md-6">
				<div class="form-group">
				    <label for="name">Name:</label>
				    <input type="text" class="form-control" name="name" id="name" placeholder="Name...">
				 </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="name">Company/Organization:</label>
				    <input type="text" class="form-control" name="company_organization" id="company_organization" placeholder="Company/Organization...">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6">
				<div class="form-group">
				    <label for="name">Department/Division:</label>
				    <input type="text" class="form-control" name="department_division" id="department_division" placeholder="Department/Division...">
				 </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="name">Position:</label>
				    <input type="text" class="form-control" name="position" id="position" placeholder="Position...">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6">
				<div class="form-group">
				    <label for="name">Years in position:</label>
				    <input type="text" class="form-control" name="years_in_position" id="years_in_position" placeholder="Years in position...">
				 </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="name">E-mail:</label>
				    <input type="text" class="form-control" name="email" id="email" placeholder="E-mail...">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6">
				<div class="form-group">
				    <label for="name">Tel:</label>
				    <input type="text" class="form-control" name="tel" id="tel" placeholder="Tel...">
				 </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="name">Fax:</label>
				    <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax...">
				 </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Which ONE of the following best describes your organization as a whole?</label>
				<div class="form-group form-check">
				    <input type="radio" value="Government" name="organization" checked="checked" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Government</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Private Company" name="organization" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Private Company</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="Other" name="organization" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Other (please specify</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Job nature of engineering staff (Choose all that apply):</label>
				<div class="form-group form-check">
				    <input type="checkbox" value="Design" name="staff" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Design</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Programming" name="staff" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Programming</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Maintenance" name="staff" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Maintenance</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Procurement" name="staff" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Procurement</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Administrative" name="staff" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Administrative</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Other" name="staff" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Other</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Majors of Engineers being evaluated (Choose all that apply):</label>
				<div class="form-group form-check">
				    <input type="checkbox" value="Design" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Civil</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Programming" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Chemical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Maintenance" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Computer</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Procurement" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Electrical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Administrative" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Petroleum</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Other" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Mechanical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Other" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Industrial & Management Systems</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Engineers to be evaluated are mainly from discipline (Choose 2 maximum).</label>
				<div class="form-group form-check">
				    <input type="checkbox" value="Design" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Civil</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Programming" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Chemical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Maintenance" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Computer</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Procurement" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Electrical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Administrative" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Petroleum</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Other" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Mechanical</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="checkbox" value="Other" name="majors" class="form-check-input" id="connected">
				    <label class="form-check-label" for="Petroleum">Industrial & Management Systems</label>
			    </div>
			</div>
		</div>


		<div class="row mb-3">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-5"><label for="name">- &nbsp;Number of engineers employed in your company (if known):</label></div>
					<div class="col-md-4"><input type="number" class="form-control" name="number_of_engineers" id="number_of_engineers" placeholder="Number of engineers..."></div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-5"><label for="name">- &nbsp;Percentage of Kuwait University graduates (if known):</label></div>
					<div class="col-md-4"><input type="number" class="form-control" name="percentage" id="percentage" placeholder="Percentage..."></div>
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
				      <td width="2%"><p class="rotate2">Very well prepared</p></td>
				      <td width="2%"><p class="rotate2">Well prepared</p></td>
				      <td width="2%"><p class="rotate2">Prepared</p></td>
				      <td width="2%"><p class="rotate2">Somewhat prepared</p></td>
				      <td width="2%"><p class="rotate2">Not prepared</p></td>
				      <td width="2%"><p class="rotate2">Cannot evaluate</p></td>

				      <td colspan="10" class="vertical_align">Skills, abilities, and knowledge</td>

				      <td width="2%"><p class="rotate2">Extremely important</p></td>
				      <td width="2%"><p class="rotate2">Very important</p></td>
				      <td width="2%"><p class="rotate2">Important</p></td>
				      <td width="2%"><p class="rotate2">Somewhat important</p></td>
				      <td width="2%"><p class="rotate2">Not important</p></td>
				      <td width="2%"><p class="rotate2">Cannot evaluate</p></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">1. Apply mathematics, science and engineering knowledge</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">2. Identify, formulate, and solve engineering problems</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">3. Develop new or innovative ideas and work independently</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">4. Use techniques, skills, and modern engineering tools necessary for Engineering design and professional practice (Computer, Internet, Engineering software, etc)</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">5. Design a system, component, or process to meet desired needs</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">6. Communicate orally: informal and prepared talks</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">7. Communicate in writing: letters, technical reports, etc</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">8. Understand professional and ethical responsibility</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">9. Understand impact of engineering solutions in a global/societal context</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">10. Understand contemporary social, economic, and cultural issues</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">11. Work in teams and develop leadership skills</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">12. Function effectively in international and multicultural contexts</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">13. Design and conduct experiments, analyze, and interpret data</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">14. Learn new skills and stay current technically and professionally</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">15. Recognize the need to engage in lifelong learning</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
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
				      <td width="2%"><p class="rotate2">Significant</p></td>
				      <td width="2%"><p class="rotate2">Satisfactory</p></td>
				      <td width="2%"><p class="rotate2">Somewhat satisfactory</p></td>
				      <td width="2%"><p class="rotate2">Not satisfactory</p></td>

				      <td colspan="10" class="vertical_align">Objectives</td>

				      <td width="2%"><p class="rotate2">Extremely important</p></td>
				      <td width="2%"><p class="rotate2">Very important</p></td>
				      <td width="2%"><p class="rotate2">Important</p></td>
				      <td width="2%"><p class="rotate2">Somewhat important</p></td>
				      <td width="2%"><p class="rotate2">Not important</p></td>
				      <td width="2%"><p class="rotate2">Cannot evaluate</p></td>
				    </tr>

				    <tr>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">1. Contribution to company/workplace/institution
(e.g., improve product/service quality, increase productivity, increase revenues, reduce expenses, improve customer satisfaction)</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">2. Contribution to wellbeing of society and the environment
(e.g., safeguard the interest of society, improve economy, develop professional standards and best practices, safeguard and improve the environment)</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">3. Career advancement
(e.g., promotion to higher ranks/positions, increased responsibilities)</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				     
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">4. Degree advancement and continuing education.
(e.g., diplomas, formal course work, graduate courses, graduate degree, training, certificates and professional certification)</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">5. Staying current in profession
(e.g., participation in seminars and conferences, professional development courses and activities, membership in professional societies)</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				    <tr>
				      
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>

				      <td colspan="10" class="text-left">6. Use of leadership capabilities
(e.g., promotion to leadership positions, ability to lead teams, supervisory skills and abilities)</td>

				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				      <td width="2%"><input class="form-check-input" type="checkbox" name="Gender" id="Female" value="Female"></td>
				    </tr>

				  </tbody>
				</table>
			</div>
		</div>


		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Are there other skills, abilities, or knowledge you regard as being important when employing recent graduates? Please outline these below.</label>
				<textarea class="form-control" rows="10"></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;How do Kuwait University graduates compare with graduates from other universities?</label>
			</div>
			<div class="col-md-12">
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="checkbox" name="compare[]" checked="checked" id="inlineCheckbox1" value="Strongly recommend">
				    <label class="form-check-label" for="Petroleum">Much better</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="checkbox" name="compare[]" id="inlineCheckbox1" value="Somewhat better">
				    <label class="form-check-label" for="Petroleum">Somewhat better</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="checkbox" name="compare[]" id="inlineCheckbox1" value="Not as good">
				    <label class="form-check-label" for="Petroleum">Not as good</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="checkbox" name="compare[]" id="inlineCheckbox1" value="Much worse">
				    <label class="form-check-label" for="Petroleum">Much worse</label>
				</div>
				<div class="form-check form-check-inline">
			  		<input class="form-check-input" type="checkbox" name="compare[]" id="inlineCheckbox1" value="About the same">
				    <label class="form-check-label" for="Petroleum">About the same</label>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Have you find it necessary to provide training to the graduates of Kuwait University during the first year of their employment in your organization?</label>
			</div>
			<div class="col-md-12">
				<div class="form-group form-check">
				    <input type="radio" value="1" name="necessary" class="form-check-input" id="necessary">
				    <label class="form-check-label" for="Petroleum">Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="necessary" class="form-check-input" id="necessary">
				    <label class="form-check-label" for="Petroleum">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;If yes, Please specify.</label>
				<textarea class="form-control" rows="10"></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Is hiring a KU graduate your first preference?</label>
			</div>
			<div class="col-md-12">
				<div class="form-group form-check">
				    <input type="radio" value="1" name="hiring" class="form-check-input" id="hiring">
				    <label class="form-check-label" for="Petroleum">Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="hiring" class="form-check-input" id="hiring">
				    <label class="form-check-label" for="Petroleum">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;What particular strengths do you perceive Kuwait University engineering graduates possess?</label>
				<textarea class="form-control" rows="10"></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;In what areas should Kuwait University improve its preparation of engineering graduates for employment?</label>
				<textarea class="form-control" rows="10"></textarea>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				<label for="name">- &nbsp;Would you be interested in receiving a summary report on the College of Engineering Employer Survey of 2022 – 2023?</label>
			</div>
			<div class="col-md-12">
				<div class="form-group form-check">
				    <input type="radio" value="1" name="summary_report" class="form-check-input" id="summary_report">
				    <label class="form-check-label" for="Petroleum">Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="summary_report" class="form-check-input" id="summary_report">
				    <label class="form-check-label" for="Petroleum">No</label>
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
				    <label class="form-check-label" for="Petroleum">Yes</label>
			    </div>
			    <div class="form-group form-check">
				    <input type="radio" value="0" name="participating" class="form-check-input" id="participating">
				    <label class="form-check-label" for="Petroleum">No</label>
			    </div>
			</div>
		</div>

		<div class="row mb-3 mt-5">
			<div class="col-md-12 text-center">
				<h3>Thank you for completing this survey.<br>
Your feedback will be used to improve the preparation of<br>
Kuwait University Engineering graduates for employment.</h3>
			</div>
		</div>

		<div class="row pt-5">
			<div class="col-md-1"><button type="submit" class="btn btn-primary">Submit</button></div>
			<div class="col-md-11"></div>
		</div>

	</form>
</div>

@include('user.layouts.footer')
