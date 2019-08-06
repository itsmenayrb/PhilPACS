require(['sweetalert', 'fullcalendar', 'jquery'], function(Swal, fullcalendar, $) {
	$(document).ready(function() {
<<<<<<< HEAD

	   var calendar = $('#calendar').fullCalendar({
=======
		var calendar = $('#calendar').fullCalendar({
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7

	    	editable:true,
	    	header:{
	    		left: 'prev,next today',
	    		center: 'title',
	    		right: 'month, agendaWeek, agendaDay'
	    	},
<<<<<<< HEAD
		    events: '../models/event/load.php',
		    eventColor: 'green',
		    selectable: true,
		    selectHelper: true,
		    selectConstraint: {
		    	start: $.fullCalendar.moment().subtract(1, 'days'),
       	 		end: $.fullCalendar.moment().startOf('month').add(3, 'month')
		    },
		    eventConstraint: {
		    	start: $.fullCalendar.moment().format('YYYY-MM-DD'),
       	 		end: '2100-01-01'
		    },
		    eventRender: function(event, element) {
	    		// element.find('.fc-title').append("<br/>" + event.description);
	    		element.popover({
	    			title: event.title,
	    			content: event.description,
	    			trigger: "hover",
	    			placement: 'top',
	    			container: "body"

	    		});
	    	},

		    select: function(start, end, allDay) {
     			
     			var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

=======
		    events: '../controllers/controller.event.php?load=true',
		    selectable: true,
		    selectHelper: true,

		    select: function(start, end, allDay) {
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
	     		$('#addEventModal').modal('show');

	     		$('#addEventBtn').on('click', function(e) {
	     			e.preventDefault();
<<<<<<< HEAD
	     			
	     			var title_error= "";

	     			var title = $('#title').val();
	     			var description = $('#description').val();

	     			if (title == "") {
	     				title_error = "Start time is required.";
	     				$('#title_error').text(title_error);
	     				$('#title').addClass('is-invalid');
	     			} else {
	     				title_error = "";
	     				$('#title_error').text(title_error);
	     				$('#title').removeClass('is-invalid');
	     			}

	     			if (title_error == "") {
					    $.ajax({
		        			url:"../controllers/controller.event.php",
					       	type:"POST",
					       	data:{
					       		title: title,
					       		description: description,
					       		start: start,
					       		end: end,
					       		addEvent: 1
					       	},
					       	success:function() {
					       		$('#addEventModal').modal('hide');
					       		$('#addEventForm')[0].reset();
						        calendar.fullCalendar('refetchEvents');
						        Swal.fire({
						        	title: 'Event added successlly!',
						        	type: 'success'
						        });
		       				}
		      			});
	     			}

	     		});
=======

	     			var start = $('#startTime').val();
	     			var end = $('#endTime').val();

	     			console.log(start);
	     			console.log(end);

	     		});
	     		// if(title) {
				    // var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
				    // var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
				    // $.ajax({
	       //  			url:"../controllers/controller.event.php",
				    //    	type:"POST",
				    //    	data:{
				    //    		title: title,
				    //    		description: description,
				    //    		start: start,
				    //    		end: end,
				    //    		addEvent: 1
				    //    	},
				    //    	success:function() {
					   //      calendar.fullCalendar('refetchEvents');
					   //      alert("Added Successfully");
	       // 				}
	      	// 		})
	     		// }
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
	    	},

		    editable:true,
		    eventResize:function(event) {
			    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			    var title = event.title;
			    var id = event.id;
			    $.ajax({
<<<<<<< HEAD
	      			url:"../controllers/controller.event.php",
		        	type:"POST",
		      		data:{title:title, start:start, end:end, id:id, updateEventOnResize: 1},
		      		success:function(){
	       				calendar.fullCalendar('refetchEvents');
=======
	      			url:"update.php",
		        	type:"POST",
		      		data:{title:title, start:start, end:end, id:id},
		      		success:function(){
	       				calendar.fullCalendar('refetchEvents');
	       				alert('Event Update');
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
	      			}
	     		})
	    	},

	    	eventDrop:function(event) {
<<<<<<< HEAD
	    		
=======
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
			    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			    var title = event.title;
			    var id = event.id;
			    $.ajax({
<<<<<<< HEAD
	      			url:"../controllers/controller.event.php",
	      			type:"POST",
	      			data:{title:title, start:start, end:end, id:id, updateEventOnDrop: 1},
	      			success:function() {
	       				calendar.fullCalendar('refetchEvents');
=======
	      			url:"update.php",
	      			type:"POST",
	      			data:{title:title, start:start, end:end, id:id},
	      			success:function() {
	       				calendar.fullCalendar('refetchEvents');
	       				alert("Event Updated");
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
	      			}
	     		});
	    	},

	    	eventClick:function(event) {
<<<<<<< HEAD
	     		var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			    var title = event.title;
			    var description = event.description;
			    var id = event.id;

			    $('#editEventModal').modal('show');
			    $('#edit_title').val(title);
			    $('#edit_description').val(description);
			    $('#hiddenEditEventID').val(id);

			    $('#editEventBtn').on('click', function(e) {
	     			e.preventDefault();
	     			
	     			var edit_title_error= "";

	     			var edit_title = $('#edit_title').val();
	     			var edit_description = $('#edit_description').val();
	     			var edit_id = $('#hiddenEditEventID').val();

	     			if (edit_title == "") {
	     				edit_title_error = "Start time is required.";
	     				$('#edit_title_error').text(edit_title_error);
	     				$('#edit_title').addClass('is-invalid');
	     			} else {
	     				edit_title_error = "";
	     				$('#edit_title_error').text(edit_title_error);
	     				$('#edit_title').removeClass('is-invalid');
	     			}

	     			if (edit_title_error == "") {
					    $.ajax({
		        			url:"../controllers/controller.event.php",
					       	type:"POST",
					       	data:{
					       		edit_id: edit_id,
					       		edit_title: edit_title,
					       		edit_description: edit_description,
					       		updateEvent: 1
					       	},
					       	success:function() {
					       		$('#editEventModal').modal('hide');
					       		$('#editEventForm')[0].reset();
						        calendar.fullCalendar('refetchEvents');
						        Swal.fire({
						        	title: 'Event updated successlly!',
						        	type: 'success'
						        });
		       				}
		      			});
	     			}

	     		});

	     		$('#removeEventBtn').on('click', function(e) {
	     			e.preventDefault();

	     			var edit_id = $('#hiddenEditEventID').val();

	     			Swal.fire({
					  title: 'Are you sure?',
					  text: 'Remove this event?',
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes'
					}).then((result) => {
					  if (result.value) {
					  	$.ajax({
		        			url:"../controllers/controller.event.php",
					       	type:"POST",
					       	data:{
					       		edit_id: edit_id,
					       		removeEvent: 1
					       	},
					       	success:function() {
					       		$('#editEventModal').modal('hide');
					       		$('#editEventForm')[0].reset();
						        calendar.fullCalendar('refetchEvents');
						        Swal.fire({
						        	title: 'The event has been removed!',
						        	type: 'success'
						        });
		       				}
		      			});
					  }
					});

	     		});

	    	}
=======
	     		if(confirm("Are you sure you want to remove it?")) {
	      			var id = event.id;
	     	 		$.ajax({
	       				url:"delete.php",
	       				type:"POST",
	       				data:{id:id},
	       				success:function() {
	        				calendar.fullCalendar('refetchEvents');
	        				alert("Event Removed");
	       				}
	      			})
	     		}
	    	},
>>>>>>> 2a4a74c822818c0ccb191a0cd1353c5c64790ba7
	   }); // calendar
	}); // document ready
}); // require