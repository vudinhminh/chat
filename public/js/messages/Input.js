class InputChat extends React.Component {
    checkEnter(e) {
      if (e.keyCode === 13) {
        this.props.sendMessage(this.refs.messageInput);
      }
    }
    render() {
        return  <div className="bottom_wrapper clearfix">
            <div className="message_input_wrapper">
                <input ref="messageInput" type="text" className="message_input" placeholder="Nhập tin nhắn" onKeyUp={this.checkEnter.bind(this)} />
            </div>
            <div className="send_message" onClick={() => this.props.sendMessage(this.refs.messageInput)} ref="inputMessage" >
                <div className='icon'></div>
                <div className='text'>Gửi</div>
           </div>
        </div>
    }
};