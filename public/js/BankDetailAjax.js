$(document).ready(function () {

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
    // alert('Success came');

    function getData() {
        var url = 'https://vast-shore-74260.herokuapp.com/banks?city=MUMBAI';
        // addUrlToCache(url);
        jQuery("#preloader");
        $.ajax({
            // url: url,
            url: localStorage.getItem("Url"),
            method: 'get',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            async: true,
            cache: true,
            beforeSend: function () {

                if (localCache.exist(url)) {
                    alert("Came");
                    doSomething(localCache.get(url));
                    return false;
                }
                return true;
            },
            success: function (data) {
                // alert(data.length);
                localCache.get(url);
                var rows = data;
                generateData(rows);
                jQuery("#preloader").fadeOut("slow");
            },
            complete: function (jqXHR, textStatus) {
                localCache.set(url, jqXHR, doSomething);
                // addUrlToCache(url);
            },
            error: function (xhr, status, error) {
                // alert(JSON.stringify(xhr)+"--------"+status+"---------"+error);
                alert("Error");
            }
        });

        function doSomething(data) {
            console.log(data);
        }
    }
    function generateData(rows) {
        $('#tblData tbody').empty();
        for(var i=0;i<rows.length;i++)
        {
            var row=rows[i];
            if(row['ifsc']===localStorage.getItem("Id"))
            {
                $("#bankId").html('Bank Id: ' + row['bank_id']);
                $('#tblData tbody').append('<tr>' +
                    '<td style="text-align: center">' + 'IFSC' + '</td>' +
                    '<td style="text-align: center">' + row['ifsc'] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td style="text-align: center">' + 'Bank Name' + '</td>' +
                    '<td style="text-align: center">' + row['bank_name'] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td style="text-align: center">' + 'Branch' + '</td>' +
                    '<td style="text-align: center">' + row['branch'] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td style="text-align: center">' + 'Address' + '</td>' +
                    '<td style="text-align: center">' + row['address'] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td style="text-align: center">' + 'City' + '</td>' +
                    '<td style="text-align: center">' + row['city'] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td style="text-align: center">' + 'District' + '</td>' +
                    '<td style="text-align: center">' + row['district'] + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td style="text-align: center">' + 'State' + '</td>' +
                    '<td style="text-align: center">' + row['state'] + '</td>' +
                    '</tr>'
                );
            }
        }
    }

    // function addUrlToCache(url) {
    //     window.fetch(url, {mode: 'no-cors'}).then(function (response) {
    //         caches.open(CACHE_NAME).then(function (cache) {
    //             cache.put(url, response).then(generateData);
    //         });
    //     }).catch(function (error) {
    //         console.log(error);
    //     });
    // }




});