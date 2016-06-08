var dialog = document.querySelector('dialog');
if (dialog !== null) {
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
}

function convertISOtoDateTime(timeString) {
    var dateTime = timeString.split("T");
    var date = dateTime[0].split("-");
    var time = dateTime[1].split(":");
    return date[2] + ' ' + date[1] + ' ' + date[0] + '<br/>' + time[0] + ':' + time[1];
}

$(document).ready(function() {
    $('#calendar').fullCalendar({
        events: $('#source').data("events"),
        displayEventTime: false,
        header: {
            left: '',
            center: 'title',
            right: ''
        },
        eventClick: function(event) {
            if (event.url) {
                var timeStart = (event.start.format());
                var timeEnd = (event.end.format());

                timeStart = convertISOtoDateTime(timeStart);
                timeEnd = convertISOtoDateTime(timeEnd);

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