$(document).ready(function () {
    var socket = io.connect('http://127.0.0.1:3000');
    socket.on('greeting', function (data) {
        alert(data);
    })
})