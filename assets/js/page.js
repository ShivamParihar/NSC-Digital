
                    pageSize = 50;

                    $(function () {
                        var pageCount = Math.ceil($(".line-content").size() / pageSize);

                        for (var i = 0; i < pageCount; i++) {
                            if (i == 0)
                                $("#pagin").append('<li><a class="current" href="#">' + (i + 1) + '</a></li>');
                            else
                                $("#pagin").append('<li><a href="#">' + (i + 1) + '</a></li>');
                        }
                        
                        showPage(1);

                        $("#pagin li a").click(function () {
                            $("#pagin li a").removeClass("current");
                            $(this).addClass("current");
                            showPage(parseInt($(this).text()))
                        });
                    })
                    showPage = function (page) {
                        $(".line-content").hide();

                        $(".line-content").each(function (n) {
                            if (n >= pageSize * (page - 1) && n < pageSize * page)
                                $(this).show();
                        });
                    }
    