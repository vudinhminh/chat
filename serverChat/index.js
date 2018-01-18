var express = require('express');
var app = express();

var server = require('http').Server(app);
var port = (process.env.OPENSHIFT_NODEJS_PORT || process.env.PORT || 3000);
var io = require('socket.io')(server);
server.listen(port, () => console.log('Server running in port ' + port));

io.on('connection', function(socket){
  console.log(socket.id + ': connected');

  socket.on('disconnect', function(){
    console.log(socket.id + ': disconnected');
  })

  socket.on('newMessage', data => {
    io.sockets.emit('newMessage', {data: data});
    console.log(data);
  })

});

app.get('/', (req, res) => {
  res.send("Home page. Server running okay.");
})