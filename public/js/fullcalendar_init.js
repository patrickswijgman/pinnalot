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
        displayEventTime: false,
        timezone: 'local',
        header: {
            left: '',
            center: 'title',
            right: ''
        },
        dayClick: function(date, jsEvent, view) {
            $date = date.format().split('-');
            window.location.href = 'event/new?d=' + $date[2] + '-' + $date[1] + '-' + $date[0];
        },
        eventClick: function(event) {
            if (event.url) {
                timeStart = new Date(event.start.toString());
                timeEnd = new Date(event.end.toString());

                $('.mdl-dialog__title').html("").append(event.title);
                $('.mdl-dialog__desc').html("").append(event.description);
                $('.mdl-dialog__start').html("").append(timeStart);
                $('.mdl-dialog__end').html("").append(timeEnd);

                if (dialog !== null) {
                    dialog.showModal();
                }
                return false;
            }
        }
    });
});