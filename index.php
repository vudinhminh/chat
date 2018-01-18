<?php
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/model/m_database.php";
session_start();
if (!isset($_SESSION['user_chat']))
{
    header('location:login.php');
}
$database = new M_database();
$where    = ' where id <> ' . $_SESSION['user_chat']['id'];
$listUser = $database->GetAllwhere('users', $where);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Chat React Js</title>
        <link href="public/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo FULL_SITE_ROOT ?>lib/react.development.js"></script>
        <script src="<?php echo FULL_SITE_ROOT ?>lib/react-dom.development.js"></script>
        <script src="<?php echo FULL_SITE_ROOT ?>lib/babel.min.js"></script>
        <script src='<?php echo FULL_SITE_ROOT ?>lib/jquery-2.2.4.min.js'></script>
        <!--kết nối socket-->
        <script src='http://127.0.0.1:3000/socket.io/socket.io.js'></script>
        <script src='<?php echo FULL_SITE_ROOT ?>public/js/socket_client.js'></script>

        <script src="<?php echo FULL_SITE_ROOT ?>public/js/messages/MessagesItem.js" type="text/babel"></script>
        <script src="<?php echo FULL_SITE_ROOT ?>public/js/messages/Messages.js" type="text/babel"></script>
        <script src="<?php echo FULL_SITE_ROOT ?>public/js/messages/Input.js" type="text/babel"></script>
        <script src="<?php echo FULL_SITE_ROOT ?>public/js/messages/BoxChat.js" type="text/babel"></script>
        <script src="<?php echo FULL_SITE_ROOT ?>public/js/user/BoxUser.js" type="text/babel"></script>
        <script src="<?php echo FULL_SITE_ROOT ?>public/js/Chat.js" type="text/babel"></script>
        <script>
            var SITE_ROOT = '<?php echo SITE_ROOT; ?>';
            var listUser = <?php echo json_encode($listUser); ?>;
            var user = <?php echo json_encode($_SESSION['user_chat']); ?>;
        </script>
    </head>
    <body>
        <h1 style="text-align: center"><?php echo $_SESSION['user_chat']['name'] ?></h1>
        <div id="Chat" >
        </div>

        <script type="text/babel">
            ReactDOM.render(
                    <Chat listUser={listUser} user={user}/>,
                    document.getElementById('Chat')
                    );
        </script>
    </body>
</html>