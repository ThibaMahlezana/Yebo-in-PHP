 
    function scrollMessageTop() {
        $(".displayChat").animate({ scrollTop: $(".displayChat")[0].scrollHeight });
    }

    var cacheData;
    var data;

    function chat() {
        var variable = 'test';
        $('#displayChat').load("include/ajaxtest.php?action=nun");
    }

    //window.setTimeout(function () { chat(); }, 1000);
    setInterval(function () { chat(); }, 1000);
