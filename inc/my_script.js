jQuery(document).ready(($) => {
    // const products = $("div.products__item.product-type-variable");
    // Array.prototype.filter.call(products, (product) => {
    //     const select = (product.getElementsByTagName('select'));
    //     Array.prototype.filter.call(select, (elem) => {
    //         $(elem).change((e) => {
    //             const target = e.currentTarget;
    //             const price = parseInt(target.options[target.selectedIndex].dataset.speedPrice);
    //             const attr = target.getAttribute('id').split('-');
    //             const post = target.options[target.selectedIndex].dataset.post;
    //             // console.log(price,variate);
    //             const post_id = attr[1];
    //             var button = "a[data-product_id=" + post_id + "]";
    //            var elem = "#post-" + post_id;
    //             if (price > 0) {
    //                 $(elem).css("display", "block");
    //                 const href = "?add_to_card-" + post;
    //                 $(button).attr("href", href);
    //             } else {
    //                 $(elem).css("display", "none");
    //             }
    //              elem = "#speed-" + post_id;
    //             $( elem ).prop( "checked", false);
    //         })
    //     });
    // });
    const speeds = $(".requirements input");
    Array.prototype.filter.call(speeds, (speed) => {
        $(speed).on("change", (e) => {
            const target = e.currentTarget;
            console.log(target.checked);
            const attr = target.getAttribute('id').split('-');
            const post_id = attr[1];
            var button = "a[data-product_id=" + post_id + "]";
            var href;
            if (target.checked) {
                href = $(button).attr('href');
                href=href+"&speed";
                $(button).attr('href', href);
            } else {
                href = $(button).attr('href');
                console.log(typeof href);
                href = href.replace("&speed", "");
                $(button).attr('href', href);
            }
        });
    });
});

