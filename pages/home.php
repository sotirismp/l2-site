

<section class="content-wrap">

<div class="title-page">WELCOME TO <?php echo $nameserver; ?></div>

<div class="slide">
  <img src="imgs/slider/slide1.jpg" width="691" height="272" alt=""/>
</div>

Enter Chat and press enter
<div><input id="inp-mes" placeholder="message" /></div>
Chat Output
<div id=box></div>
<script src=https://cdn.pubnub.com/sdk/javascript/pubnub.4.28.2.min.js></script>
<script> (function() {
        var pubnub = new PubNub({
            publishKey: 'demo',
            subscribeKey: 'demo'
        });
        function $(id) {
            return document.getElementById(id);
        }
        var box = $('box'),
            input = $('input'),
            channel = '10chat-demo';
        pubnub.addListener({
            message: function(obj) {
                box.innerHTML = '<div class="fix-line">' + ('' + obj.message).replace(/[<>]/g, '')+ '</div>' + '<br>' + box.innerHTML
            }
        });
        pubnub.subscribe({
            channels: [channel]
        });
        input.addEventListener('keyup', function(e) {
            if ((e.keyCode || e.charCode) === 13) {
                pubnub.publish({
                    channel: channel,
                    message: input.value,
                    x: (input.value = '')
                });
            }
        });
    })();
</script>


<div class="title-page">SERVER NEWS</div>

<?php 
$queryselectnews = 'SELECT * FROM server_news ORDER BY id DESC LIMIT 4'; 
$readnews = $db -> prepare($queryselectnews); 
$readnews ->execute();
while($resnews = $readnews -> fetch(PDO::FETCH_OBJ)) { 

?>
<div class="box-news-tag">
<div class="icon_news"></div>
<div class="align-news">
<div class="title-news"><?php echo $resnews -> titlenews; ?></div>
<div class="subtitle-news">by: <?php echo $resnews -> author; ?> | date : <?php echo $resnews -> date; ?></div>
</div>
<a href="index.php?pags=news&id=<?php echo $resnews->id; ?>"><div class="readmore"></div></a>
</div>

<?php
} 
?>




<div class="title-page">SERVER FIXES SYSTEM</div>
<?php 
$queryselectfixes = 'SELECT * FROM fixes ORDER BY id DESC LIMIT 4'; 
$readfixes = $db -> prepare($queryselectfixes); 
$readfixes -> execute(); 
while($resfixes = $readfixes -> fetch (PDO::FETCH_OBJ)) { 

?> 

<div class="fix-line">- <strong><?php echo $resfixes -> type; ?></strong> | <?php echo $resfixes-> fix; ?> - date: <?php echo $resfixes->date; ?></div>

<?php 
}
?>

<div class="title-page">SOCIAL NETWORKS</div>
<div class="fb-page" data-href="<?php echo $facebook; ?>" data-width="500" data-height="500"  data-hide-cover="false" data-show-facepile="true" data-show-posts="false" style="margin-top:30px;" ><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/lovel2"><a href="https://www.facebook.com/lovel2">Lineage LM</a></blockquote></div></div>
</section>