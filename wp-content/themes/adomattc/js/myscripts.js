jQuery(function($)  
{
    $("#contact_form").submit(function()
    {
        var name  = $("#name").val(); // get name field value
	var email = $("#email").val(); // get email field value
	var subject =  $("#subject").val(); // get subject field value
        var msg = $("#msg").val(); // get message field value
		
        $.ajax(
        {
            type: "POST",
            url: "https://mandrillapp.com/api/1.0/messages/send.json",
            data: 
	    {
                'key': 'US9U8XiepMg6nUVDaq5UeQ',
                'message':
                 {
                    'from_email': email,
                    'from_name': name,
                    'headers': 
		    {
                        'Reply-To': email
                    },
                    'subject': subject,
                    'text': msg,
                    'to': [
                    {
                        'email': 'sushil@adomattic.com',
                        'name':  'Adomattic Customer Service',
                        'type': 'to'
                    }]
                 }
            }
        })
        .done(function(response) {
            alert('Your message has been sent. Thank you!'); // show success message
            $("#name").val(''); // reset field after successful submission
            $("#email").val(''); // reset field after successful submission
            $("#msg").val(''); // reset field after successful submission
	    $("#subject").val(''); // reset field after successful submission
        })
        .fail(function(response) {
            alert('Error sending message. Please contact later.');
        });
        return false; // prevent page refresh
    });
});
