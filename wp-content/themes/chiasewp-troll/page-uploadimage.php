<?php
/*
Template Name: Upload Ảnh (Đang xây dựng chưa sử dụng đc)
*/
get_header(); ?>
<div id="content">
<div id="mainContainer">
<div id="leftColumn">
<div class="box inputForm upload">

		<h3>Upload new image 
            <a href="/upload-video" class="toggleMode">upload video video <span class="new">new</span></a>
        </h3>
        <div class="tips">
                you have funny pictures. Share it to everybody and don't remember read  <b>Rule</b> right colums
        </div>
		<form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">

         <p class="required">
<label for="file">Chọn file ảnh (tối đa 2mb) </label>

              <input type="file" name="thumbnail" id="thumbnail"> 

			   
                <span class="field-validation-valid" data-valmsg-for="File" data-valmsg-replace="true"></span>
            </p>
            <p class="required">
                <label for="Caption">Tiêu đề</label>
			
                <input class="text largeWidth" data-val="true" data-val-length="max 150 word" data-val-length-max="150" data-val-required="Must submit title " id="title" name="title"  type="text" value="" />
                
				
				
                <span class="field-validation-valid" data-valmsg-for="Caption" data-valmsg-replace="true"></span>
            </p>

            <p>
                        <label for="Source">Nguồn
                            <input class="checkBoxWidth" data-val="true" data-val-required="By me ! field is required." id="IsSelfMade" name="IsSelfMade" type="checkbox" value="true" /><input name="IsSelfMade" type="hidden" value="false" />
                            <label class="checkboxLabel" for="IsSelfMade">Tạo bởi tôi</label>
                        </label>
                        <input class="text largeWidth" data-val="true" data-val-length="max 100 word." data-val-length-max="1000" id="Source" name="Source" type="text" value="" />
                        <span class="field-validation-valid" data-valmsg-for="Source" data-valmsg-replace="true"></span>
                    </p>
            <p>
                <label for="post_tags">Từ khoá (Cách nhau bằng dấu "," tối đa 3 từ)</label>
                <input class="text largeWidth" data-val="true" data-val-length="max 45 word." data-val-length-max="45" id="post_tags" name="post_tags" type="text" value="" />
                <span class="field-validation-valid" data-valmsg-for="post_tags" data-valmsg-replace="true"></span>
            </p>
            <p class="buttonSet">
	<input type="hidden" name="action" value="new_post" />
	<input type="hidden" id="_wpnonce" name="_wpnonce" value="6ec3af311b" /><input type="hidden" name="_wp_http_referer" value="/upload" />
                <button class="buttons submitButton" type="submit" id="saveButton">
                    Upload</button>
                <a class="buttons cancelButtons" href="/">sauter</a>
            </p>
</form>    </div>
    <div id="footer">
    <ul class="left">
        <li>Copyright © 2013 <a href="funnyopen.com/" target="_blank">
            funnyopen</a></li>
    </ul>
    <ul class="right">
        <li><a href="/home/contact">Contact</a>
        </li>
        <li>·<a href="/home/about">Info</a>
        </li>
        <li>·<a href="http://www.facebook.com/funnyopencom" target="_blank">Facebook</a>
        </li>
    </ul>
    <div class="clear">
    </div>
</div>
</div>
<div id="rightColumn">

    <div class="box highlightBox">
        <h3>Upload Limit </h3>
        upload max  <b> two image per day </b><br/>
        Number image upload to day :  <b>0</b><br/>
        <i>(limit will raise when you have much like )</i>
    </div>
    <div class="box darkBox">
    <h3>
        Submission Rules </h3>
    <ul class="guidelines">
        <li>Think of an original or descriptive title, instead of phrases like "LOL", "True", or "AMAZING!"....</li>
        <li><span style="color:red">Respect originality and creativity. Try using Google Images to find the origin of the post. </span></li>
    </ul>
</div>
</div>
<div class="clear">
</div>


        </div>
    </div>
    
<?php get_footer(); ?>