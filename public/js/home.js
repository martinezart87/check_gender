function sendData(name, code) {
    $.ajax({
        url: window.location,
        type: "POST",
        data: {
            code: code,
            name: name,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            $("#gender").html(response);
        }
    });
    return true;
}
