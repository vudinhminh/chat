class Messages extends React.Component {
    render() {
        return  <ul className="messages clo-md-5">
                    {this.props.messages.map((item, index) =>
                        <MessagesItem key={index} checkUser={item.fkUserSend == this.props.user.id? true : false} 
                        urlAvatar={item.fkUserSend == this.props.user.id? this.props.user.avatar : this.props.userReceive.avatar} message={item.message}/>
                    )}   
                </ul>
    }
};