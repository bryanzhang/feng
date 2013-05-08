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

<div class="twelve columns" style="height:510px; text-align:center; "><div id="slider-container">
        <div id="slider">
            <div>
                <img alt="Open Source Vector Icons" src="images/gSlider/open-source-vector-icons.png" />
                <a href="http://www.greepit.com/2010/07/open-source-icons-for-ui-designers-web-developers-gcons/" target="_blank">Open Source Vector Icons</a>
            </div>
            <div>
                <img alt="Feedback Collection Polling Widget" src="images/gSlider/Feedback-Collection-Polling-Widget.png" />
                <a href="http://www.greepit.com/2010/11/feedback-collection-and-polling-widget-opineo/" target="_blank">Feedback Collection Polling Widget</a></div>
            <div>
                <img alt="Most Effective Link Building Strategies for Blogs" src="images/gSlider/link-building-strategies-for-blogs.png" />
                <a href="http://www.greepit.com/2010/11/most-effective-link-building-strategies-for-blogs/" target="_blank">Link Building Strategies for Blogs</a></div>
            <div>
                <img alt="First Complete CSS3 jQuery Tabs" src="images/gSlider/jQuery-css3-tabs.png" />
                <a href="http://www.greepit.com/2011/04/jquery-css3-tabs-with-breadcrumb-and-pagination-classytabs/" target="_blank">First Complete CSS3 jQuery Tabs</a></div>
            <div>
                <img alt="Professional Creative Free Resume Template" src="images/gSlider/professional-creative-resume-template.png" />
                <a href="http://www.greepit.com/2010/06/creative-resume-template/" target="_blank">Professional Creative Free Resume Template</a></div>
            <div>
                <img alt="How to Design Accessible Websites and Web Applications
" src="images/gSlider/how-to-design-accessible-websites-and-web-applications.png" />
                <a href="http://www.greepit.com/2011/05/how-to-design-accessible-websites-and-web-applications/" target="_blank">How to Design Accessible Websites</a></div>
            <div>
                <img alt="One-liner Login Control" src="images/gSlider/one-line-login-control-singleline-login.png" />
                <a href="http://www.greepit.com/2011/05/one-is-better-than-two-singleline-login" target="_blank">One-liner Login Control</a></div>
            <div>
                <img alt="Free Minimal Wordpress Theme" src="images/gSlider/free-minimal-wordpress-theme.png" />
                <a href="http://www.greepit.com/2010/12/free-minimal-wordpress-theme-ginimalistic/" target="_blank">Free Minimal Wordpress Theme</a></div>
                
            <div>
                <img alt="5 Web Design Trends to Watch & Follow in 2011" src="images/gSlider/5-web-design-trends-to-watch-follow-in-2011.png" />
                <a href="http://www.greepit.com/2011/04/5-web-design-trends-to-watch-follow-in-2011/" target="_blank">Web Design Trends to Watch & Follow</a></div>

                        
        </div>
</div></div>

