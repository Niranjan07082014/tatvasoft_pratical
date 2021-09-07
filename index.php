<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tatvasoft</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- Header -->
	<div class="container">
		<div class="col-md-12 bg-primary">
			<h1>Tatvasoft</h1>
		</div>
	</div>

	<!-- Body -->
	<div class="container">
		<div class="col-md-12">
			<h1>Event Details</h1>
			<div class="col-md-12 text-right mb-1">
				<button type="button" class="btn btn-primary" id="btnAdd" btn-att="Add">Add</button>
				<button type="button" class="btn btn-primary d-none" id="btnBack" btn-att="Listing">Back</button>
			</div>
			<!-- Listing -->
			<div class="col-md-12" id="successMsg">
				
			</div>
			<div class="col-md-12" id="listingSection">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Title</th>
							<th scope="col">Start Date</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody id="tableData">
						
					</tbody>
				</table>
			</div>

			<!-- Add -->
			<div class="col-md-12 d-none" id="addSection">
				<form name="addForm" id="addForm">
				  <div class="form-group row">
				    <label for="eventTitle" class="col-sm-2 col-form-label">Event Title:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="eventTitle" id="eventTitle" value="" required>
				    </div>
				    <div class="col-sm-10">
				    	<span class="error text-danger" id="eventTitleErr"></span>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="startDate" class="col-sm-2 col-form-label">Start Date:</label>
				    <div class="col-sm-10">
				      <input type="date" class="form-control" name="startDate" id="startDate" required>
				    </div>
				    <div class="col-sm-10">
				    	<span class="error text-danger" id="startDateErr"></span>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="recurrence" class="col-sm-2 col-form-label">Recurrence:</label>
				    <div class="col-sm-10">
				      <label for="repeat" class="col-sm-2 col-form-label">Repeat Every</label>
				      <div class="col-sm-10">
				      		<input type="number" name="repeatOccurence" id="repeatOccurence" min="0" required>
				      		<select class="form-control" name="repeatType" id="repeatType" required>
				      			<option value="day">Day</option>
				      			<option value="week">Week</option>
				      			<option value="month">Month</option>
				      			<option value="year">Year</option>
				      		</select>
				      </div>
				      <div class="col-sm-10">
				    	<span class="error text-danger" id="repeatOccurenceErr"></span>
				      </div>
				      <div class="col-sm-10" id="weekSection">
				      	
				      </div>
				      <div class="col-sm-10">
				    	<span class="error text-danger" id="weekSectionErr"></span>
				      </div>
				      <label for="ends" class="col-sm-2 col-form-label">Ends</label>
				      <div class="col-sm-10">
						<input type="radio" id="occuranceStatus" name="occuranceStatus" value="on" checked="checked">On
				      </div>
				      <div class="col-sm-10">
				      	<input type="radio" id="occuranceStatus" name="occuranceStatus" value="after">After
				      	<input type="number" name="afterNo" min="0">
				      </div>
				      <div class="col-sm-10">
				    	<span class="error text-danger" id="occuranceStatusErr"></span>
				      </div>
				    </div>
				  </div>
				  <input type="hidden" name="action" id="action" value="submit">
				  <div class="col-md-12 text-center">
				  		<button type="button" class="btn btn-info" id="btnSubmit">Submit</button>
				  </div>
				</form>
			</div>

			<!-- View -->
			<div class="col-md-12 d-none" id="viewSection">
				
			</div>
		</div>
	</div>

	<!-- Footer -->
	<!-- <div class="container">
		<div class="col-md-12 bg-secondary">
			<p>Created By Niranjan Behera</p>
		</div>
	</div>  -->

</body>
<script src="common.js"></script>
</html>
