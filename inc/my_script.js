jQuery(document).ready(($) => {
    const products = $("div.products__item.product-type-variable");
    Array.prototype.filter.call(products, (product) => {
        const select = (product.getElementsByTagName('select'));
        Array.prototype.filter.call(select, (elem) => {
            $(elem).change((e) => {
                const target = e.currentTarget;
                const price = parseInt(target.options[target.selectedIndex].dataset.speedPrice);
                const attr = target.getAttribute('data-product-id');
                // console.log(attr);
                const post = target.options[target.selectedIndex].dataset.id;
                // console.log(post);
                var button = "a[data-product_Vid=" + attr + "]";
               var elem = "#shieldpost-" + attr;
                if (attr !== post) {
                    const href = "?add_to_card-" + post;
                    $(button).attr("href", href);
                    $(button).attr("data-product_id", post);
                    $(elem).css("display", "none");
                } else {
                    $(elem).css("display", "block");
                }
            })
        });
    });
    // const speeds = $(".requirements input");
    // Array.prototype.filter.call(speeds, (speed) => {
    //     $(speed).on("change", (e) => {
    //         const target = e.currentTarget;
    //         console.log(target.checked);
    //         const attr = target.getAttribute('id').split('-');
    //         const post_id = attr[1];
    //         var button = "a[data-product_id=" + post_id + "]";
    //         var href;
    //         if (target.checked) {
    //             href = $(button).attr('href');
    //             href=href+"&speed";
    //             $(button).attr('href', href);
    //         } else {
    //             href = $(button).attr('href');
    //             console.log(typeof href);
    //             href = href.replace("&speed", "");
    //             $(button).attr('href', href);
    //         }
    //     });
    // });
});

