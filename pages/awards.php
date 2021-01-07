<div id="fb-root"></div>
<script type="text/javascript"
     src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">
FB.init({
 appId : '1518604245074827',
 status : true,
 cookie : true,
 xfbml : true
 });
</script>

<script type="text/javascript">
function shareToDownload(){
  FB.ui({
    method: 'feed',
  link: 'https://upug.com.br/',
  redirect_uri:'https://developers.facebook.com/tools/explorer',
  caption: 'An example caption',
 }, function(response){
   if (response && !response.error_code) {
     
   }
 });
}
</script>
<div id="results">
<img onclick="shareToDownload();" style="cursor:pointer" src="https://d1wofkmqsniyp0.cloudfront.net/public/v2.0/imgs/fbshare.png">

</div>