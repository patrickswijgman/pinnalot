var dialog = document.querySelector('dialog');
if (dialog !== null) {
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
}

$(document).ready(function() {
    $('#calendar').fullCalendar({
        events: $('#source').data("events"),
        timezone: 'local',
        timeFormat: 'H:mm',
        weekNumbers: true,
        header: {
            left: '',
            center: 'title',
            right: ''
        },
        dayClick: function(date, jsEvent, view) {
            if (view.name === 'month') {
                $date = date.format().split('-');
                //TODO make a lot less dirty
                var url = window.location.href;
                url = url.replace('/calendar', '');
                window.location.href = url + '/event/create?d=' + $date[2] + '-' + $date[1] + '-' + $date[0];
            }
        },
        eventClick: function(event) {
            if (event.url) {
                timeStart = new Date(event.start.toString());
                timeEnd = new Date(event.end.toString());

                $('.mdl-dialog__title').html("").append(event.title);
                $('.mdl-dialog__desc').html("").append(event.description);
                $('.mdl-dialog__loc').html("").append(event.location);
                $('.mdl-dialog__start').html("").append(timeStart);
                $('.mdl-dialog__end').html("").append(timeEnd);
                document.getElementById('mdl-dialog__url').href = event.url;

                if (dialog !== null) {
                    dialog.showModal();
                }
                return false;
            }
        }
    });
});