<link rel="stylesheet" href="style.css">

<input type="text" id="mytext"><br>
<input type="submit" id="mybutton"><p><p>

<script>

    document.getElementById("mybutton").addEventListener("click",e => {
        alert(document.getElementById("mytext").value);
    })

</script>

test



Enter Chat and press enter
<div><input id=input placeholder="message" /></div>
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
                box.innerHTML = '<div class="container-chat1">'+('' + obj.message).replace(/[<>]/g, '') + '</div>' + box.innerHTML
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