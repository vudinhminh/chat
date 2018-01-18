class MessagesItem extends React.Component {
    render() {
        return  <li className={this.props.checkUser ? 'message right' : 'message left'}>
        <div className="avatar">
            <img src={this.props.urlAvatar} alt="user" />
        </div>
                    <div className="text_wrapper">
                        <div className="box bg-light-info">{this.props.message}</div>
                    </div>
                </li>
    }
};