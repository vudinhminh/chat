class Chat extends React.Component {
    constructor(props) {
        super(props);
        //Khởi tạo state,
        if (typeof this.props.listUser[0] == 'undefined') {
            return;
        }
        this.state = {
            user: this.props.user,
            listUser: this.props.listUser,
            userReceive: this.props.listUser[0]//Người tiếp nhận
        };
    }
    
    activeUserReceive(m) {
        this.setState({
            userReceive: m
        });
    }
    //Hien thi thông tin nhắn chưa đọc bên menu trái
    getNotification(){
        var self = this;
        let url = SITE_ROOT + 'getListUser.php';
        $.get(url)
                .done(function (data) {
                    self.setState({listUser: data});
                });
    }
    render() {
        return <div>
            <div id="BoxChat">
                <BoxChat userReceive={this.state.userReceive} user={this.state.user}/> 
            </div>
            <div id="user">
                <BoxUser listUser={this.state.listUser} activeUserReceive={this.activeUserReceive.bind(this)}/>
            </div>   
        </div>
    }
}