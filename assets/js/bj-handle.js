/**
 * @team: FsFlex Team
 * @since: 1.0.0
 * @author: KP
 */
(function ($) {
    var bj_handle_init = {
        init: function () {
            this.events.viewMoreComments();
            this.events.showMoreLatestProduct();
            this.handles.checkPageResultSearch();
            this.handles.validateCheckOutForm();
        },
        events: {
            viewMoreComments: function () {
                $(document).on("click", ".bj-showmore-comments-btn", function (e) {
                    e.preventDefault();
                    var _this = $(this),
                        current_page = _this.attr("data-currentpage"),
                        post = _this.attr("data-post"),
                        count = _this.attr("data-count");
                    $.ajax({
                        url: bj_handle.ajax_url,
                        async: false,
                        type: 'POST',
                        beforeSend: function () {
                        },
                        data: {
                            action: 'book_junky_load_more_comments',
                            page: current_page,
                            post_id: post,
                            count: count
                        }
                    })
                        .done(function (data) {
                            if (data.stt === 'success') {
                                $(".commentlist").append(data.layout);
                                if (data.new_count > 0) {
                                    var new_current_page = parseInt(current_page) + 1;
                                    _this.attr("data-currentpage", new_current_page);
                                    _this.attr("data-count", data.new_count);
                                    _this.find('p.bj-more').html("(" + data.new_count + ")");
                                } else {
                                    _this.remove();
                                }
                            }

                        })
                        .fail(function () {
                            return false;
                        })
                        .always(function () {
                            return false;
                        });
                });
                $(document).on("click", ".bj-view-more-ft", function (e) {
                    e.preventDefault();
                    var _this = $(this);
                    _this.parent().find(".bj-ft-cat-item").css("display", "block");
                    _this.remove();
                })
            },
            showMoreLatestProduct: function () {
                $(document).on("click", ".bj-button-show-more", function (e) {
                    e.preventDefault();
                    var _this = $(this),
                        limit = _this.attr("data-limit"),
                        parents  =_this.parents(".bj-latest-pub").find(".row"),
                        count = parents.children().length;
                    $.ajax({
                        url: bj_handle.ajax_url,
                        async: false,
                        type: 'POST',
                        beforeSend: function () {
                        },
                        data: {
                            action: 'book_junky_show_more_latest_products',
                            count: count,
                            limit: limit
                        }
                    })
                        .done(function (data) {
                            if (data.stt === 'success') {
                                parents.append(data.layout);
                                if (data.more === false) {
                                    _this.parent().remove();
                                }
                            }

                        })
                        .fail(function () {
                            return false;
                        })
                        .always(function () {
                            return false;
                        });
                });
            }
        },
        handles: {
            checkPageResultSearch: function () {
                $(document).on('click', ".search-submit", function (e) {
                    e.preventDefault();
                    var _this = $(this),
                        parent = _this.parents(".searchform"),
                        cate = parent.find("#product_cat");
                    if (cate.length > 0 && cate.val() === "") {
                        parent.find("input[name='post_type']").val("product");
                    }
                    parent.submit();
                });
            },
            validateCheckOutForm: function () {
                $(document).on('click', '.owl-next,.owl-prev', function (e) {
                    e.preventDefault();
                    var _item = $(".owl-item.active");
                    var _step = $(".step-checkout li");
                    var data_type = _item.find(".bj-checkout-form").attr("data-form-type");
                    _step.removeClass("bj-step-active");
                    var index_ = $("." + data_type).index();
                    _step.each(function (i) {
                        if (i <= index_) {
                            $(this).addClass("bj-step-active");
                        }
                    });
                });
            }
        }
    };
    bj_handle_init.init();
})(jQuery);
