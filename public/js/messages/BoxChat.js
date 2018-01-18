class BoxChat extends React.Component {
    constructor(props) {
        super(props);
        //Khởi tạo state,
        this.state = {
            messages: [],
            user: this.props.user,
            userReceive: this.props.userReceive
        };
        this.socket = null;
        this.getMessageUser();
    }
    //Connetct với server nodejs, thông qua socket.io
    componentWillMount() {
        this.socket = io('localhost:3000');
        this.socket.on('newMessage', (response) => {
            this.newMessage(response);
        }); //lắng nghe event 'newMessage' và gọi hàm newMessage khi có event
    }
    //Khi có tin nhắn mới, sẽ push tin nhắn vào state mesgages, và nó sẽ được render ra màn hình
    newMessage(m) {

        if (m.data.fkUserSend != this.state.user.id && m.data.fkUserReceive != this.state.user.id) {
            return;
        }
        //Kiểm tra có phải tin nhan cua người đang active không
        if (this.state.userReceive.id != m.data.fkUserSend && this.state.userReceive.id != m.data.fkUserReceive) {
            return;
        }
        const messages = this.state.messages;
        messages.push({
            fkUserSend: m.data.fkUserSend,
            fkUserReceive: m.data.fkUserReceive,
            message: m.data.message
        });
        this.setState({messages});
        let objMessage = $('.messages');
        objMessage.animate({scrollTop: objMessage.prop('scrollHeight')}, 300); //tạo hiệu ứng cuộn khi có tin nhắn mới
    }
    //Gửi event socket newMessage với dữ liệu là nội dung tin nhắn
    sendnewMessage(m) {
        if (m.value) {
            let data = {
                fkUserSend: this.state.user.id,
                fkUserReceive: this.state.userReceive.id,
                message: m.value
            };
            this.socket.emit("newMessage", data); //gửi event về server
            m.value = "";
            let url = SITE_ROOT + 'updateMessage.php';
            $.post(url, data, function (data) {
            });
        }
    }
    //Khi Props thay doi
    componentWillReceiveProps(nextProps)
    {
        if (nextProps.userReceive.id !== this.props.userReceive.id) {
            this.setState({userReceive: nextProps.userReceive}, function () {
                this.setState({messages: []});
                this.getMessageUser();
            });
        }
    }
    //Lấy dữ liệu nội dung tin nhắn
    getMessageUser() {
        let params = {
            fkUserReceive: this.state.userReceive.id,
            pageSize: 10000,
            page: 1
        };
        var self = this;
        let url = SITE_ROOT + 'getMessageUser.php';
        $.get(url, params)
                .done(function (data) {
                    self.setState({messages: data});
                    let objMessage = $('.messages');
                    objMessage.animate({scrollTop: objMessage.prop('scrollHeight')}, 0); //tạo hiệu ứng cuộn khi có tin nhắn mới
                });
    }
    
    render() {
        return  <div className="chat_window">
    <div className="top_menu">
        <div className="buttons">
            <div className="button close"></div>
            <div className="button minimize"></div>
            <div className="button maximize"></div>
        </div>
        <div className="title">{this.state.userReceive.name}</div>
    </div>
    <Messages user={this.state.user} userReceive={this.state.userReceive} messages={this.state.messages} />
    <InputChat sendMessage={this.sendnewMessage.bind(this)}/>
</div>
    }
}
;
