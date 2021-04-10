function sendData(name, code) {
    $.ajax({
        url: "/",
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
