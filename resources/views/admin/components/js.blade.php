<script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- apps -->
<!-- apps -->
<script src="{{asset('admin/dist/js/app-style-switcher.js')}}"></script>
<script src="{{asset('admin/dist/js/feather.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin/dist/js/custom.min.js')}}"></script>
<!--This page JavaScript -->
<script src="{{asset('admin/assets/extra-libs/c3/d3.min.js')}}"></script>
<script src="{{asset('admin/assets/extra-libs/c3/c3.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('admin/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('admin/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('admin/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>

<!-- CALENDAR -->
<script src="{{asset('admin/assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js')}}"></script>
<script src="{{asset('admin/assets/extra-libs/taskboard/js/jquery-ui.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin/assets/libs/moment/min/moment.min.js')}}"></script>
<!-- <script src="{{asset('admin/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script> -->

<!-- <script src="{{asset('admin/dist/js/pages/calendar/cal-init.js')}}"></script> -->
<!-- DATATABLE -->
<script src="{{asset('admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->

<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

<script src="{{asset('admin/js/calendercustom.js')}}"></script>

<script src="{{asset('admin/assets/extra-libs/prism/prism.js')}}"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script> -->


<script>
$(document).ready(function () {
var SITEURL = "{{url('/')}}";
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var calendar = $('#calendar').fullCalendar({
editable: true,
events: SITEURL + "/dashboard",
displayEventTime: true,
editable: true,
eventRender: function (event, element, view) {
if (event.allDay === 'true') {
event.allDay = true;
} else {
event.allDay = false;
}
},
selectable: true,
selectHelper: true,
select: function (start, end, allDay) {
var title = prompt('Event Title:');
if (title) {
var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
$.ajax({
url: SITEURL + "/dashboard/create",
data: 'title=' + title + '&start=' + start + '&end=' + end,
type: "GET",
success: function (data) {
displayMessage("Added Successfully");
}
});
calendar.fullCalendar('renderEvent',
{
title: title,
start: start,
end: end,
allDay: allDay
},
true
);
}
calendar.fullCalendar('unselect');
},
eventDrop: function (event, delta) {
var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
$.ajax({
url: SITEURL + '/dashboard/update/',
data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
type: "PUT",
success: function (response) {
displayMessage("Updated Successfully");
}
});
},
eventClick: function (event) {
var deleteMsg = confirm("Do you really want to delete?");
if (deleteMsg) {
$.ajax({
type: "POST",
url: SITEURL + '/dashboard/delete/',
data: "&id=" + event.id,
success: function (response) {
if(parseInt(response) > 0) {
$('#calendar').fullCalendar('removeEvents', event.id);
displayMessage("Deleted Successfully");
}
}
});
}
}
});
});
function displayMessage(message) {
$(".response").html("<div class='success'>"+message+"</div>");
setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>
