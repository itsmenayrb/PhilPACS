require(['sweetalert', 'fullcalendar', 'jquery'], function(Swal, fullcalendar, $) {
	$(document).ready(function() {

		$(window).on('load', function() {
			fetchListOfEvents();
		});

	   	var calendar = $('#calendar').fullCalendar({

	    	editable:true,
	    	header:{
	    		left: 'prev,next today',
	    		center: 'title',
	    		right: 'month, agendaWeek, agendaDay'
	    	},
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
     			
	     		$('#addEventModal').modal('show');
     			var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

	     		$('#addEventBtn').on('click', function(e) {
	     			e.preventDefault();
	     			
	     			var title_error= "";

	     			var title = $('#title').val();
	     			var description = $('#description').val();

	     			if (title == "") {
	     				title_error = "Title is required.";
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
	    	},

		    editable:true,
		    eventResize:function(event) {
			    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			    var title = event.title;
			    var id = event.id;
			    $.ajax({
	      			url:"../controllers/controller.event.php",
		        	type:"POST",
		      		data:{title:title, start:start, end:end, id:id, updateEventOnResize: 1},
		      		success:function(){
	       				calendar.fullCalendar('refetchEvents');
	      			}
	     		});
	    	},

	    	eventDrop:function(event) {
			    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			    var title = event.title;
			    var id = event.id;
			    $.ajax({
	      			url:"../controllers/controller.event.php",
	      			type:"POST",
	      			data:{title:title, start:start, end:end, id:id, updateEventOnDrop: 1},
	      			success:function() {
	       				calendar.fullCalendar('refetchEvents');
	      			}
	     		});
	    	},

	    	eventClick:function(event) {
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
	   }); // calendar

		//list
		function fetchListOfEvents() {
			$.ajax({
    			url: "../controllers/controller.event.php?fetch=events",
		       	type: "POST",
		       	success:function(response) {
		       		$('#list_of_events').html(response);
   				}
  			});
		}

	}); // document ready
}); // require