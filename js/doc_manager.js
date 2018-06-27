$(document).ready(function(){
	
	var availableOptionsBox = $("#availableOptionsBox");
	var selectedMasterCategory = $("#txtDocMasterCode");

	var selectedSubCategory = $("#txtDocSubCode") ;
	var displayOption = $("#availableOptions");

	var obj;
	var objSubDoc;
	availableOptionsBox.hide();



//	selectedMasterCategory.focus();
// prevent form submit on enter pressed
  $(window).keypress(function(event){
    if(event.keyCode == 13  &&$("#btnSaveDoc").is(":focus") == false) {
      event.preventDefault();
      return false;
    }
  });


	// Event fire when Document master category textbox is focused
	$("#txtDocMasterCode").focus(function(){
		selectedSubCategory.val("");
		$.ajax({
			type: "GET",
			url: "../../Classes/doc_manager_logic.php?master_categ?",
			datatype: 'json',
			success: function(options){
				
				availableOptionsBox.fadeIn(300);
				obj  = jQuery.parseJSON(options);

				console.log(obj);
				displayOption.append('<ul class="list-group">');
				$.each(obj, function(i,option){
					displayOption.attr("class","panel panel-primary")
					displayOption.append("<li class='list-group-item list-group-item-action list-group-item-primary'>"+option.dcm_code+" : "+ option.dcm_name+"</li>");
				});
				
				displayOption.append('</ul>');
			}
		});
	}); // end of focus function for txtDocMasterCode

	// if Document Master category textbox is focused and user press enter button move to next textbox
		$("#txtDocMasterCode").keypress(function(event){
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == 13){
				selectedSubCategory.focus();
			}
			
		});

	$("#txtDocMasterCode").focusout(function(){
		availableOptionsBox.fadeOut(300);
		var Masterexists = false;
		$.each(obj, function(i, value){
			
			if(selectedMasterCategory.val() == value.dcm_code)
			{
				Masterexists = true;
				return true;
			}
			else{
				//console.log("checking "+ value.dcm_code);
			}
			//console.log(Masterexists);
		});

		switch(Masterexists){
			case true:
				$("#divDocMasterCode").removeClass("has-error");
				$("#divDocMasterCode").addClass("has-success");
				$("#btnSaveDoc").removeAttr("disabled")
				break;
			case false:
			$("#divDocMasterCode").removeClass("has-success");
				$("#divDocMasterCode").addClass("has-error");
				$("#btnSaveDoc").attr("disabled","disabled")
				break;
			default:
				
				break;	
		}
		
		displayOption.empty();
	}); // end of function txtDocMasterCode focusOut


// show available options in division, for selected master cetegory of documents
	$("#txtDocSubCode").focus(function(){
		var paramValue = selectedMasterCategory.val();
		$.ajax({
			type: "get",
			url: "../../Classes/doc_manager_logic.php?sub_categ?"+paramValue,
			datatype: 'json',
			success: function(options){
				availableOptionsBox.fadeIn(300);
				objSubDoc = jQuery.parseJSON(options);
				//console.log(obj);
				displayOption.empty();
				displayOption.append('<ul class="list-group">');
				$.each(objSubDoc, function(i,option){
					displayOption.attr("class","panel panel-primary")
					displayOption.append("<li class='list-group-item list-group-item-action list-group-item-primary'>"+option.dcs_code+" : "+ option.dcs_name+"</li>");
				});
				
				displayOption.append('</ul>');
			}

		});
	});// end of focus function for txtDocSubCode

	$("#txtDocSubCode").focusout(function(){
		availableOptionsBox.fadeOut(300);
		var exists = false;
		$.each(objSubDoc, function(i, value){
			
			if(selectedSubCategory.val() == value.dcs_code)
			{
				exists = true;
				return true;
			}
			else{
				//console.log("checking "+ value.dcm_code);
			}
		});

		switch(exists){
			case true:
				$("#divDocSubCode").removeClass("has-error");
				$("#divDocSubCode").addClass("has-success");
				$("#btnSaveDoc").removeAttr("disabled")
				break;
			case false:
				$("#divDocSubCode").removeClass("has-success");
				$("#divDocSubCode").addClass("has-error");
				$("#btnSaveDoc").attr("disabled","disabled")
				break;
			default:
				
				break;	
		}
		displayOption.empty();
	}); // end of function txtDocSubCode focusOut



// if Document Sub category textbox is focused and user press enter button move to next textbox
		$("#txtDocSubCode").keypress(function(event){
			
			if(event.keyCode == 13){
				//console.log('enter pressed');
				$("#txtGrowerCode").focus();
			}
			
		});
		$("#btnSaveDoc").click(function(){
			var inputData = $("#frmDocCreate :input").serializeArray();
			var inputJson = JSON.stringify(inputData);
			//console.log(inputJson);
			$.ajax({
				type: "POST",
				url: "../../Classes/doc_manager_logic.php?submit?",
				data: {data: inputJson},
				datatype: 'json',
				success: function(information){
					infos = jQuery.parseJSON(information);

					$("#txtResponse").fadeIn(3000)
			      	
			      	$("#txtResponse").fadeOut(3000)

			      	
		      		console.log(infos);
			      	$.each(infos, function(i,info){
			      			$("#txtResponse").html(infos.message);

			      			
			      		});


			      	if(infos.message.substring(0,5) == "Error"){
			        	$("#txtResponse").attr("Class","alert alert-danger pull-right");
			      	}
			      	else{
			      		$("#txtDocMasterCode").focus();
			      		$("#txtDocMasterCode").val('');
			      		$("#txtDocSubCode").val('');
			      		$("#txtGrowerCode").val('');
			      		$("#txtRemarks").val('');
			        	$("#txtResponse").attr("Class","alert alert-success pull-right");  
			      	}
				}
			});
			
		});
}); // end of ready function 
