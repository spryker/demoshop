db.art.find().forEach(function (art) {

    print('"' + art.art_id + '","'
        + art.art_created + '","'
        + art.title.replace(/\"/g, '') + '","'
        + art.user_id + '"'
    );
});


