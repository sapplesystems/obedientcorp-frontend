
getNewsList();
$(document).ready(function () {
    $("#news-update-form").submit(function (e) {
        e.preventDefault();
        var news_update_form = $("#news-update-form");
        news_update_form.validate({
            rules: {
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#news-update-form").valid()) {
            var url = '';
            var params = new FormData();
            var description = $('#description').val();
            var news_title = $('#news_title').val();
            var photo = $('#photo')[0].files[0];
            params.append('title', news_title);
            params.append('photo', photo);
            params.append('description', description);
            url = base_url + 'news-add';
            if ($('#news-id').val() != '') {
                url = base_url + 'news-update';
                params.append('id', $('#news-id').val());
            }

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        showSwal('success', 'News Saved', response.data);
                        document.getElementById('news-update-form').reset();
                        if ($('news-id').val() != '') {
                            $('#upload_photo').attr('src', '');
                            $('#upload_photo').css('display', 'none');
                        }
                        getNewsList();
                    }
                    else {
                        showSwal('error', response.data);
                    }
                }
            });

        }

    });


})//end document ready

//get all news list
function getNewsList() {
    showLoader();
    $.ajax({
        url: base_url + 'news-list',
        type: 'post',
        data: {},
        success: function (response) {
            var html = '';
            if (response.status == "success") {
                var i = 1;
                $.each(response.data, function (key, value) {
                    var edit_url;
                    //edit_url = 'add-winner.php?wid=' + value.id;
                    html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + value.title + '</td>\n\
                                <td>' + value.description + '</td>\n\
                                <td><img src="'+ media_url + 'news_photo/' + value.photo + '" id="photo_id" /> </td>\n\
                                <td><a href="javascript:void(0);" onclick="updateNews(event, ' + value.id + ');"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteNews(event, ' + value.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                            </tr>';
                    i = i + 1;


                });

                $('#news-listing').html(html);
                initDataTable();
                hideLoader();
            }
            else {
                initDataTable();
                hideLoader();
            }
        }
    });
}//function end all winner list

//function for edit winner details
function updateNews(e, news_id) {
    e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'news-detail',
        type: 'post',
        data: { id: news_id },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                $('#news-id').val(news_id);
                $('#news_title').val(data.title);
                $('#description').val(data.description);
                if (data.photo) {

                    var photo_src = media_url + 'news_photo/' + data.photo;
                    $('#upload_photo').attr('src', photo_src);
                    $('#upload_photo').css('display', 'block');
                }
                else {
                    $('#upload_photo').attr('src', '');
                    $('#upload_photo').css('display', 'none');
                }
                hideLoader();
            }
        }
    });
}//End function for edit winner details

//function for delete news
function deleteNews(e, news_id) {
    e.preventDefault();
    showLoader();
    var result = confirm("Are you sure you want to delete this news?")
    if (result == true) {
        $.ajax({
            url: base_url + 'news-delete',
            type: 'post',
            data: { id: news_id },
            success: function (response) {
                if (response.status == "success") {
                    getNewsList();


                }
                hideLoader();
            }
        });
    }
}//end function for delete winner



