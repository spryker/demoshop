db.art.find().forEach(function (art) {

    for (edition in art.editions) {

        print('"' + art.art_id + '","'
            + art.editions[edition].product_id + '","'
            + art.editions[edition].price + '"'
        );

    }

});