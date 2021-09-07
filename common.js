$(document).ready(function(){
	eventListing();
})
function viewEvent(id) {
	$.ajax({
			url: 'common.php',
			type: 'get',
			data: {action: 'View',id:id},
			success: function(res) {
				var respose = JSON.parse(res);
				if(respose != ''){
					var html = '';
					var start_date =  new Date(respose.start_date);
					var event_details = [];
					if(respose.repeat_type == 'day'){
						var day1 = start_date.setDate(start_date.getDate + respose.repeat_every);
						event_details.push(day1);
					}else if(respose.repeat_type == 'month'){
					}else if(respose.repeat_type == 'week'){

					}else if(respose.repeat_type == 'year'){
						
					}
					html  = `<p>Event Title : ${respose.title}</p>
					        <table class="table">
					        <tr>
					        <td>Date</td>
					        <td>Day Name</td>
					        </tr>
					        </table>`;
					addEditViewAction('View');        
					$('#viewSection').html(html);        	
				}
			},
			error: function(xhr) {
				console.log(xhr.responseText);
			}
		});
}
function deleteEvent(id) {
	if(confirm('Are you sure want to delete this record') == true){
		$.ajax({
				url: 'common.php',
				type: 'get',
				data: {action: 'Delete',id:id},
				success: function(res) {
					var respose = JSON.parse(res);
					if(respose.status == true){
						eventListing();
						$('#successMsg').html(`<span class="text-success">${respose.msg}</span>`);
					}
				},
				error: function(xhr) {
					console.log(xhr.responseText);
				}
			});
	}
}
function eventListing() {
	$.ajax({
			url: 'common.php',
			type: 'get',
			data: {action: 'Listing'},
			success: function(res) {
				var respose = JSON.parse(res);
				if(respose != ''){
					var html = '';
					for(var i = 0; i < respose.length; i++){
						var slno = i+1;
						html += `<tr><td>${slno}</td>
								<td>${respose[i].title}</td>
								<td>${respose[i].start_date}</td>
								<td><button type="button" class="btn btn-info" id="btnView" onclick="viewEvent(${respose[i].id})">View</button>
								<button type="button" class="btn btn-danger" id="btnDelete" onclick="deleteEvent(${respose[i].id})">Delete</button></td></tr>`; 
					}
					$('#tableData').html(html);
				}
			},
			error: function(xhr) {
				console.log(xhr.responseText);
			}
		});
}

$(document).on('click', '#btnAdd, #btnBack', function(){
	let action = $(this).attr('btn-att');
	addEditViewAction(action); 
});

$(document).on('change', '#repeatType', function(){
	let changeVal = $(this).val();
	let html = '';
	if(changeVal == 'week'){
		$('#weekSection').html('');
		html = `<label for="ends" class="scol-form-label">Repeated On</label>
				<div class="col-sm-10">
				<input type="radio" name="day" value="sun>Sunday<br>
				<input type="radio" name="day" value="mon">Monday<br>
				<input type="radio" name="day" value="tue">Tuesday<br>
				<input type="radio" name="day" value="wed">Wednesday<br>
				<input type="radio" name="day" value="thu">Thursday<br>
				<input type="radio" name="day" value="fri">Friday<br>
				<input type="radio" name="day" value="sat">Saturday<br>
				</div>`;

		$('#weekSection').html(html);		
	}else{
		$('#weekSection').html('');
	}	
	
})

$(document).on('click', '#btnSubmit', function(){
	formSubmit();
})

function formSubmit() {
	var eventTitle 		= 	$('#eventTitle').val();
	var startDate 		= 	$('#startDate').val();
	var occuranceStatus = 	$('#occuranceStatus').val();
	var repeatOccurence =   $('#repeatOccurence').val();
	if(eventTitle != '' && startDate != '' && occuranceStatus != ''){
		$.ajax({
				url: 'common.php',
				type: 'get',
				data: $('#addForm').serialize(),
				success: function(res) {
					var respose = JSON.parse(res);
					if(respose.status == true){
						eventListing();
						addEditViewAction('Listing');
						$('#successMsg').html(`<span class="text-success">${respose.msg}</span>`);
					}
				},
				error: function(xhr) {
					console.log(xhr.responseText);
				}
			});

	}else{
		if(eventTitle == '')
			$('#eventTitleErr').text('Fill the title');
		else
			$('#eventTitleErr').text('');
		if(startDate == '')
			$('#startDateErr').text('Fill the start date');
		else
			$('#startDateErr').text('');
		if(occuranceStatus == '')
			$('#occuranceStatusErr').text('Choose one end status');
		else
			$('#occuranceStatusErr').text('');
		if(repeatOccurence == '')
			$('#repeatOccurenceErr').text('Fill the repeat recurrence');
		else
			$('#repeatOccurenceErr').text('');
	}
}

function addEditViewAction(action) {
	$('#successMsg').html('');
	if(action == 'Add'){
		$('.err').text('');
		$('#listingSection').addClass('d-none');
		$('#addSection').removeClass('d-none');
		$('#viewSection').addClass('d-none');
		$('#btnAdd').addClass('d-none');
		$('#btnBack').removeClass('d-none');
	}else if(action == 'View'){
		$('#listingSection').addClass('d-none');
		$('#addSection').addClass('d-none');
		$('#viewSection').removeClass('d-none');
		$('#btnAdd').addClass('d-none');
		$('#btnBack').removeClass('d-none');
	}else if(action == 'Listing'){
		$('#listingSection').removeClass('d-none');
		$('#addSection').addClass('d-none');
		$('#viewSection').addClass('d-none');
		$('#btnAdd').removeClass('d-none');
		$('#btnBack').addClass('d-none');
	}
}