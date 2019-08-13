require(['sweetalert', 'fullcalendar', 'jquery'], function(Swal, fullcalendar, $) {
	$(document).ready(function() {

	   var calendar = $('#dashboard_calendar').fullCalendar({

	    	editable:false,
	    	header:{
	    		left: 'prev,next today',
	    		center: 'title',
	    		right: 'month, agendaWeek, agendaDay'
	    	},
		    events: '../models/event/load.php',
		    eventColor: 'green',
		    selectable: false,
		    selectHelper: false,
		    selectConstraint: {
		    	start: $.fullCalendar.moment().subtract(1, 'days'),
       	 		end: $.fullCalendar.moment().startOf('month').add(1, 'month')
		    },
		    eventConstraint: {
		    	start: $.fullCalendar.moment().subtract(1, 'days'),
       	 		end: $.fullCalendar.moment().startOf('month').add(1, 'month')
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
	    	}
	   }); // calendar
	}); // document ready
}); // require