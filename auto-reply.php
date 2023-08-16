<?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $page_flag = 0;

    if(!empty($_POST['btn_confirm'])){
        $page_flag = 1;
    }
    elseif(!empty($_POST['btn_submit'])){
        $page_flag = 2;

        //initialization
        $header_flag = null;
        $auto_reply_subject = null;
        $auto_reply_text = null;
        $admin_reply_subject =null;
        $admin_reply_text =null;
        date_default_timezone_set('Asia/Tokyo');

        $header = "MIME-Version: 1.0\n";
        $header = "From: name of company<admin@example.com>\n";
        $header = "Reply-To: name of company<admin@example.com>\n";
        
        //subject
        $auto_reply_subject = "Thank you for your application!";
        
        //body
        $auto_reply_text = "Thank you for your application. 
        We have accepted the following information.\n\n";
        $auto_reply_text = "date:".date("Y-m-d H:i")."\n";
        $auto_reply_text = "name:".$_POST['your_name']."\n";
        $auto_reply_text = "school:".$_POST['school']."\n";
        $auto_reply_text = "mailadress:".$_POST['email']."\n";
        $auto_reply_text = "phonenumber:".$_POST['tel']."\n";
        $auto_reply_text = "question:".$_POST['qu']."\n";

        //Automatic email reply sent
        mb_send_mail($_POST['email'],$auto_reply_subject,$auto_reply_text,$header);
        
        //Subject of the email to be sent to the administrator
        $admin_reply_subject = "Entry accepted!";
        
        //body
        $admin_reply_text = "An entry was received with the following information\n\n";
        $admin_reply_text = "date:".date("Y-m-d H:i")."\n";
        $admin_reply_text = "name:".$_POST['your_name']."\n";
        $admin_reply_text = "school:".$_POST['school']."\n";
        $admin_reply_text = "mailadress:".$_POST['email']."\n";
        $admin_reply_text = "phonenumber:".$_POST['tel']."\n";
        $admin_reply_text = "question:".$_POST['qu']."\n";

        //Send an e-mail to the administrator
        mb_send_mail('admin@example.com',$admin_reply_subject,$admin_reply_text,$header);
    }
?>

<!DOCTYPE>
<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width">
        <link rel = "stylesheet" type = "text/css" href = "./style.css">
        <title>Entryform</title>
    </head>
    <body>
        <h1>Entryform</h1>

        <?php if($page_flag === 1): ?>
        <form method = "post" action = "">
            <div class = "element_wrap">
                <label>name</label>
                <p><?php echo $_POST['your_name']; ?></p>
            </div>
            <div class = "element_wrap">
                <label>school</label>
                <p><?php echo $_POST['school']; ?></p>
            </div>
            <div class = "element_wrap">
                <label>mailadress</label>
                <p><?php echo $_POST['email']; ?></p>
            </div>
            <div class = "element_wrap">
                <label>phonenumber</label>
                <p><?php echo $_POST['tel']; ?></p>
            </div>
            <div class = "element_wrap">
                <label>question</label>
                <p><?php echo $_POST['qu']; ?></p>
            </div>

            <input type = "submit" name = "btn_back" value = "back">
            <input type = "submit" name = "btn_submit" value = "submit">
            <input type = "hidden" name = "your_name" value = "<?php echo $_POST['your_name']; ?>">
            <input type = "hidden" name = "school" value = "<?php echo $_POST['school']; ?>">
            <input type = "hidden" name = "email" value = "<?php echo $_POST['email']; ?>">
            <input type = "hidden" name = "tel" value = "<?php echo $_POST['tel']; ?>">
            <input type = "hidden" name = "qu" value = "<?php echo $_POST['qu']; ?>">
        
        </form>

        <?php elseif($page_flag === 2): ?>
        <p>Submission Completed</p>


        <?php else: ?>
        <form method = "post" action = "">
            <div class = "element_wrap">
                <label>name</label>
                <input type = "text" name = "your_name" value = "">
            </div>
            <div class = "element_wrap">
                <label>school</label>
                <input type = "text" name = "school" value = "">
            </div>
            <div class = "element_wrap">
                <label>mailadress</label>
                <input type = "email" name = "email" value = "">
            </div>
            <div class = "element_wrap">
                <label>phonenumber</label>
                <input type = "tel" name = "tel" value = "">
            </div>
            <div class = "element_wrap">
                <label>question</label>
                <input type = "text" name = "qu" value = "">
            </div>

            <input type = "submit" name = "btn_confirm" value = "Confirm your entry">
        </form>

        <?php endif; ?>
    </body>
</html>

