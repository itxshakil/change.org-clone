$.ajax({
    url: '../api/latest_cause.php'
}).done(function (response) {
    response = JSON.parse(response);
    $.map(response, function (cause, i) {
        $('#latest').append(`<div class="p-3 border-bottom">
                    <strong>${cause.title}</strong>
                    <p>${cause.description}</p>
                    <div class="row justify-content-between px-3">
                        <span class="text-muted">By ${cause.first_name} ${cause.last_name}</span>
                        <a href="../causes?id=${cause.id}" class="btn btn-primary">Sign the cause </a>
                    </div>
                </div>`)
    })
})