// jQuery(window).load(function () {
//     //jQuery("#status").fadeOut();
//     jQuery("#preloader").delay(1800).fadeOut("slow");
// });
$(document).ready(function () {


    totalRecords = 0;
    records = [];
    displayRecords = [];
    recPerPage = parseInt($("#perPage").val());
    page = 1;
    totalPages = 0;
    var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {},
        $checkboxes = $("#tblData :checkbox");
    $.each(checkboxValues, function(key, value) {
        $("#" + key).prop('checked', value);
    });
    var CACHE_NAME = 'window-cache-v1';
    var localCache = {
        data: {},
        remove: function (url) {
            delete localCache.data[url];
        },
        exist: function (url) {
            return localCache.data.hasOwnProperty(url) && localCache.data[url] !== null;
        },
        get: function (url) {
            console.log('Getting in cache for url ' + url);
            return localCache.data[url];
        },
        set: function (url, cachedData, callback) {
            localCache.remove(url);
            localCache.data[url] = cachedData;
            if ($.isFunction(callback)) callback(cachedData);
        }
    };
    getData();

    function getData() {
        var url = 'https://vast-shore-74260.herokuapp.com/banks?city='+$("#city").val().toUpperCase();
        addUrlToCache(url);
        $.ajax({
            url: url,
            method: 'get',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: true,
            cache: true,
            beforeSend: function () {

                if (localCache.exist(url)) {
                    // alert("Came");
                    // doSomething(localCache.get(url));
                    return false;
                }
                return true;
            },
            success: function (data) {
                // alert(data.length);
                localCache.get(url);
                records = data;
                totalRecords = records.length;
                totalPages = Math.ceil(totalRecords / recPerPage);
                apply_pagination();
            },
            complete: function (jqXHR, textStatus) {
                localCache.set(url, jqXHR, doSomething);
                addUrlToCache(url);
            },
            error: function (xhr, status, error) {
                // alert(JSON.stringify(xhr)+"--------"+status+"---------"+error);
                alert("Error");
            }
        });

        function doSomething(data) {

        }
    }

    function addUrlToCache(url) {
        window.fetch(url, {mode: 'no-cors'}).then(function (response) {
            caches.open(CACHE_NAME).then(function (cache) {
                cache.put(url, response).then(apply_pagination);
            });
        }).catch(function (error) {
            console.log(error);
        });
    }

    function generateTable() {
        $('#tblData tbody').empty();

        for (var i = 0; i < displayRecords.length; i++) {
            var row = displayRecords[i];
            if (row['city'].toLowerCase() === $("#city").val().toLowerCase()) {
                $('#tblData tbody').append('<tr>' +
                    '<td style="text-align: center">' +
                    '<label for="'+row['ifsc']+'" class="custom-checkbox">' +
                    '<input type="checkbox"  id="'+row['ifsc']+'"/>' +
                    '<i class="glyphicon glyphicon-star-empty"></i>' +
                    '<i class="glyphicon glyphicon-star"></i>' +
                    '</label>' +
                    '</td>' +


                    '<td style="text-align: center">\n' +
                    '<a class="demoClass"  value="' + row['ifsc'] + '" href="/bank/' + row['bank_id'] + '">' +
                    row['bank_name'] +
                    '</a>  ' +
                    '</td>' +
                    // '<td style="text-align: center">' + row['bank_name'] + '</td>' +
                    '<td style="text-align: center">' + row['branch'] + '</td>' +
                    '<td style="text-align: center">' + row['city'] + '</td>' +
                    '<td style="text-align: center">' + row['state'] + '</td>' +
                    +
                        '</tr>');
            }
        }
    }

    function apply_pagination() {
        $('#pagination').twbsPagination('destroy');
        $('#pagination').twbsPagination({
            totalPages: totalPages,
            visiblePages: 5,
            onPageClick: function (event, page) {
                displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
                endRec = (displayRecordsIndex) + recPerPage;
                displayRecords = records.slice(displayRecordsIndex, endRec);
                generateTable();
            }
        });
    }


    $("#input-31").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        // records.filter(function() {
        //     $("#tblData tr").toggle($("#tblData tr").text().toLowerCase().indexOf(value) > -1)
        // });
        $("#tblData tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#perPage").on("change", function () {
        recPerPage = parseInt($("#perPage").val());
        totalPages = Math.ceil(totalRecords / recPerPage);
        apply_pagination();
    });
    $("#city").on("change", function () {
        getData();
    });
    $(document).on('click', '.demoClass', function () {
        var id = $(this).attr('value');
        localStorage.setItem('Id', id);
    });
    $(document).on('click', '.ch', function (){
        alert('Checked');
        var chkArray = [];
        $("this:checked").each(function () {
            chkArray.push($(this).val());
        });
        localStorage.setItem("checkboxValues", JSON.stringify(chkArray));
    });
    $(document).on('click','#tempBtn',function () {
        alert('Hello');
    })

});