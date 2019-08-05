require(['sweetalert', 'fullcalendar', 'jquery'], function(Swal, fullcalendar, $) {
	$(document).ready(function() {
		var calendar = $('#calendar').fullCalendar({

	    	editable:true,
	    	header:{
	    		left: 'prev,next today',
	    		center: 'title',
	    		right: 'month, agendaWeek, agendaDay'
	    	},
		    events: '../controllers/controller.event.php?load=true',
		    selectable: true,
		    selectHelper: true,

		    select: function(start, end, allDay) {
	     		$('#addEventModal').modal('show');

	     		$('#addEventBtn').on('click', function(e) {
	     			e.preventDefault();

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
	    	},

		    editable:true,
		    eventResize:function(event) {
			    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			    var title = event.title;
			    var id = event.id;
			    $.ajax({
	      			url:"update.php",
		        	type:"POST",
		      		data:{title:title, start:start, end:end, id:id},
		      		success:function(){
	       				calendar.fullCalendar('refetchEvents');
	       				alert('Event Update');
	      			}
	     		})
	    	},

	    	eventDrop:function(event) {
			    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			    var title = event.title;
			    var id = event.id;
			    $.ajax({
	      			url:"update.php",
	      			type:"POST",
	      			data:{title:title, start:start, end:end, id:id},
	      			success:function() {
	       				calendar.fullCalendar('refetchEvents');
	       				alert("Event Updated");
	      			}
	     		});
	    	},

	    	eventClick:function(event) {
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
	   }); // calendar
	}); // document ready
}); // require