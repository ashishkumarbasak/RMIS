	$(function() {
		
		$('#frm_division').validate({
			errorElement: 'div',
			errorClass: 'error',
			focusInvalid: false,
			rules: {
				division_name: {
					required: true
				},
				division_head_name: {
					required: true,
					checkEmployeeName: true
				},
				division_email: {
					email:true
				},
			},
			messages: {
				division_name: "Please enter division name.",
				division_head_name: {
					required: "Please select scientist",
					checkEmployeeName: "Please select head of division."
				},				
				division_email: {
					required: "Email address can't be left blank.",
					email: "Please enter a valid email."
				}
			},			
		});
		
		$('#frm_regional_station').validate({
			errorElement: 'div',
			errorClass: 'error',
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
				station_name: "Please enter regional station name",
				station_email: {
					required: "Email address can't be left blank.",
					email: "Please enter a valid email."
				}				
			},
			
		});
	
		$('#frm_implementation_site').validate({
			errorElement: 'div',
			errorClass: 'error',
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
				implementation_site_name: "Enter implementation site/area name",
				email_address: {
					required: "Email address can't be left blank.",
					email: "Please enter a valid email."
				}				
			},
			
		});
		
		$('#frm_program_area').validate({
			errorElement: 'div',
			errorClass: 'error',
			focusInvalid: false,
			rules: {
				program_area_name: {
					required: true
				},
			},
	
			messages: {
				program_area_name: {
					required: "Please enter program area",
				}
			},			
		});
		
		$('#frm_program_committee').validate({
			errorElement: 'div',
			errorClass: 'error',
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
					required: "Please enter chairman of the committee",
				},
				committee_formation_date: "Please enter committe formation date",
			},			
		});
		
		$('#frm_grading').validate({
			errorElement: 'div',
			errorClass: 'error',
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
					required: "Please enter grading title",
				},
				effect_date: "Please enter effect date",
			},			
		});
		
	});