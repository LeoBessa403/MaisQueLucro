$(function () {

    var api_key = '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';
    var endpoint = 'https://api.openai.com/v1/completions';

    $('#send').click(function() {
        var input = $('#input').val();
        $('#input').val('');

        $.ajax({
            type: 'POST',
            url: endpoint,
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + api_key,
            },
            data: JSON.stringify({
                'model': 'text-davinci-003',
                'prompt': input,
                'max_tokens': 2048,
                'temperature': 0.7,
            }),
            success: function(response) {
                var output = response.choices[0].text.trim().replaceAll('\n\n' , '<br>');
                $('#output').append('<p><strong>Você:</strong> ' + input + '</p>');
                $('#output').append('<p><strong>Ai Sistema:</strong> <br>' + output + '</p><hr>');
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

});