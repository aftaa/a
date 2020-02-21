$(function () {
    $('a.view').on('click', function () {
        console.info(this.dataset.linkId);
        $.get('/view.php', {linkId: this.dataset.linkId});
    });

    $('#copy').on('click', function () {

    });
});