$.ajax({
    url: '../api/latest_cause.php'
}).done(function (response) {
    response = JSON.parse(response);
    $.map(response, function (cause, i) {
        $('#latest').append(`<div class="p-3 border-bottom">
                    <strong>${cause.title.substring(1, 80)}</strong>
                    <p>${cause.description.substring(1, 120)}...</p>
                    <div class="row justify-content-between px-3">
                        <span class="text-muted">By ${cause.first_name} ${cause.last_name}</span>
                        <a href="../causes?id=${cause.id}" class="btn btn-primary">Sign the cause </a>
                    </div>
                </div>`)
    })
})


$('#sign-form').submit(function (e) {
    e.preventDefault();
    let payload = {
        cause_id: e.target[0].value,
        comment: e.target[1].value,
    };

    $.post('../api/add_sign.php', payload, function (data, status) {
        if (data) {
            $('#sign-form').remove();
        }
    })
})

let cause_id = $('.cause-card').attr('id');

setInterval(() => {
    $.ajax({
        url: '../api/latest_sign.php?id=' + cause_id
    }).done(function (response) {
        response = JSON.parse(response);
        $('#latest_signs').html('');
        $.map(response, function (sign, i) {
            $('#latest_signs').append(`<div class="card my-3 p-3 bg-white box-shadow">
                    <strong>${sign.comment}</strong>
                    <span class="text-muted">By ${sign.first_name} ${sign.last_name}</span>
                </div>`)
        })
    })
}, 5000);

setInterval(() => {
    $.ajax({
        url: '../api/sign_count.php?id=' + cause_id,
    }).done(function (response) {
        response = JSON.parse(response);
        $('span#count').html(response[0]["COUNT(id)"])
    })
}, 3000);