$(document).ready(function () {
    let table = document.getElementById('sortableTable');
    let sortable = Sortable.create(table, {
        delayOnTouchOnly: true,
        onEnd: function (/**Event*/evt) {
            $.ajax({
                url: "/api/books/" + evt.item.getAttribute('data-id'),
                type: 'PATCH',
                data: {
                    'ranking': evt.newIndex + 1,
                },
                success: function (result) {
                    $('#sortableTable').each(function () {
                        i = 1;
                        $(this).find('tr').each(function () {
                            $(this)[0].children[0].innerText = i;
                            $.ajax({
                                url: "/api/books/" + $(this)[0].getAttribute('data-id'),
                                type: 'PATCH',
                                data: {
                                    'ranking': i++,
                                },
                            });
                        });
                    });
                }
            });
        },
    });
});
