    <?php
   
     if(!empty($_POST["str"] && $_POST["comment"] && $_POST["passstr"]))
     {$str1=$_POST["str"];
      $str2=$_POST["comment"];
      $passstr=$_POST["passstr"];
     $date=date("Y年m月d日 H:i:s");
      $filename="mission_3-5.txt";
    
     if(empty($_POST["editno"]))
     {$editno=$_POST["editno"];
     if(file_exists($filename)){
      $num=count(file($filename,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES));
    $fp = fopen($filename,"a");
     fwrite($fp, $num+"1" ."<>".$str1."<>".$str2."<>".$date."<>".$passstr."<>".PHP_EOL);
    fclose($fp);}
    else
    { $filename="mission_3-5.txt";
        $num2="1";
    $fp = fopen($filename,"a");
     fwrite($fp, $num2."<>".$str1."<>".$str2."<>".$date."<>".$passstr."<>".PHP_EOL);
    fclose($fp);}}
    
  else
  {$editno= $_POST["editno"];
$filename="mission_3-5.txt";
$ret_array=file($filename);
$fp=fopen($filename,"w");
foreach($ret_array as $line)
{$data=explode("<>",$line);
    if($data[0]==$editno)
   { fwrite($fp,$editno ."<>".$str1."<>".$str2."<>".$date."<>".$passstr."<>".PHP_EOL);}
    else{fwrite($fp,$line);}}
fclose($fp);}
     }
  
  if(!empty ($_POST["deletenum"] && $_POST["delpass"]))
   {$delete=$_POST["deletenum"];
   $delpass=$_POST["delpass"];
    $filename="mission_3-5.txt";
    $delcon=file($filename);
    $fp=fopen($filename,"w");
    for($j=0;$j<count($delcon); $j++){
    $deldate=explode("<>",$delcon[$j]);
    if($deldate[0]==$delete && $deldate[4]==$delpass)
    {fwrite($fp,"消去しました".PHP_EOL);
   echo "<br>" ;}
     else{fwrite($fp,$delcon[$j]); }
    }
     fclose($fp);   
     }
    
     elseif (!empty ($_POST["deletenum"]) && empty($_POST["delpass"]))
     {$delete=$_POST["deletenum"];
   $delpass=$_POST["delpass"];
    $filename="mission_3-5.txt";
    $delcon=file($filename);
    $fp=fopen($filename,"w");
    for($j=0;$j<count($delcon); $j++){
    $deldate=explode("<>",$delcon[$j]);
    if($deldate[0]==$delete && $deldate[4]==$delpass)
    {fwrite($fp,"消去しました".PHP_EOL);
   echo "<br>" ;}
     else{fwrite($fp,$delcon[$j]); }
    }
     fclose($fp);   
     }
     
     
     
     
     
     
    
  if(!empty($_POST["str"] ||$_POST["comment"]||$_POST["deletenum"]))
   { $filename="mission_3-5.txt";
       if(file_exists($filename)) {
   $lines=(file($filename,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES)); 
    $str3=$num+"1" ."<>".$str1."<>".$str2."<>".$date."<>".$passstr."<>".PHP_EOL;
     foreach($lines as $str3) 
   {$str_array=explode("<>",$str3);
   if(count($str_array)>=2)
  {echo $str_array[0].$str_array[1].$str_array[2].$str_array[3]."<br>";}
  else 
  {echo "消去しました"."<br>";}
   }}}
  
    //編集対象番号 
      if(!empty($_POST["editnumber"]))
{$editnumber=$_POST["editnumber"];
$filename="mission_3-5.txt";
$edicon=file($filename);
foreach($edicon as $line)
{$edidate=explode("<>",$line); 
 if($editnumber==$edidate[0])   
 {$editnum=$edidate[0];
  $editname=$edidate[1];
  $editcomment=$edidate[2];
}}}

     ?>
     
     <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-05</title>
</head>
<body>
    <form action="m3-05.php" method="post">
  <input type="text" name="str" placeholder="名前" 
  value="<?php 
  $filename="mission_3-5.txt";
  if(file_exists($filename)){
  $roopcon=file($filename);
  foreach($roopcon as $line)
{$roopdate=explode("<>",$line);} 
   if(count($roopdate)>=4){
  if(!empty($editname) && !empty($_POST["edipass"]) && $roopdate[4]==$_POST["edipass"] ) 
    {echo $editname; }
    else{}}
    elseif(!empty($editname) && empty($_POST["edipass"]) && $roopdate[4]==$_POST["edipass"] ) 
    {echo $editname; }
    else{}}
    ?>"><br>
      
       <input type="text" name="comment" placeholder="コメント"
     value= "<?php   $filename="mission_3-5.txt";
 if(file_exists($filename)){
  $roopcon=file($filename);
  foreach($roopcon as $line)
{$roopdate=explode("<>",$line);}
     if(!empty($editcomment) && $roopdate[4]==$_POST["edipass"])
      {echo $editcomment;}
      else{}
      }?>" ><br>
      
      <input type="text" name="passstr" placeholder="パスワード" >
         
         <input type="hidden" name="editno"  value= "<?php
        $filename="mission_3-5.txt";
 if(file_exists($filename)){
  $roopcon=file($filename);
  foreach($roopcon as $line)
{$roopdate=explode("<>",$line);} 
        if(!empty($editnum) && $roopdate[4]==$_POST["edipass"])
    {echo $editnum; }
    else{}
    }?>">
          <input type="submit" name="submit" value="送信"><br>
         <br>
         
         <input type="num" name="deletenum" placeholder="削除対象番号"> <br>
         <input type="text" name="delpass" placeholder="パスワード" >
         <input type="submit" name="submit" value="削除"> <br>
         
         <br>
         
         <input type="num" name="editnumber" placeholder="編集対象番号"><br>
        <input type="text" name="edipass" placeholder="パスワード" >
         <input type="submit" name="submit" value="編集">
    </form>
    
</body>
</html>    
       
       
       
       
       