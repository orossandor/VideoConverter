window.addEventListener('load', (event) => {

    copyButton.addEventListener('click', function() {

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('#link').text()).select();
        document.execCommand("copy");
        $temp.remove();

        alert("Copied text: " + $('#link').text());

    });


});