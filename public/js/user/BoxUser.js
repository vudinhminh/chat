class BoxUser extends React.Component {
    render() {
        return  <div>
            <div className="top_menu">
                <div className="title">Danh sách bạn bè</div>
            </div>
            <div className="content">
                <ul>
                    {this.props.listUser.map((item, index) =>
                        <li key={index} onClick={() => this.props.activeUserReceive(item)}>{item.name}</li>
                                )}
                </ul>
            </div> 
        </div>
    }
}
;
