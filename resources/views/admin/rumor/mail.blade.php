
@if($type == "received")
<div style="width: 100%; height: 100vh; display:flex; align-items: center; justify-content: center; padding: 25px; font-size: 30px; font-weight: 300; color: #fff; background: #0c63e4">
    We are received your mail. <br> Thanks for send email, we will contact you via phone number or this email.
</div>
@elseif($type == "processed")
Your rumor is now processed, We will confirm you.
@elseif($type == "done")
Finally Its now live our website.
@endif
