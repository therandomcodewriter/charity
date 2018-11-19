<!--<html>
<head> <title>Iterate</title>
<!--<?php
function unique($arr) {
   $u_arr = array();
   foreach ($arr as $s) {
	  foreach ($u_arr as $us) {	
	  if ($us == $s){ 
	break;
	} 
	$us_arr[] = $s;
	sort($us_arr);
   }
}
   return $us_arr;
}
?>
</head>
<body>
<?php
$str = array(1,1,1,2,2,2,3,3,3,4,4,4);
$uStr = unique($str);
 foreach ($uStr as $u) {
print($u);
}
 
 ?>
 <?php
 //creates a longer unique id with the 'about' prefix 
$b = uniqid (about, true); Echo $b; echo "<br>";  
//creates a unique id with the 'about' prefix 
$a = uniqid(about); echo $a; echo "<br>";
//creates a unique ID with a random number as a prefix - more secure than a static prefix 
$c = uniqid (rand (),true); echo $c; echo "<br>";
//this md5 encrypts the username from above, so its ready to be stored in your database 
$md5c = md5($c); echo $md5c; 
?>

<body>
<?php
	 $target = "upload/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 
 //This is our size condition 
 if ($uploaded_size > 350000) 
 { 
 echo "Your file is too large.
"; 
 $ok=0; 
 } 
 
 //This is our limit file type condition 
 if ($uploaded_type =="text/php") 
 { 
 echo "No PHP files
"; 
 $ok=0; 
 } 
 
 //Here we check that $ok was not set to 0 by an error 
 if ($ok==0) 
 { 
 Echo "Sorry, your file was not uploaded"; 
 } 
 
 //If everything is ok we try to upload it 
 else 
 { 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 { 
 echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded"; 
 } 
 else 
 { 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 } 
 ?>

</body>
</html>
-->
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
 
/***********************************************************************************
 ************************************************************************************/
class Attachment
{
    var $attachment_id;
    var $omessage_id;
    var $input_id;
    var $db;
    var $validity;
    var $Form;
    var $user;
    function getRandomName($filename)
    {
        $file_array = explode(".", $filename);
        $file_ext = end($file_array);
        $new_file_name = uniqid() . date('m') . date('d') . date('Y') . date('G') . date('i') . date('s') . "." . $file_ext;
        return $new_file_name;
    }
    function __construct()
    {
        $this->db = new database(DATABASE_HOST, DATABASE_PORT, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
        $this->validity = new ClsJSFormValidation();
        $this->Form = new ValidateForm();
        $this->user = new User();
    }
    function uploadAttchment($runat, $omessage_id = 0)
    {
        $this->omessage_id = $omessage_id;
        switch ($runat) {
            case 'local':
                ?>
            <script>      
            function removeAttachmentElement(num_id) {
                var container = document.getElementById('attachment_container');
                container.removeChild( document.getElementById('attachment_'+num_id) );
            }
             
            function addAttachmentElement() {
                var container = document.getElementById('attachment_container');
                var counter = document.getElementById('attachment_counter').value;
                counter++;
                document.getElementById('attachment_counter').value = counter;
                var attachment_div = document.createElement('div');
                attachment_div.setAttribute('id','attachment_'+counter);
                attachment_div.setAttribute('class','attachment');
                  
                      
                var attachment_input = document.createElement('input');
                attachment_input.setAttribute('type','file');
                attachment_input.setAttribute('size','14');
                attachment_input.setAttribute('id','file_'+counter);
                attachment_input.setAttribute('name','file_'+counter);
                attachment_input.setAttribute('style','width:auto !important;');
                attachment_div.appendChild(attachment_input);
              
                 
                var attachment_a2 = document.createElement('a');
                attachment_a2.setAttribute('href','');
                attachment_a2.setAttribute('onclick','removeAttachmentElement('+counter+');return false;');
                var attachment_img2 = document.createElement('img');
                attachment_img2.setAttribute('id','RemoveButton_'+counter);
                attachment_img2.setAttribute('src','minusButton.png');
                attachment_img2.setAttribute('alt','Remove');
                attachment_img2.setAttribute('onmousedown',"this.src='minusButtonDown.png';");
                attachment_img2.setAttribute('onmouseup',"this.src='minusButton.png';");
                attachment_a2.appendChild(attachment_img2);              
                attachment_div.appendChild(attachment_a2);
                 
                container.appendChild(attachment_div);
                 
            }
            </script>
         
            <form name="upload" action="" enctype="multit/form-data" method="post">
            <div id="attachment_container">
                <input type="text" value="1" id="attachment_counter" />
                <div id="attachment_1">
                <input type="file" size="14" id="file_1" name="file_1" style="width:auto !important;" /><a href="" onclick="removeAttachmentElement(1);return false;"><img id="RemoveButton_1" src="minusButton.png" onmousedown="this.src='minusButtonDown.png';" onmouseup="this.src='minusButton.png';" alt="Remove" /></a>
                </div>
            </div>
            <a href="" onclick="addAttachmentElement();return false;" class="gray"><!--<img id="AddButton_1" src="plusButton.png" onmousedown="this.src='plusButtonDown.png';" onmouseup="this.src='plusButton.png';" alt="Add" />-->add another</a>                
            </form>
            <?php 
                break;
            case 'server':
                if ($_POST) {
                    foreach ($_FILES as $files) {
                        $fileName = $files['name'];
                        $tmpName = $files['tmp_name'];
                        $fileSize = $files['size'];
                        $fileType = $files['type'];
                        if ($fileSize != 0) {
                            /*$fp = fopen($tmpName, 'rb');
                                    $content = fread($fp, filesize($tmpName));
                                    $content = chunk_split(base64_encode($content));
                                    fclose($fp);                                    
                                    */
                            $name = basename($this->getRandomName($fileName));
                            $target = "uploads/" . $name;
                            move_uploaded_file($tmpName, $target);
                            $fileName = addslashes($fileName);
                            $insert_sql_array[name] = $fileName;
                            $insert_sql_array[size] = $fileSize;
                            $insert_sql_array[type] = $fileType;
                            $insert_sql_array[content] = $name;
                            $insert_sql_array[omessage_id] = $this->omessage_id;
                            $this->db->insert(TBL_ATTACHMENT, $insert_sql_array, '', '', '', 0);
                        }
                    }
                }
                break;
        }
    }
    function attachmentList($omessage_id, $user_id, $dir = '')
    {
        $sql = "select * from " . TBL_ATTACHMENT . " WHERE omessage_id='" . $omessage_id . "'";
        $result = $this->db->query($sql, __FILE__, __LINE__);
        ?>
        <table width="100%" class="table">
        <?php 
        if ($this->db->num_rows($result) > 0) {
            ?>
<tr><td colspan="2" class="textb"> Attachments</td></tr><?php 
        }
        while ($row = $this->db->fetch_array($result)) {
            ?>
<tr><td>
            <?php 
            echo $row['size'] / 1000 . 'kb ';
            ?>
 </td><td>:: <a href="download.php?id=<?php 
            echo $row['attachment_id'];
            ?>
&user_id=<?php 
            echo $user_id;
            ?>
&omessage_id=<?php 
            echo $omessage_id;
            ?>
&dir=<?php 
            echo $dir;
            ?>
" target="_blank">
            <?php 
            echo $row['name'];
            ?>
</a></td></tr>
            <?php 
        }
        ?>
</table><?php 
    }
    function download_attachment($att_id, $omessage_id, $user, $dir = '')
    {
        if ($dir == '') {
            $dir = 'uploads/';
        }
        $flag = 0;
        $sql_user = "select a.to , b.user_id from " . TBL_MESSAGE_SENT_TO . " a, " . TBL_MESSAGE_OUTBOX . " b WHERE a.omessage_id='" . $omessage_id . "' and b.omessage_id='" . $omessage_id . "'";
        echo $sql_user;
        $result_user = $this->db->query($sql_user, __FILE__, __LINE__);
        while ($row_user = $this->db->fetch_array($result_user)) {
            echo "YES<br>";
            if ($row['user_id'] == $user_id) {
                $flag = 1;
                break;
            } else {
                if ($row['to'] == $user_id) {
                    $flag = 1;
                    break;
                }
            }
        }
        if ($flag == 1) {
            $sql = "select * from " . TBL_ATTACHMENT . " WHERE attachment_id='" . $att_id . "'";
            $result = $this->db->query($sql, __FILE__, __LINE__);
            $row = $this->db->fetch_array($result);
            header("Content-length: {$row['size']}");
            header("Content-type: {$row['type']}");
            header("Content-Disposition: attachment; filename={$row['name']}");
            $name = $dir . $row['content'];
            $fp = fopen($name, 'rb');
            $content = fread($fp, filesize($name));
            $content = chunk_split(base64_encode($content));
            fclose($fp);
            echo base64_decode($content);
        }
    }
}
?>
</body>
</html>
