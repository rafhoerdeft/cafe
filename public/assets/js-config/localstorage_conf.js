var configs;

function setConfig(url) {
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.success) {
                localStorage.setItem('configs', JSON.stringify(data.data));
                configs = JSON.parse(localStorage.getItem('configs'));
            }
        },
        error: function(data) {
            console.log(data.responseJSON);
        }
    });
}

function loadConfig(url = '') {
    configs = JSON.parse(localStorage.getItem('configs'));
    if (configs) {
        console.log('config loaded');
    } else {
        setConfig(url);
    }
}