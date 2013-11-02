	$(function() {
		
		$('#frm_division').validate({
			errorElement: 'div',
			errorClass: 'help-inline',
			focusInvalid: false,
			rules: {
				division_name: {
					required: true
				},
				division_head: {
					required: true
				},
				division_email: {
					email:true
				},
			},
	
			messages: {
				division_name: "Please Enter Division Names",
				division_head: {
					required: "Please Select Scientist",
				},				
				division_email: {
					required: "Please Enter a Valid Email.",
					email: "Please Enter a Valid Email."
				}
			},			
		});
		
		$('#frm_regional_station').validate({
			errorElement: 'div',
			errorClass: 'help-inline',
			focusInvalid: false,
			rules: {
				station_name: {
					required: true
				},
				station_email: {
					email:true
				},
			},
			
			messages: {
				station_name: "Please Enter Regional Station Name",
				station_email: {
					required: "Please Enter a Valid Email.",
					email: "Please Enter a Valid Email."
				}				
			},
			
		});
	
		$('#frm_implementation_site').validate({
			errorElement: 'div',
			errorClass: 'help-inline',
			focusInvalid: false,
			rules: {
				implementation_site_name: {
					required: true
				},
				email_address: {
					email:true
				},
			},
			
			messages: {
				implementation_site_name: "Enter Implementation Site/Area Name",
				email_address: {
					required: "Please Enter a Valid Email.",
					email: "Please Enter a Valid Email."
				}				
			},
			
		});
		
		$('#frm_program_area').validate({
			errorElement: 'div',
			errorClass: 'help-inline',
			focusInvalid: false,
			rules: {
				program_area_name: {
					required: true
				},
			},
	
			messages: {
				program_area_name: {
					required: "Please Enter Program Area",
				}
			},			
		});
		
		$('#frm_program_committee').validate({
			errorElement: 'div',
			errorClass: 'help-inline',
			focusInvalid: false,
			rules: {
				committee_chairman: {
					required: true
				},
				committee_formation_date: {
					required: true
				},
			},
	
			messages: {
				committee_chairman: {
					required: "Please Enter Chairman of the Committee",
				},
				committee_formation_date: "Please Enter Committe Formation Date",
			},			
		});
		
		$('#frm_grading').validate({
			errorElement: 'div',
			errorClass: 'help-inline',
			focusInvalid: false,
			rules: {
				grading_title: {
					required: true
				},
				effect_date: {
					required: true
				},
			},
	
			messages: {
				grading_title: {
					required: "Please Enter Grading Title",
				},
				effect_date: "Please Enter Effect Date",
			},			
		});
		
	});