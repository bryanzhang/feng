<?php
function getFile($dir) 
{
    $fileArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) 
	{
        $i=0;
        while ( false !== ($file = readdir ( $handle )) ) 
		{
            //去掉"“.”、“..”以及带“.xxx”后缀的文件
            if ($file != "." && $file != ".."&&strpos($file,".")) 
			{
                $fileArray[$i]=$file;
                if($i==10)
				{
                    break;
                }
                $i++;
            }
        }
        //关闭句柄
        closedir ( $handle );
    }
    return $fileArray;
}
?>

<div class="twelve columns" style="height:510px; text-align:center; ">
  <div class="flexslider" style="height:510px; text-align:center; ">
    <ul class="slides" style="height:460px; text-align:center; ">
	  <?php
		$picArray=getFile("images/shop/".$shopid_img."/");
		$pre_dir="images/shop/".$shopid_img."/";
		$num=0;
		foreach($picArray as $pic)
		{
			if($pic!=""&& $pic!=NULL)
			{
			  ?>
			  <li class="slide_item" style="height:460px; overflow:hidden; text-align:center;"><img class="slide_image" src="<?=$pre_dir.$pic;?>" alt=""  style="height:auto; vertical-align:middle; margin:auto auto;" /></li>
			  <?
	  		$num++;
			}
		}
		
		
		while($num<3)//默认图片
		{	
			  ?>
			  <li class="slide_item" style="height:460px; overflow:hidden; text-align:center;"><img class="slide_image" src="<?=getRandomImage();?>" alt="" style="height:auto; margin: auto auto; vertical-align:middle;"  /></li>
			  <?			
			$num++;
		}
		
		?>
    </ul>
  </div>
</div>

