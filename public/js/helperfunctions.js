function convertISOtoDateTime(timeString) {
    var dateTime = timeString.split("T");
    var date = dateTime[0].split("-");
    var time = dateTime[1].split(":");
    //TODO make less dirty
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
        'August', 'September', 'October', 'November', 'December'];
    return date[2] + ' ' + months[parseInt(date[1])-1] + ' ' + date[0] + '<br/>' + time[0] + ':' + time[1];
}